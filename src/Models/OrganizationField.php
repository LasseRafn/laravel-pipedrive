<?php namespace LasseRafn\Pipedrive\Models;

use LasseRafn\Pipedrive\Utils\Model;

class OrganizationField extends Model
{
	protected $entity   = 'organizationFields';
	protected $fillable = [
		'id',
		'name',
		'field_type',
		'options',
	    'key'
	];

	protected $modelClass = self::class;

	public $id;
	public $name;
	public $field_type;
	public $options;
	public $key;
}