<?php namespace App\Services\Giphy\Facades;

use Illuminate\Support\Facades\Facade;

class Giphy extends Facade {
	protected static function getFacadeAccessor()
	{
		return 'App\Services\Giphy\Giphy';
	}
}