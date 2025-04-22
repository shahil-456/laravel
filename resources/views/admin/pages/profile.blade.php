@extends('user.layout.app')  <!-- Corrected line -->


@section('title', 'Home Page')


@section('content')

<main class="flex-grow p-6">

    <!-- Page Title Start -->
    
    <!-- Page Title End -->





    <div class="grid lg:grid-cols-2 grid-cols-1 gap-6">
      

       <!-- end card -->



       <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    
    
       <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   
       <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    
    


     
       
       
        <div class="col-span-2">
            <div class="card">
                <div class="card-header">
                    <div class="flex justify-between items-center">
                        <h4 class="card-title">Profile</h4>
                       
                    </div>
                </div>
                
                <div class="p-6">


                 
                    @if (session('success'))

                    <div id="dismiss-alert" class="transition duration-300 rounded-md p-2" role="alert">

                        <div class="bg-success/25 text-sm rounded-md p-2 flex items-center justify-between" role="alert">

                    
                            {{-- bg-success/25 text-success text-sm rounded-md p-4 --}}


                            <span class="text-xs text-green-400 font-medium">Update Successfully</span>                    
                    
                            <button data-fc-dismiss="dismiss-alert" type="button" id="dismiss-test" class="h-5 w-5 rounded-full bg-gray-200 flex justify-center items-center hover:bg-gray-300 transition duration-200">
                    
                                <i class="mgc_close_line text-lg"></i>
                    
                            </button>
                    
                        </div>
                    
                    </div>
                
                    @endif

                    <form enctype="multipart/form-data" action="{{ route('profile.update') }}" method="POST"   class="mt-4">
                        @csrf
                        <!-- Add your input fields here -->
                    
                        
                        <div class="grid grid-cols-1 md:grid-cols-2  gap-6">

                            <div class="form-group"  >
                                <label for="username" class="text-gray-800 text-sm font-medium inline-block mb-2">Username</label>
                                <input name="username" value="{{ $data->username }}" type="text" class="form-input" id="username" placeholder="Username" required>
                            </div>

                            <div class="form-group"  >
                                <label for="email" class="text-gray-800 text-sm font-medium inline-block mb-2">E-Mail</label>
                                <input name="email" value="{{ $data->email }}"  type="text" class="form-input" id="email" placeholder="email" required>
                            </div>


                            <div class="form-group"  >
                                <label for="phone" class="text-gray-800 text-sm font-medium inline-block mb-2">Phone Number</label>
                                <input name="phone" value="{{ $data->phone }}"  type="text" class="form-input" id="phone" placeholder="phone" required>
                            </div>


                            <div class="form-group"  >
                                <label for="phone" class="text-gray-800 text-sm font-medium inline-block mb-2">Profile Picture</label>
                                <input name="profile_pic"  type="file" class="form-input" id="pic">
                            </div>


                            {{-- <div class="form-group">
                                <label for="inputPassword4" class="text-gray-800 text-sm font-medium inline-block mb-2">Password</label>
                                <input type="password" class="form-input" id="inputPassword4" required>
                            </div> --}}


                            {{-- <div>
                                <label for="inputEmail4" class="text-gray-800 text-sm font-medium inline-block mb-2">Username</label>
                                <input type="text" class="form-input" id="inputEmail4" placeholder="Username">
                            </div> --}}

                         
                         

                            <div class="lg:col-span-2">
                                <label for="inputAddress" class="text-gray-800 text-sm font-medium inline-block mb-2">Address</label>
                                <input value="{{ $data->address }}" name="address" type="text" class="form-input" id="inputAddress" placeholder="1234 Main St">
                            </div>








                            <div class="form-group">
                                <label for="inputWhatsapp" class="text-gray-800 text-sm font-medium inline-block mb-2">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="Whatsapp" class="inline h-5 w-5 mr-1">Whatsapp
                                </label>
                                <input name="whatsapp" type="text" value="{{ $data->whatsapp }}" class="form-input" id="inputWhatsapp" placeholder="Enter Whatsapp number">
                            </div>
                            
                            <div class="form-group">
                                <label for="inputInstagram" class="text-gray-800 text-sm font-medium inline-block mb-2">
                                    <img src=" https://upload.wikimedia.org/wikipedia/commons/e/e7/Instagram_logo_2016.svg" alt="Instagram" class="inline h-5 w-5 mr-1">Instagram ID
                                </label>
                                <input name="instagram" value="{{ $data->instagram }}" type="text" class="form-input" id="inputInstagram" placeholder="Enter Instagram handle">
                            </div>
                            
                            <div class="form-group">
                                <label for="inputTelegram" class="text-gray-800 text-sm font-medium inline-block mb-2">
                                    <img src=" https://upload.wikimedia.org/wikipedia/commons/8/82/Telegram_logo.svg" alt="Telegram" class="inline h-5 w-5 mr-1">Telegram
                                </label>
                                <input name="telegram" value="{{ $data->telegram }}" type="text" class="form-input" id="inputTelegram" placeholder="Enter Telegram username">
                            </div>
                            

                            {{-- <div>
                                <label for="inputAddress2" class="text-gray-800 text-sm font-medium inline-block mb-2">Address 2</label>
                                <input type="text" class="form-input" id="inputAddress2" placeholder="Apartment, studio, or floor">
                            </div>

                            <div>
                                <label for="inputCity" class="text-gray-800 text-sm font-medium inline-block mb-2">City</label>
                                <input type="text" class="form-input" id="inputCity">
                            </div>
                            <div>
                                <label for="inputState" class="text-gray-800 text-sm font-medium inline-block mb-2">State</label>
                                <select id="inputState" class="form-select">
                                    <option>Choose</option>
                                    <option>Option 1</option>
                                    <option>Option 2</option>
                                    <option>Option 3</option>
                                </select>
                            </div>
                            <div>
                                <label for="inputZip" class="text-gray-800 text-sm font-medium inline-block mb-2">Zip</label>
                                <input type="text" class="form-input" id="inputZip">
                            </div>--}}








                        </div> 

                        <div class="flex items-center gap-2 my-3">
                            <input type="checkbox" class="form-checkbox rounded border border-gray-200" id="customCheck11">
                            <label class="text-gray-800 text-sm font-medium inline-block" for="customCheck11">Check this custom checkbox !</label>
                        </div>

                        <button type="submit" class="btn bg-primary text-white">Update</button>
                    </form>

                    <div id="pristineJSValidation" class="hidden w-full overflow-hidden transition-[height] duration-300">
                        <pre class="language-html h-56">
                            <code>
                                &lt;form class=&quot;valid-form grid lg:grid-cols-3 gap-6&quot;&gt;
                                    &lt;div class=&quot;form-group&quot;&gt;
                                        &lt;label for=&quot;username&quot; class=&quot;text-gray-800 text-sm font-medium inline-block mb-2&quot;&gt;username&lt;/label&gt;
                                        &lt;input type=&quot;username&quot; class=&quot;form-input&quot; id=&quot;username&quot; required&gt;
                                    &lt;/div&gt;
                                    &lt;div class=&quot;form-group&quot;&gt;
                                        &lt;label for=&quot;inputPassword4&quot; class=&quot;text-gray-800 text-sm font-medium inline-block mb-2&quot;&gt;Password&lt;/label&gt;
                                        &lt;input type=&quot;password&quot; class=&quot;form-input&quot; id=&quot;inputPassword4&quot; required&gt;
                                    &lt;/div&gt;
                                   
                                  
                                    &lt;/div&gt;
    
                                    &lt;div class=&quot;form-group col-span-3&quot;&gt;
                                        &lt;button type=&quot;submit&quot; class=&quot;btn bg-primary text-white&quot;&gt;Register Now&lt;/button&gt;
                                    &lt;/div&gt;
                                &lt;/form&gt;
                            </code>
                        </pre>
                    </div>


                    
                </div>
            </div>
        </div> <!-- end col -->
    </div>






    

    <script src="{{ asset('knorix/assets/libs/pristinejs/pristine.min.js') }}"></script>
    <script src="{{ asset('knorix/assets/js/pages/form-validation.js') }}"></script>


</main>




@endsection









