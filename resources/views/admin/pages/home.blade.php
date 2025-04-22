@extends('admin.layout.app')  


@section('title', 'Home Page')


@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
@vite('resources/js/app.js')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<main class="flex-grow p-6">


    <div class="grid lg:grid-cols-2 grid-cols-1 gap-6">

        <div class="col-span-2">

            <div class="card">

                <h1>aaaa</h1>
                <div id="app">
                    <test></test>
                </div>
                
                @vite('resources/js/app.js')
                


    <!-- Page Title Start -->
    
    <!-- Page Title End -->
  
    <script>
        window.usersData = @json($users);
    </script>



<div>


  


</div>


    <div class="overflow-x-auto">
        <div class="min-w-full inline-block align-middle">
            <div  






            
                class="overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead>
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">E-Mail</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Phone</th>
                            <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Action</th>
                        </tr>
                    </thead>
                    <tbody   class="divide-y divide-gray-200 dark:divide-gray-700">

                        
                        @foreach($users as $user)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{ $user->username }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $user->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $user->phone }}</td>

                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                <div>
                                    {{-- <button type="button" class="btn bg-primary text-white">Primary</button> --}}

                                    <button 
                                    id="verify-btn-{{ $user->id }}" 
                                    type="button" 
                                    class="btn bg-primary text-white" 
                                    onclick="verifyUser({{ $user->id }})"
                                    @if($user->verified == 'yes') disabled @endif
                                >
                                    {{ $user->verified == 'yes' ? 'Verified' : 'Verify' }}
                                </button>




                                
                                
                                
                                </div>
                                                            </td>

                           <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
   

                        </tr>

                    @endforeach
    {{-- <td>{{ $user->username }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->phone }}</td>
    <td>
        
    </td> --}}



   
    


                        {{-- --}}

                    
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>



<br>

    


</div>
</div>
</div>

 

</main>




<script>


function axiosGetRequest(url, token) {
    return axios.get(url, {
    })
    .then(function(response) {
        return response.data;
    })
    .catch(function(error) {
        console.error('There was an error!', error);
        throw error; 
    });
}
    function verifyUser (userId) {
        const url = `/verify-user/${userId}`;

       
        const btn = document.getElementById(`verify-btn-${userId}`);
        btn.innerText = 'Verified';
        btn.disabled = true;


        axiosGetRequest(url)

            .then(function(data) {
                document.getElementById('message').innerText = data.message;
            })
            .catch(function(error) {
                document.getElementById('message').innerText = 'An error occurred while verifying the user.';

            });


          

    }

    </script>



   <script src="{{ asset('knorix/assets/libs/pristinejs/pristine.min.js') }}"></script>
    <script src="{{ asset('knorix/assets/js/pages/form-validation.js') }}"></script>





    
    
    
    

@endsection






