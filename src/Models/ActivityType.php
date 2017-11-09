<?php namespace LasseRafn\Pipedrive\Models;

use LasseRafn\Pipedrive\Utils\Model;

class ActivityType extends Model
{
	protected $entity   = 'activityTypes';

	protected $modelClass = self::class;

	public $id;
	public $name;
	public $icon_key;
	public $color;
	public $order_nr;
}