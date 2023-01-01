<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-l text-gray-800 leading-tight h-4">
            All Lecturers in the School
        </h2>
    </x-slot>

    @include('admin.partials._sidebar')

    <div class="main">
        <x-card>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>email</th>
                    <th>Course</th>
                    <th>Phone Number</th>
                    <th>Country</th>
                    <th>Religion</th>
                    <th>High School</th>
                    <th>DOB</th>
                </tr>
                @foreach ($lecturers as $lecturer)
                    <tr class="p-2">
                        <td class="p-2">{{ $lecturer->id }}</td>
                        <td class="p-2">{{ $lecturer->name }}</td>
                        <td class="p-2">{{ $lecturer->email }}</td>
                        <td class="p-2">{{ $lecturer->course }}</td>
                        <td class="p-2">{{ $lecturer->phone_number }}</td>
                        <td class="p-2">{{ $lecturer->country }}</td>
                        <td class="p-2">{{ $lecturer->religion }}</td>
                        <td class="p-2">{{ $lecturer->high_school }}</td>
                        <td class="p-2">{{ $lecturer->DOB }}</td>
                    </tr>
                @endforeach
            </table>
        </x-card>
    </div>

</x-app-layout>
