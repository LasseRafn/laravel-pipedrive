<?php namespace LasseRafn\Pipedrive\Models;

use LasseRafn\Pipedrive\Utils\Model;

class Webhook extends Model
{
	protected $entity     = 'webhooks';
	protected $modelClass = self::class;

	public $id;
	public $subscription_url;
	public $event_action;
	public $event_object;
	public $user_id;
	public $http_auth_user;
	public $http_auth_password;
	public $update_time;
	public $add_time;
}