<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\System;

use MoonShine\UI\Fields\ID;

use MoonShine\Support\ListOf;
use MoonShine\UI\Fields\Text;
use App\Models\MoonshineUserRole;
use MoonShine\Laravel\Enums\Action;
use MoonShine\Support\Enums\PageType;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\Laravel\Resources\ModelResource;

/**
 * @extends ModelResource<MoonshineUserRole>
 */
class MoonshineUserRoleResource extends ModelResource
{
    protected ?string $alias = 'roles';

    protected string $model = MoonshineUserRole::class;

    public function getTitle(): string
    {
        return __('moonshine::ui.resource.role');
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
            Text::make('name', 'name'),
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
        ];
    }
}
