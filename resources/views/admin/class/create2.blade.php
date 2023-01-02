<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-l text-gray-800 leading-tight h-4">
            Select Lecturer for Unit and set time
        </h2>
    </x-slot>

    @include('admin.partials._sidebar')

    <div class="main">
        <x-card>

            <form action="/create_classroom" method="POST">
                @csrf
                <!-- lecturer -->
                <div>
                    <x-input-label for="name" :value="__('Lecturers who belong to the School of the Unit')" />
                    <select name="lecturer_id" value="{{ old('lecturer') }}">
                        <option value="">--</option>
                        @foreach ($lecturers as $lecturer)
                            <option value="{{$lecturer->id}}">{{ $lecturer->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Week Day -->
                <div>
                    <x-input-label for="name" :value="__('Week Day')" />
                    <select name="weekday" value="{{ old('weekday') }}">
                        <option value="">--</option>
                        <option value="1">Monday</option>
                        <option value="2">Tuesday</option>
                        <option value="3">Wednesday</option>
                        <option value="4">Thursday</option>
                        <option value="5">Friday</option>
                        <option value="6">Saturday</option>
                        <option value="7">Sunday</option>
                    </select>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <input type="hidden"name="units_id"value= {{$unit_id}}>

                <!-- start_time -->
                <div class="mt-4">
                    <x-input-label for="start_time" :value="__('start_time')" />
                    <x-text-input id="start_time" class="block mt-1 w-full" type="time" name="start_time"
                        :value="old('start_time')" required />
                    <x-input-error :messages="$errors->get('start_time')" class="mt-2" />
                </div>

                <!-- end_time -->
                <div class="mt-4">
                    <x-input-label for="end_time" :value="__('end_time')" />
                    <x-text-input id="end_time" class="block mt-1 w-full" type="time" name="end_time"
                        :value="old('end_time')" required />
                    <x-input-error :messages="$errors->get('end_time')" class="mt-2" />
                </div>

                <!-- available -->
                <div class="mt-4">
                    <input type="radio" name="availabile" value='0'>
                    <label for="availability">Make Class Available</label>
                    <input type="radio" name="availabile" value='1'>
                    <label for="availability">Make Class not Available</label>
                </div>

                <x-primary-button class="ml-4 mt-4">
                    {{ __('Next') }}
                </x-primary-button>
        </x-card>
        </form>

    </div>



</x-app-layout>
