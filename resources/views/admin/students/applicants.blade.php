<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-l text-gray-800 leading-tight h-4">
            All Students registered in the School
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
                <th>Phone Number</th>
                <th>Country</th>
                <th> </th>
                <th> </th>
            </tr>
            @foreach ($applicants as $applicant)
            <tr class="p-2">
                <td class="p-2">{{ $applicant->id }}</td>
                <td class="p-2">{{ $applicant->name }}</td>
                <td class="p-2">{{ $applicant->email }}</td>
                <td class="p-2">{{ $applicant->phone_number }}</td>
                <td class="p-2">{{ $applicant->country }}</td>
                <td class="p-2">
                    <x-primary-button> Accept </x-primary-button>
                </td>
                <td class="p-2">
                    <x-danger-button> Decline </x-danger-button>
                </td>
            </tr>
            @endforeach
        </table>
</x-card>
    </div>

</x-app-layout>
