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
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Fields\Slug;

class ArticleFormPage extends FormPage
{
    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Grid::make([
                Column::make([
                    Block::make([
                        Text::make(__('Title'), 'title')->reactive()->required(),
                        Slug::make(__('Slug'), 'slug')->from('title')->unique()
                            ->live()->required(),
                        TinyMce::make(__('Text'), 'text')->required(),
                    ]),
                ])->columnSpan(8),
                Column::make([
                    Block::make([
                        Textarea::make(__('Description'), 'description'),
                        Textarea::make(__('Keywords'), 'keywords'),
                        Image::make(__('Thumbnail'), 'thumbnail')
                            ->disk('public')
                            ->dir('articles')
                            ->allowedExtensions(['jpg', 'pnp'])
                            ->removable()
                            ->disableDownload(),
                    ]),
                ])->columnSpan(4)
            ]),
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
