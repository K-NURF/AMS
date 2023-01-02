<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-l text-gray-800 leading-tight h-4">
            All Announcements
        </h2>
    </x-slot>

    @include('student.partials._sidebar2')

    <div class="main">




        <form method="POST" action="/process_regGrad">

            @csrf
            

            <div>
                <input type="hidden" name="status" value=1>
                <input type="hidden" name="student_id" value="{{auth()->user()->id}}">
                <x-primary-button> Register For Graduation </x-primary-button>
            </div>
        </form>
    </div>



</x-app-layout>