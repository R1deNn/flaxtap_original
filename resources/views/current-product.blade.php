<x-guest-layout>
          <section class="container flex-grow mx-auto max-w-[1200px] border-b py-5 lg:grid lg:grid-cols-2 lg:py-10">
            <div class="container mx-auto px-4">
              <img
                class="w-full"
                src="{{$product->image}}"
                alt="Sofa image"
              />
    
              <div class="mt-3 grid grid-cols-4 gap-4">
                <div>
                  <img
                    class="cursor-pointer"
                    src="{{$product->image}}"
                    alt="kitchen image"
                  />
                </div>
    
                <div>
                  <img
                    class="cursor-pointer"
                    src="{{$product->image}}"
                    alt="kitchen image"
                  />
                </div>
    
                <div>
                  <img
                    class="cursor-pointer"
                    src="{{$product->image}}"
                    alt="kitchen image"
                  />
                </div>
    
                <div>
                  <img
                    class="cursor-pointer"
                    src="{{$product->image}}"
                    alt="kitchen image"
                  />
                </div>
              </div>
            </div>
    
            <div class="mx-auto px-5 lg:px-5 max-w-md">
              <h2 class="pt-3 text-2xl font-bold lg:pt-0">{{$product->title}}</h2>

              <p class="mt-5 font-bold">
                    @if($product->amount <= 10 && $product->amount > 0)
                        <span class="text-yellow-600">Осталось мало товара</span>

                    @elseif($product->amount > 10)
                            <span class="text-green-600">В наличии</span>
                    @else
                            <span class="text-red-600">Нет в наличии</span>
                    @endif
              </p>
              <p class="font-bold">
                Категория: <span class="font-normal">{{$product->category->title}}</span>
              </p>

              @if (auth()->user()->getRoles()->where('slug', 'graduate')->count() > 0)
                <p class="mt-4 text-2xl font-bold text-red-600">
                  <span class='text-[#5e5e5e] line-through'>{{ number_format($product->default_price, 0, ',', ' ') }} ₽</span> {{number_format($product->price_student)}} ₽
                </p>
              @else
                <p class="mt-4 text-4xl font-bold text-[#5e5e5e]">
                  {{ number_format($product->default_price, 0, ',', ' ') }} ₽
                </p>
              @endif
    
              <p class="pt-5 text-sm leading-5 text-gray-500">
                {{ $product->description }}
              </p>
    
              <div class="mt-6">
                <p class="pb-2 text-xs text-gray-500">Осталось {{$product->amount}}</p>
                <div class="flex">
                  <button
                    class="flex h-8 w-8 cursor-pointer items-center justify-center border duration-100 hover:bg-neutral-100 focus:ring-2 focus:ring-gray-500 active:ring-2 active:ring-gray-500"
                  >
                    &minus;
                  </button>
                  <div
                    class="flex h-8 w-8 cursor-text items-center justify-center border-t border-b active:ring-gray-500"
                  >
                    1
                  </div>
                  <button
                    class="flex h-8 w-8 cursor-pointer items-center justify-center border duration-100 hover:bg-neutral-100 focus:ring-2 focus:ring-gray-500 active:ring-2 active:ring-gray-500"
                  >
                    &#43;
                  </button>
                </div>
              </div>
    
              <div class="mt-7 flex flex-row items-center gap-6">
                <a href="#"
                      class="flex h-12 w-1/2 items-center justify-center bg-white text-[#5e5e5e] border border-[#5e5e5e] duration-300 hover:bg-[#ededed] hover:rounded"
                  >
                      В корзину
                </a>
                <a href="#"
                      class="flex h-12 w-1/2 items-center justify-center bg-white text-[#5e5e5e] border border-[#5e5e5e] duration-300 hover:bg-[#ededed] hover:rounded"
                  >
                      Лайкнуть
                </a>
              </div>
            </div>
          </section>

          <p class="mx-auto mt-10 mb-5 max-w-[1200px] px-5">Мы рекомендуем:</p>
    
          <section
            class="container mx-auto grid max-w-[1200px] grid-cols-2 gap-3 px-5 pb-10 lg:grid-cols-4"
          >
            <!-- 4 -->
    
            <div class="flex flex-col">
              <img
                class=""
                src="{{$product->image}}"
                alt="sofa image"
              />
    
              <div>
                <p class="mt-2">{{$product->title}}</p>
                <p class="font-medium text-violet-900 mt-2">
                    {{ number_format($product->default_price, 0, ',', ' ') }} ₽
                </p>
                <div class="mt-5">
                    <a href="#"
                        class="flex h-12 w-1/2 items-center justify-center bg-white text-[#5e5e5e] border border-[#5e5e5e] duration-300 hover:bg-[#ededed] hover:rounded"
                    >
                        Подробнее
                    </a>
                </div>
              </div>
            </div>
          </section>
</x-guest-layout>
<script>
  UIkit.notification({message: 'Привет, мир!', status: 'primary'});
</script>