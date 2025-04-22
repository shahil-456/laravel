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
                        <h4 class="card-title">Add Product</h4>
                       
                    </div>
                </div>
                
                <div class="p-6">


                 
                    @if (session('success'))

                    <div id="dismiss-alert" class="transition duration-300 rounded-md p-2" role="alert">

                        <div class="bg-success/25 text-sm rounded-md p-2 flex items-center justify-between" role="alert">

                    
                            {{-- bg-success/25 text-success text-sm rounded-md p-4 --}}


                            <span class="text-xs text-green-400 font-medium">Product Added Successfully</span>                    
                    
                            <button data-fc-dismiss="dismiss-alert" type="button" id="dismiss-test" class="h-5 w-5 rounded-full bg-gray-200 flex justify-center items-center hover:bg-gray-300 transition duration-200">
                    
                                <i class="mgc_close_line text-lg"></i>
                    
                            </button>
                    
                        </div>
                    
                    </div>
                
                    @endif


                        <form class="mt-4" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        


                        @csrf



                        @if ($errors->any())
                        <div class="alert alert-danger mb-4">
                            <ul class="list-disc pl-5 text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    




                        <!-- Add your input fields here -->
                    
                        
                        <div class="grid grid-cols-1 md:grid-cols-2  gap-6">

                            <div class="form-group">
                                <label for="name" class="text-gray-800 text-sm font-medium inline-block mb-2">Product Name</label>
                                <input name="name" type="text" class="form-input" id="name" placeholder="Product Name" required>
                            </div>
                        
                         
                        
                            <div class="form-group">
                                <label for="price" class="text-gray-800 text-sm font-medium inline-block mb-2">Price</label>
                                <input name="price" type="number" step="0.01" class="form-input" id="price" placeholder="Price" required>
                            </div>




                            <div class="form-group">
                                <label for="description" class="text-gray-800 text-sm font-medium inline-block mb-2">Details</label>
                                <input name="description" type="text" class="form-input" id="description" placeholder="Description" required>
                            </div>


                            <div class="form-group">
                                <label for="contact" class="text-gray-800 text-sm font-medium inline-block mb-2">Contact</label>

                                <input value="{{ $user->phone }}" name="contact" type="text" class="form-input" id="contact" placeholder="number" required>
                            </div>
                        
                          
                        
                            <div class="form-group">
                                <label for="image" class="text-gray-800 text-sm font-medium inline-block mb-2">Image</label>
                                <input name="image" type="file" class="form-input" id="image" required>
                            </div>
                        
                          



                            

                    <div>

                        <button type="submit" class="btn bg-primary text-white">Add</button>

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









