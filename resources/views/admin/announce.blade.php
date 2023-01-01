<x-guest-layout>
    <form method="POST" action="/processannounce">
        @csrf

        <div class="mt-4">
            <x-input-label for="recepient" :value="__('recepient')" />
            <select name="recepient" value="{{ old('recepient') }}">

                <option value="all">All</option>
                <option value="admin">Admins</option>
                <option value="lecturer">Lecturers</option>
                <option value="student">Students</option>
                <option value="staff">Staff</option>

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