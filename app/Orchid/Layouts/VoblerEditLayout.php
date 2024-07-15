<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;

class VoblerEditLayout extends Rows
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields(): iterable
    {
        return [
            Input::make('vobler.title')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Заголовок'))
                ->placeholder(__('')),

            Input::make('vobler.background_color')
                ->type('color')
                ->required()
                ->title(__('Цвет заднего фона'))
                ->placeholder(__('')),

            Input::make('vobler.color')
                ->type('color')
                ->required()
                ->title(__('Цвет текста'))
                ->placeholder(__('')),
        ];
    }
}
