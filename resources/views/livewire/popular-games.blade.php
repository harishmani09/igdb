<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <h2 class="text-blue-500 uppercase tracking-wide font-semibold"> Popular Games</h2>
        <div wire:init="loadHighestRatedGames" class="grid text-sm h-full grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 border-b border-gray-800 pb-16" >
            @forelse ( $highestRatedGames as $game )


            <div class="game mt-8">
                    <div class="relative inline-block">
                        <a href="{{ route('show',$game['slug']) }}"><img src="{{ Str::replaceFirst('thumb', 'cover_big', $game['cover']['url'])  }}" alt="game cover" class="hover:opacity-75 transition ease-in-out duration-150"></a>
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
            @empty
            @foreach (range(1,12) as $game)


            <div class="game mt-8">
                <div class="relative inline-block">
                    <div class="bg-gray-800 w-44 h-56"></div>

                </div>
                <a href="#" class="block text-transparent text-lg bg-gray-700 rounded leading-tight mt-8">Title Goes Here</a>
            <div class="bg-gray-700 text-transparent text-lg rounded mt-3">
                ps4, switch, pc
            </div>
        </div>
        @endforeach
            @endforelse

        </div>
</div>
