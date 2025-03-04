<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use MoonShine\Support\ListOf;
use MoonShine\UI\Fields\Date;
use MoonShine\UI\Fields\Text;
use App\Models\AvailableOption;
use App\MoonShine\Resources\System\OptionResource;
use App\MoonShine\Resources\System\OwnerResource;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Switcher;
use MoonShine\Laravel\Enums\Action;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\Support\Enums\PageType;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\Laravel\Resources\ModelResource;

/**
 * @extends ModelResource<AvailableOption>
 */
class AvailableOptionResource extends ModelResource
{
    protected ?string $alias = 'available-options';

    protected string $model = AvailableOption::class;

    public function getTitle(): string
    {
        return __('moonshine::ui.resource.available-options');
    }

    protected string $column = 'id';

    protected string $sortColumn = 'option_id';

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
            Text::make('options', 'option.name')->sticky()->columnSelection(false)->translatable('moonshine::ui.resource'),
            Text::make('owner', 'owner.name')->translatable('moonshine::ui.resource'),
            Number::make('qnty_available')->translatable('moonshine::ui.resource'),
            Date::make('date_from')->translatable('moonshine::ui.resource'),
            Date::make('date_to')->translatable('moonshine::ui.resource'),
            Switcher::make('flag_activity', 'flag_activity')->translatable('moonshine::ui.resource'),
        ];
    }

    public function formFields(): iterable
    {
        return [
            Box::make([
                BelongsTo::make('options', 'option', resource: OptionResource::class)
                    ->searchable()->translatable('moonshine::ui.resource'),
                BelongsTo::make('owner', resource: OwnerResource::class)
                    ->searchable()->translatable('moonshine::ui.resource'),
                Number::make('qnty_available')->translatable('moonshine::ui.resource'),
                Date::make('date_from')->translatable('moonshine::ui.resource'),
                Date::make('date_to')->translatable('moonshine::ui.resource'),
                Switcher::make('flag_activity', 'flag_activity')->translatable('moonshine::ui.resource'),
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
            'owner_id' => ['int', 'nullable'],
            'option_id' => ['int', 'nullable'],
            'qnty_available' => ['int', 'nullable'],
            'date_from' => ['string', 'nullable'],
            'date_to' => ['string', 'nullable'],
        ];
    }
}
