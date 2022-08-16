<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class MostAnticipated extends Component
{

    public $mostAnticipated=[];

    public function loadMostAnticipated()
    {
        $before = Carbon::now()->subMonths(2)->timestamp;
        $after = Carbon::now()->addMonths(2)->timestamp;
        $current = Carbon::now()->timestamp;
        $afterFourMonths = Carbon::now()->addMonths(4)->timestamp;


        $this->mostAnticipated = Http::withHeaders([
            'Client-ID' => '75iy3m6y4s2awi931vdaa2b4ws7wp3',
            'Authorization'=> 'Bearer punjgjxmipyt3t17311lpshtc3zcn2'
        ])->withBody("fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating,slug, summary;
            where platforms = (48,49,130, 6)
            & (first_release_date >= {$current}
            & first_release_date < {$afterFourMonths});
            sort total_rating_count desc;
            limit 4;","text/plain"
        )->post( 'https://api.igdb.com/v4/games')->json();

    }

    public function render()
    {
        return view('livewire.most-anticipated');
    }
}
