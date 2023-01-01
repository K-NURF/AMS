<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-l text-gray-800 leading-tight h-4">
            Creating a new class for Students
        </h2>
    </x-slot>

    @include('admin.partials._sidebar')

    <div class="main">
        <x-card>

            <form action="/create_class" method="POST">
                @csrf
                <!-- unit -->
                <div>
                    <x-input-label for="name" :value="__('Select the required unit')" />
                    <select name="units_list_id" value="{{ old('units_list_id') }}">
                        <option value="">--</option>
                        @foreach ($units as $unit)
                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Course -->
                <div class="mt-4">
                    <x-input-label for="course" :value="__('course')" />
                    <x-text-input id="course" class="block mt-1 w-full" type="text" name="course"
                        :value="old('course')" required />
                    <x-input-error :messages="$errors->get('course')" class="mt-2" />
                </div>

                <!-- semester -->
                <div class="mt-4">
                    <x-input-label for="semester" :value="__('semester')" />
                    <x-text-input id="semester" class="block mt-1 w-full" type="text" name="semester"
                        :value="old('semester')" required />
                    <x-input-error :messages="$errors->get('semester')" class="mt-2" />
                </div>

                <x-primary-button class="ml-4 mt-4">
                    {{ __('Next') }}
                </x-primary-button>
        </x-card>
        </form>

    </div>



</x-app-layout>
