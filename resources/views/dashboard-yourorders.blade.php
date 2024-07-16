@section('title', 'Ваши заказы')
<x-guest-layout>
    <div>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        
        <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-[#ededed]">
            <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden"></div>
        
            <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition duration-300 transform bg-[#ffffff] lg:translate-x-0 lg:static lg:inset-0">
                <div class="flex items-center justify-center mt-8">
                    <div class="flex items-center">
                        <span class="mx-2 text-2xl font-semibold text-black">Личный кабинет</span>
                    </div>
                </div>
        
                <nav class="mt-10">
                    <a class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-[#5e5e5e] duration-300 hover:bg-opacity-25"
                        href="{{route('dashboard')}}">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                        </svg>
    
                    <span class="mx-3">Главная</span>
                    </a>

                    <a class="flex items-center px-6 py-2 mt-4 text-white bg-[#5e5e5e]" href="{{route('/dashboard-your-orders')}}">
                        <svg id='Purchase_Order_24' width='24' height='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>
                            <g transform="matrix(0.43 0 0 0.43 12 12)" >
                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" translate(-25, -25)" d="M 6 2 L 6 48 L 7 48 L 44 48 L 44 2 L 6 2 z M 8 4 L 42 4 L 42 46 L 8 46 L 8 4 z M 13 11 L 13 13 L 37 13 L 37 11 L 13 11 z M 13 25 L 13 27 L 17 27 L 17 25 L 13 25 z M 20 25 L 20 27 L 37 27 L 37 25 L 20 25 z M 13 31 L 13 33 L 17 33 L 17 31 L 13 31 z M 20 31 L 20 33 L 37 33 L 37 31 L 20 31 z M 13 37 L 13 39 L 17 39 L 17 37 L 13 37 z M 20 37 L 20 39 L 37 39 L 37 37 L 20 37 z" stroke-linecap="round" />
                            </g>
                        </svg>
        
                        <span class="mx-3">Ваши заказы</span>
                    </a>
        
                    <a class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-[#5e5e5e] duration-300  hover:bg-opacity-25"
                        href="{{route('/dashboard-settings')}}">
                        <svg id='Settings_24' width='24' height='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>
                            <g transform="matrix(0.43 0 0 0.43 12 12)" >
                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" translate(-25, -25)" d="M 22.205078 2 C 21.71554465145752 2.0002592913348565 21.29814891331823 2.354839071557026 21.21875 2.837890600000001 L 20.246094 8.7929688 C 19.076509 9.1331971 17.961243 9.5922728 16.910156 10.164062 L 11.996094 6.6542969 C 11.598816673690413 6.370610351017056 11.05478010183534 6.41518993627862 10.708984 6.7597656 L 6.8183594 10.646484 C 6.475160524964622 10.989923106498557 6.428211573453509 11.530247517776324 6.7070312 11.927734 L 10.164062 16.873047 C 9.583454 17.930271 9.1142098 19.051824 8.765625 20.232422 L 2.8359375 21.21875 C 2.3544384236683737 21.299853103126054 2.0018943636724598 21.71679624691585 2.0019531 22.205078 L 2.0019531 27.705078 C 2.0010727236635546 28.190255593235108 2.3485550930543897 28.606081573468177 2.8261718999999994 28.691406 L 8.7597656 29.742188 C 9.1064607 30.920739 9.5727226 32.043065 10.154297 33.101562 L 6.6542969 37.998047 C 6.370610922069476 38.3953241278578 6.415190488284029 38.93936004458805 6.7597656 39.285156 L 10.648438 43.175781 C 10.991091175572949 43.518528734926946 11.53018449205332 43.566265169641206 11.927734 43.289062 L 16.882812 39.820312 C 17.936999 40.39548 19.054994 40.857928 20.228516 41.201172 L 21.21875 47.164062 C 21.29900191650291 47.64633753510371 21.716171003072734 47.99989891822272 22.205078 48 L 27.705078 48 C 28.190873624431802 48.00071302418453 28.60692141940177 47.652221407941326 28.691406 47.173828 L 29.751953 41.1875 C 30.920633 40.838997 32.033372 40.369697 33.082031 39.791016 L 38.070312 43.291016 C 38.4677984351913 43.569835678735394 39.00812284248828 43.522886811913494 39.351562 43.179688 L 43.240234 39.287109 C 43.58635884253118 38.940243201970105 43.63018334371835 38.39367949780705 43.34375 37.996094 L 39.787109 33.058594 C 40.355783 32.014958 40.813915 30.908875 41.154297 29.748047 L 47.171875 28.693359 C 47.650268407941326 28.60887441940177 47.99876002418453 28.192826624431802 47.998047 27.707031 L 47.998047 22.207031 C 47.997787676411804 21.717497522999718 47.643207687402 21.300101738345074 47.160156 21.220703 L 41.152344 20.238281 C 40.80968 19.078827 40.350281 17.974723 39.78125 16.931641 L 43.289062 11.933594 C 43.5678816787354 11.536107564808699 43.5209328119135 10.995783157511722 43.177734 10.652344 L 39.287109 6.7636719 C 38.940243125035 6.417547151422113 38.39367942651908 6.3737227776956535 37.996094 6.6601562 L 33.072266 10.201172 C 32.023186 9.6248101 30.909713 9.1579916 29.738281 8.8125 L 28.691406 2.828125 C 28.607763399254416 2.348955125660183 28.191493001530553 1.9994528068422304 27.705078 2 L 22.205078 2 z M 23.056641 4 L 26.865234 4 L 27.861328 9.6855469 C 27.929044914660185 10.075133850801762 28.21995139988209 10.388240873372174 28.603516 10.484375 C 30.066026 10.848832 31.439607 11.426549 32.693359 12.185547 C 33.03600756919579 12.393158782856133 33.46948671765437 12.37624993104274 33.794922 12.142578 L 38.474609 8.7792969 L 41.167969 11.472656 L 37.835938 16.220703 C 37.60857212753903 16.544304584556595 37.593260347032825 16.971497890600585 37.796875 17.310547 C 38.548366 18.561471 39.118333 19.926379 39.482422 21.380859 C 39.579324746181165 21.768029009610615 39.897147002706895 22.06051766497204 40.291016 22.125 L 45.998047 23.058594 L 45.998047 26.867188 L 40.279297 27.871094 C 39.889395381724604 27.940112287248493 39.57692744653398 28.232668148127694 39.482422 28.617188 C 39.122545 30.069817 38.552234 31.434687 37.800781 32.685547 C 37.594606932099026 33.028110531180594 37.6122733133994 33.460551470482464 37.845703 33.785156 L 41.224609 38.474609 L 38.53125 41.169922 L 33.791016 37.84375 C 33.46574854327684 37.615915089932976 33.03649336063164 37.60211770003485 32.697266 37.808594 C 31.44975 38.567585 30.074755 39.148028 28.617188 39.517578 C 28.23551064884404 39.613793579709224 27.94576612243851 39.92494382040216 27.876953 40.3125 L 26.867188 46 L 23.052734 46 L 22.111328 40.337891 C 22.04583842755697 39.94423717216324 21.752592915243802 39.62719420800885 21.365234 39.53125 C 19.90185 39.170557 18.522094 38.59371 17.259766 37.835938 C 16.921191318478126 37.63317307152783 16.49503551308596 37.64847469464101 16.171875 37.875 L 11.46875 41.169922 L 8.7734375 38.470703 L 12.097656 33.824219 C 12.329865105179428 33.498821176556525 12.345994571475426 33.06640157362733 12.138672 32.724609 C 11.372652 31.458855 10.793319 30.079213 10.427734 28.609375 C 10.332183343148055 28.226938415501134 10.020898397848066 27.936303881528456 9.6328125 27.867188 L 4.0019531 26.867188 L 4.0019531 23.052734 L 9.6289062 22.117188 C 10.022025538962975 22.05199479868345 10.33892953298193 21.759645025385023 10.435547 21.373047 C 10.804273 19.898143 11.383325 18.518729 12.146484 17.255859 C 12.35210645597429 16.91710242149066 12.338317911104822 16.48888840616317 12.111328 16.164062 L 8.8261719 11.46875 L 11.523438 8.7734375 L 16.185547 12.105469 C 16.50967768193481 12.336588834455698 16.940015422136796 12.353464924380376 17.28125 12.148438 C 18.536908 11.394293 19.919867 10.822081 21.384766 10.462891 C 21.77403145871616 10.367055127312424 22.068453629887163 10.04803321360581 22.132812 9.6523438 L 23.056641 4 z M 25 17 C 20.593567 17 17 20.593567 17 25 C 17 29.406433 20.593567 33 25 33 C 29.406433 33 33 29.406433 33 25 C 33 20.593567 29.406433 17 25 17 z M 25 19 C 28.325553 19 31 21.674447 31 25 C 31 28.325553 28.325553 31 25 31 C 21.674447 31 19 28.325553 19 25 C 19 21.674447 21.674447 19 25 19 z" stroke-linecap="round" />
                            </g>
                        </svg>
        
                        <span class="mx-3">Настройки</span>
                    </a>
    
                    <a class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-[#5e5e5e] duration-300  hover:bg-opacity-25"
                        href="{{route('/dashboard-logout')}}">
                        <svg id='Logout_Rounded_Left_24' width='24' height='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>
                            <g transform="matrix(0.43 0 0 0.43 12 12)" >
                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" translate(-24.99, -25)" d="M 25 2 C 17.389725 2 10.633395 5.7052643 6.4492188 11.408203 C 6.2248792666953765 11.695340111627546 6.17446280504503 12.081768024907047 6.317622422162685 12.41685200110387 C 6.460782039280341 12.75193597730069 6.7748587365821855 12.982639639991287 7.13742124133953 13.01903163390789 C 7.499983746096875 13.05542362782449 7.853646439046091 12.891743905858696 8.0605469 12.591797 C 11.882371 7.3827357 18.038275 4 25 4 C 36.609534 4 46 13.390466 46 25 C 46 36.609534 36.609534 46 25 46 C 18.038275 46 11.883451 42.617435 8.0605469 37.408203 C 7.853646439046091 37.1082560941413 7.499983746096875 36.94457637217551 7.13742124133953 36.980968366092114 C 6.7748587365821855 37.017360360008716 6.460782039280341 37.24806402269931 6.317622422162685 37.58314799889613 C 6.17446280504503 37.91823197509295 6.2248792666953765 38.304659888372456 6.4492188 38.591797 C 10.634315 44.294565 17.389725 48 25 48 C 37.690466 48 48 37.690466 48 25 C 48 12.309534 37.690466 2 25 2 z M 10.980469 15.990234 C 10.7206702905992 15.997975294585906 10.474090506709873 16.106554684950613 10.292969 16.292969 L 2.3808594 24.205078 C 2.132518321721257 24.394520683571358 1.9869474488697152 24.68911190652127 1.987330693802456 25.001460549295157 C 1.9877139387351965 25.31380919206904 2.134007286128719 25.608042304023293 2.3828125 25.796875 L 10.292969 33.707031 C 10.543785573137152 33.96827179479288 10.916235992218144 34.07350663500295 11.266678051522469 33.98214981098403 C 11.617120110826793 33.89079298696512 11.890792986965119 33.6171201108268 11.982149810984035 33.26667805152247 C 12.07350663500295 32.91623599221815 11.968271794792878 32.54378557313715 11.707031 32.292969 L 5.4140625 26 L 27 26 C 27.360635916577568 26.005100289545485 27.696081364571608 25.815624703830668 27.877887721486516 25.50412715028567 C 28.059694078401428 25.19262959674067 28.059694078401428 24.80737040325933 27.877887721486516 24.49587284971433 C 27.696081364571608 24.184375296169332 27.360635916577568 23.994899710454515 27 24 L 5.4140625 24 L 11.707031 17.707031 C 12.00279153364512 17.41953966716823 12.091720003978844 16.979965023872836 11.930965816124152 16.60011814577245 C 11.770211628269458 16.22027126767206 11.392752556125291 15.978075502390679 10.980469 15.990234 z" stroke-linecap="round" />
                            </g>
                        </svg>
        
                        <span class="mx-3">Выйти</span>
                    </a>
                </nav>
            </div>
            <div class="flex flex-col flex-1 overflow-hidden rounded">
                <header class="flex items-center justify-between px-6 py-4 bg-white border-b-4">
                    <div class="flex items-center">
                        <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                        </button>
                    </div>
                </header>
                <main class="flex-1 overflow-x-hidden overflow-y-auto rounded">
                    <div class="container px-6 py-8 mx-auto rounded">
                        <h3 class="text-3xl font-medium text-gray-700">Ваши заказы</h3>
                        <h4 class="text-l font-medium text-gray-700">
                            Здесь вы можете найти свои заказы, отследить их статус и просмотреть содержание
                        </h4>
    
                        <div class="mt-8">
        
                        </div>
        
                        <div class="flex flex-col mt-8 rounded">
                            <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8 rounded">
                                <div
                                    class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
    
                                    <div class="bg-white overflow-hidden shadow rounded-lg border">
                                        <div class="px-4 py-5 sm:px-6">
                                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                                Ваш профиль
                                            </h3>
                                            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                                Немного информации о вашем аккаунте
                                            </p>
                                        </div>
                                        <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                                            <dl class="sm:divide-y sm:divide-gray-200">
                                                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-sm font-medium text-gray-500">
                                                        ФИО
                                                    </dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{auth()->user()->fio}}
                                                    </dd>
                                                </div>
                                                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-sm font-medium text-gray-500">
                                                        Почтовый адрес
                                                    </dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{auth()->user()->email}}
                                                    </dd>
                                                </div>
                                                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-sm font-medium text-gray-500">
                                                        Номер телефона
                                                    </dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{auth()->user()->tel}}
                                                    </dd>
                                                </div>
                                                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-sm font-medium text-gray-500">
                                                        Статус
                                                    </dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        @if (auth()->user()->getRoles()->where('slug', 'admin')->count() > 0)
                                                            Администратор
    
                                                        @elseif (auth()->user()->getRoles()->where('slug', 'graduate')->count() > 0)
                                                            Выпускник
                                                        @else
                                                            Пользователь
                                                        @endif
                                                    </dd>
                                                </div>
                                            </dl>
                                        </div>
    
                                        <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                                            <dl class="sm:divide-y sm:divide-gray-200">
                                                <div class="py-4 sm:py-5 sm:px-4">
                                                    <a class="text-center border-[#5e5e5e] border-2 py-4 px-8 rounded text-[#5e5e5e] hover:bg-[#5e5e5e] hover:text-[#ffffff] duration-300" href="#">Настройки</a>
                                                </div>
                                            </dl>
                                        </div>
    
                                    </div>
    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</x-guest-layout>    