<?php

namespace App\Orchid\Layouts;

use App\Models\Vobler;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Components\Cells\DateTimeSplit;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class VoblersTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'voblers';

    public $title;

    /**
     * @var string
     */
    public $backgroundColor;

    /**
     * @var string
     */
    public $textColor;

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    public function render(): string
    {
        return "<div style='background-color: $this->backgroundColor; color: $this->textColor;'>$this->title</div>";
    }

    protected function columns(): iterable
    {
        return [
            TD::make('title', __('Название'))
            ->sort()
            ->align(TD::ALIGN_CENTER)
            ->cantHide(),

            TD::make('title', __('Предпросмотр'))->render(function ($vobler) {
                return Button::make($vobler->title)
                    ->style('background-color: ' . $vobler->background_color . '; color: ' . $vobler->color)
                    ->render();
            })
            ->sort()
            ->align(TD::ALIGN_CENTER)
            ->cantHide(),
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
                ->render(fn (Vobler $vobler) => DropDown::make()
                    ->icon('bs.three-dots-vertical')
                    ->list([

                        Link::make(__('Редактировать'))
                            ->route('platform.vobler.edit', $vobler->id)
                            ->icon('bs.pencil'),

                        Button::make(__('Архивировать'))
                            ->icon('bs.trash3')
                            ->confirm(__('Как только вы архивируете товар, он будет недоступен пользователям для покупки. (Вы сможете восстановить его).'))
                            ->method('remove', [
                                'id' => $vobler->id,
                            ]),
                    ])),
        ];
    }
}
