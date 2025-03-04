<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Vehicle;
use App\Models\Category;
use MoonShine\Support\ListOf;
use MoonShine\UI\Fields\Date;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Switcher;
use MoonShine\UI\Fields\Textarea;
use MoonShine\UI\Components\Badge;
use MoonShine\Laravel\Enums\Action;
use MoonShine\UI\Fields\StackFields;
use MoonShine\Support\Enums\PageType;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Components\Layout\Flex;
use MoonShine\Laravel\Resources\ModelResource;
use App\MoonShine\Resources\System\OwnerResource;
use App\MoonShine\Resources\System\CategoryResource;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\Laravel\Fields\Relationships\BelongsToMany;

/**
 * @extends ModelResource<Vehicle>
 */
class VehicleResource extends ModelResource
{
    protected ?string $alias = 'vehicles';
    protected string $model = Vehicle::class;

    public function getTitle(): string
    {
        return __('moonshine::ui.resource.vehicles');
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
            BelongsToMany::make('categories', 'categories', resource: CategoryResource::class)
                ->inLine(
                    separator: ' ',
                    badge: fn($model, $value) => Badge::make((string) $value, 'primary'),
                )->translatable('moonshine::ui.resource'),
            Text::make('name')->required()->sortable()->sticky()->columnSelection(false)->translatable('moonshine::ui.resource'),
            Text::make('owner', 'owner.name')->translatable('moonshine::ui.resource'),
            Number::make('qnty_places', 'qnty_places')->sortable()->translatable('moonshine::ui.resource'),
            Date::make('date_from', 'date_from')->sortable()->translatable('moonshine::ui.resource'),
            Date::make('date_to', 'date_to')->sortable()->translatable('moonshine::ui.resource'),
            Switcher::make('flag_activity', 'flag_activity')->sortable()->translatable('moonshine::ui.resource'),
            Text::make('description', 'description')->sortable()->translatable('moonshine::ui.resource'),
            Text::make('license_plate', 'license_plate')->translatable('moonshine::ui.resource'),
            Number::make('qnty_siutes', 'qnty_siutes')->sortable()->translatable('moonshine::ui.resource'),
            Number::make('qnty_toilets', 'qnty_toilets')->sortable()->translatable('moonshine::ui.resource'),
            Text::make('colour', 'colour')->sortable()->translatable('moonshine::ui.resource'),
            Number::make('length', 'length')->sortable()->translatable('moonshine::ui.resource'),
            Number::make('width', 'width')->sortable()->translatable('moonshine::ui.resource'),
            Number::make('speed', 'speed')->sortable()->translatable('moonshine::ui.resource'),
            StackFields::make()->fields([
                Switcher::make('flag_captain', 'flag_captain')->sortable()->translatable('moonshine::ui.resource'),
                Switcher::make('flag_shower', 'flag_shower')->sortable()->translatable('moonshine::ui.resource'),
                Switcher::make('flag_fridge', 'flag_fridge')->sortable()->translatable('moonshine::ui.resource'),
                Switcher::make('flag_kitchen', 'flag_kitchen')->sortable()->translatable('moonshine::ui.resource'),
                Switcher::make('flag_audio', 'flag_audio')->sortable()->translatable('moonshine::ui.resource'),
                Switcher::make('flag_tv', 'flag_tv')->sortable()->translatable('moonshine::ui.resource'),
                Switcher::make('flag_open_deck', 'flag_open_deck')->sortable()->translatable('moonshine::ui.resource'),
                Switcher::make('flag_flybridge', 'flag_flybridge')->sortable()->translatable('moonshine::ui.resource'),
            ]),
        ];
    }

    public function formFields(): iterable
    {
        return [
            Box::make([
                Switcher::make('flag_activity', 'flag_activity')->translatable('moonshine::ui.resource'),

                BelongsToMany::make('categories', 'categories', resource: CategoryResource::class)
                    ->selectMode()->tree('parent_id')->translatable('moonshine::ui.resource'),

                BelongsTo::make('owner', resource: OwnerResource::class)
                    ->searchable()->translatable('moonshine::ui.resource'),
                Text::make('name')->translatable('moonshine::ui.resource'),
                Textarea::make('description', 'description')->translatable('moonshine::ui.resource'),
                Flex::make([
                    Date::make('date_from', 'date_from')->translatable('moonshine::ui.resource'),
                    Date::make('date_to', 'date_to')->translatable('moonshine::ui.resource'),
                ]),
                Flex::make([
                    Text::make('license_plate', 'license_plate')->translatable('moonshine::ui.resource'),
                    Number::make('qnty_places', 'qnty_places')->translatable('moonshine::ui.resource'),
                    Number::make('qnty_siutes', 'qnty_siutes')->translatable('moonshine::ui.resource'),
                    Number::make('qnty_toilets', 'qnty_toilets')->translatable('moonshine::ui.resource'),
                ]),
                Flex::make([
                    Text::make('colour', 'colour')->translatable('moonshine::ui.resource'),
                    Number::make('length', 'length')->translatable('moonshine::ui.resource'),
                    Number::make('width', 'width')->translatable('moonshine::ui.resource'),
                    Number::make('speed', 'speed')->translatable('moonshine::ui.resource'),
                ]),
                Flex::make([
                    Switcher::make('flag_captain', 'flag_captain')->translatable('moonshine::ui.resource'),
                    Switcher::make('flag_shower', 'flag_shower')->translatable('moonshine::ui.resource'),
                    Switcher::make('flag_fridge', 'flag_fridge')->translatable('moonshine::ui.resource'),
                    Switcher::make('flag_kitchen', 'flag_kitchen')->translatable('moonshine::ui.resource'),
                ]),
                Flex::make([
                    Switcher::make('flag_audio', 'flag_audio')->translatable('moonshine::ui.resource'),
                    Switcher::make('flag_tv', 'flag_tv')->translatable('moonshine::ui.resource'),
                    Switcher::make('flag_open_deck', 'flag_open_deck')->translatable('moonshine::ui.resource'),
                    Switcher::make('flag_flybridge', 'flag_flybridge')->translatable('moonshine::ui.resource'),
                ]),
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
            'qnty_places' => ['int', 'required'],
            'date_from' => ['string', 'nullable'],
            'date_to' => ['string', 'nullable'],
            'attribute1' => ['string', 'nullable'],
            'attribute2' => ['string', 'nullable'],
            'attribute3' => ['string', 'nullable'],
            'description' => ['string', 'nullable'],
            'license_plate' => ['string', 'nullable'],
            'qnty_siutes' => ['int', 'nullable'],
            'qnty_toilets' => ['int', 'nullable'],
            'colour' => ['string', 'nullable'],
            'length' => ['int', 'nullable'],
            'width' => ['int', 'nullable'],
            'speed' => ['int', 'nullable'],
        ];
    }
}
