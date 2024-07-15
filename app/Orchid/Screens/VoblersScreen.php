<?php

namespace App\Orchid\Screens;

use App\Models\Vobler;
use App\Orchid\Layouts\VoblersTable;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class VoblersScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'voblers' => Vobler::query()
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
        return 'Управление CTA';
    }

    public function description(): string
    {
        return 'CTA - это лычки, которые отображаются на картинке товара';
    }


    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make(__('Add'))
                ->icon('bs.plus-circle')
                ->route('platform.vobler.create'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            VoblersTable::class,
        ];
    }
}
