<?php namespace LasseRafn\Pipedrive\Models;

use LasseRafn\Pipedrive\Utils\Model;

class Person extends Model
{
	protected $entity     = 'persons';
	protected $modelClass = self::class;
	protected $fillable   = [
		'id',
		'name',
		'first_name',
		'last_name',
		'owner_id',
		'org_id',
		'email',
		'phone',
		'visible_to',
		'company_id',
		'open_deals_count',
		'related_open_deals_count',
		'closed_deals_count',
		'related_closed_deals_count',
		'participant_open_deals_count',
		'participant_closed_deals_count',
		'add_time',
	    'email_messages_count',
		'activities_count',
		'done_activities_count',
		'undone_activities_count',
		'reference_activities_count',
		'files_count',
		'notes_count',
		'followers_count',
		'won_deals_count',
		'related_won_deals_count',
		'lost_deals_count',
		'related_lost_deals_count',
		'active_flag',
		'first_char',
		'update_time',
		'add_time',
		'visible_to',
		'picture_id',
		'next_activity_date',
		'next_activity_time',
		'next_activity_id',
		'last_activity_id',
		'last_activity_date',
	];

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