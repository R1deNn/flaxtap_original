<?php

namespace App\Orchid\Screens;

use App\Models\Category;
use App\Orchid\Layouts\CategoryEditLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class CategoryEditScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */

    public $category;
    public function query(Category $category): iterable
    {
        return [
            'category' => $category,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->category->exists ? 'Редактирование товара' : 'Создание товара';
    }

    /**
     * Display header description.
     */
    public function description(): ?string
    {
        return 'Здесь вы можете отредактировать товар, либо создать новый.';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
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
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::block(CategoryEditLayout::class)
                ->title(__('Информация о товаре'))
                ->description(__('Обновите информацию о товаре'))
                ->commands(
                    Button::make(__('Save'))
                        ->type(Color::BASIC)
                        ->icon('bs.check-circle')
                        ->canSee($this->category->exists)
                        ->method('save')
                ),
        ];
    }

    public function save(Category $category, Request $request)
    {
        $category
            ->fill($request->collect('category')->except(['category.title', 'category.image'])->toArray())
            ->save();

        Toast::info(__('Категория сохранена'));

        return redirect()->route('platform.categorys');
    }
}
