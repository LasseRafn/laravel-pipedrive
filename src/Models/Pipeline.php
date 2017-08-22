<?php namespace LasseRafn\Pipedrive\Models;

use LasseRafn\Pipedrive\Utils\Model;

class Pipeline extends Model
{
	protected $entity = 'pipelines';
	protected $modelClass = self::class;

	public $id;
	public $name;
	public $order_nr;
	public $active;
}