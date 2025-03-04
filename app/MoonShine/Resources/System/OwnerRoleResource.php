<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\System;

use App\Models\OwnerRole;
use MoonShine\Support\ListOf;
use MoonShine\UI\Fields\Text;
use MoonShine\Laravel\Enums\Action;
use MoonShine\Support\Enums\PageType;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\Laravel\Resources\ModelResource;

/**
 * @extends ModelResource<OwnerRole>
 */
class OwnerRoleResource extends ModelResource
{
    protected ?string $alias = 'owner-roles';

    protected string $model = OwnerRole::class;

    public function getTitle(): string
    {
        return __('moonshine::ui.resource.roles');
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
        ];
    }
}
