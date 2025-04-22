<!DOCTYPE html>
<html lang="en">
@php use Illuminate\Support\Facades\Cookie; @endphp

<!-- Mirrored from coderthemes.com/konrix/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 08:36:18 GMT -->
<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="utf-8">
    <title>Login | Konrix - Responsive Tailwind Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="coderthemes" name="author">

    <!-- App favicon -->





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

        <div class="h-screen w-screen flex justify-center items-center">

            <div class="2xl:w-1/4 lg:w-1/3 md:w-1/2 w-full">
                <div class="card overflow-hidden sm:rounded-md rounded-none">
                    <div class="p-6">
                        <a href="index.html" class="block mb-8">
                            
                            

                            <img class="h-6 block dark:hidden" src="{{ asset('knorix/assets/images/logo-dark.png') }}" alt="">
                            <img class="h-6 hidden dark:block" src="{{ asset('knorix/assets/images/logo-light.png') }}" alt="">
                        </a>


                        @if ($errors->any())
                        <div class="bg-danger text-sm text-white rounded-md p-4 mb-2" role="alert">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    



                        <form class="mt-4" method="POST" action="{{ route('login_form') }}">
                            @csrf



                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2" for="LoggingEmailAddress">Username</label>


                            <input 
                            value="{{ Cookie::get('username') }}" 
                            required 
                            name="username" 
                            class="form-input" 
                            id="uname" 
                            type="text" 
                            placeholder="Enter your username">
                        


                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2" for="loggingPassword">Password</label>
                            <input name="password" id="loggingPassword" class="form-input" type="password" placeholder="Enter your password" >
                        </div>

                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <input name="remember" type="checkbox" class="form-checkbox rounded" id="checkbox-signin">
                                <label class="ms-2" for="checkbox-signin">Remember me</label>
                            </div>
                            <a href="auth-recoverpw.html" class="text-sm text-primary border-b border-dashed border-primary">Forget Password ?</a>
                        </div>

                        <div class="flex justify-center mb-6">
                            <button class="btn w-full text-white bg-primary"> Log In </button>
                        </div>

                        </form>

                        <div class="flex items-center my-6">
                            <div class="flex-auto mt-px border-t border-dashed border-gray-200 dark:border-slate-700"></div>
                            <div class="mx-4 text-secondary">Or</div>
                            <div class="flex-auto mt-px border-t border-dashed border-gray-200 dark:border-slate-700"></div>
                        </div>

                        <div class="flex gap-4 justify-center mb-6">
                            
                            <a href="{{ route('signup') }}" class="btn border-light text-gray-400 dark:border-slate-700 ">
                                <span class="flex justify-center items-center gap-2 ">
                                    <i class="mgc_google_line text-danger text-xl"></i>
                                    <span class="lg:block hidden ">Register</span>
                                </span>
                            </a>
                          
                        </div>

                        <p class="text-gray-500 dark:text-gray-400 text-center">Don't have an account ?<a href="{{ route('signup') }}" class="text-primary ms-1"><b>Register</b></a></p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

</body>


<!-- Mirrored from coderthemes.com/konrix/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 08:36:18 GMT -->
</html>