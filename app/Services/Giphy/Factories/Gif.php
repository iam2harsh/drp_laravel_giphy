<?php namespace App\Services\Giphy\Factories;

use App\Services\Giphy\Contracts\GifInterface;
class Gif implements GifInterface {
	public function __construct(Client $client)
	{
		$this->client = $client;
	}
    
	/**
	 * Return trending GIFs.
	 *
	 * Optional params: limit, rating, fmt
	 *
	 * @param array $params
	 *
	 * @return mixed
	 */
	public function trending(array $params = [ ])
	{
		return $this->client->get("gifs/trending", $params);
    }
    
    /**
	 * Search for GIFs.
	 *
	 * Optional params: limit, offset, rating, fmt
	 *
	 * @param       $query
	 * @param array $params
	 *
	 * @return mixed
	 */
	public function search($query, array $params = [ ])
	{
		$params['q'] = $query;
		return $this->client->get("gifs/search", $params);
	}

	/**
	 * Get a random GIF.
	 *
	 * Optional params: tag, rating, fmt
	 *
	 * @param array $params
	 *
	 * @return mixed
	 */
	public function random(array $params = [ ])
	{
		return $this->client->get("gifs/random", $params);
    }
}