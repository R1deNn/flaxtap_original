<?php

namespace App\Orchid\Screens;

use App\Models\Order;
use App\Orchid\Layouts\OrdersTable;
use Illuminate\Http\Request;
use Orchid\Screen\Layouts\Modal;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class OrdersScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'orders' => Order::query()
            ->paginate(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Заказы';
    }

    public function description(): string
    {
        return "Здесь находятся заказы, которые совершили пользователи. Цвета статусов: ";
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            OrdersTable::class,
            Layout::modal('exampleModal', [
                Layout::rows([
                    
                ]),
            ])->size(Modal::SIZE_LG)->closeButton('Закрыть')->withoutApplyButton()->title('Подробнее о заказе'),
        ];
    }

    public function changeStatus(Request $request): void
    {
        Order::findOrFail($request->get('id'))->update(['status' => $request->get('status')]);

        Toast::info(__('Статус изменен'));
    }
}
