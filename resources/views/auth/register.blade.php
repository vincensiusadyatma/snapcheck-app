<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>SnapCheck</title>
        @vite('resources/css/app.css')
        <style>
            .bg-custom {
                background: 
                    linear-gradient(
                        to top, 
                        rgba(0, 0, 0, 0.8) 0%, 
                        rgba(0, 0, 0, 0) 100%
                    ),
                    url('/img/assets/jumbotron-bg.jpg');
                background-size: cover; /* Ensure the background image covers the whole container */
                background-position: center; /* Center the background image */
                background-repeat: no-repeat; /* Prevent the background image from repeating */
                background-attachment: fixed; /* Fix the background image in place */
            }
    
            .bg-card {
                background-color: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(10px); 
            }
    
            .text-light {
                color: white;
            }
    
            .top-padding {
                padding-top: 4rem; /* Increased padding to ensure visibility */
            }
        </style>
    </head>
    <body class="bg-custom">
        <div class=" flex flex-col items-center justify-center px-4 py-8 mx-auto  lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 text-light mt-10">
                Snapcheck  
            </a>
            <div class="w-full bg-card rounded-lg shadow md:mt-0 sm:max-w-sm xl:p-0"> 
                <div class="p-4 space-y-4 md:space-y-6 sm:p-6"> 
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl text-light">
                        Create your account
                    </h1>
                    <form class="space-y-4 md:space-y-4" action="{{ route('handle-register') }}" method="POST">
                        @csrf
                        @if ($errors->any())
                        <div class="text-red-600">
                                <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                            </div>
                        @endif
    
                        <div>
                            <label for="full-name" class="block mb-2 text-sm font-medium text-gray-900 text-light">Full Name</label>
                            <input type="text" name="full_name" id="full-name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2" placeholder="Your full name" required="">
                        </div>
                        <div>
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 text-light">Username</label>
                            <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2" placeholder="Your username" required="">
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 text-light">Your email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2" placeholder="name@company.com" required="">
                        </div>
                        <div>
                            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 text-light">Phone number</label>
                            <input type="tel" name="phone_number" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2" placeholder="123-456-7890" required="">
                        </div>
                        <div>
                            <label for="address" class="block mb-2 text-sm font-medium text-gray-900 text-light">Address</label>
                            <input type="text" name="address" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2" placeholder="Your address" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 text-light">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2" required="">
                        </div>
                        <div>
                            <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 text-light">Confirm Password</label>
                            <input type="password" name="password_verify" id="confirm-password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2" required="">
                        </div>
                        <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 bg-blue-700">Sign up</button>
                        <p class="text-sm font-light text-gray-500 text-light">
                            Already have an account? <a href="{{ route('login') }}" class="font-medium text-primary-600 hover:underline text-light">Sign in</a>
                        </p>
                        <p class="text-sm font-light text-gray-500 text-light">
                            <a href="/" class="font-medium text-primary-600 hover:underline text-light">Back</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
