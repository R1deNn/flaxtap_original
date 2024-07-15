<x-guest-layout>
    <div class="grid h-screen place-content-center bg-white px-4">
        <div class="text-center">
          <h1 class="mt-16 text-3xl font-black text-gray-200">403</h1>
      
          <p class="text-2xl font-bold tracking-tight text-gray-900 sm:text-4xl">Ой-ёй!</p>
      
          <p class="mt-4 text-gray-500">У вас нет доступа к этой странице. Если вы считаете, что это ошибка, свяжитесь с администрацией.</p>
      
          <a
            href="{{route('/home')}}"
            class="mt-6 inline-block rounded bg-gray-200 text-black px-5 py-3 text-sm font-medium focus:outline-none focus:ring"
          >
            Домой
          </a>
        </div>
    </div>      
</x-guest-layout>