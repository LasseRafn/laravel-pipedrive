<?php namespace LasseRafn\Pipedrive\Models;

use LasseRafn\Pipedrive\Utils\Model;

class User extends Model
{
	protected $entity   = 'users.';
	protected $fillable = [
		'id',
		'name',
		'default_currency',
		'locale',
		'lang',
		'email',
		'phone',
		'activated',
		'last_login',
		'created',
		'modified',
		'signup_flow_variation',
		'has_created_company',
		'is_admin',
		'role_id',
		'timezone_name',
		'active_flag',
		'icon_url',
		'is_you',
	];

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