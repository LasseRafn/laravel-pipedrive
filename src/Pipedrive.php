<?php namespace LasseRafn\Pipedrive;

use LasseRafn\Pipedrive\Models\Deal;
use LasseRafn\Pipedrive\Models\Organization;
use LasseRafn\Pipedrive\Models\OrganizationField;
use LasseRafn\Pipedrive\Models\Person;
use LasseRafn\Pipedrive\Models\Pipeline;
use LasseRafn\Pipedrive\Models\Product;
use LasseRafn\Pipedrive\Models\Stage;
use LasseRafn\Pipedrive\Utils\Model;
use LasseRafn\Pipedrive\Utils\Request;

class Pipedrive
{
	protected $request;

	public function __construct()
	{
		$this->request = new Request(config( 'pipedrive.endpoint' ));
	}

	/**
	 * @return Model|Person
	 */
	public function persons()
	{
		return new Person($this->request);
	}

	/**
	 * @return Model|Organization
	 */
	public function organizations()
	{
		return new Organization($this->request);
	}

	/**
	 * @return Model|Deal
	 */
	public function deals()
	{
		return new Deal($this->request);
	}

	/**
	 * @return Model|Product
	 */
	public function products()
	{
		return new Product($this->request);
	}

	/**
	 * @return Model|Stage
	 */
	public function stages()
	{
		return new Stage($this->request);
	}

	/**
	 * @return Model|Pipeline
	 */
	public function pipelines()
	{
		return new Pipeline($this->request);
	}

	/**
	 * @return Model|OrganizationField()
	 */
	public function organizationfields()
	{
		return new OrganizationField($this->request);
	}
}