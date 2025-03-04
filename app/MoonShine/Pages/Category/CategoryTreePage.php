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
use MoonShine\UI\Components\Heading;
use MoonShine\UI\Fields\Textarea;

class CategoryTreePage extends IndexPage
{
    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function fields(): iterable
    {
        return [
            Text::make('name')->sortable()->sticky()->columnSelection(false)->translatable('moonshine::ui.resource'),
            Textarea::make('description')->translatable('moonshine::ui.resource'),
            Text::make('code_type_category')->translatable('moonshine::ui.resource'),
            Date::make('date_from')->translatable('moonshine::ui.resource'),
            Date::make('date_to')->translatable('moonshine::ui.resource'),
            Textarea::make('comment')->translatable('moonshine::ui.resource'),
            Switcher::make('flag_activity')->sortable()->translatable('moonshine::ui.resource'),
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
            // ...$this->getPageButtons(),
            Heading::make('Sorting')->tag('h1'),
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
