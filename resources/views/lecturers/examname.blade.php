<x-app-layout>
    <form method="POST" action="/process_session">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="exam" :value="__('enter the test name')" />
            <x-text-input id="exam" class="block mt-1 w-full" type="text" name="exam" :value="old('exam')" required
                autofocus />
            <x-input-error :messages="$errors->get('exam')" class="mt-2" />
        </div>



        <input type="hidden" name="classes_id" value="{{ $classes->id }}">
        




        <x-primary-button class="ml-4 mt-4">
            {{ __('post grades') }}
        </x-primary-button>
    </form>
</x-app-layout>
