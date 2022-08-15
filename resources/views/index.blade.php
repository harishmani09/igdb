<x-layout>
    <x-header></x-header>
<div class="my-8 h-4/5">

    <div class="container mx-auto px-4">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold"> Popular Games</h2>
        <div class="grid text-sm h-full grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 border-b border-gray-800 pb-16" >
            @foreach ( $highestRatedGames as $game )


            <div class="game mt-8">
                    <div class="relative inline-block">
                        <a href="#"><img src="{{ Str::replaceFirst('thumb', 'cover_big', $game['cover']['url'])  }}" alt="game cover" class="hover:opacity-75 transition ease-in-out duration-150"></a>
                        <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full transform translate-x-1/2 translate-y-1/2"  >
                            <div class="font-semibold text-xs flex items-center justify-center h-full">
                            @if (array_key_exists('rating', $game ))
                            {{ round($game['rating']).'%' }}
                            @endif


                            </div>
                        </div>
                    </div>
                    <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">{{ $game['name'] }}</a>
                <div class="text-gray-400 mt-1">
                    @foreach ($game['platforms'] as $platform )
                    @if (array_key_exists('abbreviation', $platform))
                        {{ $platform['abbreviation'] }}
                    @endif

                    @endforeach
                </div>
            </div>

            @endforeach

        </div>
<div class="flex flex-col lg:flex-row mt-10">

    <div class="recently-reviewed w-full lg:w-3/4 mr-0 lg:mr-32 ">
        <h2 class="uppercase text-blue-500 tracking-wide font-semibold">Recently Reviewed</h2>
        <div class="recently-reviewed-container space-y-12 mt-8">

            @foreach ( $recentlyReviewed as $reviewed )


            <div class="game bg-gray-800 shadow-md rounded-lg flex p-6">
                <div class="relative inline-block flex-none">
                    <a href="#"><img src="{{ Str::replaceFirst('thumb', 'cover_big',$reviewed['cover']['url']  ) }}" alt="game cover" class=" w-48 hover:opacity-75 transition ease-in-out duration-150"></a>
                    <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full transform translate-x-1/2 translate-y-1/2"  >
                        <div class="font-semibold text-xs flex items-center justify-center h-full">{{ round($reviewed['rating']).'%' }}</div>
                    </div>
                </div>
                <div class="ml-12">
                    <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-4">{{ $reviewed['name'] }}</a>
                    <div class="text-gray-400 mt-1">
                        @foreach ($reviewed['platforms'] as $platform )
                            @if (array_key_exists('abbreviation', $platform))
                            {{ $platform['abbreviation'] }}

                            @endif
                        @endforeach

                    </div>
                    <p class="text-gray-400 mt-6 hidden lg:block"> {{ $reviewed['summary'] }} </p>
                </div>

            </div>

            @endforeach

        </div>
    </div>
    <div class="flex flex-col w-full lg:w-1/4 mt-12 lg:mt-0">
    <div class="most-anticipated mb-12 ">
        <h2 class="uppercase text-blue-500 tracking-wide font-semibold">Most Anticipated</h2>
        <div class="recently-reviewed-container space-y-12 mt-8">
            @foreach ($mostAnticipated as $game )


            <div class="bg-gray-800 shawdow-md rounded-md flex">
                @if (array_key_exists('cover', $game))
                <a href="#"><img src="{{ $game['cover']['url'] }}" alt="game cover" class=" w-16 hover:opacity-75 transition ease-in-out duration-150"></a>
                @endif
                <div class="flex flex-col ml-4 flex-start">

                    <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-1">{{ $game['name'] }}</a>

                    <p class="text-gray-400 text-xs">{{ Carbon\Carbon::parse($game['first_release_date'])->format('M d Y') }}</p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    <div class="coming-soon">
        <h2 class="uppercase text-blue-500 tracking-wide font-semibold">Coming Soon</h2>
        <div class="recently-reviewed-container space-y-12 mt-8">
            @foreach ($comingSoon as $game)
            <div class="bg-gray-800 shawdow-md rounded-md flex">
                @if (array_key_exists('cover', $game))
                <a href="#"><img src="{{ $game['cover']['url'] }}" alt="game cover" class=" w-16 hover:opacity-75 transition ease-in-out duration-150"></a>
                    @endif

                <div class="flex flex-col ml-4 flex-start">
                    <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-1">{{ $game['name'] }}</a>
                    <p class="text-gray-400 text-xs">{{ Carbon\Carbon::parse( $game['first_release_date'])->format('M d Y') }}</p>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</div>



</div>


    </div>
</div>
<x-footer ></x-footer>
</x-layout>
