<?php namespace LasseRafn\Pipedrive\Models;

use LasseRafn\Pipedrive\Utils\Model;

class Activity extends Model
{
	protected $entity   = 'activities';

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
}