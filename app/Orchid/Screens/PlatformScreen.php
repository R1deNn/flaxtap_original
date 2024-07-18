<?php

declare(strict_types=1);

namespace App\Orchid\Screens;

use App\Models\Order;
use App\Models\Shop;
use App\Models\User;
use App\Orchid\Layouts\WelcomeOrdersRows;
use App\Orchid\Layouts\WelcomeRowsLayout;
use App\Orchid\Layouts\WelcomeShopsRows;
use App\Orchid\Layouts\WelcomeSumRows;
use Carbon\Carbon;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class PlatformScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'users' => [
                User::countByDays()->toChart('Пользователей'),
            ],
            'orders' => [
                Order::countByDays()->toChart('Заказов'),
            ],
            'products' => [
                Shop::countByDays()->toChart('Товаров'),
            ],
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Панель администратора';
    }

    /**
     * Display header description.
     */
    public function description(): ?string
    {
        $time = date('H');
        if ($time < 10) {
            return 'Доброе утро, '.auth()->user()->fio.'!';
        } elseif ($time >= 10 && $time < 17) {
            return 'Добрый день, '.auth()->user()->fio.'!';
        } else {
            return 'Доброй ночи, '.auth()->user()->fio.'!';
        }
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            Layout::view('platform::partials.update-assets'),
            WelcomeRowsLayout::class,
            WelcomeOrdersRows::class,
            WelcomeShopsRows::class,
        ];
    }
}
