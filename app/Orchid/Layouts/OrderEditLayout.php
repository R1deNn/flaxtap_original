<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\Actions\Link;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class OrderEditLayout extends Rows
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
        return[
            Input::make('orders.id')
                ->align('center')
                ->width('100px'),

            Input::make('OrderDetails.id')
                ->align('center')
                ->render(function ($order) {
                    return Link::make($order->id)
                        ->route('platform.order.edit', $order->id);
                }),
        ];
    }
}
