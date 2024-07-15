<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <div class="py-32 px-10 min-h-screen ">
            <div class="bg-white p-10 md:w-3/4 lg:w-1/2 mx-auto">
                <div class="flex items-center mb-5">
                    <label for="name" class="inline-block w-20 mr-6 text-right 
                                            font-bold text-[#5e5e5e]">ФИО</label>
                    <input type="text" id="name" name="name" placeholder="Иванов Иван Иванович" 
                        class="flex-1 py-2 border-0 border-b-2 border-[#5e5e5e] focus:border-[#7e7e7e] 
                                text-gray-600 placeholder-gray-400
                                outline-none">
                </div>

                <x-input-error :messages="$errors->get('fio')" class="mt-2" />

                <div class="flex items-center mb-5">
                    <label for="email" class="inline-block w-20 mr-6 text-right 
                                            font-bold text-[#5e5e5e]">E-MAIL</label>
                    <input type="email" id="email" name="email" placeholder="example@mail.ru" 
                        class="flex-1 py-2 border-0 border-b-2 border-[#5e5e5e] focus:border-[#7e7e7e]
                                text-gray-600 placeholder-gray-400
                                outline-none">
                </div>

                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                <div class="flex items-center mb-5">
                    <label for="tel" class="inline-block w-20 mr-6 text-right 
                                            font-bold text-[#5e5e5e]">ТЕЛЕФОН</label>
                    <input type="tel" id="tel" name="tel" placeholder="+7-952-999-99-99" 
                        class="flex-1 py-2 border-0 border-b-2 border-[#5e5e5e] focus:border-[#7e7e7e]
                                text-gray-600 placeholder-gray-400
                                outline-none">
                </div>

                <x-input-error :messages="$errors->get('tel')" class="mt-2" />

                <div class="flex items-center mb-5">
                    <label for="password" class="inline-block w-20 mr-6 text-right 
                                            font-bold text-[#5e5e5e]">ПАРОЛЬ</label>
                    <input type="password" id="password" name="password" placeholder="пароль" 
                        class="flex-1 py-2 border-0 border-b-2 border-[#5e5e5e] focus:border-[#7e7e7e]
                                text-gray-600 placeholder-gray-400
                                outline-none">
                </div>

                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                <div class="flex items-center mb-5">
                    <label for="password_confirmation" class="inline-block w-20 mr-6 text-right 
                                            font-bold text-[#5e5e5e]">ПОВТОРИТЕ ПАРОЛЬ</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="повторите пароль" 
                        class="flex-1 py-2 border-0 border-b-2 border-[#5e5e5e] focus:border-[#7e7e7e]
                                text-gray-600 placeholder-gray-400
                                outline-none">
                </div>

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                <div class="flex items-center mb-5">
                    <label for="file" class="inline-block w-20 mr-6 text-right 
                                            font-bold text-[#5e5e5e]">СЕРТИФИКАТ</label>
                    <input type="file" id="file" name="file" placeholder="file" accept="image/*"
                        class="flex-1 py-2 border-0 border-b-2 border-[#5e5e5e] focus:border-[#7e7e7e]
                                text-gray-600 placeholder-gray-400
                                outline-none">
                </div>

                <x-input-error :messages="$errors->get('certificate')" class="mt-2" />

                <div class="flex items-center mb-5 underline">
                    <a href="{{ route('login') }}">уже зарегистрированы?</a>
                </div>

                <div class="text-center border-[#5e5e5e]">
                    <button class="py-4 px-32 text-[#5e5e5e] border-[#5e5e5e] font-bold border-solid border-2">регистрация</button> 
                </div>
            </div>
        </div>
    </form>
</x-guest-layout>
