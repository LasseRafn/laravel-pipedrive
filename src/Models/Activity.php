<?php namespace LasseRafn\Pipedrive\Models;

use LasseRafn\Pipedrive\Utils\Model;

class Activity extends Model
{
	protected $entity   = 'activities';
	protected $fillable = [
		'subject',
		'done',
		'type',
		'due_date',
		'due_time',
		'duration',
		'user_id',
		'deal_id',
		'person_id',
		'org_id',
		'note'
	];

	protected $modelClass = self::class;

	public $subject;
	public $done;
	public $type;
	public $due_date;
	public $due_time;
	public $duration;
	public $user_id;

	public $note;

	/**
	 * @var Deal|integer
	 */
	public $deal_id;

	/**
	 * @var Person|integer
	 */
	public $person_id;

	/**
	 * @var Organization|integer
	 */
	public $org_id;

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

	function setOrgIdAttribute(array $org)
	{
		return new Organization($this->request, $org);
	}

	function setPersonIdAttribute(array $person)
	{
		return new Person($this->request, $person);
	}

	function setDealIdAttribute(array $deal)
	{
		return new Deal($this->request, $deal);
	}
}