<?php

namespace App\Orchid\Screens;

use App\Models\Shop;
use App\Orchid\Layouts\ShopEditLayout;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Illuminate\Http\Request;
use Orchid\Support\Color;
use Orchid\Support\Facades\Toast;

class ShopEditScreen extends Screen
{
    /**
     * @var Shop
     */
    public $shop;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Shop $shop): iterable
    {
        return [
            'shop'       => $shop,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return $this->shop->exists ? 'Редактирование товара' : 'Создание товара';
    }

    /**
     * Display header description.
     */
    public function description(): ?string
    {
        return 'Здесь вы можете отредактировать товар, либо создать новый.';
    }

    public function permission(): ?iterable
    {
        return [
            'platform.systems.users',
        ];
    }

    /**
     * The screen's action buttons.
     *
     * @return Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make(__('Save'))
                ->icon('bs.check-circle')
                ->method('save'),
        ];
    }

    /**
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            Layout::block(ShopEditLayout::class)
                ->title(__('Информация о товаре'))
                ->description(__('Обновите информацию о товаре'))
                ->commands(
                    Button::make(__('Save'))
                        ->type(Color::BASIC)
                        ->icon('bs.check-circle')
                        ->canSee($this->shop->exists)
                        ->method('save')
                ),
        ];
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Shop $shop, Request $request)
    {
        $shop
            ->fill($request->collect('shop')->except(['shop.id_category', 'shop.title', 'shop.description', 'shop.default_price', 'shop.price_student', 'shop.price_opt_student', 'shop.amount', 'shop.image'])->toArray())
            ->save();

        Toast::info(__('Товар сохранен'));

        return redirect()->route('platform.shop');
    }
}
