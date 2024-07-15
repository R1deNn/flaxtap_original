<?php

namespace App\Orchid\Layouts;

use App\Models\Category;
use App\Models\Shop;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\TD;

class ShopEditLayout extends Rows
{
    /**
     * The screen's layout elements.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Input::make('shop.title')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Заголовок'))
                ->placeholder(__('')),

            Select::make('shop.id_category')
                ->title('Выберите категорию')
                ->empty('Не выбрано', 0)
                ->fromQuery(Category::where('active', '!=', '0'), 'title', 'id'),
            
            TextArea::make('shop.description')
                ->type('text')
                ->required()
                ->title(__('Описание'))
                ->rows(5)
                ->placeholder(__('')),
            
            Input::make('shop.default_price')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Цена по умолчанию'))
                ->placeholder(__('1000')),

            Input::make('shop.price_student')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Цена для выпускников'))
                ->placeholder(__('800')),

            Input::make('shop.price_opt_student')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Оптовая цена для выпускников'))
                ->placeholder(__('500')),

            Input::make('shop.amount')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Количество'))
                ->placeholder(__('128')),

            Cropper::make('shop.image')
                ->title(__('Изображение'))
                ->width(1000)
                ->height(1000)
                ->targetRelativeUrl(),
        ];
    }
}
