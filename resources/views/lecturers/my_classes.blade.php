<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-l text-gray-800 leading-tight h-4">
            My Classes
        </h2>
    </x-slot>
    @include('lecturers.partials._sidebar')

    <div class="main">
        <x-card>
            <table>
                <tr>

                    <th>Weekday</th>
                    <th>Start time</th>
                    <th>End time</th>
                    <th>Name</th>
                    <th> </th>


                </tr>
                @foreach ($classes as $class)
                    <tr class="p-2">
                        <td class="p-2">{{ $class->weekday }}</td>
                        <td class="p-2">{{ $class->start_time }}</td>
                        <td class="p-2">{{ $class->end_time }}</td>
                        <td class="p-2">{{ $class->name }}</td>
                        <td class="p-2">
                        <form method="POST" action="/create_session/{{$class->id}}">
                            @csrf
                            <x-primary-button>update Attendance </x-primary-button>
                        </form>
                        </td>
                        <td class="p-2">
                            <form method="POST" action="/post_grades/{{$class->id}}">
                                @csrf
                                <x-primary-button> post grades </x-primary-button>
                            </form>
                            </td>
                       

                    </tr>
                @endforeach
            </table>
        </x-card>
    </div>

</x-app-layout>
