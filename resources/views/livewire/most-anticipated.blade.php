<div>
    <div wire:init="loadMostAnticipated" class="most-anticipated-container space-y-12 mt-8">
        @forelse ($mostAnticipated as $game )


        <div class="bg-gray-800 shawdow-md rounded-md flex">
            @if (array_key_exists('cover', $game))
            <a href="#"><img src="{{ $game['cover']['url'] }}" alt="game cover" class=" w-16 hover:opacity-75 transition ease-in-out duration-150"></a>
            @endif
            <div class="flex flex-col ml-4 flex-start">

                <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-1">{{ $game['name'] }}</a>

                <p class="text-gray-400 text-xs">{{ Carbon\Carbon::parse($game['first_release_date'])->format('M d Y') }}</p>
            </div>
        </div>
        @empty

        <div class="bg-gray-800 shawdow-md rounded-md flex">

            <div class=" h-28 w-24 bg-gray-700 text-transparent ">image goes here</div>

            <div class="flex flex-col ml-4 flex-start">

                <div href="#" class="block text-lg bg-gray-700 text-transparent rounded mt-1">Title goes here</div>

                <p class="text-transparent bg-gray-700 rounded text-xs m-2">Relese date here</p>
            </div>
        </div>

        @endforelse

    </div>

</div>
