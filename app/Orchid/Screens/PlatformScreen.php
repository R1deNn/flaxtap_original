<?php

declare(strict_types=1);

namespace App\Orchid\Screens;

use App\Orchid\Layouts\WelcomeRowsLayout;
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
            'charts' => [
                [
                    'name'   => 'Some Data',
                    'values' => [25, 40, 30, 35, 8, 52, 17],
                    'labels' => ['12am-3am', '3am-6am', '6am-9am', '9am-12pm', '12pm-3pm', '3pm-6pm', '6pm-9pm'],
                ],
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
        ];
    }
}
