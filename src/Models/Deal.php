<?php namespace LasseRafn\Pipedrive\Models;

use LasseRafn\Pipedrive\Utils\Model;

class Deal extends Model
{
	protected $entity   = 'deals';

	protected $modelClass = self::class;

	public $id;
	public $title;
	public $value;
	public $currency;
	public $user_id;

	/**
	 * @var Person|integer
	 */
	public $person_id;

	/**
	 * @var Organization|integer
	 */
	public $org_id;


	public $stage_id;
	public $status;
	public $lost_reason;
	public $visible_to;
	public $add_time;

	/**
	 * @return DealProduct
	 */
	public function products()
	{
		$dealProduct = new DealProduct($this->request);
		$newEntity = $dealProduct->getEntity();
		$newEntity = str_replace(':dealid', $this->id, $newEntity);

		$dealProduct->updateEntity($newEntity);

		return $dealProduct;
	}

	public function setOrgIdAttribute( $org )
	{
		if ( \is_array( $org ) ) {
			$org['id'] = $org['value'];
			return new Organization( $this->request, $org );
		}

		return $org;
	}

	public function setPersonIdAttribute( $person )
	{
		if ( \is_array( $person ) ) {
			$person['id'] = $person['value'];
			return new Person( $this->request, $person );
		}

		return $person;
	}
}