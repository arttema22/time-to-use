<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\System;

use App\Models\Piers;
use MoonShine\Support\ListOf;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Switcher;
use MoonShine\Laravel\Enums\Action;
use MoonShine\Support\Enums\PageType;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Fields\Textarea;

class PiersResource extends ModelResource
{
    protected ?string $alias = 'piers';

    protected string $model = Piers::class;

    public function getTitle(): string
    {
        return __('moonshine::ui.resource.piers');
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
            Number::make('latitude')->translatable('moonshine::ui.resource'),
            Number::make('longitude')->translatable('moonshine::ui.resource'),
            Text::make('url_yandex_map')->translatable('moonshine::ui.resource'),
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
            'latitude' => ['int', 'nullable'],
            'longitude' => ['int', 'nullable'],
            'url_yandex_map' => ['string', 'nullable'],
        ];
    }
}
