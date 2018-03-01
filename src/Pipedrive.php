<?php namespace LasseRafn\Pipedrive;

use LasseRafn\Pipedrive\Models\Activity;
use LasseRafn\Pipedrive\Models\ActivityType;
use LasseRafn\Pipedrive\Models\Deal;
use LasseRafn\Pipedrive\Models\File;
use LasseRafn\Pipedrive\Models\Organization;
use LasseRafn\Pipedrive\Models\OrganizationField;
use LasseRafn\Pipedrive\Models\Person;
use LasseRafn\Pipedrive\Models\Pipeline;
use LasseRafn\Pipedrive\Models\Product;
use LasseRafn\Pipedrive\Models\Stage;
use LasseRafn\Pipedrive\Models\User;
use LasseRafn\Pipedrive\Models\Webhook;
use LasseRafn\Pipedrive\Utils\Model;
use LasseRafn\Pipedrive\Utils\Request;

class Pipedrive
{
	protected $request;

	public function __construct( $apiToken = null ) {
		$this->request = new Request( config( 'pipedrive.endpoint' ) );

		if ( $apiToken !== null ) {
			$this->setApiToken( $apiToken );
		}
	}

	/**
	 * @param $token
	 *
	 * @return $this
	 */
	public function setApiToken( $token ) {
		$this->request->setApiToken( $token );

		return $this;
	}

	/**
	 * @return Model|Person
	 */
	public function persons() {
		return new Person( $this->request );
	}

	/**
	 * @return Model|Organization
	 */
	public function organizations() {
		return new Organization( $this->request );
	}

	/**
	 * @return Model|Deal
	 */
	public function deals() {
		return new Deal( $this->request );
	}

	/**
	 * @return Model|Product
	 */
	public function products() {
		return new Product( $this->request );
	}

	/**
	 * @return Model|Stage
	 */
	public function stages() {
		return new Stage( $this->request );
	}

	/**
	 * @return Model|Pipeline
	 */
	public function pipelines() {
		return new Pipeline( $this->request );
	}

	/**
	 * @return Model|OrganizationField()
	 */
	public function organizationfields() {
		return new OrganizationField( $this->request );
	}

	/**
	 * @return Model|Webhook()
	 */
	public function webhooks() {
		return new Webhook( $this->request );
	}

	/**
	 * @return Model|Activity()
	 */
	public function activities() {
		return new Activity( $this->request );
	}

	/**
	 * @return Model|ActivityType()
	 */
	public function activityTypes() {
		return new ActivityType( $this->request );
	}

	/**
	 * @return Model|File()
	 */
	public function files() {
		return new File( $this->request );
	}

	/**
	 * @return Model|User()
	 */
	public function users() {
		return new User( $this->request );
	}

	/**
	 * https://developers.pipedrive.com/docs/api/v1/#!/SearchResults/get_searchResults_field
	 *
	 * Term = search term
	 * fieldType = one of: (dealField, personField, productField, organisationField)
	 * fieldKey = internal Pipedrive ID for the field
	 * returnItemIds = 0/1.
	 * returnFieldKey = name of the field (if you want to override)
	 * start = pagination start
	 * limit = pagination items to return
	 *
	 * @param      $term
	 * @param      $fieldType
	 * @param      $fieldKey
	 * @param int  $returnItemIds
	 * @param null $returnFieldKey
	 * @param int  $start
	 * @param int  $limit
	 *
	 * @return array
	 *
	 * @throws Errors\CurlError
	 */
	public function searchByField( $term, $fieldType, $fieldKey, $returnItemIds = 0, $returnFieldKey = null, $start = 0, $limit = 100 ) {
		return $this->request->getRaw( '/searchResults/field', [
			'term'             => $term,
			'exact_match'      => 0,
			'field_type'       => $fieldType,
			'field_key'        => $fieldKey,
			'return_field_key' => $returnFieldKey,
			'return_item_ids'  => $returnItemIds,
			'start'            => $start,
			'limit'            => $limit
		] );
	}

	/**
	 * https://developers.pipedrive.com/docs/api/v1/#!/SearchResults/get_searchResults_field
	 *
	 * Term = search term
	 * fieldType = one of: (dealField, personField, productField, organisationField)
	 * fieldKey = internal Pipedrive ID for the field
	 * returnItemIds = 0/1.
	 * returnFieldKey = name of the field (if you want to override)
	 * start = pagination start
	 * limit = pagination items to return
	 *
	 * @param      $term
	 * @param      $fieldType
	 * @param      $fieldKey
	 * @param int  $returnItemIds
	 * @param null $returnFieldKey
	 * @param int  $start
	 * @param int  $limit
	 *
	 * @return array
	 *
	 * @throws Errors\CurlError
	 */
	public function exactSearchByField( $term, $fieldType, $fieldKey, $returnItemIds = 0, $returnFieldKey = null, $start = 0, $limit = 100 ) {
		return $this->request->getRaw( '/searchResults/field', [
			'term'             => $term,
			'exact_match'      => 1,
			'field_type'       => $fieldType,
			'field_key'        => $fieldKey,
			'return_field_key' => $returnFieldKey,
			'return_item_ids'  => $returnItemIds,
			'start'            => $start,
			'limit'            => $limit
		] );
	}
}