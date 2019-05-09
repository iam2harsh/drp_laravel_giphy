<?php namespace App\Services\Giphy\Factories;

use App\Services\Giphy\Contracts\ClientInterface;
use GuzzleHttp\Client as HttpClient;

class Client implements ClientInterface {

	protected $client;
	protected $apiKey;

	/**
	 * @param $baseUri
	 */
	public function __construct($baseUri, $apiKey)
	{
		$this->client = new HttpClient([
			'base_uri' => $baseUri
		]);
		$this->apiKey = $apiKey;
	}


	/**
	 * @param       $endPoint
	 * @param array $params
	 *
	 * @return mixed
	 * @throws \Exception
	 */
	public function get($endPoint, array $params = [])
	{
		$params['api_key'] = $this->apiKey;
		$response = $this->client->get($endPoint, [ 'query' => $params ]);

		switch ($response->getHeader('content-type'))
		{
			case "application/json":
				return $response->json();
				break;
			default:
				return $response->getBody()->getContents();
		}
	}
}