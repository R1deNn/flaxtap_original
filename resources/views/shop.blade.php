@section('title', 'Каталог')
<x-guest-layout>  
  <div>
    <main class="mx-auto px-4 lg:max-w-7xl lg:px-8">
      <div class="border-b border-gray-200 pt-24 pb-10">
        <h1 class="text-4xl tracking-tight text-[#5e5e5e]">КАТАЛОГ</h1>
      </div>
      <div class="pt-12 pb-24 lg:grid lg:grid-cols-3 lg:gap-x-8 xl:grid-cols-4">
        <aside>
          <h2 class="sr-only">Filters</h2>

          <!-- Mobile filter dialog toggle, controls the 'mobileFilterDialogOpen' state. -->
          <button type="button" class="inline-flex items-center lg:hidden">
            <span class="text-sm font-medium text-gray-700">Filters</span>
            <!-- Heroicon name: solid/plus-sm -->
            <svg class="flex-shrink-0 ml-1 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
          </button>

          <div class="hidden lg:block">
            <form class="divide-y divide-gray-200 space-y-10">
              <div>
                <fieldset>
                  <legend class="block text-sm font-medium text-gray-900">Категория</legend>
                  <div class="pt-6 space-y-3">
                    <div class="flex items-center">
                      <select name="category" id="underline_select" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-[#5e5e5e] appearance-none focus:outline-none focus:ring-0 focus:border-[#5e5e5e] peer">
                          <option value="disabled" disabled selected>Все категории</option>
                        @foreach($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </fieldset>
              </div>
            </form>

            <form class="divide-y divide-gray-200 space-y-10" action="{{ route('/shop') }}" method="GET">
              <div class="pt-10">
                <fieldset>
                  <legend class="block text-sm font-medium text-gray-900">Отсортировать</legend>
                  <div class="pt-6 space-y-3">
                    <div class="">
                      <select name="sort_by" id="underline_select" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-[#5e5e5e] appearance-none focus:outline-none focus:ring-0 focus:border-[#5e5e5e] peer">
                          <option value="default_price">Цена</option>
                          <option value="CA">Canada</option>
                      </select>
                      <select name="direction" id="underline_select" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-[#5e5e5e] appearance-none focus:outline-none focus:ring-0 focus:border-[#5e5e5e] peer">
                          <option value="asc">По возрастанию</option>
                          <option value="desc">По убыванию</option>
                      </select>
                    </div>
                    <button type="submit" class="w-full bg-[#ffffff] hover:bg-[#5e5e5e] text-[#5e5e5e] hover:text-[#ffffff] duration-300 py-2 px-4 rounded border-2 border-[#5e5e5e]">Применить</button>
                  </div>
                </fieldset>
              </div>
            </form>
          </div>
        </aside>

        <section aria-labelledby="product-heading" class="mt-6 lg:mt-0 lg:col-span-2 xl:col-span-3">
          <h2 id="product-heading" class="sr-only">Products</h2>

          <div class="grid grid-cols-1 gap-y-4 sm:grid-cols-2 sm:gap-x-6 sm:gap-y-10 lg:gap-x-8 xl:grid-cols-3">

            @foreach($products as $product)
            <div class="group relative bg-white border border-gray-200 rounded-lg flex flex-col overflow-hidden">
              @if($product->id_vobler != null)
                <div class="pt-12" style="background-color: {{$product->vobler->background_color}}">
                  <span aria-hidden="true" class="absolute inset-0 p-5" style="color: {{$product->vobler->color}};">{{$product->vobler->title}}</span>
                </div>
              @endif
              <div class="aspect-w-3 aspect-h-4 bg-gray-200 group-hover:opacity-75 duration-300 sm:aspect-none sm:h-96">
                <img src="{{$product->image}}" alt="{{$product->title}}." class="w-full h-full object-center object-cover sm:w-full sm:h-full">
              </div>
              <div class="flex-1 p-4 space-y-2 flex flex-col">
                <h3 class="text-sm font-medium text-gray-900">
                  <a href="{{route('/shop/show/{id}', $product->id)}}">
                    <span aria-hidden="true" class="absolute inset-0 p-5"></span>
                    {{ $product->title }}
                  </a>
                </h3>
                <div class="flex-1 flex flex-col justify-end"> 
                  <p class="text-sm italic text-gray-500">
                    @if(isset($product->category->title))
                      {{ $product->category->title }}
                    @endif
                  </p>
                  @auth
                      @if (auth()->user()->getRoles()->where('slug', 'graduate')->count() <= 0)
                      <p class="mt-4 text-2xl font-bold text-red-600">
                        <p class="text-base font-medium text-gray-900">{{ number_format($product->default_price, 0, '', ' ') }} ₽</p>
                      </p>
                    @endif
                    @if (auth()->user()->getRoles()->where('slug', 'graduate')->count() >= 0)
                      <p class="mt-4 text-2xl font-bold text-red-600">
                        <p class="text-base font-medium text-gray-900">Для вас: {{ number_format($product->price_student, 0, '', ' ') }} ₽</p>
                      </p>
                    @endif
                  @else
                  <p class="mt-4 text-2xl font-bold text-red-600">
                    <p class="text-base font-medium text-gray-900">{{ number_format($product->default_price, 0, '', ' ') }} ₽</p>
                  </p>
                  @endauth
                </div>
              </div>
            </div>

            @endforeach

          </div>
        </section>
      </div>
    </main>
  </div>
</div>



      <div class='flex justify-center items-center'>
        <div class="py-8">
          <div class="flex items-center gap-8">
            @if($products->onFirstPage())
            <button disabled
              class="relative h-8 max-h-[32px] w-8 max-w-[32px] select-none rounded-lg border border-gray-900 text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
              type="button">
              <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                  aria-hidden="true" class="w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"></path>
                </svg>
              </span>
            </button>
            @else
            <a href="{{ $products->previousPageUrl() }}"
              class="relative h-8 max-h-[32px] w-8 max-w-[32px] select-none rounded-lg border border-gray-900 text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
              type="button">
              <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                  aria-hidden="true" class="w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"></path>
                </svg>
              </span>
            </a>
            @endif
            <p class="block font-sans text-base antialiased font-normal leading-relaxed text-gray-700">
              Страница <strong class="text-gray-900">{{ $products->currentPage() }}</strong> из
              <strong class="text-gray-900">{{ $products->lastPage() }}</strong>
            </p>
            @if($products->hasMorePages())
            <a href="{{ $products->nextPageUrl() }}"
              class="relative h-8 max-h-[32px] w-8 max-w-[32px] select-none rounded-lg border border-gray-900 text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
              type="button">
              <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                  aria-hidden="true" class="w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"></path>
                </svg>
              </span>
            </a>
            @else
            <button disabled
              class="relative h-8 max-h-[32px] w-8 max-w-[32px] select-none rounded-lg border border-gray-900 text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
              type="button">
              <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                  aria-hidden="true" class="w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"></path>
                </svg>
              </span>
            </button>
            @endif
          </div>
        </div>
      </div>
  </div>
</div>
</x-guest-layout>