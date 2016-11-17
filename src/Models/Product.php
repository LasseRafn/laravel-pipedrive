<?php namespace LasseRafn\Pipedrive\Models;

use LasseRafn\Pipedrive\Utils\Model;

class Product extends Model
{
	protected $entity   = 'products';
	protected $fillable = [
		'id',
		'name',
		'code',
		'unit',
		'tax',
		'active_flag',
		'owner_id',
		'visible_to',
		'add_time',
	    'prices'
	];

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