<?php namespace LasseRafn\Pipedrive\Models;

use LasseRafn\Pipedrive\Utils\Model;

class Pipeline extends Model
{
	protected $entity = 'pipelines';
	protected $modelClass = self::class;
	protected $fillable = [ 'id', 'name', 'order_nr', 'active' ];

	public $id;
	public $name;
	public $order_nr;
	public $active;
}