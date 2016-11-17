<?php namespace LasseRafn\Pipedrive\Models;

use LasseRafn\Pipedrive\Utils\Model;

class Stage extends Model
{
	protected $entity = 'stages';
	protected $modelClass = self::class;
	protected $fillable = [ 'name', 'pipeline_name', 'id', 'pipeline_id', 'order_nr', 'active_flag', 'rotten_days', 'deal_probability', 'rotten_flag', 'update_time', 'add_time' ];

	public $id;
	public $name;
	public $pipeline_name;

	/**
	 * @var Pipeline|integer
	 */
	public $pipeline_id;
	public $rotten_days;
	public $deal_probability;
	public $rotten_flag;
	public $update_time;
	public $active_flag;
	public $add_time;
	public $order_nr;
}