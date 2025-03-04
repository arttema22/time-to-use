<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\System;

use App\Models\Option;

use MoonShine\Support\ListOf;
use MoonShine\UI\Fields\Date;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Switcher;
use MoonShine\Laravel\Enums\Action;
use MoonShine\Support\Enums\PageType;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Fields\Textarea;

/**
 * @extends ModelResource<Option>
 */
class OptionResource extends ModelResource
{
    protected ?string $alias = 'options';

    protected string $model = Option::class;

    public function getTitle(): string
    {
        return __('moonshine::ui.resource.options');
    }

    protected string $column = 'name';

    protected string $sortColumn = 'name';

    protected bool $columnSelection = true;

    protected ?PageType $redirectAfterSave = PageType::INDEX;

    protected function activeActions(): ListOf
    {
        return parent::activeActions()->except(Action::MASS_DELETE);
    }

    protected bool $createInModal = true;

    protected bool $editInModal = true;

    protected bool $detailInModal = true;

    protected bool $stickyButtons = true;

    public function indexFields(): iterable
    {
        return [
            Text::make('name')->required()->sortable()->sticky()->columnSelection(false)->translatable('moonshine::ui.resource'),
            Textarea::make('description')->translatable('moonshine::ui.resource'),
            Date::make('date_from')->translatable('moonshine::ui.resource'),
            Date::make('date_to')->translatable('moonshine::ui.resource'),
            Switcher::make('flag_activity')->sortable()->translatable('moonshine::ui.resource'),
        ];
    }

    public function formFields(): iterable
    {
        return [
            Box::make([
                ...$this->indexFields()
            ])
        ];
    }

    public function detailFields(): iterable
    {
        return [
            ...$this->indexFields()
        ];
    }

    public function rules(mixed $item): array
    {
        return [
            'name' => ['string', 'required'],
            'description' => ['string', 'nullable'],
            'date_from' => ['string', 'nullable'],
            'date_to' => ['string', 'nullable'],
        ];
    }
}
