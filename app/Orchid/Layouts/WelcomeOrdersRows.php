<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Chart;
use Orchid\Screen\Layouts\Rows;

class WelcomeOrdersRows extends Chart
{
    /**
     * Add a title to the Chart.
     * 
     * @var string
     */
    protected $title = 'Всего пользователей';
    protected $description = 'Удобный график, в котором показана динамика зарегистрировавшихся пользователей за месяц';

    /**
     * Available options:
     * 'bar', 'line', 
     * 'pie', 'percentage'
     *
     * @var string
     */
    protected $type = 'line';

    protected $colors = [
        '#D5D5D5',
    ];

    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the charts.
     *
     * @var string
     */
    protected $target = 'orders';
}
