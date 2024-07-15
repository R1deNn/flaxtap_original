<?php

namespace App\Orchid\Layouts;

use App\Models\Category;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class CategorysTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'categorys';

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
            ->render(fn (Category $category) =>
            "<img src='..$category->image'
                      class='d-block img-fluid rounded-1 h-30 w-30'>
                    "),

            TD::make('title', __('Название'))
                ->sort()
                ->align(TD::ALIGN_CENTER)
                ->cantHide(),

            TD::make('active', __('Статус'))
                ->sort()
                ->cantHide()
                ->render(function (Category $category) {
                    $statusClass = $category->active ? '#29ab76' : '#dc143c';
                    return '<div style="width: 1rem; height: 1rem; background-color: ' . $statusClass . '" class="rounded bg-' . $statusClass . '"></div> ';
                }),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Category $category) => DropDown::make()
                    ->icon('bs.three-dots-vertical')
                    ->list([

                        Link::make(__('Редактировать'))
                            ->route('platform.category.edit', $category->id)
                            ->icon('bs.pencil'),

                        Button::make(__('Архивировать'))
                            ->icon('bs.trash3')
                            ->confirm(__('Как только вы архивируете товар, он будет недоступен пользователям для покупки. (Вы сможете восстановить его).'))
                            ->method('remove', [
                                'id' => $category->id,
                            ]),
                    ])),
        ];
    }
}
