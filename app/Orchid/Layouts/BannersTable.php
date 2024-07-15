<?php

namespace App\Orchid\Layouts;

use App\Models\Banner;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class BannersTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'banners';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('image', __('Изображение'))
            ->cantHide()
            ->style('width: 150px')
            ->render(fn (Banner $banner) =>
            "<img src='$banner->image'
                      class='d-block img-fluid rounded-1 h-30 w-30'>
                    "),

            TD::make('title', __('Заголовок'))
                ->sort()
                ->cantHide(),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Banner $banner) => DropDown::make()
                    ->icon('bs.three-dots-vertical')
                    ->list([

                        Link::make(__('Редактировать'))
                            ->route('platform.banner.edit', $banner->id)
                            ->icon('bs.pencil'),
                    ])),
        ];
    }
}
