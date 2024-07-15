<?php

namespace App\Orchid\Layouts;

use App\Models\Shop;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Components\Cells\DateTimeSplit;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ShopTable extends Table
{
    /**
     * @var string
     */
    public $target = 'shop';

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('image', __('Изображение'))
            ->cantHide()
            ->style('width: 150px')
            ->render(fn (Shop $shop) =>
            "<img src='..$shop->image'
                      class='d-block img-fluid rounded-1 h-30 w-30'>
                    "),

            TD::make('title', __('Название'))
                ->sort()
                ->align(TD::ALIGN_CENTER)
                ->cantHide(),

            TD::make('default_price', __('Обычная цена'))
                ->sort()
                ->cantHide()
                ->align(TD::ALIGN_CENTER)
                ->render(function (Shop $shop) {
                    return $shop->default_price . ' ₽';
                }),

            TD::make('price_student', __('Цена для выпускников'))
                ->sort()
                ->cantHide()
                ->align(TD::ALIGN_CENTER)
                ->render(function (Shop $shop) {
                    return $shop->price_student . ' ₽';
                }),

            TD::make('price_opt_student', __('Оптовая цена для выпускников'))
                ->sort()
                ->cantHide()
                ->align(TD::ALIGN_CENTER)
                ->render(function (Shop $shop) {
                    return $shop->price_opt_student . ' ₽';
                }),

            TD::make('amount', __('Остаток'))
                ->sort()
                ->align(TD::ALIGN_CENTER)
                ->cantHide(),

            TD::make('active', __('Статус'))
                ->sort()
                ->cantHide()
                ->align(TD::ALIGN_CENTER)
                ->render(function (Shop $shop) {
                    $statusClass = $shop->active ? '#29ab76' : '#dc143c';
                    return '<div style="width: 1rem; height: 1rem; background-color: ' . $statusClass . '" class="rounded bg-' . $statusClass . '"></div> ';
                }),

            TD::make('created_at', __('Created'))
                ->usingComponent(DateTimeSplit::class)
                ->align(TD::ALIGN_RIGHT)
                ->defaultHidden()
                ->sort(),

            TD::make('updated_at', __('Last edit'))
                ->usingComponent(DateTimeSplit::class)
                ->align(TD::ALIGN_RIGHT)
                ->sort(),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Shop $shop) => DropDown::make()
                    ->icon('bs.three-dots-vertical')
                    ->list([

                        Link::make(__('Редактировать'))
                            ->route('platform.shop.edit', $shop->id)
                            ->icon('bs.pencil'),

                        Button::make(__('Архивировать'))
                            ->icon('bs.trash3')
                            ->confirm(__('Как только вы архивируете товар, он будет недоступен пользователям для покупки. (Вы сможете восстановить его).'))
                            ->method('remove', [
                                'id' => $shop->id,
                            ]),
                    ])),
        ];
    }
}
