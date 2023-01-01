<x-guest-layout>

    <div class="main">


        @foreach ($names as $name)
            <x-card>


                <p>Dear {{ $name->name }},</p><br>
                <p> We are pleased to inform you that you have successfully been Enrolled to
                    our University. Kindly Use your email address to log into our system with the default password
                    "asdfghjkl". Remember to change your password on the Profile details after logging in.
                </p>
                <br>
                <p class="underline">Enter the following details to complete your registration</p>
                <form action="/complete_reg/{{ $name->id }}" method="POST">
                    @csrf
                    <!-- religion -->
                    <div>
                        <x-input-label for="religion" :value="__('religion')" />
                        <x-text-input id="religion" class="block mt-1 w-full" type="text" name="religion"
                            :value="old('religion')" required autofocus />
                        <x-input-error :messages="$errors->get('religion')" class="mt-2" />
                    </div>
                    <!-- high_school -->
                    <div>
                        <x-input-label for="high_school" :value="__('high_school')" />
                        <x-text-input id="high_school" class="block mt-1 w-full" type="text" name="high_school"
                            :value="old('high_school')" required autofocus />
                        <x-input-error :messages="$errors->get('high_school')" class="mt-2" />
                    </div>
                    <!-- DOB -->
                    <div>
                        <x-input-label for="DOB" :value="__('Date of Birth')" />
                        <x-text-input id="DOB" class="block mt-1 w-full" type="date" name="DOB"
                            :value="old('DOB')" required autofocus />
                        <x-input-error :messages="$errors->get('DOB')" class="mt-2" />
                    </div>
                    <input type="hidden" name="semester" value=1.1>

                    <x-primary-button class="ml-4 mt-4">
                        {{ __('Next') }}
                    </x-primary-button>
                </form>

            </x-card>
        @endforeach
    </div>

</x-guest-layout>
