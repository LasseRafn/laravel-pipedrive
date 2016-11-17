<?php namespace LasseRafn\Pipedrive\Models;

use LasseRafn\Pipedrive\Utils\Model;

class Organization extends Model
{
	protected $entity   = 'organizations';
	protected $fillable = [
		'id',
		'name',
		'owner_id',
		'visible_to',
		'add_time',
	];

	protected $modelClass = self::class;

	public $id;
	public $name;
	public $owner_id;
	public $visible_to;
	public $add_time;
}