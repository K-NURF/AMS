
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-l text-gray-800 leading-tight h-4">
            your grades
        </h2>
    </x-slot>
    @include('student.partials._sidebar2')

    <x-card>
        <table>
            <tr>

                <th>TestName</th>
                <th>Date</th>
                <th>grade</th>
                <th></th>


            </tr>
            
        </table>
    </x-card>
</x-app-layout>
