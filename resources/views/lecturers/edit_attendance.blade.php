<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-l text-gray-800 leading-tight h-4">
            Attendance for class on {{$session->date}} starting at {{$session->start_time}} and ending at {{$session->end_time}}
        </h2>
    </x-slot>
    @include('lecturers.partials._sidebar')

    <div class="main">
        <x-card>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th></th>
                </tr>
                @foreach ($students as $student)
                    <tr class="p-2">
                        <td class="p-2">{{ $student->student_id }}</td>
                        <td class="p-2">{{ $student->student_name }}</td>

                        @if ($student->attendance == 0)
                        <td class="p-2">
                            <a href="/update_absent/{{ $student->id }}"><x-danger-button>Mark as Absent </x-danger-button></a> 
                        </td>
                        @else
                        <td>
                                <a href="/update_present/{{ $student->id }}"><x-primary-button> Mark as Present</x-primary-button></a> 
                        </td>
                        @endif

                    </tr>
                @endforeach
            </table>
            <a href="/lecturer"><x-primary-button> Finish</x-primary-button></a> 

        </x-card>
    </div>    
</x-app-layout>
