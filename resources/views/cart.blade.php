@section('title', 'Корзина')
<x-guest-layout>
    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">КОРЗИНА</h2>

            <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
            <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-4xl">
                <div class="space-y-6">

                    @if($cart->count() == 0)
                        <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6">
                            <div class="space-y-4 md:items-center md:justify-between md:gap-6 md:space-y-0">
                                <p class="py-4 text-2xl font-medium text-gray-900 dark:text-white">Ваша корзина пуста.</p>
                                <a href="{{route('/shop')}}" class="underline py-4 text-xl font-medium text-gray-900 dark:text-white">Исправим?</a>
                            </div>
                        </div>
                    @endif

                    @foreach ($cart as $item)

                        <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6">
                            <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                            <a href="#" class="shrink-0 md:order-1">
                                <img class="h-20 w-20 dark:hidden" src="{{$item->product->image}}" alt="{{$item->product->title}}.." />
                            </a>

                            <label for="counter-input" class="sr-only">Количество:</label>
                            <div class="flex items-center justify-between md:order-3 md:justify-end">
                                <div class="flex items-center">
                                <a href="{{route('/cart-decrement', $item->product->id)}}" type="button" id="decrement-button-4" data-input-counter-decrement="counter-input-4" class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                                    <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                    </svg>
                                </a>
                                <input type="text" id="counter-input-4" data-input-counter class="w-10 shrink-0 border-0 bg-transparent text-center text-sm font-medium text-gray-900 focus:outline-none focus:ring-0 dark:text-white" placeholder="" value="{{$item->amount}}" required />
                                <a href="{{route('/cart-increment', $item->product->id)}}" type="button" id="increment-button-4" data-input-counter-increment="counter-input-4" class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                                    <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                    </svg>
                                </a>
                                </div>
                                <div class="text-end md:order-4 md:w-32">
                                <p class="text-base font-bold text-gray-900 dark:text-white">
                                    @if (auth()->user()->getRoles()->where('slug', 'graduate')->count() > 0)
                                    <p class="text-base font-bold text-red-900 dark:text-white">
                                        <span class="line-through">{{ number_format($item->product->default_price, 0, '', ' ') }} ₽</span>
                                    </p>
                                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ number_format($item->product->price_student, 0, '', ' ') }} ₽</p>
                                    @else
                                        <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ number_format($item->product->default_price, 0, '', ' ') }} ₽</p>
                                    @endif
                                </p>
                                </div>
                            </div>

                            <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
                                <a href="{{route('/shop/show/{id}', $item->product->id)}}" class="text-base font-medium text-gray-900 hover:underline dark:text-white">{{$item->product->title}}</a>

                                <div class="flex items-center gap-4">
                                <button type="button" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-900 hover:underline dark:text-gray-400 dark:hover:text-white">
                                    <svg class="me-1.5 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
                                    </svg>
                                    Лайкнуть
                                </button>

                                <a href="{{route('/cart-delete', $item->product->id)}}" type="button" class="inline-flex items-center text-sm font-medium text-red-600 hover:underline dark:text-red-500">
                                    <svg class="me-1.5 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                                    </svg>
                                    Удалить
                                </a>
                                </div>
                            </div>
                            </div>
                        </div>
                        
                    @endforeach

                </div>

                <div class="hidden xl:mt-8 xl:block">
                    <h3 class="text-2xl font-semibold text-gray-900">Пользователи также покупают</h3>
                    <div class="mt-6 grid grid-cols-3 gap-4 sm:mt-8">

                        @foreach($random_products as $product)
                            <div class="space-y-6 overflow-hidden rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                                <a href="{{route('/shop/show/{id}', $product->id)}}" class="overflow-hidden rounded">
                                    <img class="mx-auto h-44 w-44 dark:hidden" src="{{$product->image}}" alt="{{$product->title}}...." />
                                    <img class="mx-auto hidden h-44 w-44 dark:block" src="{{$product->image}}" alt="{{$product->title}}..." />
                                </a>
                                <div>
                                    <a href="{{route('/shop/show/{id}', $product->id)}}" class="text-lg font-semibold leading-tight text-gray-900 hover:underline">{{$product->title}}</a>
                                    <p class="mt-2 text-base font-normal text-gray-500 dark:text-gray-400">{{$product->description}}</p>
                                    <p class="mt-2 text-base font-normal text-gray-500 dark:text-gray-400">
                                        @if(isset($product->category->title))
                                            {{ $product->category->title }}
                                        @else
                                            Нет категории
                                        @endif
                                    </p>
                                </div>
                                <div>
                                    <p class="text-base font-bold text-gray-900 dark:text-white">
                                        @if (auth()->user()->getRoles()->where('slug', 'graduate')->count() <= 0)
                                            {{ number_format($product->default_price, 0, '', ' ') }} ₽
                                        @else
                                            <p class="text-base font-bold text-red-900 dark:text-white">
                                                <span class="line-through">{{ number_format($product->default_price, 0, '', ' ') }} ₽</span>
                                            </p>
                                            <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ number_format($product->price_student, 0, '', ' ') }} ₽</p>
                                        @endif
                                    </p>
                                </div>
                                <div class="mt-6 flex items-center gap-2.5">
                                    <button data-tooltip-target="favourites-tooltip-{{$product->id}}" type="button" class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white p-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">
                                        <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z"></path>
                                        </svg>
                                    </button>
                                    <div id="favourites-tooltip-{{$product->id}}" role="tooltip" class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                        Лайкнуть
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                    <a href="{{route('/cart-add', $product->id)}}" type="button" class="inline-flex w-full items-center justify-center rounded-lg bg-[#5e5e5e] px-5 py-2.5 text-sm font-medium  text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                        <svg class="-ms-2 me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4" />
                                        </svg>
                                            В корзину
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

            @if($cart->count() != 0)
            <div class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full">
                <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                <p class="text-xl font-semibold text-gray-900 dark:text-white">Заказ</p>

                <div class="space-y-4">
                    <div class="space-y-2">
                        <dl class="flex items-center justify-between gap-4">
                            <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Цена без скидки</dt>
                            <dd class="text-base font-medium text-gray-900 dark:text-white">{{ number_format($sum, 0, '', ' ') }} ₽</dd>
                        </dl>

                        <dl class="flex items-center justify-between gap-4">
                            <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Ваша скидка выпускника</dt>
                            <dd class="text-base font-medium text-green-600">{{ number_format($discount, 0, '', ' ') }} ₽</dd>
                        </dl>
                    </div>

                    <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                    <dt class="text-base font-bold text-gray-900 dark:text-white">ИТОГО</dt>
                    <dd class="text-base font-bold text-gray-900 dark:text-white">{{ number_format($sum-$discount, 0, '', ' ') }} ₽</dd>
                    </dl>
                </div>

                <a href="{{route('/checkout')}}" class="flex w-full items-center justify-center rounded-lg border-2 border-[#5e5e5e] duration-300 hover:bg-[#5e5e5e] hover:text-white px-5 py-2.5 text-sm font-medium text-[#5e5e5e] hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300">Перейти к оформлению</a>

                <div class="flex items-center justify-center gap-2">
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400"> или </span>
                    <a href="{{route('/shop')}}" title="" class="inline-flex items-center gap-2 text-sm font-medium text-primary-700 underline hover:no-underline dark:text-primary-500">
                    Продолжить покупки
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                    </svg>
                    </a>
                </div>
                </div>
            </div>
            @endif

            </div>
        </div>
    </section>    
</x-guest-layout>
@if(session('information'))
<script>
    Swal.fire({
    title: "Заказ оформлен",
    text: "Наш менеджер скоро с вами свяжется для уточнения деталей. Для отслеживания статуса заказа перейдите в личный кабинет",
    icon: "success",

    confirmButtonColor: "#d5d5d5",
    confirmButtonText: "Перейти в личный кабинет"
    }).then((result) => {
    if (result.isConfirmed) {
        window.location.href = "{{route('/dashboard-your-orders')}}";
    }
    });
</script>
@endif