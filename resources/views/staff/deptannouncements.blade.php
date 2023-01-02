<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-l text-gray-800 leading-tight h-4">
            Departmental Announcements
        </h2>
    </x-slot>

    @include('staff.partials._sidebar')

    <div class="main">


        @foreach ($announcements as $announcement)
        <x-card>
            <h3 class="p-2">To: {{ $announcement->recepient }}</h3>
            <p class="p-2">{{ $announcement->message }}</p>

            
        </x-card>
        @endforeach


    </div>

</x-app-layout>