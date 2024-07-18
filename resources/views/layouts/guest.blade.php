<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Styles -->
    </head>

    <header>
            <nav class="bg-white border-gray-200 px-4 lg:px-6 py-6 dark:bg-gray-800">
                <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                    <a href="{{route('/home')}}" class="flex items-center">
                        <img src="{{asset('images/logos/FlaxTapLogo.svg')}}" class="mr-3 h-6 sm:h-9" alt="FlaxTap logo" />
                    </a>
                    <div class="flex items-center lg:order-2">
                        <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                            <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                                @auth
                                    <li>
                                        <a href="{{route('/cart')}}" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">
                                            <svg width="28px" height="28px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.00014 14H18.1359C19.1487 14 19.6551 14 20.0582 13.8112C20.4134 13.6448 20.7118 13.3777 20.9163 13.0432C21.1485 12.6633 21.2044 12.16 21.3163 11.1534L21.9013 5.88835C21.9355 5.58088 21.9525 5.42715 21.9031 5.30816C21.8597 5.20366 21.7821 5.11697 21.683 5.06228C21.5702 5 21.4155 5 21.1062 5H4.50014M2 2H3.24844C3.51306 2 3.64537 2 3.74889 2.05032C3.84002 2.09463 3.91554 2.16557 3.96544 2.25376C4.02212 2.35394 4.03037 2.48599 4.04688 2.7501L4.95312 17.2499C4.96963 17.514 4.97788 17.6461 5.03456 17.7462C5.08446 17.8344 5.15998 17.9054 5.25111 17.9497C5.35463 18 5.48694 18 5.75156 18H19M7.5 21.5H7.51M16.5 21.5H16.51M8 21.5C8 21.7761 7.77614 22 7.5 22C7.22386 22 7 21.7761 7 21.5C7 21.2239 7.22386 21 7.5 21C7.77614 21 8 21.2239 8 21.5ZM17 21.5C17 21.7761 16.7761 22 16.5 22C16.2239 22 16 21.7761 16 21.5C16 21.2239 16.2239 21 16.5 21C16.7761 21 17 21.2239 17 21.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('/your-likes')}}" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">
                                            <svg width="28px" height="28px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M16.1111 3C19.6333 3 22 6.3525 22 9.48C22 15.8138 12.1778 21 12 21C11.8222 21 2 15.8138 2 9.48C2 6.3525 4.36667 3 7.88889 3C9.91111 3 11.2333 4.02375 12 4.92375C12.7667 4.02375 14.0889 3 16.1111 3Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        @if(Auth::user()->roles->contains('id', 1))
                                            <a href="{{route('platform.main')}}" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">
                                                <svg width="28px" height="28px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3 20C5.33579 17.5226 8.50702 16 12 16C15.493 16 18.6642 17.5226 21 20M16.5 7.5C16.5 9.98528 14.4853 12 12 12C9.51472 12 7.5 9.98528 7.5 7.5C7.5 5.01472 9.51472 3 12 3C14.4853 3 16.5 5.01472 16.5 7.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </a>
                                        @else
                                            <a href="{{route('/home')}}" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">
                                                <svg width="28px" height="28px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3 20C5.33579 17.5226 8.50702 16 12 16C15.493 16 18.6642 17.5226 21 20M16.5 7.5C16.5 9.98528 14.4853 12 12 12C9.51472 12 7.5 9.98528 7.5 7.5C7.5 5.01472 9.51472 3 12 3C14.4853 3 16.5 5.01472 16.5 7.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </a>
                                        @endif
                                    </li>
                                @else
                                        <li>
                                            <a href="{{route('login')}}" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Войти</a>
                                        </li>
                                @endauth
                            </ul>
                        </div>
                    </div>
                    <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                        <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                            <li>
                                <a href="{{route('/home')}}" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Главная</a>
                            </li>
                            <li>
                                <a href="{{route('/shop')}}" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Каталог</a>
                            </li>
                            <li>
                                <a href="{{route('/deliver-and-payment')}}" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Доставка и оплата</a>
                            </li>
                            <li>
                                <a href="https://flaxtap.ru/" target="_blank" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Обучение</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

    <body>
        <div class="">
            {{ $slot }}
        </div>

    </body>

    <footer class="bg-white dark:bg-gray-900">
        <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
            <div class="md:flex md:justify-between">
            <div class="mb-6 md:mb-0">
                <a href="{{route('/home')}}" class="flex items-center">
                    <img src="{{asset('images/logos/FlaxTapLogo.svg')}}" class="h-14 me-3" alt="FlowBite Logo" />
                </a>
            </div>
            <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-2">
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Мы в социальных сетях</h2>
                    <ul class="flex text-gray-500 dark:text-gray-400 font-medium">
                        <li class="mb-4">
                            <a target="_blank" href="https://vk.com/flaxtap" class="hover:underline">
                                <svg id='VK.com_24' width='48' height='48' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>
                                    <g transform="matrix(0.48 0 0 0.48 12 12)" >
                                    <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" translate(-25, -25)" d="M 9 4 C 6.2504839 4 4 6.2504839 4 9 L 4 41 C 4 43.749516 6.2504839 46 9 46 L 41 46 C 43.749516 46 46 43.749516 46 41 L 46 9 C 46 6.2504839 43.749516 4 41 4 L 9 4 z M 9 6 L 41 6 C 42.668484 6 44 7.3315161 44 9 L 44 41 C 44 42.668484 42.668484 44 41 44 L 9 44 C 7.3315161 44 6 42.668484 6 41 L 6 9 C 6 7.3315161 7.3315161 6 9 6 z M 23.396484 15.992188 C 22.338993 15.989762 21.396053 16.048857 20.552734 16.462891 C 20.5520821013821 16.46354110076146 20.551431100761462 16.4641921013821 20.550781 16.464844 C 20.139648 16.667406 19.849872 16.924692 19.619141 17.230469 C 19.503775 17.383357 19.385584 17.520601 19.322266 17.869141 C 19.290606 18.04341 19.272826 18.325815 19.455078 18.630859 C 19.637334 18.935904 20.003807 19.109362 20.238281 19.140625 C 20.401166 19.162305 20.768822 19.318796 20.802734 19.365234 C 20.803382488292673 19.366537754276372 20.804033823179353 19.367840090715607 20.804688 19.369141 C 20.804932 19.369474 20.947263 19.741144 20.988281 20.072266 C 21.029301 20.403387 21.027344 20.671875 21.027344 20.671875 C 21.026925351260417 20.698583036950332 21.027576873701463 20.72529712503735 21.029297 20.751953 C 21.029297 20.751953 21.087228 21.619511 21.048828 22.515625 C 21.033528 22.872778 20.987338 23.190517 20.939453 23.474609 C 20.583342 23.081448 20.058613 22.36946 19.300781 21.056641 C 18.460091 19.599445 17.791016 18.292969 17.791016 18.292969 C 17.755878 18.179145 17.631609 17.825025 17.146484 17.46875 C 16.616155 17.077877 16.103516 17.019531 16.103516 17.019531 C 16.039209597368355 17.006632028672463 15.973790260542794 17.00009019547375 15.908203 17 L 11.966797 17.001953 C 11.966797 17.001953 11.73048 16.988284 11.447266 17.027344 C 11.164051 17.066404 10.737588 17.098194 10.326172 17.585938 C 10.3255201013821 17.58658810076146 10.324869100761461 17.5872391013821 10.324219 17.587891 C 9.9565329 18.027228 9.9787721 18.512818 10.023438 18.787109 C 10.068098 19.061401 10.167969 19.269531 10.167969 19.269531 C 10.169896390912136 19.273450084407315 10.171849432811847 19.27735650154722 10.173828 19.28125 C 10.173828 19.28125 13.397717 26.059497 17.041016 30.050781 C 19.6867 32.948797 22.40224 32.998047 24.642578 32.998047 L 26.314453 32.998047 C 26.74128 32.998047 27.127368 32.981367 27.554688 32.732422 C 27.982005 32.483474 28.269531 31.87742 28.269531 31.457031 C 28.269531 31.016509 28.335301 30.670207 28.416016 30.492188 C 28.472777 30.36699 28.517715 30.321903 28.587891 30.285156 C 28.602729 30.294567 28.593147 30.289094 28.634766 30.318359 C 28.801234 30.435424 29.076122 30.702288 29.375 31.035156 C 29.972755 31.700892 30.651262 32.614044 31.5625 33.240234 C 32.215313 33.689229 32.831963 33.888608 33.300781 33.960938 C 33.594505 34.006254 33.82263 33.997525 33.984375 33.984375 L 37.71875 34 C 37.74090085349639 34.000084586250686 37.76304840311024 33.99943322696996 37.785156 33.998047 C 37.785156 33.998047 38.428614 34.005547 39.097656 33.605469 C 39.432178 33.405406 39.82672 33.026107 39.955078 32.472656 C 40.083436 31.919206 39.922118 31.34574 39.607422 30.822266 C 39.607422636289186 30.821614666822065 39.607422636289186 30.820963333177936 39.607422 30.820312 C 39.662072 30.910912 39.557942 30.724742 39.451172 30.550781 C 39.344399 30.376818 39.18937 30.142398 38.966797 29.851562 C 38.521651 29.269893 37.808682 28.45591 36.65625 27.382812 C 36.655599000155156 27.382811364361913 36.65494799984484 27.382811364361913 36.654297 27.382812 C 36.06897 26.838224 35.673719 26.452649 35.511719 26.238281 C 35.349719 26.023913 35.402852 26.136522 35.414062 26.082031 C 35.436492 25.97305 36.138984 24.959653 37.568359 23.050781 C 38.437249 21.888888 39.04704 21.016572 39.449219 20.291016 C 39.851397 19.565459 40.141394 18.937091 39.939453 18.167969 C 39.93880484474892 18.166665246596857 39.93815384319669 18.165362910158258 39.9375 18.164062 C 39.847853 17.826442 39.603007 17.515245 39.351562 17.345703 C 39.100119 17.176162 38.861732 17.109853 38.648438 17.068359 C 38.221848 16.985372 37.849591 17 37.503906 17 C 36.779144 17 33.563492 17.025391 33.298828 17.025391 C 32.986098 17.025391 32.468982 17.167635 32.240234 17.304688 C 31.665127 17.650771 31.5 18.105469 31.5 18.105469 C 31.489597115875764 18.124674835429584 31.479826208832257 18.144216316004393 31.470703 18.164062 C 31.470703 18.164062 30.807378 19.634988 29.953125 21.087891 C 29.08775 22.561617 28.448441 23.264508 28.0625 23.589844 C 28.05188 23.531984 28.053705 23.578967 28.046875 23.498047 C 28.012285 23.086503 28.050781 22.517823 28.050781 21.962891 C 28.050781 20.468376 28.177461 19.422397 28.109375 18.498047 C 28.075335 18.035872 27.989721 17.559283 27.685547 17.121094 C 27.381373 16.682905 26.875241 16.398229 26.375 16.277344 C 26.074849 16.204944 25.732712 16.016631 24.494141 16.003906 C 24.49349000015516 16.003905364361913 24.49283899984484 16.003905364361913 24.492188 16.003906 C 24.113419 16.000121 23.748982 15.992996 23.396484 15.992188 z M 24.472656 18.003906 C 25.568624 18.015166 25.295621 18.075496 25.904297 18.222656 C 26.093056 18.268266 26.04733 18.268009 26.042969 18.261719 C 26.038569 18.255419 26.094024 18.358529 26.115234 18.646484 C 26.157654 19.222384 26.050781 20.367405 26.050781 21.962891 C 26.050781 22.397958 25.998284 23.01881 26.052734 23.666016 C 26.107134 24.313221 26.267657 25.143803 27.041016 25.644531 C 27.407604 25.882157 27.833256 25.897136 28.197266 25.806641 C 28.561275 25.716141 28.891511 25.527659 29.238281 25.25 C 29.931821 24.694683 30.705387 23.757462 31.677734 22.101562 C 32.586549 20.555862 33.247595 19.08397 33.269531 19.035156 C 33.273824 19.031713 33.278168 19.02935 33.283203 19.025391 C 33.295692 19.025528 33.282755 19.025391 33.298828 19.025391 C 33.672165 19.025391 36.828668 19 37.503906 19 C 37.661534 19 37.718912 19.009502 37.84375 19.013672 C 37.80982 19.126937 37.84755 19.054692 37.699219 19.322266 C 37.388147 19.883459 36.814907 20.717455 35.966797 21.851562 C 34.573172 23.712692 33.7094 24.441966 33.455078 25.677734 C 33.327917 26.295619 33.566234 26.980509 33.916016 27.443359 C 34.265797 27.90621 34.707295 28.302745 35.292969 28.847656 C 36.377537 29.85756 37.013803 30.59128 37.378906 31.068359 C 37.561458 31.306899 37.676539 31.479197 37.748047 31.595703 C 37.819557 31.712209 37.801887 31.699918 37.894531 31.853516 C 37.955521 31.95573 37.933049 31.893348 37.943359 31.923828 C 37.823459 31.957628 37.678197 31.99832 37.669922 32 L 33.992188 31.984375 C 33.925948123616536 31.984336482878376 33.85986827449929 31.990878946015 33.794922 32.003906 C 33.794922 32.003906 33.804122 32.014725 33.607422 31.984375 C 33.410689 31.954025 33.097805 31.868892 32.695312 31.591797 C 32.20955 31.257987 31.529526 30.441233 30.863281 29.699219 C 30.530159 29.328212 30.197938 28.971919 29.785156 28.681641 C 29.372375 28.391362 28.754711 28.118405 28.087891 28.328125 C 27.395667 28.545486 26.856849 29.085706 26.59375 29.666016 C 26.397906 30.097982 26.382045 30.54919 26.351562 30.998047 C 26.318372 31.000547 26.356563 30.998047 26.314453 30.998047 L 24.642578 30.998047 C 22.370916 30.998047 20.757894 31.155156 18.517578 28.701172 C 15.504086 25.39985 12.743119 19.907011 12.292969 19.001953 L 15.761719 19 C 15.822689 19.0234 15.953174 19.072395 15.960938 19.078125 C 15.962236401799421 19.079430593235454 15.963538406764547 19.08073259820058 15.964844 19.082031 C 15.83805 18.989351 15.970703 19.119141 15.970703 19.119141 C 15.982945525301032 19.14908376941723 15.996633617512439 19.178414918833568 16.011719 19.207031 C 16.011719 19.207031 16.699049 20.549836 17.568359 22.056641 C 18.421075 23.533829 19.042453 24.456619 19.642578 25.066406 C 19.942641 25.3713 20.245541 25.615827 20.650391 25.753906 C 21.05524 25.891985 21.578005 25.841335 21.929688 25.648438 C 22.648115 25.255167 22.744641 24.675101 22.861328 24.167969 C 22.978179 23.660124 23.024698 23.119131 23.046875 22.601562 C 23.089915 21.596958 23.029041 20.727518 23.025391 20.673828 C 23.025613 20.654998 23.030186 20.292437 22.972656 19.828125 C 22.913756 19.352676 22.848067 18.771361 22.417969 18.185547 L 22.416016 18.183594 C 22.413016 18.179494 22.40925 18.179781 22.40625 18.175781 C 22.974999 18.094211 23.461654 17.993803 24.472656 18.003906 z M 33.294922 18.984375 L 33.28125 19.015625 C 33.279135 19.016836 33.27981 19.014183 33.277344 19.015625 C 33.281572 19.007565 33.294922 18.984375 33.294922 18.984375 z" stroke-linecap="round" />
                                    </g>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="https://www.instagram.com/belyaeva_flaxtap/" class="hover:underline">
                                <svg id='Instagram_24' width='48' height='48' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>
                                    <g transform="matrix(0.77 0 0 0.77 12 12)" >
                                    <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" translate(-13, -13)" d="M 7.546875 0 C 3.390625 0 0 3.390625 0 7.546875 L 0 18.453125 C 0 22.609375 3.390625 26 7.546875 26 L 18.453125 26 C 22.609375 26 26 22.609375 26 18.453125 L 26 7.546875 C 26 3.390625 22.609375 0 18.453125 0 Z M 7.546875 2 L 18.453125 2 C 21.527344 2 24 4.46875 24 7.546875 L 24 18.453125 C 24 21.527344 21.53125 24 18.453125 24 L 7.546875 24 C 4.472656 24 2 21.53125 2 18.453125 L 2 7.546875 C 2 4.472656 4.46875 2 7.546875 2 Z M 20.5 4 C 19.671875 4 19 4.671875 19 5.5 C 19 6.328125 19.671875 7 20.5 7 C 21.328125 7 22 6.328125 22 5.5 C 22 4.671875 21.328125 4 20.5 4 Z M 13 6 C 9.144531 6 6 9.144531 6 13 C 6 16.855469 9.144531 20 13 20 C 16.855469 20 20 16.855469 20 13 C 20 9.144531 16.855469 6 13 6 Z M 13 8 C 15.773438 8 18 10.226563 18 13 C 18 15.773438 15.773438 18 13 18 C 10.226563 18 8 15.773438 8 13 C 8 10.226563 10.226563 8 13 8 Z" stroke-linecap="round" />
                                    </g>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Связаться с нами</h2>
                    <ul class="text-gray-500 dark:text-gray-400 font-medium">
                        <li class="mb-4">
                            <a href="tel:+78126003006" class="hover:underline">
                                +7-812-600-30-06
                            </a>
                        </li>
                        <li class="mb-4">
                            <a href="tel:+79213367700" class="hover:underline">
                                +7-921-336-77-00
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        </div>
    </footer>
</html>
