<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;

class BannerEditLayout extends Rows
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
            Input::make('banner.title')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Заголовок'))
                ->placeholder(__('')),

            Input::make('banner.description')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Описание'))
                ->placeholder(__('')),

            Input::make('banner.button_text')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Надпись на кнопке'))
                ->placeholder(__('')),

            Input::make('banner.button_link')
                ->type('url')
                ->max(255)
                ->required()
                ->title(__('Ссылка, на которую переадресует кнопка'))
                ->help('Вводите в формате https://ссылка')
                ->placeholder(__('https://')),
        
            Cropper::make('banner.image')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Изображение баннера'))
                ->width(1920)
                ->height(1080),
        ];
    }
}
