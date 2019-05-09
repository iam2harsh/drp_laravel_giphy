<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Giphy\Facades\Giphy;
use Illuminate\Support\Facades\Cache;

use Carbon\Carbon;
use DB;

use App\RandomGif;
use App\NewRandomGif;

class GiphyController extends Controller
{
    public function getTrendingGifs()
    {
        if (Cache::has('trending_gifs')) {
            return Cache::get('trending_gifs');
        } else {
            try {
                Cache::put('trending_gifs', Giphy::gif()->trending(), Carbon::now()->addHour());
                return Giphy::gif()->trending();
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
    }

    public function cacheSearchGifs()
    {
        if (Cache::has('search_gifs')) {
            return Cache::get('search_gifs');
        } else {
            try {
                Cache::put('search_gifs', Giphy::gif()->search("test"), Carbon::now()->addMinute());
                return Giphy::gif()->search("test");
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
        
    }

    public function storeRandomGifs() {
        $random_gifs = array();
        for($i = 0; $i < 10; $i++) {
            try {
                $gif = json_decode(Giphy::gif()->random());
                array_push($random_gifs, ['title'=> $gif->data->title, 'url'=> $gif->data->image_url]);
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
        $counter = 0;
        for($i = 0; $i < 70; $i++) {
            foreach($random_gifs as $random_gif) {
                $counter++;
                DB::insert('INSERT INTO random_gifs (title, url) VALUES ("'.$random_gif['title']."_".$counter.'", "'.$random_gif['url'].'")');
            }
        }

        return array('count' => Randomgif::all()->count());
    }

    public function createNewRandomGifs() {
        $random_gifs = RandomGif::all();
        $timestamp = Carbon::now();
        foreach($random_gifs as $random_gif) {
            DB::insert('INSERT INTO new_random_gifs (title, url) VALUES ("'.$random_gif->title."_".$timestamp.'", "'.$random_gif->url.'")');
        }
        // DB::statement('CREATE TABLE new_random_gifs (SELECT CONCAT(random_gifs.title, "_", NOW()) AS tile, random_gifs.url AS url FROM random_gifs)');
        return array('count' => NewRandomgif::all()->count());
    }

    public function searchGifs(Request $request)
    {
        if ($request->has('query')) {
            try {
                return Giphy::gif()->search($request->get('query'), ['limit' => 3]);
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
        abort(404);
    }
}
