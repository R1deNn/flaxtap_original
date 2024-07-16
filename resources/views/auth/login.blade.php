@section('title', 'Авторизация')
<x-guest-layout>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="py-32 px-10 min-h-screen ">
            <div class="bg-white p-10 md:w-3/4 lg:w-1/2 mx-auto">
                <div class="flex items-center mb-5">
                    <label for="name" class="inline-block w-20 mr-6 text-right 
                                            font-bold text-[#5e5e5e]">e-mail</label>
                    <input type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="example@gmail.com" 
                        class="flex-1 py-2 border-0 border-b-2 border-[#5e5e5e] focus:border-[#7e7e7e] 
                                text-gray-600 placeholder-gray-400
                                outline-none">
                </div>

                <x-input-error :messages="$errors->get('fio')" class="mt-2" />

                <div class="flex items-center mb-5">
                    <label for="password" class="inline-block w-20 mr-6 text-right 
                                            font-bold text-[#5e5e5e]">пароль</label>
                    <input id="password"
                    type="password"
                    name="password"
                    placeholder=""
                    required autocomplete="current-password"  
                        class="flex-1 py-2 border-0 border-b-2 border-[#5e5e5e] focus:border-[#7e7e7e]
                                text-gray-600 placeholder-gray-400
                                outline-none">
                </div>

                <div class="flex items-center mb-5 underline">
                    <a href="{{ route('register') }}">регистрация</a>

                    <a class="ml-6" href="{{ route('password.request') }}">забыли пароль?</a>
                </div>

                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                <div class="text-center border-[#5e5e5e]">
                    <button class="py-4 px-32 text-[#5e5e5e] border-[#5e5e5e] font-bold border-solid border-2">войти</button> 
                </div>
            </div>
        </div>
    </form>
</x-guest-layout>
