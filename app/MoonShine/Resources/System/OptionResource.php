<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\System;

use App\Models\Option;

use MoonShine\UI\Fields\ID;
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
            Textarea::make('description', 'description'),
            Date::make('date_from'),
            Date::make('date_to'),
            //Text::make('attribute1', 'attribute1'),
            //Text::make('attribute2', 'attribute2'),
            //Text::make('attribute3', 'attribute3'),
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
            'date_from' => ['string', 'nullable'],
            'date_to' => ['string', 'nullable'],
            'attribute1' => ['string', 'nullable'],
            'attribute2' => ['string', 'nullable'],
            'attribute3' => ['string', 'nullable'],
            'flag_activity' => ['accepted', 'sometimes'],
        ];
    }
}
