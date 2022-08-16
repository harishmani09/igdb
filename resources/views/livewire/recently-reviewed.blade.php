<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div wire:init="loadRecentlyReviewed" class="recently-reviewed-container space-y-12 mt-8">

        @forelse ( $recentlyReviewed as $reviewed )


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
        @empty

        <div class="game bg-gray-800 shadow-md rounded-lg flex p-6">
            <div class="relative inline-block flex-none">
                <div class="bg-gray-700 w-32 h-40 lg:w-48 lg:h-56 text-transparent"></div>

            </div>
            <div class="ml-12">
                <div class="inline-block text-lg text-transparent bg-gray-700 mt-4 rounded">name</div>

                <div class=" mt-6 hidden lg:block  space-y-4">
                    <span class="bg-gray-700 text-transparent rounded inline-block">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                    <span class="bg-gray-700 text-transparent rounded inline-block">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                    <span class="bg-gray-700 text-transparent rounded inline-block">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                    <span class="bg-gray-700 text-transparent rounded inline-block">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>


                     </div>
            </div>

        </div>


        @endforelse

    </div>
</div>
