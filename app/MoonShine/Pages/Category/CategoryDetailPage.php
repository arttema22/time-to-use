<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Category;

use Throwable;
use MoonShine\UI\Fields\Date;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Switcher;
use MoonShine\UI\Fields\Textarea;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Laravel\Pages\Crud\DetailPage;
use MoonShine\Contracts\UI\ComponentContract;


class CategoryDetailPage extends DetailPage
{
    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function fields(): iterable
    {
        return [
            Text::make('name')->required()->translatable('moonshine::ui.resource'),
            Textarea::make('description')->translatable('moonshine::ui.resource'),
            Text::make('code_type_category')->translatable('moonshine::ui.resource'),
            Date::make('date_from')->translatable('moonshine::ui.resource'),
            Date::make('date_to')->translatable('moonshine::ui.resource'),
            Textarea::make('comment')->translatable('moonshine::ui.resource'),
            Switcher::make('flag_activity')->translatable('moonshine::ui.resource'),
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
            ...parent::mainLayer()
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
