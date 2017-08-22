<?php namespace LasseRafn\Pipedrive\Models;

use LasseRafn\Pipedrive\Utils\Model;

class Product extends Model
{
	protected $entity   = 'products';

	protected $modelClass = self::class;

	public $id;
	public $name;
	public $code;
	public $unit;
	public $tax;
	public $active_flag;
	public $owner_id;
	public $visible_to;
	public $add_time;

	/** @var array */
	public $prices;
}