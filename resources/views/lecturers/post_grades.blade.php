<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-l text-gray-800 leading-tight h-4">
            Post grades
        </h2>
    </x-slot>

   @include('lecturers.partials._sidebar')

    <div class="main">
        <x-card>
            
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>grades</th>
                    <th></th>
                </tr>
                @foreach ($students as $student)
                    <tr class="p-2">
                        <td class="p-2">{{ $student->student_id }}</td>
                        @php
                        $studente = $student->student_id
                        @endphp
                       
                        <td class="p-2">{{ $student->student_name }}</td>
                        <form action="/post_student_grades" method="post">
                            @csrf
                            
                            <input type="hidden" name="student_id"value={{$studente}}>
                        
                        <td class="p-2"> 
                            
                            <x-input-label for="grade" :value="__('grade')" />
                            <input name="gradevalue"></textarea>
                        
                  </td>
                   
                        
                

                       
                        
                        

                    </tr>
                @endforeach
                
            </table>
            <x-primary-button> Post grades</x-primary-button>
            <x-danger-button> Edit grades</x-danger-button>
        </form>
        </x-card>
    </div>    
</x-app-layout>


