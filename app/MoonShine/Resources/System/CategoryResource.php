<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\System;

use App\Models\Category;
use MoonShine\Support\ListOf;
use MoonShine\Laravel\Enums\Action;
use MoonShine\Support\Enums\PageType;
use Leeto\MoonShineTree\Resources\TreeResource;
use App\MoonShine\Pages\Category\CategoryFormPage;
use App\MoonShine\Pages\Category\CategoryTreePage;
use App\MoonShine\Pages\Category\CategoryDetailPage;

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

    protected function pages(): array
    {
        return [
            CategoryTreePage::class,
            CategoryFormPage::class,
            CategoryDetailPage::class,
        ];
    }

    public function rules(mixed $item): array
    {
        return [
            'parent_id' => ['int', 'nullable'],
            'name' => ['string', 'required'],
            'description' => ['string', 'nullable'],
            'code_type_category' => ['string', 'nullable'],
            'date_from' => ['string', 'nullable'],
            'date_to' => ['string', 'nullable'],
            'comment' => ['string', 'nullable'],
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
