<x-app-layout>
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
                <x-applicant-card :applicant="$applicant" />
            @endforeach
        </table>
</x-card>
    </div>

</x-app-layout>
