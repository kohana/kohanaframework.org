<?php defined('SYSPATH') or die('No direct script access.');

class View_Download_Body extends Kostache {


	public function latest_version()
	{
		return $this->download['kohana-latest']['version'];
	}

	public function latest_codename()
	{
		return $this->download['kohana-latest']['codename'];
	}

	public function latest_status()
	{
		return $this->download['kohana-latest']['status'];
	}

	public function latest_download()
	{
		return $this->download['kohana-latest']['download'];
	}

	public function latest_changelog()
	{
		return $this->download['kohana-latest']['changelog'];
	}

	public function latest_documentation()
	{
		return $this->download['kohana-latest']['documentation'];
	}

	public function latest_issues()
	{
		return $this->download['kohana-latest']['issues'];
	}

	public function latest_support_until()
	{
		return $this->download['kohana-latest']['support_until'];
	}

	public function support_version()
	{
		return $this->download['support']['version'];
	}

	public function support_codename()
	{
		return $this->download['support']['codename'];
	}

	public function support_status()
	{
		return $this->download['support']['status'];
	}

	public function support_download()
	{
		return $this->download['support']['download'];
	}

	public function support_changelog()
	{
		return $this->download['support']['changelog'];
	}

	public function support_documentation()
	{
		return $this->download['support']['documentation'];
	}

	public function support_issues()
	{
		return $this->download['support']['issues'];
	}

	public function support_until()
	{
		return $this->download['support']['support_until'];
	}
}