<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class PopularGames extends Component
{

    public $highestRatedGames = [];


    public function loadHighestRatedGames()
    {


        $before = Carbon::now()->subMonths(2)->timestamp;
        $after = Carbon::now()->addMonths(2)->timestamp;

        $this->highestRatedGames = Cache::remember('popular-games', 300, function () use($before, $after) {

            return Http::withHeaders(config('services.igdb')
            )->withBody("fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, slug;
                where platforms = (48,49,130, 6)
                & (first_release_date >= {$before}
                & first_release_date < {$after}
                & total_rating_count > 5);
                sort total_rating_count desc;
                limit 12;","text/plain"
            )->post( 'https://api.igdb.com/v4/games')->json();
        });


        // dd($highestRatedGames);

    }


    public function render()
    {
        return view('livewire.popular-games');
    }
}
