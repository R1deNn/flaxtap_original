<?php

namespace App\Orchid\Screens;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Shop;
use App\Orchid\Layouts\OrderEditLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Actions\Link;
use Orchid\Support\Facades\Layout;

class OrderEditScreen extends Screen
{
    /**
     * @var Order
    */

    public $order;
    public $orderDetails;

    public function query(Order $order): iterable
    {
        $order_detail = OrderDetail::where('order_id', $order->id)->get();
        return [
            'orders' => $order,
            'orderDetails' => $order_detail
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Управление заказом';
    }

    public function description(): string
    {
        return 'Здесь вы можете отредактировать/посмотреть заказ';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make(__('Выйти'))
                ->icon('bs.arrow-left')
                ->method('back'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::view('check-order-admin'),
        ];
    }

    public function back(Request $request)
    {
        return redirect()->route('platform.orders');
    }
}
