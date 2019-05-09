<?php namespace App\Services\Giphy\Contracts;

interface ClientInterface {
	/**
	 * @param       $endPoint
	 * @param array $options
	 *
	 * @return mixed
	 */
	public function get($endPoint, array $options = [ ]);
}