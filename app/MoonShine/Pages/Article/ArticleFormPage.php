<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Article;

use Throwable;
use MoonShine\Fields\Text;
use MoonShine\Fields\Field;
use MoonShine\Fields\Image;
use MoonShine\Fields\TinyMce;
use MoonShine\Fields\Textarea;
use MoonShine\Pages\Crud\FormPage;
use MoonShine\Components\MoonShineComponent;

class ArticleFormPage extends FormPage
{
    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Text::make(__('Title'), 'title'),
            Textarea::make('description'),
            TinyMce::make('article'),
            Image::make('thumbnail')
                ->disk('public')
                ->dir('articles')
                ->allowedExtensions(['jpg', 'pnp'])
                ->removable()
                ->disableDownload()
        ];
    }

    /**
     * @return list<MoonShineComponent>
     * @throws Throwable
     */
    protected function topLayer(): array
    {
        return [
            ...parent::topLayer()
        ];
    }

    /**
     * @return list<MoonShineComponent>
     * @throws Throwable
     */
    protected function mainLayer(): array
    {
        return [
            ...parent::mainLayer()
        ];
    }

    /**
     * @return list<MoonShineComponent>
     * @throws Throwable
     */
    protected function bottomLayer(): array
    {
        return [
            ...parent::bottomLayer()
        ];
    }
}
