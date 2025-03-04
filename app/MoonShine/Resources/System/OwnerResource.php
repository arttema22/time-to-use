<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\System;

use App\Models\Owner;

use MoonShine\Support\ListOf;
use MoonShine\UI\Fields\Text;
use MoonShine\Laravel\Enums\Action;
use MoonShine\Support\Enums\PageType;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;

/**
 * @extends ModelResource<Owner>
 */
class OwnerResource extends ModelResource
{
    protected ?string $alias = 'owners';

    protected string $model = Owner::class;

    protected array $with = ['ownerRole'];

    public function getTitle(): string
    {
        return __('moonshine::ui.resource.owners');
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
            Text::make('email')->required()->sortable()->translatable('moonshine::ui.resource'),
            BelongsTo::make('role', 'ownerRole', resource: OwnerRoleResource::class)->translatable('moonshine::ui.resource'),
            Text::make('created_at')->sortable()->translatable('moonshine::ui.resource'),
        ];
    }

    public function formFields(): iterable
    {
        return [
            Box::make([
                ...$this->indexFields(),
                Text::make('password', 'password'),
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
            'email' => ['email', 'required'],
            'owner_role_id' => ['int', 'nullable'],
            'password' => ['password', 'required'],
            'avatar' => ['string', 'nullable'],
            'remember_token' => ['string', 'nullable'],
        ];
    }
}
