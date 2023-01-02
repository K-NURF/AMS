<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-l text-gray-800 leading-tight h-4">
            Available Units
        </h2>
    </x-slot>
    @include('student.partials._sidebar2')

    <div class="main">
        <x-card>
            <table>
                <tr>

                    <th>semester</th>
                    <th>course</th>
                    <th>name</th>
                    <th></th>


                </tr>
                @foreach ($units as $unit)
                    <tr class="p-2">
                        <td class="p-2">{{ $unit->semester }}</td>
                        <td class="p-2">{{ $unit->course }}</td>
                        <td class="p-2">{{ $unit->name }}</td>
                        <td>
                        <form method="POST" action="/register_unit/{{ $unit->class_id }}">
                            @csrf
                            <x-primary-button> Register for Unit </x-primary-button>
                        </form>                            
                        </td>

                    </tr>
                @endforeach
            </table>
        </x-card>
    </div>

</x-app-layout>
