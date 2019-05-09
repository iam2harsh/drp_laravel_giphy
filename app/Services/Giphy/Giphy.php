<?php namespace App\Services\Giphy;

class Giphy {
	protected $client;
	public function __construct(\App\Services\Giphy\Factories\Client $client)
	{
		$this->client = $client;
	}
	/**
	* @return Factories\Gif
	*/
	public function gif()
	{
		return new \App\Services\Giphy\Factories\Gif($this->client);
	}
}