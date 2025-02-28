<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\System;

use App\Models\Piers;
use MoonShine\UI\Fields\ID;
use MoonShine\Support\ListOf;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Switcher;
use MoonShine\Laravel\Enums\Action;
use MoonShine\Support\Enums\PageType;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\Laravel\Resources\ModelResource;


class PiersResource extends ModelResource
{
    protected ?string $alias = 'piers';

    protected string $model = Piers::class;

    public function getTitle(): string
    {
        return __('moonshine::ui.resource.piers');
    }

    protected string $column = 'name';

    protected ?PageType $redirectAfterSave = PageType::INDEX;

    protected function activeActions(): ListOf
    {
        return parent::activeActions()->except(Action::MASS_DELETE);
    }

    public function indexFields(): iterable
    {
        // TODO correct labels values
        return [
            Text::make('name', 'name'),
            Text::make('description', 'description'),
            Number::make('latitude', 'latitude'),
            Number::make('longitude', 'longitude'),
            Text::make('url_yandex_map', 'url_yandex_map'),
            Text::make('attribute1', 'attribute1'),
            Text::make('attribute2', 'attribute2'),
            Text::make('attribute3', 'attribute3'),
            Switcher::make('flag_activity', 'flag_activity'),
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
        // TODO change it to your own rules
        return [
            'id' => ['int', 'nullable'],
            'name' => ['string', 'nullable'],
            'description' => ['string', 'nullable'],
            'latitude' => ['int', 'nullable'],
            'longitude' => ['int', 'nullable'],
            'url_yandex_map' => ['string', 'nullable'],
            'attribute1' => ['string', 'nullable'],
            'attribute2' => ['string', 'nullable'],
            'attribute3' => ['string', 'nullable'],
            'flag_activity' => ['accepted', 'sometimes'],
        ];
    }
}
