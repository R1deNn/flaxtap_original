<x-guest-layout>
<main class="grid min-h-full place-items-center bg-white px-6 py-24 sm:py-32 lg:px-8">
    <div class="text-center">
      <p class="text-base font-semibold text-[#5e5e5e]">404</p>
      <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl">Страница не найдена</h1>
      <p class="mt-6 text-base leading-7 text-gray-600">Извините, мы не смогли найти то, что вы искали. Давайте поможем вам выбраться!</p>
      <div class="mt-10 flex items-center justify-center gap-x-6">
        <a href="{{route('/home')}}" class="rounded-md border-2 border-[#5e5e5e] px-4 py-2.5 text-sm font-semibold text-[#5e5e5e] shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Вернуться домой</a>
      </div>
    </div>
  </main>
</x-guest-layout>