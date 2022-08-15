<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GamesController extends Controller
{

    public function index()
    {
        $before = Carbon::now()->subMonths(2)->timestamp;
        $after = Carbon::now()->addMonths(2)->timestamp;
        $current = Carbon::now()->timestamp;
        $afterFourMonths = Carbon::now()->addMonths(4)->timestamp;



        $highestRatedGames = Http::withHeaders([
            'Client-ID' => '75iy3m6y4s2awi931vdaa2b4ws7wp3',
            'Authorization'=> 'Bearer punjgjxmipyt3t17311lpshtc3zcn2'
        ])->withBody("fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, slug;
            where platforms = (48,49,130, 6)
            & (first_release_date >= {$before}
            & first_release_date < {$after}
            & total_rating_count > 5);
            sort total_rating_count desc;
            limit 12;","text/plain"
        )->post( 'https://api.igdb.com/v4/games')->json();
        // dd($highestRatedGames);


        $recentlyReviewed = Http::withHeaders([
            'Client-ID' => '75iy3m6y4s2awi931vdaa2b4ws7wp3',
            'Authorization'=> 'Bearer punjgjxmipyt3t17311lpshtc3zcn2'
        ])->withBody("fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating,slug, summary;
            where platforms = (48,49,130, 6)
            & (first_release_date >= {$before}
            & first_release_date < {$current}
            & total_rating_count > 5);
            sort total_rating_count desc;
            limit 3;","text/plain"
        )->post( 'https://api.igdb.com/v4/games')->json();
        // dd($recentlyReviewed);

        $mostAnticipated = Http::withHeaders([
            'Client-ID' => '75iy3m6y4s2awi931vdaa2b4ws7wp3',
            'Authorization'=> 'Bearer punjgjxmipyt3t17311lpshtc3zcn2'
        ])->withBody("fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating,slug, summary;
            where platforms = (48,49,130, 6)
            & (first_release_date >= {$current}
            & first_release_date < {$afterFourMonths});
            sort total_rating_count desc;
            limit 4;","text/plain"
        )->post( 'https://api.igdb.com/v4/games')->json();
        // dd($mostAnticipated);

        $comingSoon = Http::withHeaders([
            'Client-ID' => '75iy3m6y4s2awi931vdaa2b4ws7wp3',
            'Authorization'=> 'Bearer punjgjxmipyt3t17311lpshtc3zcn2'
        ])->withBody("fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating,slug, summary;
            where platforms = (48,49,130, 6)
            & (first_release_date >= {$current}
            );
            sort first_release_date desc;
            limit 4;","text/plain"
        )->post( 'https://api.igdb.com/v4/games')->json();
        // dd($comingSoon);

        return view('index', ['highestRatedGames' => $highestRatedGames, 'recentlyReviewed'=>$recentlyReviewed, 'mostAnticipated' => $mostAnticipated, 'comingSoon' => $comingSoon]);
    }

}
