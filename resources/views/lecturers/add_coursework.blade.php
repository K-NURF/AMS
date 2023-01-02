<x-app-layout>
    <form method="POST" action="/processcoursework" enctype="multipart/form-data">
        @csrf
        
        
        <input type="hidden" name="classes_id" value="{{ $classes_id->id }}">

        
        <div>
            <x-input-label for="topic" :value="__('topic')" />
            <input name="topic" type="text"> 
        </div>
        <div>
            <x-input-label for="file" :value="__('file')" />
            <input name="file" type="file">
        </div>
        

        <x-primary-button class="ml-4 mt-4">
            {{ __('Post') }}
        </x-primary-button>

        
    </form>
</x-app-layout>