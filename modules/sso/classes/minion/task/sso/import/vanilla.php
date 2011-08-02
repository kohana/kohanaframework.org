<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Imports users from a vanilla2 database.
 * 
 * Available config options are:
 *
 * --db-host=hostname
 * --db-user=username
 * --db-pass=password
 * --db-name=database
 *
 * --offset=0
 *
 *  Specify a SQL offset. Used to restart if there was a failure
 *
 * --limit=999999999
 *
 *  Specify a SQL limit. Used if there are too many accounts to process at once
 *
 * @author Kiall Mac Innes <kiall@managedit.ie>
 */
class Minion_Task_Sso_Import_Vanilla extends Minion_Task
{
	/**
	 * A set of config options that this task accepts
	 * @var array
	 */
	protected $_config = array(
		'db-host',
		'db-user',
		'db-pass',
		'db-name',
		'offset',
		'limit',
	);

	/**
	 * Execute the task
	 *
	 * @param array Configuration
	 */
	public function execute(array $config)
	{
		if ( ! isset($config['offset']))
		{
			$config['offset'] = 0;
		}

		if ( ! isset($config['limit']))
		{
			$config['limit'] = 999999999;
		}

		try
		{
			$db = Database::instance('vanilla', array(
				'type'       => 'mysql',
				'connection' => array(
					'hostname'   => $config['db-host'],
					'database'   => $config['db-name'],
					'username'   => $config['db-user'],
					'password'   => $config['db-pass'],
				),
				'charset'      => 'utf8',
				'table_prefix' => '',
			));

			Minion_CLI::write('Reading users from vanilla database..');

			$users = DB::select()
				->from('GDN_User')
				->where('Banned', '!=', 1)
				->where('Deleted', '!=', 1)
				->limit($config['limit'])
				->offset($config['offset'])
				->execute($db, TRUE);

			if (count($users) == 0)
			{
				Minion_CLI::write('No users found');
				return;
			}

			Minion_CLI::write('Found '.count($users). ' to import.'.PHP_EOL);

			$login_role = ORM::factory('role', array('name' => 'login'));
			$admin_role = ORM::factory('role', array('name' => 'admin'));

			// Some counters
			$offset = $config['offset'];
			$success = 0;
			$failed = 0;
			$failed_users = array();
			$failed_offsets = array();

			// Lets go!
			foreach ($users as $user)
			{
				try
				{
					$new_user = ORM::factory('user');

					try
					{
						list($first_name, $last_name) = explode(' ', $user->Name, 2);
					}
					catch (ErrorException $e)
					{
						$first_name = $user->Name;
						$last_name = "undefined"; // Eww
					}



					$new_user->username = URL::title($user->Name, ''); // Eww
					$new_user->first_name = $first_name;
					$new_user->last_name = $last_name;
					$new_user->email = $user->Email;
					$new_user->password = Text::random('alnum', 128);

					$new_user->save();

					$new_user->add('roles', $login_role);

					if ($user->Admin == 1)
					{
						$new_user->add('roles', $admin_role);
					}

					$new_user->save();

					$success++;
					$offset++;
				}
				catch (ORM_Validation_Exception $e)
				{
					$failed_users[] = $user->Name;
					$failed_offsets[] = $offset;

					$failed++;
					$offset++;

					Kohana::$log->add(Log::ERROR, 'Failed to import user \':user\' at offset \':offset\'', array(
						':user'   => $user->Name,
						':offset' => $offset,
					));

					Minion_CLI::write('Import failed for user: \''.$user->Name.'\' at offset: \''.$offset.'\''.PHP_EOL);
				}

				Minion_CLI::write_replace('Sucessfully imported '.$success.' users. Failed to import '.$failed.' users.');
			}

			Minion_CLI::write('Failed users: '.  implode(', ', $failed_users).'. Offsets: '.  implode(', ', $failed_offsets).PHP_EOL);
		}
		catch(Exception $e)
		{
			Minion_CLI::write($e->getMessage());
		}
	}
}
