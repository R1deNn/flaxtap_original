<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Chart;
use Orchid\Screen\Layouts\Rows;

class WelcomeRowsLayout extends Chart
{
    /**
     * Add a title to the Chart.
     * 
     * @var string
     */
    protected $title = 'Максимальное количество поситителей в день';

    /**
     * Available options:
     * 'bar', 'line', 
     * 'pie', 'percentage'
     *
     * @var string
     */
    protected $type = 'bar';

    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the charts.
     *
     * @var string
     */
    protected $target = 'charts';
}
