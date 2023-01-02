
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-l text-gray-800 leading-tight h-4">
            your grades
        </h2>
    </x-slot>
    @include('student.partials._sidebar2')
    <div class="main">
    <x-card>
        <table>
            <tr>

                <th>TestName</th>
                <th></th>
                <th>Date</th>
                <th></th>
                <th>grade</th>
                <th></th>


            </tr>
            
        </table>
    </x-card>
    </div>
</x-app-layout>
