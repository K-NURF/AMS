<x-guest-layout>
    <form method="POST" action="/check_acceptance">
        @csrf


        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

       
        

        <x-primary-button class="ml-4 mt-4">
            {{ __('Check for acceptance letter') }}
        </x-primary-button>
        </div>
    </form>
</x-guest-layout>
