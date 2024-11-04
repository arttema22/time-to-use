<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
use App\MoonShine\Pages\Article\ArticleIndexPage;
use App\MoonShine\Pages\Article\ArticleFormPage;
use App\MoonShine\Pages\Article\ArticleDetailPage;
use MoonShine\Resources\ModelResource;
use MoonShine\Pages\Page;

/**
 * @extends ModelResource<Article>
 */
class ArticleResource extends ModelResource
{
    // Модель данных
    protected string $model = Article::class;

    // Поле сортировки по умолчанию
    protected string $sortColumn = 'created_at';

    // Тип сортировки по умолчанию
    protected string $sortDirection = 'ASC';

    // Поле для отображения значений в связях и хлебных крошках
    public string $column = 'title';

    /**
     * title
     * Устанавливает заголовок для ресурса.
     * @return string
     */
    public function title(): string
    {
        return __('Articles');
    }

    /**
     * @return list<Page>
     */
    public function pages(): array
    {
        return [
            ArticleIndexPage::make($this->title()),
            ArticleFormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
            //   ArticleDetailPage::make(__('moonshine::ui.show')),
        ];
    }

    /**
     * @param Article $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [
            'title' => ['required', 'string', 'min:3'],
            'slug' => ['required', 'string', 'min:3'],
            'text' => ['required', 'string', 'min:3'],
        ];
    }

    /**
     * search
     * Поля для поиска
     * @return array
     */
    public function search(): array
    {
        return [
            'title',
        ];
    }
}
