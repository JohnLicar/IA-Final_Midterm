<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <div class="flex justify-between p-3 bg-white border-b border-gray-200">
            <div class="w-80  bg-blue-500 border rounded-md  shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-105 ">
                <h1 class="ml-5 text-xl font-bold text-white">Completed today</h1>
                <div class="flex ml-14 mt-4 text-white">
                    <p class="text-7xl ml-14  font-black">{{ $completed }}</p>
                </div>
            </div>
            <div class="w-80 bg-green-500 border rounded-md  shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-105 ">
                <h1 class="ml-5 text-xl font-bold text-white">On going TODO</h1>
                <div class="flex ml-14 mt-4 text-white">
                    <p class="text-7xl ml-14  font-black">{{ $pending }}</p>
                </div>
            </div>
            <div class="w-80 bg-yellow-500 border rounded-md  shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-105 ">
                <h1 class="ml-5 text-xl font-bold text-white">All TODO</h1>
                <div class="flex ml-14 mt-4 text-white">
                    <p class="text-7xl ml-10 font-black">{{ $todos->count() }}</p>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="bg-white  mt-5 overflow-hidden shadow-sm sm:rounded-lg" >
            <div>
                {!! $chart->container() !!}
                {{ $chart->script() }}
            </div>
        </div>
    </div>
</x-app-layout>
