<x-app-layout>
    @include('admin.partials._sidebar')

    <div class="main">
        @foreach ($applicants as $applicant)
            <p>{{ $applicant->name }}</p>
            <p>{{ $applicant->email }}</p>
            <p>{{ $applicant->phone_number }}</p>
            <p>{{ $applicant->country }}</p>
            <br>
        @endforeach
    </div>

</x-app-layout>
