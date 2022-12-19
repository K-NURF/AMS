<x-app-layout>
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
                @foreach ($students as $student)
                    <tr class="p-2">
                        <td class="p-2">{{ $student->id }}</td>
                        <td class="p-2">{{ $student->name }}</td>
                        <td class="p-2">{{ $student->email }}</td>
                        <td class="p-2">{{ $student->course }}</td>
                        <td class="p-2">{{ $student->phone_number }}</td>
                        <td class="p-2">{{ $student->country }}</td>
                        <td class="p-2">{{ $student->religion }}</td>
                        <td class="p-2">{{ $student->high_school }}</td>
                        <td class="p-2">{{ $student->DOB }}</td>
                    </tr>
                @endforeach
            </table>
        </x-card>
    </div>

</x-app-layout>
