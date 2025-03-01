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
            Text::make('name')->sticky(),
            Textarea::make('description'),
            Number::make('latitude'),
            Number::make('longitude'),
            Text::make('url_yandex_map'),
            //Text::make('attribute1'),
            //Text::make('attribute2'),
            //Text::make('attribute3'),
            Switcher::make('flag_activity'),
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
