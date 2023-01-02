<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-l text-gray-800 leading-tight h-4">
            Registered for Graduation
        </h2>
    </x-slot>

    @include('admin.partials._sidebar')

    <div class="main">
        <x-card>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Course</th>
                    
                </tr>
                @foreach ($gradApplicants as $gradApplicant) 
               
                
                
                    <tr class="p-2">
                    <td class="p-2">{{ $gradApplicant->id }}</td>
                        <td class="p-2">{{ $gradApplicant->name }}</td>
                        <td class="p-2">{{ $gradApplicant->course }}</td>
                        <td class="p-2">
                        
                              
                        <form method="POST" action="/appliedGrad/{{ $gradApplicant->graduation_id }}">
                                @csrf
                                @method('PUT')
                               
                                <input type="hidden" name="status" value=0>
                                <x-primary-button> Accept </x-primary-button>
                            </form>
                           
                        </td>
                        <td class="p-2">
                        <form method="POST" action="/appliedGrad/{{ $gradApplicant->graduation_id }}">
                                @csrf
                                @method('DELETE')
                                <x-danger-button> Decline </x-danger-button>
                            </form>
                          
                        </td>
                    </tr>
                
              
                @endforeach
                
            </table>
        </x-card>
    </div>

</x-app-layout>
