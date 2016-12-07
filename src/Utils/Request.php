<?php
namespace LasseRafn\Pipedrive\Utils;

use GuzzleHttp\Client;
use LasseRafn\Pipedrive\Errors\CurlError;

class Request
{
	protected $api_token;
	public    $curl;

	public function __construct( $baseUri = '')
	{
		$this->api_token = config('pipedrive.api_token');

		$this->curl = new Client( [
			'base_uri' => $baseUri
		] );
	}

	/**
	 * @param $token
	 *
	 * @return $this
	 */
	public function setApiToken($token)
	{
		$this->api_token = $token;

		return $this;
	}

	private function buildEntity( $entity, $id = null, $fields = null )
	{
		return ( $fields ) ? $entity . ':(' . implode( ',', $fields ) . ')' . ( $id ? '/' . $id : '' ) : $entity . ( $id ? '/' . $id : '' );
	}

	private function getData( $data )
	{
		return json_decode( $data, true )['data'];
	}

	public function getWithResponse( string $entity, int $id = null, array $fields = null, int $start = 0, int $limit = 100 )
	{
		try
		{
			$url      = config( 'pipedrive.endpoint' ) . $this->buildEntity( $entity, $id, $fields ) . '?api_token=' . $this->api_token . '&start=' . $start . '&limit=' . $limit;
			$response = $this->curl->get( $url );

			return json_decode( $response->getBody() );
		} catch ( \Exception $exception )
		{
			throw new CurlError( $exception->getMessage(), $exception->getCode() );
		}
	}

	public function get( string $entity, int $id = null, array $fields = null, int $start = 0, int $limit = 100 )
	{
		try
		{
			$url      = config( 'pipedrive.endpoint' ) . $this->buildEntity( $entity, $id, $fields ) . '?api_token=' . $this->api_token . '&start=' . $start . '&limit=' . $limit;
			$response = $this->curl->get( $url );

			return $this->getData( $response->getBody() );
		} catch ( \Exception $exception )
		{
			throw new CurlError( $exception->getMessage(), $exception->getCode() );
		}
	}

	public function getBy( string $entity, $attr, $value, int $start = 0, int $limit = 1 )
	{
		try
		{
			$value = urlencode($value);
			$url      = config( 'pipedrive.endpoint' ) . $this->buildEntity( $entity ) . '/find?api_token=' . $this->api_token . '&start=' . $start . '&limit=' . $limit . "&{$attr}={$value}";
			$response = $this->curl->get( $url );

			return $this->getData( $response->getBody() );
		} catch ( \Exception $exception )
		{
			throw new CurlError( $exception->getMessage(), $exception->getCode() );
		}
	}

	public function getByMany( string $entity, $queries, int $start = 0, int $limit = 1 )
	{
		try
		{
			$query = '';

			foreach ( $queries as $q )
			{
				$attr  = key( $q );
				$value = urlencode($q[ $attr ]);
				$query .= "&{$attr}={$value}";
			}

			$url      = config( 'pipedrive.endpoint' ) . $this->buildEntity( $entity ) . '/find?api_token=' . $this->api_token . '&start=' . $start . '&limit=' . $limit . $query;

			$response = $this->curl->get( $url );

			return $this->getData( $response->getBody());
		} catch ( \Exception $exception )
		{
			throw new CurlError( $exception->getMessage(), $exception->getCode() );
		}
	}

	public function post( string $entity, $data = [] )
	{
		try
		{
			$url = $this->buildEntity( $entity ) . '?api_token=' . $this->api_token;

			$response = $this->curl->post( $url, [
				'api_token' => $this->api_token,
				'json'      => $data
			] );

			return $this->getData( $response->getBody() );
		} catch ( \Exception $exception )
		{
			throw new CurlError( $exception->getMessage(), $exception->getCode() );
		}
	}

	public function put( string $entity, $id, $data = [] )
	{
		try
		{
			$url = $this->buildEntity( $entity, $id ) . '?api_token=' . $this->api_token;

			$response = $this->curl->put( $url, [
				'api_token' => $this->api_token,
				'json'      => $data
			] );

			return $this->getData( $response->getBody() );
		} catch ( \Exception $exception )
		{
			throw new CurlError( $exception->getMessage(), $exception->getCode() );
		}
	}
}