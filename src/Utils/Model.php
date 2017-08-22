<?php namespace LasseRafn\Pipedrive\Utils;

class Model
{
	protected $entity;
	protected $modelClass = self::class;

	/** @var integer */
	public $id;

	public function updateEntity( $newVal )
	{
		$this->entity = $newVal;

		return $this;
	}

	public function getEntity()
	{
		return $this->entity;
	}

	/**
	 * @var Request
	 */
	protected $request;

	public function __construct( Request $request, $data = [] )
	{
		$this->request = $request;

		foreach ( $data as $key => $value ) {
			if ( ! method_exists( $this, 'set' . ucfirst( camel_case( $key ) ) . 'Attribute' ) ) {
				$this->setAttribute( $key, $value );
			}
			else {
				$this->setAttribute( $key, $this->{'set' . ucfirst( camel_case( $key ) ) . 'Attribute'}( $value ) );
			}
		}
	}

	/**
	 * @param array|null $fields
	 * @param int        $start
	 * @param int        $limit
	 *
	 * @return array
	 */
	public function all( array $fields = null )
	{
		$models  = [];
		$hasMore = true;
		$start   = 0;
		$limit   = 500;


		while ( $hasMore ) {
			try {
				$items = $this->request->get( $this->entity, null, $fields, $start, $limit );

				if ( is_array( $items ) ) {
					foreach ( $items as $item ) {
						$models[] = new $this->modelClass( $this->request, $item );
					}
				}
				else {
					$hasMore = false;
				}
			} catch ( \Exception $exception ) {
				throw $exception;
			}

			$start += $limit;
		}

		return $models;
	}

	/**
	 * @param array|null $fields
	 * @param int        $start
	 * @param int        $limit
	 * @param array        $parameters
	 *
	 * @return array
	 */
	public function get( array $fields = null, $start = 0, $limit = 100, $parameters = [] )
	{
		$models = [];

		$query = '';

		foreach ( $parameters as $q ) {
			$attr  = key( $q );
			$value = urlencode( $q[ $attr ] );
			$query .= "&{$attr}={$value}";
		}

		try {
			$items = $this->request->get( $this->entity, null, $fields, $start, $limit, $query );

			if ( is_array( $items ) ) {
				foreach ( $items as $item ) {
					$models[] = new $this->modelClass( $this->request, $item );
				}
			}
			else {
				$hasMore = false;
			}
		} catch ( \Exception $exception ) {
			throw $exception;
		}

		return $models;
	}

	/**
	 * @param int        $id
	 * @param array|null $fields
	 * @param int        $start
	 * @param int        $limit
	 *
	 * @return static|bool
	 */
	public function find( int $id, array $fields = null, int $start = 0, int $limit = 100 )
	{
		$item = $this->request->get( $this->entity, $id, $fields, $start, $limit );

		if ( ! $item ) {
			return false;
		}

		return new $this->modelClass( $this->request, $item, true );
	}

	/**
	 * @param     $attr
	 * @param     $value
	 * @param int $start
	 * @param int $limit
	 *
	 * @return static|bool
	 */
	public function findBy( $attr, $value, int $start = 0, int $limit = 1 )
	{
		$item = $this->request->getBy( $this->entity, $attr, $value, $start, $limit );

		if ( ! $item || count( $item ) == 0 ) {
			return false;
		}

		return new $this->modelClass( $this->request, $item[0] );
	}

	/**
	 * @param     $queries
	 * @param int $start
	 * @param int $limit
	 *
	 * @return array
	 */
	public function findManyByMany( $queries, int $start = 0, int $limit = 100 )
	{
		$items = $this->request->getByMany( $this->entity, $queries, $start, $limit );

		if ( ! $items || count( $items ) == 0 ) {
			return [];
		}

		$models = [];
		foreach ( $items as $item ) {
			$models[] = new $this->modelClass( $this->request, $item );
		}

		return $models;
	}

	/**
	 * @param     $queries
	 * @param int $start
	 * @param int $limit
	 *
	 * @return static|bool
	 */
	public function findByMany( $queries, $start = 0, int $limit = 1 )
	{
		$item = $this->request->getByMany( $this->entity, $queries, $start, $limit );

		if ( ! $item || count( $item ) == 0 ) {
			return false;
		}

		return new $this->modelClass( $this->request, $item[0] );
	}

	/**
	 * @param array $fields
	 *
	 * @return static
	 */
	public function create( array $fields = [] )
	{
		$data = $this->request->post( $this->entity, $fields );

		return new $this->modelClass( $this->request, $data );
	}

	/**
	 * @param array $fields
	 *
	 * @return static
	 */
	public function update( array $fields = [] )
	{
		$data = $this->request->put( $this->entity, $this->id, $fields );

		return new $this->modelClass( $this->request, $data );
	}

	protected function setAttribute( $attribute, $value )
	{
		$this->{$attribute} = $value;
	}
}