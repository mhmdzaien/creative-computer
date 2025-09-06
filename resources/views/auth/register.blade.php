    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" :value="__('Name')"></label>
            <input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <span :messages="$errors->get('name')" class="mt-2"></span>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <label for="email" :value="__('Email')"></label>
            <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <span :messages="$errors->get('email')" class="mt-2"></span>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password" :value="__('Password')"></label>

            <input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required autocomplete="new-password" />

            <span :messages="$errors->get('password')" class="mt-2"></span>
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="password_confirmation" :value="__('Confirm Password')"></label>

            <input id="password_confirmation" class="block mt-1 w-full"
                type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <span :messages="$errors->get('password_confirmation')" class="mt-2"></span>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <button class="ms-4">
                {{ __('Register') }}
            </button>
        </div>
    </form>