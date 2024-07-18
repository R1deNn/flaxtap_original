<?php

namespace App\Orchid\Layouts;

use App\Models\Order;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class OrdersTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'orders';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', __('Идентификатор'))
            ->cantHide()
            ->sort()
            ->align(TD::ALIGN_CENTER),

            TD::make('fio', __('ФИО'))
            ->cantHide()
            ->sort()
            ->align(TD::ALIGN_CENTER),

            TD::make('tel', __('Телефон'))
                ->sort()
                ->align(TD::ALIGN_CENTER)
                ->cantHide(),

            TD::make('vk', __('ВКонтакте'))
                ->sort()
                ->align(TD::ALIGN_CENTER)
                ->render(function (Order $order) {
                    return "<a target='_blank' href='$order->vk'>Перейти</a>";
                }),

            TD::make('active', __('Статус'))
                ->sort()
                ->cantHide() 
                ->render(function (Order $order) {
                    if($order->status == 0) {
                        $statusClass = '#8B0000';
                    } elseif($order->status == 1) {
                        $statusClass = '#F0E68C';
                    } elseif($order->status == 2) {
                        $statusClass = '#708090';
                    } elseif($order->status == 3) {
                        $statusClass = '#008000';
                    } else {
                        $statusClass = '#000000';
                    }
                    return '<div style="width: 1rem; height: 1rem; background-color: ' . $statusClass . '" class="rounded bg-' . $statusClass . '"></div> ';
                }),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Order $order) => DropDown::make()
                    ->icon('bs.three-dots-vertical')
                    ->list([

                        Link::make(__('Подробнее'))
                            ->route('platform.order.edit', $order->id)
                            ->icon('bs.eye'),

                        Button::make(__('В обработке'))
                            ->icon('bs.stopwatch')
                            ->method('changeStatus', [
                                'id' => $order->id,
                                'status' => 1,
                            ]),

                        Button::make(__('В пути'))
                            ->icon('bs.truck')
                            ->method('changeStatus', [
                                'id' => $order->id,
                                'status' => 2,
                            ]),

                        Button::make(__('Выполнен'))
                            ->icon('bs.check2-all')
                            ->method('changeStatus', [
                                'id' => $order->id,
                                'status' => 3,
                            ]),

                        Button::make(__('Удалить'))
                            ->icon('bs.ban')
                            ->confirm(__('Как только вы отмените заказ, его нельзя будет восстановить.'))
                            ->method('changeStatus', [
                                'id' => $order->id,
                                'status' => 4,
                            ]),
                    ])),
        ];
    }
}
