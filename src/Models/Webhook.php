<?php namespace LasseRafn\Pipedrive\Models;

use LasseRafn\Pipedrive\Utils\Model;

class Webhook extends Model
{
	protected $entity     = 'pushNotifications';
	protected $modelClass = self::class;
	protected $fillable   = [ 'subscription_url', 'event', 'user_id', 'http_auth_user', 'http_auth_password', 'update_time', 'add_time' ];

	public $id;
	public $name;
	public $subscription_url;
	public $event;
	public $user_id;
	public $http_auth_user;
	public $http_auth_password;
	public $update_time;
	public $add_time;
}