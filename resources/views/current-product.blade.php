@section('title', $product->title)
<x-guest-layout>
          <section class="container flex-grow mx-auto max-w-[1200px] border-b py-5 lg:grid lg:grid-cols-2 lg:py-10">
            <div class="container mx-auto px-4">
              <img
                class="w-full"
                src="{{$product->image}}"
                alt="Sofa image"
              />
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
                Категория: <span class="font-normal">
                  @if(isset($product->category->title))
                    {{ $product->category->title }}
                  @else
                    Нет категории
                  @endif
                </span>
              </p>

              @auth
                  @if (auth()->user()->getRoles()->where('slug', 'graduate')->count() >= 0)
                    <p class="mt-4 text-2xl font-bold text-red-600">
                      <span class='text-[#5e5e5e] line-through'>{{ number_format($product->default_price, 0, ',', ' ') }} ₽</span> {{number_format($product->price_student)}} ₽
                    </p>
                  @else
                    <p class="mt-4 text-4xl font-bold text-[#5e5e5e]">
                      {{ number_format($product->default_price, 0, ',', ' ') }} ₽
                    </p>
                  @endif

              @else
                    <p class="mt-4 text-4xl font-bold text-[#5e5e5e]">
                      {{ number_format($product->default_price, 0, ',', ' ') }} ₽
                    </p>
              @endauth
    
              <p class="pt-5 text-sm leading-5 text-gray-500">
                {{ $product->description }}
              </p>
    
              <div class="mt-6">
                <p class="pb-2 text-xs text-gray-500">Осталось {{$product->amount}}</p>
              </div>
    
              <div class="mt-7 flex flex-row gap-6">
                    @auth
                        @if($cartStatus == 1)
                        <a href="{{route('/cart')}}" class="py-2 px-4 bg-[#5e5e5e] text-[#ffffff] border border-[#5e5e5e] duration-300 hover:bg-[#ffffff] hover:text-[#5e5e5e] hover:rounded">
                          В корзине
                        </a>
                        @else
                        <a href="{{route('/cart-add', $product->id)}}" class="py-2 px-4 bg-white text-[#5e5e5e] border border-[#5e5e5e] duration-300 hover:bg-[#ededed] hover:rounded">
                          В корзину
                        </a>
                        @endif
                        @else
                            <a href="{{route('login')}}"
                              class="py-2 px-4 bg-white text-[#5e5e5e] border border-[#5e5e5e] duration-300 hover:bg-[#ededed] hover:rounded"
                              >
                                  В корзину
                            </a>
                        @endauth

                        @auth
                        @if($likeStatus == 1)
                            <button id='dislike-button'
                            class="color-[#5e5e5e] dislike-button py-2 px-4 bg-white border border-[#5e5e5e] duration-300 hover:bg-[#ededed] hover:rounded"
                        >
                          <svg id='Dislike_24' width='24' height='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>


                            <g transform="matrix(0.4 0 0 0.4 12 12)" >
                            <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" translate(-25, -25)" d="M 0.99023438 -0.009765625 C 0.583311277086795 -0.009658780598669443 0.21702530776786666 0.23698978690308747 0.06390329693557661 0.6140044721593956 C -0.08921871389671332 0.9910191574157037 0.0013573911775308645 1.4232192226171734 0.29296875 1.7070312 L 48.292969 49.707031 C 48.54378557313715 49.96827179479288 48.91623599221815 50.07350663500295 49.26667805152247 49.98214981098403 C 49.6171201108268 49.89079298696512 49.89079298696512 49.6171201108268 49.98214981098403 49.26667805152247 C 50.07350663500295 48.91623599221815 49.96827179479288 48.54378557313715 49.707031 48.292969 L 38.707031 37.292969 C 43.727352 32.997375 48 27.511313 48 20 C 48 12.832 42.168 7 35 7 C 31.104 7 27.458 8.7342187 25 11.699219 C 22.542 8.7342188 18.896 7 15 7 C 13.072792 7 11.246985 7.4305093 9.6015625 8.1875 L 1.7070312 0.29296875 C 1.5187601198341525 0.09943601102382937 1.2602360845040457 -0.009749897834049892 0.9902343800000003 -0.009765624999999778 z M 15 9 C 18.692 9 22.119969 10.841781 24.167969 13.925781 L 25 15.181641 L 25.832031 13.925781 C 27.880031 10.841781 31.308 9 35 9 C 41.065 9 46 13.935 46 20 C 46 26.769239 42.000718 31.840614 37.279297 35.865234 L 11.134766 9.7207031 C 12.338504 9.2624331 13.637182 9 15 9 z M 6.2070312 10.451172 C 3.6280312 12.828172 2 16.223 2 20 C 2 31.601 12.169703 38.407906 19.595703 43.378906 C 21.499703 44.652906 23.142375 45.754531 24.359375 46.769531 L 25 47.302734 L 25.640625 46.769531 C 26.857625 45.754531 28.500297 44.653906 30.404297 43.378906 C 32.036297 42.286906 33.800547 41.105688 35.560547 39.804688 L 34.125 38.367188 C 32.475 39.579188 30.822969 40.692797 29.292969 41.716797 C 27.648969 42.817797 26.193 43.79275 25 44.71875 C 23.807 43.79275 22.351031 42.817797 20.707031 41.716797 C 13.656031 36.996797 4 30.533 4 20 C 4 16.775 5.4030938 13.878234 7.6210938 11.865234 L 6.2070312 10.451172 z" stroke-linecap="round" />
                            </g>
                          </svg>
                          </button>

                          <button id='like-button' style="display: none"
                          class="like-button py-2 px-4 bg-white text-[#5e5e5e] border border-[#5e5e5e] duration-300 hover:bg-[#ededed] hover:rounded"
                      >
                        <svg id='Heart_Outline_24' width='24' height='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>
                          <g transform="matrix(0.5 0 0 0.5 12 12)" >
                          <path style="color: rgb(12, 105, 180); stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" translate(-25, -26.66)" d="M 16.375 9 C 10.117188 9 5 14.054688 5 20.28125 C 5 33.050781 19.488281 39.738281 24.375 43.78125 L 25 44.3125 L 25.625 43.78125 C 30.511719 39.738281 45 33.050781 45 20.28125 C 45 14.054688 39.882813 9 33.625 9 C 30.148438 9 27.085938 10.613281 25 13.0625 C 22.914063 10.613281 19.851563 9 16.375 9 Z M 16.375 11 C 19.640625 11 22.480469 12.652344 24.15625 15.15625 L 25 16.40625 L 25.84375 15.15625 C 27.519531 12.652344 30.359375 11 33.625 11 C 38.808594 11 43 15.144531 43 20.28125 C 43 31.179688 30.738281 37.289063 25 41.78125 C 19.261719 37.289063 7 31.179688 7 20.28125 C 7 15.144531 11.1875 11 16.375 11 Z" stroke-linecap="round" />
                          </g>
                        </svg>
                        </button>
                        @else
                            <button id='dislike-button' style="display: none"
                            class="dislike-button py-2 px-4 bg-white text-[#5e5e5e] border border-[#5e5e5e] duration-300 hover:bg-[#ededed] hover:rounded"
                        >
                            <svg id='Dislike_24' width='24' height='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>


                              <g transform="matrix(0.4 0 0 0.4 12 12)" >
                              <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" translate(-25, -25)" d="M 0.99023438 -0.009765625 C 0.583311277086795 -0.009658780598669443 0.21702530776786666 0.23698978690308747 0.06390329693557661 0.6140044721593956 C -0.08921871389671332 0.9910191574157037 0.0013573911775308645 1.4232192226171734 0.29296875 1.7070312 L 48.292969 49.707031 C 48.54378557313715 49.96827179479288 48.91623599221815 50.07350663500295 49.26667805152247 49.98214981098403 C 49.6171201108268 49.89079298696512 49.89079298696512 49.6171201108268 49.98214981098403 49.26667805152247 C 50.07350663500295 48.91623599221815 49.96827179479288 48.54378557313715 49.707031 48.292969 L 38.707031 37.292969 C 43.727352 32.997375 48 27.511313 48 20 C 48 12.832 42.168 7 35 7 C 31.104 7 27.458 8.7342187 25 11.699219 C 22.542 8.7342188 18.896 7 15 7 C 13.072792 7 11.246985 7.4305093 9.6015625 8.1875 L 1.7070312 0.29296875 C 1.5187601198341525 0.09943601102382937 1.2602360845040457 -0.009749897834049892 0.9902343800000003 -0.009765624999999778 z M 15 9 C 18.692 9 22.119969 10.841781 24.167969 13.925781 L 25 15.181641 L 25.832031 13.925781 C 27.880031 10.841781 31.308 9 35 9 C 41.065 9 46 13.935 46 20 C 46 26.769239 42.000718 31.840614 37.279297 35.865234 L 11.134766 9.7207031 C 12.338504 9.2624331 13.637182 9 15 9 z M 6.2070312 10.451172 C 3.6280312 12.828172 2 16.223 2 20 C 2 31.601 12.169703 38.407906 19.595703 43.378906 C 21.499703 44.652906 23.142375 45.754531 24.359375 46.769531 L 25 47.302734 L 25.640625 46.769531 C 26.857625 45.754531 28.500297 44.653906 30.404297 43.378906 C 32.036297 42.286906 33.800547 41.105688 35.560547 39.804688 L 34.125 38.367188 C 32.475 39.579188 30.822969 40.692797 29.292969 41.716797 C 27.648969 42.817797 26.193 43.79275 25 44.71875 C 23.807 43.79275 22.351031 42.817797 20.707031 41.716797 C 13.656031 36.996797 4 30.533 4 20 C 4 16.775 5.4030938 13.878234 7.6210938 11.865234 L 6.2070312 10.451172 z" stroke-linecap="round" />
                              </g>
                            </svg>
                            </button>

                          <button id='like-button'
                            class="like-button py-2 px-4 bg-white text-[#5e5e5e] border border-[#5e5e5e] duration-300 hover:bg-[#ededed] hover:rounded"
                        >
                          <svg id='Heart_Outline_24' width='24' height='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>
                            <g transform="matrix(0.5 0 0 0.5 12 12)" >
                            <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" translate(-25, -26.66)" d="M 16.375 9 C 10.117188 9 5 14.054688 5 20.28125 C 5 33.050781 19.488281 39.738281 24.375 43.78125 L 25 44.3125 L 25.625 43.78125 C 30.511719 39.738281 45 33.050781 45 20.28125 C 45 14.054688 39.882813 9 33.625 9 C 30.148438 9 27.085938 10.613281 25 13.0625 C 22.914063 10.613281 19.851563 9 16.375 9 Z M 16.375 11 C 19.640625 11 22.480469 12.652344 24.15625 15.15625 L 25 16.40625 L 25.84375 15.15625 C 27.519531 12.652344 30.359375 11 33.625 11 C 38.808594 11 43 15.144531 43 20.28125 C 43 31.179688 30.738281 37.289063 25 41.78125 C 19.261719 37.289063 7 31.179688 7 20.28125 C 7 15.144531 11.1875 11 16.375 11 Z" stroke-linecap="round" />
                            </g>
                          </svg>
                          </button>
                        @endif                       
                    @else

                    @endauth


              </div>
                @auth
                  @if($cartStatus == 1)
                    <div class="mt-4">
                      <a href="{{route('/cart-delete', $product->id)}}" class="text-[#5e5e5e] duration-300 hover:underline hover:text-[#5e5e5e] hover:rounded">
                        Удалить из корзины
                      </a>
                    </div>
                  @endif
                @endauth
            </div>
          </section>

          <p class="mx-auto mt-10 mb-5 max-w-[1200px] px-5">Мы рекомендуем: </p>
    
          <section
            class="container mx-auto grid max-w-[1200px] grid-cols-2 gap-3 px-5 pb-10 lg:grid-cols-4"
          >

            @foreach ($random_products as $random_product)
              <div class="flex flex-col">
                <img
                  class=""
                  src="{{$random_product->image}}"
                  alt="{{$random_product->title}}..."
                />
      
                <div>
                  <p class="mt-2">{{$random_product->title}}</p>
                  <p class="font-medium text-black mt-2">
                    @auth
                      @if (auth()->user()->getRoles()->where('slug', 'graduate')->count() >= 0)
                        <p class="mt-4 text-xl font-bold text-red-600">
                          <span class='text-[#5e5e5e] line-through'>{{ number_format($product->default_price, 0, ',', ' ') }} ₽</span> {{number_format($product->price_student)}} ₽
                        </p>
                      @else
                        <p class="mt-4 text-2xl font-bold text-[#5e5e5e]">
                          {{ number_format($product->default_price, 0, ',', ' ') }} ₽
                        </p>
                      @endif
    
                      @else
                            <p class="mt-4 text-2xl font-bold text-[#5e5e5e]">
                              {{ number_format($product->default_price, 0, ',', ' ') }} ₽
                            </p>
                    @endauth
                  </p>
                  <div class="mt-5">
                      <a href="{{route('/shop/show/{id}', $random_product->id)}}"
                          class="flex h-12 w-1/2 items-center justify-center bg-white text-[#5e5e5e] border border-[#5e5e5e] duration-300 hover:bg-[#ededed] hover:rounded"
                      >
                          Подробнее
                      </a>
                  </div>
                </div>
              </div> 
            @endforeach
          </section>
