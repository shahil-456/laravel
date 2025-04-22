@extends('user.layout.app')  <!-- Corrected line -->


@section('title', 'Home Page')


@section('content')

<main class="flex-grow p-6">

    <div class="grid lg:grid-cols-2 grid-cols-1 gap-6">

        <div class="col-span-2">

            <div class="card">


                <div class="max-w-4xl mx-auto p-4">
                    <div class="bg-white rounded shadow p-6">
                        <img class="w-full h-64 object-cover rounded" src="{{ asset('storage/' . $product->image) }}" alt="Product Image">
                
                        <h2 class="text-2xl font-bold mt-4 text-gray-800">{{ $product->name }}</h2>
                
                        <p class="mt-2 text-gray-600">
                            {{ $product->description }}
                        </p>
                
                        <p class="mt-4 text-xl font-semibold text-primary">
                            ${{ $product->price }}
                        </p>


                        <p class="mt-4 text-xl font-semibold text-primary">
                          Contact - {{ $user->phone }}-  {{ $product->uploader_name }}
                        </p>
                
                        <a href="#" class="btn bg-primary text-white mt-6">
                            Buy Now
                        </a>
                    </div>
                </div>

                


            </div>
        </div>
    </div>















    

    <script src="{{ asset('knorix/assets/libs/pristinejs/pristine.min.js') }}"></script>
    <script src="{{ asset('knorix/assets/js/pages/form-validation.js') }}"></script>


</main>




@endsection









