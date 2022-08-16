<x-layout>
    <x-header></x-header>
    <div class="container mx-auto px-4">

        <div class="game-details border-b border-gray-800 pb-12 flex flex-col lg:flex-row">

            <div class="inline-block lg:w-2/3">
                <img src="{{ Str::replace('thumb', 'cover_big', $game['cover']['url'] )}}" alt="cover">
            </div>
            <div class="ml-0 mt-6 lg:ml-12 lg:mt-0">
                <h2 href="#" style="font-size:2rem" class="text-3xl block font-semibold leading-tight hover:text-gray-400 mt-2 ">{{ $game['name'] }}</h2>
                <div class="text-gray-400 mt-1">
                <span>
                    @foreach ($game['genres'] as $genre )
                        {{ $genre['name'] }},
                    @endforeach
                </span>
                &middot;
                <span>
                    {{ $game['involved_companies'][0]['company']['name'] }}
                </span>
                &middot;
                <span>
                    @foreach ($game['platforms'] as $platform )
                    {{ $platform['abbreviation'] }}
                    @endforeach
                </span>
            </div>
            <div class="flex flex-col lg:flex-row  items-center mt-8 space-x-12 ">

                    <div class="flex items-center">
                            <div class="member-score flex items-center">
                            <div class="w-16 h-16 bg-gray-800 rounded-full">
                                <div class="font-semibold text-xs flex justify-center items-center h-full">
                                @if (isset(  $game['rating'] ))
                                    {{ round($game["rating"]).'%' }}
                                @else
                                    0%
                                @endif

                                </div>
                            </div>
                            <span class="ml-4"> Member <br> Score</span>
                        </div>
                        <div class="critic-score flex items-center ml-4" >
                            <div class="w-16 h-16 bg-gray-800 rounded-full">
                                <div class="font-semibold text-xs flex justify-center items-center h-full">
                                    @if (isset(  $game['aggregated_rating'] ))
                                    {{ round($game["aggregated_rating"]).'%' }}
                                @else
                                    0%
                                @endif

                                </div>
                            </div>
                            <span class="ml-4">Critic <br> Score</span>
                        </div>
                    </div>

            <div class="ml-0 lg:ml-12 mt-6 lg:mt-0">
                <div class="social-icons space-x-6 flex">
                    <div class="w-6 h-6  rounded-full bg-gray-800 flex justify-center items-center">
                        <a href="" class="hover:text-gray-400">
                        <svg class="fill-current" width="30" height="30">
                            <path d="M6 4 4 8v16h5v3h4l3-3h4l6-6V4H6zm2 2h16v11l-3 3h-6l-3 3v-3H8V6zm5 3v7h2V9h-2zm4 0v7h2V9h-2z"/>
                          </svg>
                        </a>
                    </div>
                    <div class="w-6 h-6 px-6 rounded-full bg-gray-800 flex justify-center items-center">
                        <a href="" class="hover:text-gray-400">
                            <svg class="fill-current" width="30" height="30">
                                <path d="M6 4 4 8v16h5v3h4l3-3h4l6-6V4H6zm2 2h16v11l-3 3h-6l-3 3v-3H8V6zm5 3v7h2V9h-2zm4 0v7h2V9h-2z"/>
                              </svg>

                        </a>
                    </div>
                    <div class="w-6 h-6 rounded-full bg-gray-800 flex justify-center items-center">
                        <a href="" class="hover:text-gray-400">
                            <svg class="fill-current" width="30" height="30">
                                <path d="M6 4 4 8v16h5v3h4l3-3h4l6-6V4H6zm2 2h16v11l-3 3h-6l-3 3v-3H8V6zm5 3v7h2V9h-2zm4 0v7h2V9h-2z"/>
                              </svg>
                        </a>
                    </div>
                    <div class="w-6 h-6 rounded-full bg-gray-800 flex justify-center items-center">
                        <a href="" class="hover:text-gray-400">
                            <svg class="fill-current" width="30" height="30">
                                <path d="M6 4 4 8v16h5v3h4l3-3h4l6-6V4H6zm2 2h16v11l-3 3h-6l-3 3v-3H8V6zm5 3v7h2V9h-2zm4 0v7h2V9h-2z"/>
                              </svg>
                        </a>
                    </div>
                </div>
            </div>

            </div>
            <p class="mt-8 w-3/4" >{{ $game['summary'] }}</p>

            @if (isset($game['videos']))
            <a  href="https://youtube.com/watch/{{ $game['videos'][0]['video_id'] }}"  target='_blank' style="background-color: #0a81d1" class=" inline-flex text-white rounded-md px-4 py-4 text-md font-semibold uppercase mt-6 items-center justify-center">


                    <svg xml:space="preserve" class="fill-current w-4 h-4 mr-2" id="Layer_1" x="0" y="0" version="1.1" viewBox="0 0 485 485">
                        <path d="M413.974 71.026C368.171 25.225 307.274 0 242.5 0S116.829 25.225 71.026 71.026C25.225 116.829 0 177.726 0 242.5s25.225 125.671 71.026 171.474C116.829 459.775 177.726 485 242.5 485s125.671-25.225 171.474-71.026C459.775 368.171 485 307.274 485 242.5s-25.225-125.671-71.026-171.474zM242.5 455C125.327 455 30 359.673 30 242.5S125.327 30 242.5 30 455 125.327 455 242.5 359.673 455 242.5 455z"/>
                        <path d="M181.062 336.575 343.938 242.5l-162.876-94.075z"/>
                      </svg>

                      <span class="ml-2">
                        play trailer
                     </span>

            </a>
            @endif
            {{-- <button style="background-color: #0a81d1" class=" text-white rounded-md px-4 py-4 text-md font-semibold uppercase mt-6 flex items-center justify-center">


                <svg xml:space="preserve" class="fill-current w-4 h-4 mr-2" id="Layer_1" x="0" y="0" version="1.1" viewBox="0 0 485 485">
                    <path d="M413.974 71.026C368.171 25.225 307.274 0 242.5 0S116.829 25.225 71.026 71.026C25.225 116.829 0 177.726 0 242.5s25.225 125.671 71.026 171.474C116.829 459.775 177.726 485 242.5 485s125.671-25.225 171.474-71.026C459.775 368.171 485 307.274 485 242.5s-25.225-125.671-71.026-171.474zM242.5 455C125.327 455 30 359.673 30 242.5S125.327 30 242.5 30 455 125.327 455 242.5 359.673 455 242.5 455z"/>
                    <path d="M181.062 336.575 343.938 242.5l-162.876-94.075z"/>
                  </svg>

                  <span class="ml-2">
                    play trailer
                 </span>

            </button> --}}
        </div>


    </div>
      {{-- images  --}}
    <div class="images-container border-b border-gray-800 pb-12 mt-8">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Images</h2>
        <div class="">
            <div class="images mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 h-full gap-8 ">
                @forelse ($game['screenshots'] as  $screenshot)
                <div>
                    <a href="">
                        <img src="{{Str::replace('thumb', 'screenshot_big', $screenshot['url'] ) }}" alt="resident" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                </div>
                @empty
                    <p>No images for the game</p>
                @endforelse
            </div>
        </div>
    </div>

    {{-- similar games --}}

    <div class="images-container border-gray-800 pb-12 mt-8">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Similar Games</h2>
        <div class="grid text-sm h-full grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 border-b border-gray-800 pb-16" >
            @foreach ($game['similar_games'] as $similar )


            <div class="game mt-8">
                    <div class="relative inline-block">
                        <a href="#"><img src="{{Str::replace('thumb', 'cover_big', $similar['cover']['url'] ) }}" alt="game cover" class="hover:opacity-75 transition ease-in-out duration-150"></a>
                        <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full transform translate-x-1/2 translate-y-1/2"  >
                            <div class="font-semibold text-xs flex items-center justify-center h-full">
                                @if (isset( $similar['rating'] ))
                                {{ round($similar["rating"]).'%' }}
                            @else
                                0%
                            @endif
                            </div>
                        </div>
                    </div>
                    <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">{{ $similar['name'] }}</a>
                <div class="text-gray-400 mt-1">
               <span>
                    @foreach ($similar['platforms'] as $platform   )
                    @if (isset($platform['abbreviation']))
                    {{ $platform['abbreviation'] }}
                    @endif
                @endforeach
            </span>
                </div>
            </div>
            @endforeach


        </div>
    </div>

    <x-footer></x-footer>
</x-layout>
