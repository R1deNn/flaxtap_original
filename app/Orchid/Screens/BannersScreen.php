<?php

namespace App\Orchid\Screens;

use App\Models\Banner;
use App\Orchid\Layouts\BannersTable;
use Orchid\Screen\Screen;

class BannersScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'banners' => Banner::query()
            ->paginate(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Баннеры на сайте';
    }

    public function description(): ?string
    {
        return 'Здесь вы можете отредактировать баннеры, которые присутствуют на сайте (пока-что только на главной)';
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
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            BannersTable::class,
        ];
    }
}
