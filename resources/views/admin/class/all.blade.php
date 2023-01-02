<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-l text-gray-800 leading-tight h-4">
            All Ongoing Classes in the School
        </h2>
    </x-slot>

    @include('admin.partials._sidebar')

    <div class="main">
        <x-card>
        <table>
            <tr>
                <th>Lecturer</th>
                <th>Unit</th>
                <th>Course</th>
                <th>Semester</th>
                <th></th>
            </tr>
            @foreach ($units as $unit)
            <tr class="p-2">
                <td class="p-2">{{ $unit->lecturer_name }}</td>
                <td class="p-2">{{ $unit->unit_name }}</td>
                <td class="p-2">{{ $unit->course }}</td>
                <td class="p-2">{{ $unit->semester }}</td>
                @if ($unit->available == '0')
                <td class="p-2">
                    <x-danger-button> Make Unavailable</x-danger-button>
                </td>
                @else
                <td class="p-2">
                    <x-primary-button> Make Available</x-primary-button>
                </td>                               
                @endif


            </tr>
            @endforeach
        </table>
</x-card>
    </div>

</x-app-layout>
