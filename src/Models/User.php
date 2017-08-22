<?php namespace LasseRafn\Pipedrive\Models;

use LasseRafn\Pipedrive\Utils\UserModel;

class User extends UserModel
{
	protected $entity   = 'users';

	protected $modelClass = self::class;

	public $id;
	public $name;
	public $default_currency;
	public $locale;
	public $lang;
	public $email;
	public $phone;
	public $activated;
	public $last_login;
	public $created;
	public $modified;
	public $signup_flow_variation;
	public $has_created_company;
	public $is_admin;
	public $role_id;
	public $timezone_name;
	public $active_flag;
	public $icon_url;
	public $is_you;
}