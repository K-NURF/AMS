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
                            <form method="POST" action="/applicants/{{ $applicant->id }}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="user_type" value="student">
                                <input type="hidden" name="status" value=0>
                                
                                <x-primary-button> Accept </x-primary-button>
                            </form>
                        </td>
                        <td class="p-2">
                            <form method="POST" action="/applicants/{{ $applicant->id }}">
                                @csrf
                                @method('DELETE')
                                <x-danger-button> Decline </x-danger-button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </x-card>
    </div>

</x-app-layout>
