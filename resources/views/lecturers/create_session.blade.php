<x-app-layout>
    <form method="POST" action="/process_session">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="date" :value="__('Date')" />
            <x-text-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date')" required
                autofocus />
            <x-input-error :messages="$errors->get('date')" class="mt-2" />
        </div>



        <input type="hidden" name="classes_id" value="{{ $classes->id }}">
        <input type="hidden" name="start_time" value="{{ $classes->start_time }}">
        <input type="hidden" name="end_time" value="{{ $classes->end_time }}">




        <x-primary-button class="ml-4 mt-4">
            {{ __('Mark Attendance') }}
        </x-primary-button>
    </form>
</x-app-layout>
