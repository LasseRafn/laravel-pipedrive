<?php namespace LasseRafn\Pipedrive\Models;

use LasseRafn\Pipedrive\Utils\Model;

class Person extends Model
{
	protected $entity     = 'persons';
	protected $modelClass = self::class;
	protected $fillable   = [ 'id', 'name', 'owner_id', 'org_id', 'email', 'phone', 'visible_to', 'add_time' ];

	public $id;
	public $name;
	public $owner_id;

	/**
	 * @var Organization|integer
	 */
	public $org_id;
	public $email;
	public $phone;
	public $visible_to;
	public $add_time;

	function setOrgIdAttribute( $org )
	{
		if ( is_array( $org ) )
		{
			return new Organization( $this->request, $org );
		}

		return $org;
	}
}