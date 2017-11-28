<?php

namespace LasseRafn\Pipedrive\Responses;

class PaginatedResponse implements ResponseInterface
{
	public function getData() {

	}

	public function getNextOffset() {

	}

	public function hasMoreItems() {
		return false;
	}
}