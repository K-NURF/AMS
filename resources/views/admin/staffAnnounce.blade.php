<x-guest-layout>
    <form method="POST" action="/processstaffannounce">
        @csrf

        <div class="mt-4">
            <x-input-label for="recepient" :value="__('recepient')" />
            <select name="recepient" value="{{ old('recepient') }}">

                <option value="Accounting">Accounting</option>
                <option value="Caffeteria">Cafeteria</option>
                <option value="Clinic">Clinic</option>
                <option value="Labs">Labs</option>
                <option value="Grounds">Grounds</option>

            </select>
            <x-input-error :messages="$errors->get('recepient')" class="mt-2" />
        </div>

        <!-- Announcement -->
        <div>
            <x-input-label for="announcement" :value="__('announcement')" />
            <textarea name="message"></textarea>
        </div>

        <x-primary-button class="ml-4 mt-4">
            {{ __('Announce') }}
        </x-primary-button>

        
    </form>
</x-guest-layout>