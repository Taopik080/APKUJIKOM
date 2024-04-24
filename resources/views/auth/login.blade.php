<div class="background" style="height: 100%; position:fixed;">
    <img src="{{asset('image/bg10.jpg')}}" alt="">
</div>
<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="text" style="position: absolute; margin-top:-290px; margin-left:310px; font-weight:bolder; font-size:larger;">
        <h1>Login page</h1>
    </div>
    <form method="POST" action="{{ route('login') }}" style="position:absolute; background-color:white; width:400px; padding:20px; border-radius:10px; margin-left:300px; margin-top:-250px;">
        @csrf

        <!-- Email Address -->
       
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="show" class="inline-flex items-center">
                <input id="show" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember"
                    onclick="myFunction()">
                <span class="ms-2 text-sm text-gray-600">{{ __('Show Password') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('register'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('register') }}">
                    {{ __('Dont have a account?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
    </body>
</x-guest-layout>
<script>
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

