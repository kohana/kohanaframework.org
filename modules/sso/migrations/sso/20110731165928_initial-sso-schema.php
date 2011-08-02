<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Initial SSO Schema
 */
class Migration_Sso_20110731165928 extends Minion_Migration_Base {
	/**
	 * Run queries needed to apply this migration
	 *
	 * @param Kohana_Database Database connection
	 */
	public function up(Kohana_Database $db)
	{
		// Create roles table
		$db->query(NULL, 'CREATE TABLE `roles` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `uniq_name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;');

		// Create roles_users table
		$db->query(NULL, 'CREATE TABLE `roles_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY  (`user_id`,`role_id`),
  KEY `fk_role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;');

		// Create users table
		$db->query(NULL, 'CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(254) NOT NULL,
  `email_new` varchar(254) DEFAULT NULL,
  `username` varchar(32) NOT NULL DEFAULT \'\',
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `logins` int(10) UNSIGNED NOT NULL DEFAULT \'0\',
  `last_login` int(10) UNSIGNED,
  `created` int(10) unsigned NOT NULL,
  `updated` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `uniq_username` (`username`),
  UNIQUE KEY `uniq_email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;');

		// Create user_tokens table
		$db->query(NULL, 'CREATE TABLE `user_tokens` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `user_agent` varchar(40) NOT NULL,
  `token` varchar(40) NOT NULL,
  `type` varchar(100) NOT NULL,
  `created` int(10) UNSIGNED NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `uniq_token` (`token`),
  KEY `fk_user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;');

		// Create relationships
		$db->query(NULL, 'ALTER TABLE `roles_users`
  ADD CONSTRAINT `roles_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles_users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;');

		$db->query(NULL, 'ALTER TABLE `user_tokens`
  ADD CONSTRAINT `user_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;');

		// Insert default roles
		list($role_id, $unused) = DB::insert('roles', array(
			'name',
			'description',
		))->values(array(
			'login',
			'Login privileges, granted after account confirmation.',
		), array(
			'admin',
			'Administrative user, has access to everything.',
		))->execute($db);

		// Insert default user
		list($admin_user_id, $unused) = DB::insert('users', array(
			'email',
			'username',
			'first_name',
			'last_name',
			'password',
		))->values(array(
			'admin@kohanaframework.org',
			'admin',
			'admin',
			'admin',
			Auth::instance()->hash('admin'),
		))->execute($db);

		// Insert default user's roles
		list($admin_user_id, $unused) = DB::insert('roles_users', array(
			'user_id',
			'role_id',
		))->values(array(
			$admin_user_id,
			$role_id,
		), array(
			$admin_user_id,
			$role_id + 1,
		))->execute($db);
	}

	/**
	 * Run queries needed to remove this migration
	 *
	 * @param Kohana_Database Database connection
	 */
	public function down(Kohana_Database $db)
	{
		throw new Kohana_Exception('Unable to migrate down');
	}
}
