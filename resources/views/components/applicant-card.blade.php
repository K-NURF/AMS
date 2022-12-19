@props(['applicant'])

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

