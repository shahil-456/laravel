<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/konrix/layouts/auth-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 08:36:18 GMT -->
<head>
    <meta charset="utf-8">
    <title>Register | Konrix - Responsive Tailwind Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="coderthemes" name="author">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">




    <link rel="shortcut icon" href="{{ asset('knorix/assets/images/favicon.ico') }}">

    <!-- App css -->
    <link href="{{ asset('knorix/assets/css/app.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Icons css -->
    <link href="{{ asset('knorix/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Theme Config Js -->
    <script src="{{ asset('knorix/assets/js/config.js') }}"></script>



</head>

<body>

    <div class="bg-gradient-to-r from-rose-100 to-teal-100 dark:from-gray-700 dark:via-gray-900 dark:to-black">

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
            <form action="{{ route('register') }}" method="POST" onsubmit=""  >
                @csrf

        <div class="h-screen w-screen flex justify-center items-center">

            <div class="2xl:w-1/4 lg:w-1/3 md:w-1/2 w-full">
                <div class="card overflow-hidden sm:rounded-md rounded-none">
                    <div class="p-6">
                        <a href="index.html" class="block mb-8">
                            <img class="h-6 block dark:hidden" src="{{ asset('knorix/assets/images/logo-dark.png') }}" alt="">
                            <img class="h-6 hidden dark:block" src="{{ asset('knorix/assets/images/logo-light.png') }}" alt="">
                        </a>
  
                        {{-- <script src="https://cdn.tailwindcss.com"></script> --}}





                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2" for="username">Username</label>
                            <input 
                                id="username" 
                                name="username" 
                                required 
                                class="form-input  rounded px-3 py-2" 
                                type="text" 
                                placeholder="Username"
                                value="{{ old('username') }}"
                            >

                            @error('username')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                            <p class="text-red-500 text-sm mt-1 hidden">Username is required</p>
                        </div>
                    

                       


                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2" for="email">Email Address</label>
                            <input id="email" name="email" required class="form-input @error('email') is-invalid @enderror" type="email" placeholder="Email Address" value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2" for="phone">Phone Number</label>
                            <input id="phone" name="phone" required class="form-input @error('phone') is-invalid @enderror" type="number" placeholder="Phone Number" value="{{ old('phone') }}">
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2" for="password">Password</label>
                            <input id="password" name="password" required class="form-input @error('password') is-invalid @enderror" type="password" placeholder="Password">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2" for="password_confirmation">Confirm Password</label>
                            <input id="password_confirmation" name="password_confirmation" required class="form-input @error('password_confirmation') is-invalid @enderror" type="password" placeholder="Confirm Password">
                            @error('password_confirmation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        

                        <div class="mb-4">
                            <div class="flex items-center">
                                <input type="checkbox" class="form-checkbox rounded" id="checkbox-signup">
                                <label class="ms-2 text-slate-900 dark:text-slate-200" for="checkbox-signup">I accept <a href="#" class="text-gray-400 underline">Terms and Conditions</a></label>
                            </div>
                        </div>

                        <div class="flex justify-center mb-6">
                            <button type="submit" class="btn w-full text-white bg-primary"> Register </button>
                        </div>
                    </form>

                        <div class="flex items-center my-6">
                            <div class="flex-auto mt-px border-t border-dashed border-gray-200 dark:border-slate-700"></div>
                            <div class="mx-4 text-secondary">Or</div>
                            <div class="flex-auto mt-px border-t border-dashed border-gray-200 dark:border-slate-700"></div>
                        </div>

                        <div class="flex gap-4 justify-center mb-6">
                            <a href="javascript:void(0)" class="btn border-light text-gray-400 dark:border-slate-700">
                                <span class="flex justify-center items-center gap-2">
                                    <i class="mgc_github_line text-info text-xl"></i>
                                    <span class="lg:block hidden">Github</span>
                                </span>
                            </a>
                            <a href="javascript:void(0)" class="btn border-light text-gray-400 dark:border-slate-700">
                                <span class="flex justify-center items-center gap-2">
                                    <i class="mgc_google_line text-danger text-xl"></i>
                                    <span class="lg:block hidden">Google</span>
                                </span>
                            </a>
                          
                        </div>

                        <p class="text-gray-500 dark:text-gray-400 text-center">Already have account ?<a href="{{ route('login') }}" class="text-primary ms-1"><b>Log In</b></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

</body>
{{-- <script>
    document.addEventListener("DOMContentLoaded", function () {
      const form = document.querySelector("form");
      const input = document.getElementById("username");
      const error = document.getElementById("username-error");
    
      form.addEventListener("submit", function (e) {
        if (!input.value.trim()) {
          input.classList.add("border-red-500");
          error.classList.remove("hidden");
          e.preventDefault();
        } else {
          input.classList.remove("border-red-500");
          error.classList.add("hidden");
        }
      });
    });
    </script>
     --}}

<!-- Mirrored from coderthemes.com/konrix/layouts/auth-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 08:36:18 GMT -->
</html>