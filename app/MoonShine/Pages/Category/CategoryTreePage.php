<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Category;

use Throwable;
use MoonShine\UI\Fields\Date;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Switcher;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Laravel\Pages\Crud\IndexPage;
use MoonShine\Contracts\UI\ComponentContract;
use Leeto\MoonShineTree\View\Components\TreeComponent;
use MoonShine\UI\Fields\Textarea;

class CategoryTreePage extends IndexPage
{
    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function fields(): iterable
    {
        return [
            Text::make('name')->sticky(),
            Textarea::make('description'),
            Text::make('code_type_category'),
            Date::make('date_from'),
            Date::make('date_to'),
            Text::make('comment'),
            //Text::make('attribute1', 'attribute1'),
            //Text::make('attribute2', 'attribute2'),
            //Text::make('attribute3', 'attribute3'),
            Switcher::make('flag_activity')->sortable(),
        ];
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function topLayer(): array
    {
        return [
            ...parent::topLayer()
        ];
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function mainLayer(): array
    {
        return [
            ...parent::mainLayer(),
            ...$this->getPageButtons(),
            TreeComponent::make($this->getResource()),
        ];
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function bottomLayer(): array
    {
        return [
            ...parent::bottomLayer()
        ];
    }
}
