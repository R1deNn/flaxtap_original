@php
    use App\Models\Order;
    use App\Models\OrderDetail;

    $details = OrderDetail::where('order_id', $orders->id)->get();
@endphp
<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<section aria-labelledby="product-heading" class="mt-6 lg:mt-0 lg:col-span-2 xl:col-span-3">
    <div class="pb-4">
        <h2 class="font-bold text-5xl mt-5 tracking-tight">
            Сумма заказа: {{ number_format($orders->price, 0, '', ' ') }} ₽
        </h2>
    </div>

    <div class="rounded max-w-screen-xl mx-auto px-5 bg-white min-h-sceen">
        <div class="flex flex-col items-center">
            <h2 class="font-bold text-5xl mt-5 tracking-tight">
                Детали заказа
            </h2>
        </div>
        <div class="grid divide-y divide-neutral-200 max-w-xl mx-auto mt-8">
            <div class="py-5">
                <details class="group">
                    <summary class="flex justify-between items-center font-medium cursor-pointer list-none">
                        <span>Способ оплаты</span>
                        <span class="transition group-open:rotate-180">
                    <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path>
    </svg>
                </span>
                    </summary>
                    <p class="text-neutral-600 mt-3 group-open:animate-fadeIn">
                        @if($orders->type_payment == 1)
                            Наличные при самовывозе
                        @else
                            Перевод на расчетный счет
                        @endif
                    </p>
                </details>
            </div>
            <div class="py-5">
                <details class="group">
                    <summary class="flex justify-between items-center font-medium cursor-pointer list-none">
                        <span>Способ доставки</span>
                        <span class="transition group-open:rotate-180">
                    <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path>
    </svg>
                </span>
                    </summary>
                    <p class="text-neutral-600 mt-3 group-open:animate-fadeIn">
                        @if($orders->type_delivery == 1)
                            Доставка СДЭК
                        @elseif($orders->type_delivery == 2)
                            Доставка Почтой России

                        @elseif($orders->type_delivery == 3)
                            Самовывоз
                        @endif
                    </p>
                </details>
            </div>
            <div class="py-5">
                <details class="group">
                    <summary class="flex justify-between items-center font-medium cursor-pointer list-none">
                        <span>Адрес доставки</span>
                        <span class="transition group-open:rotate-180">
                    <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path>
    </svg>
                </span>
                    </summary>
                    <p class="text-neutral-600 mt-3 group-open:animate-fadeIn">
                        {{ $orders->adress }}
                    </p>
                </details>
            </div>
            <div class="py-5">
                <details class="group">
                    <summary class="flex justify-between items-center font-medium cursor-pointer list-none">
                        <span>Страница ВКонтакте</span>
                        <span class="transition group-open:rotate-180">
                    <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path>
    </svg>
                </span>
                    </summary>
                    <p class="text-neutral-600 mt-3 group-open:animate-fadeIn">
                        <a target="_blank" href="{{ $orders->vk }}">Перейти</a>
                    </p>
                </details>
            </div>
            <div class="py-5">
                <details class="group">
                    <summary class="flex justify-between items-center font-medium cursor-pointer list-none">
                        <span>Почта</span>
                        <span class="transition group-open:rotate-180">
                    <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path>
    </svg>
                </span>
                    </summary>
                    <p class="text-neutral-600 mt-3 group-open:animate-fadeIn">
                        {{ $orders->email }}
                    </p>
                </details>
            </div>
        </div>
    </div>

    <h2 class="font-bold text-3xl mt-5 tracking-tight">
        Список заказа
    </h2>

    <div class="py-4 grid grid-cols-1 gap-y-4 sm:grid-cols-2 sm:gap-x-6 sm:gap-y-10 lg:gap-x-8 xl:grid-cols-3">
      @foreach($details as $detail)
        <div class="group relative bg-white border border-gray-200 rounded-lg flex flex-col overflow-hidden">
            @if($detail->id_vobler != null)
            <div class="pt-12" style="background-color: {{$detail->product->vobler->background_color}}">
                <span aria-hidden="true" class="absolute inset-0 p-5" style="color: {{$detail->product->vobler->color}};">{{$detail->product->vobler->title}}</span>
            </div>
            @endif
            <div class="aspect-w-3 aspect-h-4 bg-gray-200 group-hover:opacity-75 duration-300 sm:aspect-none sm:h-96">
            <img src="{{$detail->product->image}}" alt="{{$detail->product->title}}." class="w-full h-full object-center object-cover sm:w-full sm:h-full">
            </div>
            <div class="flex-1 p-4 space-y-2 flex flex-col">
                <h3 class="text-sm font-medium text-gray-900">
                    <a href="{{route('/shop/show/{id}', $detail->product->id)}}" target="_blank">
                    <span aria-hidden="true" class="absolute inset-0 p-5"></span>
                    {{ $detail->product->title }}
                    </a>
                </h3>
                <div class="flex-1 flex flex-col justify-end"> 
                    <p class="text-sm italic text-gray-500">
                    @if(isset($detail->product->category->title))
                        {{ $detail->product->category->title }}
                    @endif
                    </p>
                    <p class="text-sm italic text-gray-500">
                        {{$detail->amount}} шт.
                    </p>
                </div>
            </div>
        </div>
      @endforeach

    </div>
</section>