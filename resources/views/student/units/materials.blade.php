<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-l text-gray-800 leading-tight h-4">
            Materials posted by lecturer
        </h2>
    </x-slot>
    @include('student.partials._sidebar2')

    <div class="main">
        <x-card>
            <table>
                <tr>

                    <th>Topic</th>
                    <th>File</th>



                </tr>
                @foreach ($files as $file)
                    <tr class="p-2">
                        <td class="p-2">{{ $file->topic }}</td>
                        <td class="p-2"> <a href="/storage/{{ $file->file }}">View</a></td>

                    </tr>
                @endforeach
            </table>
        </x-card>
    </div>

</x-app-layout>
