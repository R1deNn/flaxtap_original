<?php

namespace App\Orchid\Screens;

use App\Models\Vobler;
use App\Orchid\Layouts\VoblerEditLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class VoblerEditScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public $vobler;

    public function query(Vobler $vobler): iterable
    {
        return [
            'vobler'       => $vobler,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->vobler->exists ? 'Редактирование CTA' : 'Создание CTA';
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
            Layout::block(VoblerEditLayout::class)
                ->title(__('Информация о CTA'))
                ->description(__('Обновите информацию о CTA'))
                ->commands(
                    Button::make(__('Save'))
                        ->type(Color::BASIC)
                        ->icon('bs.check-circle')
                        ->canSee($this->vobler->exists)
                        ->method('save')
                ),
        ];
    }

    public function save(Vobler $vobler, Request $request)
    {
        $vobler
            ->fill($request->collect('vobler')->except(['vobler.title', 'vobler.background_color', 'vobler.color'])->toArray())
            ->save();

        Toast::info(__('CTA сохранен'));

        return redirect()->route('platform.voblers');
    }
}
