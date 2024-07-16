@section('title', 'Доставка и оплата')
<x-guest-layout>
    <div class="bg-white">
        <div class="mx-auto grid max-w-2xl grid-cols-1 items-center gap-x-8 gap-y-16 px-4 py-24 sm:px-6 sm:py-32 lg:max-w-7xl lg:grid-cols-2 lg:px-8">
          <div>
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Доставка товара</h2>
            <p class="mt-4 text-gray-500">
                Наш интернет-магазин товаров осуществляет доставку по всей России. Для своего удобства, Вы можете выбрать отправку Почтой России или курьерской службой СДЕК. Отправка товаров осуществляется после поступления денежных средств.
            </p>

            <p class="mt-4 text-gray-500">
                Отправка осуществляется из Санкт-Петербурга, о сроках и стоимости доставки до своего города вы можете узнать на официальных сайтах почты России и СДЕК, а также, через менеджера Вконтакте
            </p>

            <p class="mt-4 font-bold">
                Высылаем товар после 100% оплаты.
            </p>
          </div>
          <div class="grid grid-cols-2 grid-rows-1 gap-4 sm:gap-6 lg:gap-8">
            <img src="{{asset('./images/logos/cdek.svg')}}" alt="СДЭК" class="rounded-lg">
            <img src="{{asset('./images/logos/russian_post.svg')}}" alt="Top down view of walnut card tray with embedded magnets and card groove." class="rounded-lg">
          </div>
        </div>

        <div class="mx-auto grid max-w-2xl items-center px-4 py-24 sm:px-6 sm:py-32 lg:max-w-7xl lg:px-8">
            <div>
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Оплата заказа</h2>
                <p class="mt-4 text-gray-500">
                    Вы можете оплатить заказ наличными или картой при самовывозе из нашей академии в Санкт-Петербурге. Для жителей других городов оплата осуществляется по безналичному расчету. Все необходимые реквизиты вам сообщит наш менеджер, который обязательно свяжется с вами по телефону или через социальные сети, чтобы подтвердить заказ.
                </p>

                <p class="mt-4 font-bold">
                    Остерегайтесь мошенников. Наш менеджер пишет только со своей официальной страницы <a target="_blank" class="underline text-blue-600 hover:text-blue-500 duration-300" href="https://vk.com/belyaeva_rashodniki">ВКонтакте</a>
                </p>

                <p class="mt-4 font-bold">
                    Обязательно проверяйте правильность заполнения контактных данных при оформлении заявки, иначе менеджер нашего онлайн-магазина не сможет с вами связаться.
                </p>

                <p class="mt-4 font-bold">
                    Напоминаем, что заказать онлайн такие товары, как профессиональные наборы FlaxLift, FlaxSculpt, FlaxNewSkin, FlaxPeelFace, FlaxLashes, FlaxClean, Вы можете только после обучения по данным направлениям.
                </p>
            </div>
          </div>
    </div>    
    
    <section class="bg-[#d7d7d7]">
        <div class="mx-auto w-full max-w-7xl px-5 md:px-10">
            <div class="text-center sm:p-10 md:p-16">
            <h2 class="mb-4 text-3xl text-[#5e5e5e] font-bold md:text-3xl">ПОДПИШИТЕСЬ НА НОВОСТИ И АКЦИИ</h2>
            <form name="email-form" method="get" class="relative mx-auto mb-4 flex w-full max-w-2xl flex-col items-start justify-center sm:flex-row">
                <input type="email" class="mb-3 mr-6 block h-9 w-full px-6 py-7 bg-[#d7d7d7] border-[#5e5e5e] text-[#5e5e5e] text-sm focus:border-[#5e5e5e]" placeholder="Введите ваш e-mail" required="" />
                <button type="submit" class="inline-block w-full cursor-pointer px-10 py-4 text-center bg-[#f5f5f5] font-medium text-[#5e5e5e] transition sm:w-64">ПОДПИСАТЬСЯ</button>
            </form>
            </div>
        </div>
    </section>
</x-guest-layout>