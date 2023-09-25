<x-auth-layout>
    
    <div class="grid grid-cols-1 max-h-screen md:grid-cols-12 md:gap-8">
        <div class="md:col-span-7 mx-auto max-w-md px-4 py-4 mt-20">

        <form method="POST" action="{{ route('password.store') }}">
            @csrf
    
            <h1 class="font-bold text-2xl md:text-4xl text-black text-center mt-19">Reset Password</h1>

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
    
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="mt-10"/>
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
    
            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="mt-5"/>
                <input id="password" type="password" name="password" required autocomplete="new-password"                     class="rounded-full w-full text-xs 2xl:text-sm bg-white border-none mt-2 shadow-sm h-14 p-4"
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
    
            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="mt-5" />
    
                <input id="password_confirmation"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password"
                                    class="rounded-full w-full text-xs 2xl:text-sm bg-white border-none mt-2 shadow-sm h-14 p-4"
                                    />
    
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
    
            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="w-full h-14 bg-[#2C2F75] text-white rounded-full mt-9">Reset
                    Password</button>
            </div>
        </form>
        </div>
        <div class="col-span-5 hidden md:block">
            <img class="w-full h-screen object-cover object-left" src="{{ asset('assets/images/bg_side.png') }}"
                alt="side">
        </div>
    </div>

</x-auth-layout>
