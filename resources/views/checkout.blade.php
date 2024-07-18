@section('title', 'Оформление заказа')
<x-guest-layout>
<div class="bg-white">
    <main class="pt-24 relative grid grid-cols-1 gap-x-16 max-w-7xl mx-auto lg:px-8 lg:grid-cols-2">
      <h1 class="sr-only">Оформление заказа</h1>
  
      <section aria-labelledby="summary-heading" class="bg-indigo-900 text-indigo-300 pt-6 pb-12 md:px-10 lg:max-w-lg lg:w-full lg:mx-auto lg:px-0 lg:pt-0 lg:pb-24 lg:bg-transparent lg:row-start-1 lg:col-start-2">
        <div class="max-w-2xl mx-auto px-4 lg:max-w-none lg:px-0">
          <h2 id="summary-heading" class="sr-only">Order summary</h2>
  
          <dl>
            <dt class="text-sm font-medium text-black">Содержание заказа</dt>
            <dd class="mt-1 text-3xl font-extrabold text-black">{{ number_format($sum-$discount, 0, '', ' ') }} ₽</dd>
          </dl>
  
          <ul role="list" class="text-sm font-medium divide-y divide-white divide-opacity-10">

            @foreach($cart as $item)
                <li class="flex items-start py-6 space-x-4 text-black">
                    <img src="{{$item->product->image}}" alt="Front of zip tote bag with white canvas, white handles, and black drawstring top." class="flex-none w-20 h-20 rounded-md object-center object-cover">
                    <div class="flex-auto space-y-1">
                    <h3 class="text-black">{{$item->product->title}}</h3>
                    <p>
                      @if(isset($item->product->category->title))
                        {{ $item->product->category->title }}
                      @endif
                    </p>
                    <p>{{$item->amount}} шт.</p>
                    </div>
                    <p class="flex-none text-base font-medium text-black">
                    @if (auth()->user()->getRoles()->where('slug', 'graduate')->count() <= 0)
                        {{ number_format($item->product->default_price, 0, '', ' ') }} ₽
                    @else
                        <p class="text-base font-bold text-red-900 dark:text-white">
                            <span class="line-through">{{ number_format($item->product->default_price, 0, '', ' ') }} ₽</span>
                        </p>
                        <p class="text-xl font-bold text-gray-900 dark:text-white">{{ number_format($item->product->price_student, 0, '', ' ') }} ₽</p>
                    @endif
                    </p>
                </li>
            @endforeach
  
          </ul>
  
          <dl class="text-sm font-medium space-y-6 border-t border-white border-opacity-10 pt-6">
            <div class="flex items-center justify-between text-black">
              <dt>Всего без скидки</dt>
              <dd>{{ number_format($sum, 0, '', ' ') }} ₽</dd>
            </div>
  
            <div class="flex items-center justify-between text-green-600">
              <dt>Размер скидки</dt>
              <dd>{{ number_format($discount, 0, '', ' ') }} ₽</dd>
            </div>
  
            <div class="flex items-center justify-between border-t border-white border-opacity-10 text-black pt-6">
              <dt class="text-base">ИТОГО К ОПЛАТЕ</dt>
              <dd class="text-base">{{ number_format($sum-$discount, 0, '', ' ') }} ₽</dd>
            </div>
          </dl>
        </div>
      </section>
  
      <section aria-labelledby="payment-and-shipping-heading" class="py-16 lg:max-w-lg lg:w-full lg:mx-auto lg:pt-0 lg:pb-24 lg:row-start-1 lg:col-start-1">
        <h2 id="payment-and-shipping-heading" class="sr-only">Информация о вас</h2>
  
        <form method="POST" action="{{ route('/checkout/store') }}">
            @csrf
          <div class="max-w-2xl mx-auto px-4 lg:max-w-none lg:px-0">
            <div>
              <h3 id="contact-info-heading" class="text-lg font-medium text-gray-900">Информация о вас</h3>
              <p id="contact-info-heading" class="text-gray-900">Необходимо в дальнейшем для подтверждения заказа</p>

              <div class="mt-6">
                <label for="email-address" class="block text-sm font-medium text-gray-700">ФИО</label>
                <div class="mt-1">
                  <input required value="{{auth()->user()->fio}}" type="text" id="email-address" name="fio" autocomplete="email" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
              </div>
  
              <div class="mt-6">
                <label for="email-address" class="block text-sm font-medium text-gray-700">E-mail</label>
                <div class="mt-1">
                  <input required value="{{auth()->user()->email}}" type="email" id="email-address" name="email" autocomplete="email" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
              </div>

              <div class="mt-6">
                <label for="email-address" class="block text-sm font-medium text-gray-700">Телефон</label>
                <div class="mt-1">
                  <input required value="{{auth()->user()->tel}}" type="tel" id="email-address" name="tel" autocomplete="email" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
              </div>

              <div class="mt-6">
                <label for="email-address" class="block text-sm font-medium text-gray-700">ВКонтакте (ссылка)</label>
                <div class="mt-1">
                  <input required type="url" id="vk-address" name="vk" autocomplete="email" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
              </div>
            </div>
  
            <div class="mt-10">
              <h3 id="shipping-heading" class="text-lg font-medium text-gray-900">Адрес доставки</h3>
  
              <div class="mt-6">
                <label for="email-address" class="block text-sm font-medium text-gray-700">Полный адрес доставки</label>
                <div class="mt-1">
                  <input required type="text" id="email-address" name="adress" autocomplete="email" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
              </div>
            </div>
  
            <div class="mt-10">
              <h3 class="text-lg font-medium text-gray-900">Способ оплаты</h3>
  
              <div class="mt-6 flex items-center">
                <div class="ml-2">
                    <select required name="payment" id="underline_select" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-[#5e5e5e] appearance-none focus:outline-none focus:ring-0 focus:border-[#5e5e5e] peer">
                        <option value="1">Наличные при самовывозе (ТОЛЬКО СПБ)</option>
                        <option value="2">Перевод на расчетный счет</option>
                    </select>
                </div>
              </div>
            </div>

            <div class="mt-10">
                <h3 class="text-lg font-medium text-gray-900">Способ доставки</h3>
    
                <div class="mt-6 flex items-center">
                  <div class="ml-2">
                      <select required name="delivery" id="underline_select" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-[#5e5e5e] appearance-none focus:outline-none focus:ring-0 focus:border-[#5e5e5e] peer">
                          <option value="1">Доставка СДЭК</option>
                          <option value="2">Доставка Почтой России</option>
                          <option value="3">Самовывоз (только СПБ)</option>
                      </select>
                  </div>
                </div>
            </div>
  
            <div class="mt-10 flex justify-end pt-6 border-t border-gray-200">
              <button type="submit" class="border border-2 border-[#5e5e5e] rounded-md shadow-sm py-2 px-4 text-sm font-medium text-[#5e5e5e] hover:bg-[#5e5e5e] hover:text-[#ffffff] duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">Совершить заказ</button>
            </div>
          </div>
        </form>
      </section>
    </main>
  </div>  
</x-guest-layout>