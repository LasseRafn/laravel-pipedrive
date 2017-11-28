<?php namespace LasseRafn\Pipedrive\Responses;

use Illuminate\Support\Collection;

interface ResponseInterface
{
	/**
	 * @return Collection
	 */
	public function getData();
}