<x-guest-layout>
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-5">
                    <img alt="" class="w-40" src="{{ asset('assets/img/Mutiara Property Putih.png') }}">
                </a>
                <div class="my-auto">
                    <img alt="" class="-intro-x w-1/2 -mt-16" src="/dist/images/illustration.svg">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                        sign in to your dashboard account .
                    </div>
                    <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-gray-500">Manage all your Mutiara Property accounts in one place</div>
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-dark-1 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                        Sign In
                    </h2>
                    <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">sign in to your dashboard account. Manage all your Mutiara Property accounts in one place</div>

                    <x-jet-validation-errors class="my-6 text-red-500" />

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="intro-x mt-8">
                            <input type="email" class="intro-x login__input form-control py-3 px-4 border-gray-300 block" placeholder="Email" name="email" :value="old('email')" required autofocus >
                            <input type="password" class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4" placeholder="Password" name="password" required autocomplete="current-password">
                        </div>
                        <div class="intro-x flex text-gray-700 dark:text-gray-600 text-xs sm:text-sm mt-4">
                            <div class="flex items-center mr-auto">
                                <input id="remember_me" type="checkbox" class="form-check-input border mr-2" name="remember">
                                <label class="cursor-pointer select-none" for="remember_me">Remember me</label>
                            </div>
                            <a href="{{ route('password.request') }}">Forgot Password?</a> 
                        </div>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Login</button>
                            {{-- <a href="" class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">Sign up</a> --}}
                        </div>
                    </form>
                    <div class="intro-x mt-10 xl:mt-24 text-gray-700 dark:text-gray-600 text-center xl:text-left">
                        By signin up, you agree to our 
                        <br>
                        <a class="text-theme-1 dark:text-theme-10" href="">Terms and Conditions</a> & <a class="text-theme-1 dark:text-theme-10" href="">Privacy Policy</a> 
                    </div>
                </div>
            </div>
            <!-- END: Login Form -->
        </div>
    </div>
</x-guest-layout>