</x-guest-layout>
@if(session('success'))
    <script>
        Swal.fire({
        position: "top-end",
        icon: "success",
        title: "Товар добавлен в корзину",
        showConfirmButton: false,
        timer: 1500
      });
    </script>
@endif
@auth
<script>
  $(document).ready(function() {
    $('.like-button').click(function() {
      var productId = {{$product->id}};
      var userId = {{ auth()->user()->id }};

      $.ajax({
        type: 'POST',
        url: '/shop/like/' + productId + '/' + userId,
        data: {
          _token: '{{ csrf_token() }}'
        },
        success: function(response) {
          Swal.fire({
          position: "top-end",
          icon: "success",
          title: "Товар добавлен в избранное",
          showConfirmButton: false,
          timer: 1500
        });

          document.getElementById('like-button').style.display = 'none';
          document.getElementById('dislike-button').style.display = 'block';

        },
        error: function(error) {
          console.log(error);
        }
      });
    });

    $('.dislike-button').click(function() {
      var productId = {{$product->id}};
      var userId = {{ auth()->user()->id }};

      $.ajax({
        type: 'POST',
        url: '/shop/dislike/' + productId + '/' + userId,
        data: {
          _token: '{{ csrf_token() }}'
        },
        success: function(response) {
          document.getElementById('dislike-button').style.display = 'none';
          document.getElementById('like-button').style.display = 'block';
        },
        error: function(error) {
          console.log(error);
        }
      });
    });
  });
</script>
@endauth