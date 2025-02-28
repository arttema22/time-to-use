<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\System;

use App\Models\Category;
use MoonShine\UI\Fields\ID;
use MoonShine\Support\ListOf;
use MoonShine\UI\Fields\Date;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Switcher;
use MoonShine\Laravel\Enums\Action;
use MoonShine\Support\Enums\PageType;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\Laravel\Resources\ModelResource;
use Leeto\MoonShineTree\Resources\TreeResource;
use App\MoonShine\Pages\Category\CategoryFormPage;
use App\MoonShine\Pages\Category\CategoryTreePage;
use App\MoonShine\Pages\Category\CategoryDetailPage;
use Leeto\MoonShineTree\View\Components\TreeComponent;

class CategoryResource extends TreeResource
{
    protected ?string $alias = 'categories';

    protected string $model = Category::class;

    public function getTitle(): string
    {
        return __('moonshine::ui.resource.categories');
    }

    protected string $column = 'name';

    protected string $sortColumn = 'sorting';

    protected ?PageType $redirectAfterSave = PageType::INDEX;

    protected function activeActions(): ListOf
    {
        return parent::activeActions()->except(Action::MASS_DELETE);
    }

    protected function pages(): array
    {
        return [
            CategoryTreePage::class,
            CategoryFormPage::class,
            CategoryDetailPage::class,
        ];
    }

    // public function indexFields(): iterable
    // {
    //     return [
    //         TreeComponent::make($this),
    //         // Number::make('parent_id', 'parent_id'),
    //         // Text::make('name', 'name')->sortable(),
    //         // Text::make('description', 'description'),
    //         // Text::make('code_type_category', 'code_type_category'),
    //         // Date::make('date_from', 'date_from'),
    //         // Date::make('date_to', 'date_to'),
    //         // Text::make('comment', 'comment'),
    //         // Text::make('attribute1', 'attribute1'),
    //         // Text::make('attribute2', 'attribute2'),
    //         // Text::make('attribute3', 'attribute3'),
    //         // Switcher::make('flag_activity', 'flag_activity')->sortable(),
    //     ];
    // }

    // public function formFields(): iterable
    // {
    //     return [
    //         Box::make([
    //             ...$this->indexFields()
    //         ])
    //     ];
    // }

    // public function detailFields(): iterable
    // {
    //     return [
    //         ...$this->indexFields()
    //     ];
    // }

    public function rules(mixed $item): array
    {
        return [
            'parent_id' => ['int', 'nullable'],
            'name' => ['string', 'nullable'],
            'description' => ['string', 'nullable'],
            'code_type_category' => ['string', 'nullable'],
            'date_from' => ['string', 'nullable'],
            'date_to' => ['string', 'nullable'],
            'comment' => ['string', 'nullable'],
            'attribute1' => ['string', 'nullable'],
            'attribute2' => ['string', 'nullable'],
            'attribute3' => ['string', 'nullable'],
            'flag_activity' => ['accepted', 'sometimes'],
        ];
    }

    public function treeKey(): ?string
    {
        return 'parent_id';
    }

    public function sortKey(): string
    {
        return 'sorting';
    }
}
