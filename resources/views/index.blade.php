<x-layout>
    <x-header></x-header>
<div class="my-8 h-4/5">

    <div class="container mx-auto px-4">
        <livewire:popular-games/>
<div class="flex flex-col lg:flex-row mt-10">

    <div class="recently-reviewed w-full lg:w-3/4 mr-0 lg:mr-32 ">
        <h2 class="uppercase text-blue-500 tracking-wide font-semibold">Recently Reviewed</h2>
        <livewire:recently-reviewed/>
    </div>
    <div class="flex flex-col w-full lg:w-1/4 mt-12 lg:mt-0">
    <div class="most-anticipated mb-12 ">
        <h2 class="uppercase text-blue-500 tracking-wide font-semibold">Most Anticipated</h2>
        <livewire:most-anticipated/>
    </div>
    <div class="coming-soon">
        <h2 class="uppercase text-blue-500 tracking-wide font-semibold">Coming Soon</h2>
        <livewire:coming-soon/>
    </div>
</div>



</div>


    </div>
</div>
<x-footer ></x-footer>
</x-layout>
