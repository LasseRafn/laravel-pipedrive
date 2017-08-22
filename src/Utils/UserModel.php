<?php namespace LasseRafn\Pipedrive\Utils;

class UserModel
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
	 * @return array
	 */
	public function get()
	{
		$models = [];

		try {
			$items = $this->request->getSimple( $this->entity );

			if ( is_array( $items ) ) {
				foreach ( $items as $item ) {
					$models[] = new $this->modelClass( $this->request, $item );
				}
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

	protected function setAttribute( $attribute, $value )
	{
		$this->{$attribute} = $value;
	}
}