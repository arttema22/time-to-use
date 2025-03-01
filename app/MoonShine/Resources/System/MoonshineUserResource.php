<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\System;

use MoonShine\UI\Fields\ID;
use App\Models\MoonshineUser;
use MoonShine\Support\ListOf;
use MoonShine\UI\Fields\Text;
use MoonShine\Laravel\Enums\Action;
use MoonShine\Support\Enums\PageType;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use App\MoonShine\Resources\System\MoonShineUserRoleResource;


/**
 * @extends ModelResource<MoonshineUser>
 */
class MoonshineUserResource extends ModelResource
{
    protected ?string $alias = 'clients';

    protected string $model = MoonshineUser::class;

    public function getTitle(): string
    {
        return __('moonshine::ui.resource.clients');
    }

    protected array $with = ['moonshineUserRole'];

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
            Text::make('name', 'name')->sticky(),
            //  BelongsTo::make('moonshine_user_role_id', 'moonshineUserRole', resource: MoonShineUserRoleResource::class),
            Text::make('email', 'email'),
            //Text::make('password', 'password'),
            Text::make('avatar', 'avatar'),
            Text::make('remember_token', 'remember_token'),
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
        // TODO change it to your own rules
        return [
            'id' => ['int', 'nullable'],
            'moonshine_user_role_id' => ['int', 'nullable'],
            'email' => ['email', 'nullable'],
            'password' => ['password', 'nullable'],
            'name' => ['string', 'nullable'],
            'avatar' => ['string', 'nullable'],
            'remember_token' => ['string', 'nullable'],
        ];
    }
}
