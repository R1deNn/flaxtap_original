<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\User;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;

class UserEditLayout extends Rows
{
    /**
     * The screen's layout elements.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Input::make('user.fio')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Fio'))
                ->placeholder(__('Fio')),

            Input::make('user.email')
                ->type('email')
                ->required()
                ->title(__('Email'))
                ->placeholder(__('Email')),

            Cropper::make('user.certificate')
                ->type('Изображение сертификата')
                ->title(__('Изображение сертификата'))
                ->placeholder(__('Изображение сертификата')),
        ];
    }
}
