<?php namespace App\Services\Giphy\Contracts;

interface GifInterface {    
	/**
	 * Return trending GIFs.
	 *
	 * @param array $params
	 *
	 * @return mixed
	 */
	public function trending(array $params = [ ]);

	/**
	 * Search for a GIF.
	 *
	 * @param       $query
	 * @param array $params
	 *
	 * @return mixed
	 */
    public function search($query, array $params = [ ]);
    
	/**
	 * Return a random GIF.
	 *
	 * @param array $params
	 *
	 * @return mixed
	 */
    public function random(array $params = [ ]);
}