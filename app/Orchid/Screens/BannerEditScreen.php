<?php

namespace App\Orchid\Screens;

use App\Models\Banner;
use App\Orchid\Layouts\BannerEditLayout;
use Illuminate\Http\Request;
use Orchid\Alert\Toast;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast as FacadesToast;

class BannerEditScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Banner $banner): iterable
    {
        return [
            'banner' => $banner,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Редактирование баннера';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make(__('Save'))
                ->icon('bs.check-circle')
                ->method('save'),
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
            Layout::block(BannerEditLayout::class)
            ->title(__('Информация о товаре'))
            ->description(__('Обновите информацию о баннере'))
            ->commands(
                Button::make(__('Save'))
                    ->type(Color::BASIC)
                    ->icon('bs.check-circle')
                    ->method('save')
            ),
        ];
    }

    public function save(Banner $banner, Request $request)
    {
        $banner
            ->fill($request->collect('banner')->except(['banner.title', 'banner.description', 'banner.button_text', 'banner.button_link', 'banner.image'])->toArray())
            ->save();

        FacadesToast::info(__('Баннер обновлен'));

        return redirect()->route('platform.banners');
    }
}
