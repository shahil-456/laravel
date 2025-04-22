@extends('user.layout.app')  <!-- Corrected line -->


@section('title', 'Home Page')


@section('content')

<main class="flex-grow p-6">


    <div class="grid lg:grid-cols-2 grid-cols-1 gap-6">

        <div class="col-span-2">

            <div class="card">



    <!-- Page Title Start -->
    
    <!-- Page Title End -->
  

    <div class="flex gap-2">
        <div>
            <a href="{{ route('profile') }}">
                <button class="btn bg-primary text-white" data-fc-type="tooltip" data-fc-placement="bottom">
                    Edit Profile
                </button>
            </a>
            
          
        </div>
    
        <div>
            <a href="{{ route('add-product') }}">

            <button class="btn bg-primary text-white" data-fc-type="tooltip" data-fc-placement="right">
                Add  Product
            </button>

        </a>
        
        </div>
    
        <div>
            <button class="btn bg-primary text-white" data-fc-type="tooltip" data-fc-placement="top">
                Products

            </button>
            
        </div>
    
      
    </div>
    
    
    

<br>

    <div class="grid lg:grid-cols-4 gap-6">


            @foreach($products as $item)
            <div class="card">
                <div class="w-[300px] h-[200px] overflow-hidden rounded-t-xl">
                    <img class="w-full h-full object-cover object-center block" src="{{ asset('storage/' . $item->image) }}" alt="Image">
                </div>
                
                
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white">
                        {{ $item->name }} Rs- {{ $item->price }}
                    </h3>
                    <p class="mt-1 text-gray-800 dark:text-gray-400">
                        {{ $item->description }}
                    </p>
                    <a class="btn bg-primary text-white mt-2" href="{{ route('product-details', $item->id) }}">
                        Details
                    </a>
                    
                </div>
            </div>
            @endforeach
            
        
    </div>


</div>
</div>
</div>

 


</main>
   <script src="{{ asset('knorix/assets/libs/pristinejs/pristine.min.js') }}"></script>
    <script src="{{ asset('knorix/assets/js/pages/form-validation.js') }}"></script>



@endsection









