@section('title', 'Главная')
<x-guest-layout>
    <section class="relative h-screen flex flex-col items-center justify-center text-center text-white ">
        <div class="video-docker absolute top-0 left-0 w-full h-full overflow-hidden">
            <img class="min-w-full min-h-full absolute object-cover"
                src="{{$banner->image}}"
                type="video/mp4" autoplay muted loop></img>
        </div>
        <div class="video-content space-y-2 z-10">
            <h1 class="font-bold text-6xl">{{$banner->title}}</h1>
            <h3 class="font-light text-3xl">{{$banner->description}}</h3>
            <div class="py-5">
                <a href="{{$banner->button_link}}" class="text-white-700 border border-white-700 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-5 text-center me-2 mb-2 dark:border-blue-500">{{$banner->button_text}}</a>
            </div>
        </div>
    </section>

    <div class="2xl:container 2xl:mx-auto">
        <div class="lg:px-20 md:px-6 px-4 md:py-12 py-8">
            <div>
                <h1 class="text-3xl lg:text-4xl font-semibold text-[#5e5e5e] text-left">БЕСТСЕЛЛЕРЫ</h1>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 mt-8 md:mt-10">
                <div class="bg-gray-50 dark:bg-gray-800 p-8">
                    <div class="">
                        <h2 class="text-xl text-gray-600 dark:text-white">Lounge Chair</h2>
                        <p class="text-xl font-semibold text-gray-800 dark:text-white mt-2">123 руб.</p>
                    </div>
                    <div class="flex justify-center items-center mt-8 md:mt-24">
                        <img class="" src="https://i.ibb.co/WBdnRqb/eugene-chystiakov-3ne-Swyntb-Q8-unsplash-1-removebg-preview-2-1.png" alt="A chair with wooden legs" role="img" />
                    </div>
                    <div class="flex justify-end items-center space-x-2 mt-8 md:mt-24">
                        <a href="#" aria-label="show in white color" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-600 rounded">
                            <svg width="32px" height="32px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.00014 14H18.1359C19.1487 14 19.6551 14 20.0582 13.8112C20.4134 13.6448 20.7118 13.3777 20.9163 13.0432C21.1485 12.6633 21.2044 12.16 21.3163 11.1534L21.9013 5.88835C21.9355 5.58088 21.9525 5.42715 21.9031 5.30816C21.8597 5.20366 21.7821 5.11697 21.683 5.06228C21.5702 5 21.4155 5 21.1062 5H4.50014M2 2H3.24844C3.51306 2 3.64537 2 3.74889 2.05032C3.84002 2.09463 3.91554 2.16557 3.96544 2.25376C4.02212 2.35394 4.03037 2.48599 4.04688 2.7501L4.95312 17.2499C4.96963 17.514 4.97788 17.6461 5.03456 17.7462C5.08446 17.8344 5.15998 17.9054 5.25111 17.9497C5.35463 18 5.48694 18 5.75156 18H19M7.5 21.5H7.51M16.5 21.5H16.51M8 21.5C8 21.7761 7.77614 22 7.5 22C7.22386 22 7 21.7761 7 21.5C7 21.2239 7.22386 21 7.5 21C7.77614 21 8 21.2239 8 21.5ZM17 21.5C17 21.7761 16.7761 22 16.5 22C16.2239 22 16 21.7761 16 21.5C16 21.2239 16.2239 21 16.5 21C16.7761 21 17 21.2239 17 21.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                        <a href="#" aria-label="show in black color" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-600 rounded">
                            <svg width="32px" height="32px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.1111 3C19.6333 3 22 6.3525 22 9.48C22 15.8138 12.1778 21 12 21C11.8222 21 2 15.8138 2 9.48C2 6.3525 4.36667 3 7.88889 3C9.91111 3 11.2333 4.02375 12 4.92375C12.7667 4.02375 14.0889 3 16.1111 3Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="2xl:container 2xl:mx-auto">
        <div class="lg:px-20 md:px-6 px-4 md:py-12 py-8">
            <div>
                <h1 class="text-3xl lg:text-4xl font-semibold text-[#5e5e5e] text-left">СКИДКИ</h1>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 mt-8 md:mt-10">
                <div class="bg-gray-50 dark:bg-gray-800 p-8">
                    <div class="">
                        <h2 class="text-xl text-gray-600 dark:text-white">Lounge Chair</h2>
                        <p class="text-xl font-semibold text-gray-800 dark:text-white mt-2">123 руб.</p>
                    </div>
                    <div class="flex justify-center items-center mt-8 md:mt-24">
                        <img class="" src="https://i.ibb.co/WBdnRqb/eugene-chystiakov-3ne-Swyntb-Q8-unsplash-1-removebg-preview-2-1.png" alt="A chair with wooden legs" role="img" />
                    </div>
                    <div class="flex justify-end items-center space-x-2 mt-8 md:mt-24">
                        <a href="#" aria-label="show in white color" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-600 rounded">
                            <svg width="32px" height="32px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.00014 14H18.1359C19.1487 14 19.6551 14 20.0582 13.8112C20.4134 13.6448 20.7118 13.3777 20.9163 13.0432C21.1485 12.6633 21.2044 12.16 21.3163 11.1534L21.9013 5.88835C21.9355 5.58088 21.9525 5.42715 21.9031 5.30816C21.8597 5.20366 21.7821 5.11697 21.683 5.06228C21.5702 5 21.4155 5 21.1062 5H4.50014M2 2H3.24844C3.51306 2 3.64537 2 3.74889 2.05032C3.84002 2.09463 3.91554 2.16557 3.96544 2.25376C4.02212 2.35394 4.03037 2.48599 4.04688 2.7501L4.95312 17.2499C4.96963 17.514 4.97788 17.6461 5.03456 17.7462C5.08446 17.8344 5.15998 17.9054 5.25111 17.9497C5.35463 18 5.48694 18 5.75156 18H19M7.5 21.5H7.51M16.5 21.5H16.51M8 21.5C8 21.7761 7.77614 22 7.5 22C7.22386 22 7 21.7761 7 21.5C7 21.2239 7.22386 21 7.5 21C7.77614 21 8 21.2239 8 21.5ZM17 21.5C17 21.7761 16.7761 22 16.5 22C16.2239 22 16 21.7761 16 21.5C16 21.2239 16.2239 21 16.5 21C16.7761 21 17 21.2239 17 21.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                        <a href="#" aria-label="show in black color" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-600 rounded">
                            <svg width="32px" height="32px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.1111 3C19.6333 3 22 6.3525 22 9.48C22 15.8138 12.1778 21 12 21C11.8222 21 2 15.8138 2 9.48C2 6.3525 4.36667 3 7.88889 3C9.91111 3 11.2333 4.02375 12 4.92375C12.7667 4.02375 14.0889 3 16.1111 3Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="bg-[#d7d7d7]">
        <div class="mx-auto w-full max-w-7xl px-5 md:px-10 py-6">
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