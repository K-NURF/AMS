<x-app-layout>
    <div class="main">
        <x-slot name="header">
            <h2 class="font-semibold text-l text-gray-800 leading-tight h-4">
                ADMINISTRATOR
            </h2>
        </x-slot>

        @include('admin.partials._sidebar')

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-blue overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        Welcome to your Dashboard <br><br>
                        What would you like to do today?
                    </div>
                </div>
            </div>
        </div>

    </div>


</x-app-layout>
