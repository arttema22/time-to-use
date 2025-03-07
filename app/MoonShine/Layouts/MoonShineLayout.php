<?php

declare(strict_types=1);

namespace App\MoonShine\Layouts;

use MoonShine\Laravel\Layouts\AppLayout;
use MoonShine\ColorManager\ColorManager;
use MoonShine\Contracts\ColorManager\ColorManagerContract;
use MoonShine\Laravel\Components\Layout\{Locales, Notifications, Profile, Search};
use MoonShine\UI\Components\{
    Breadcrumbs,
    Components,
    Layout\Flash,
    Layout\Div,
    Layout\Body,
    Layout\Burger,
    Layout\Content,
    Layout\Footer,
    Layout\Head,
    Layout\Favicon,
    Layout\Assets,
    Layout\Meta,
    Layout\Header,
    Layout\Html,
    Layout\Layout,
    Layout\Logo,
    Layout\Menu,
    Layout\Sidebar,
    Layout\ThemeSwitcher,
    Layout\TopBar,
    Layout\Wrapper,
    When
};
use App\MoonShine\Resources\System\CategoryResource;
use MoonShine\MenuManager\MenuItem;
use App\MoonShine\Resources\System\PiersResource;
use App\MoonShine\Resources\System\OptionResource;
use MoonShine\MenuManager\MenuGroup;
use App\MoonShine\Resources\VehicleResource;
use App\MoonShine\Resources\ArticleResource;
use App\MoonShine\Resources\System\OwnerRoleResource;
use App\MoonShine\Resources\System\OwnerResource;
use App\MoonShine\Resources\AvailableOptionResource;

final class MoonShineLayout extends AppLayout
{
    protected function assets(): array
    {
        return [
            ...parent::assets(),
        ];
    }

    protected function menu(): array
    {
        return [
            MenuGroup::make(__('moonshine::ui.resource.system'), [
                MenuItem::make(__('moonshine::ui.resource.categories'), CategoryResource::class),
                MenuItem::make(__('moonshine::ui.resource.piers'), PiersResource::class),
                MenuItem::make(__('moonshine::ui.resource.options'), OptionResource::class),
                MenuItem::make(__('moonshine::ui.resource.roles'), OwnerRoleResource::class),
                MenuItem::make(__('moonshine::ui.resource.owners'), OwnerResource::class),
            ]),

            MenuItem::make(__('moonshine::ui.resource.options'), AvailableOptionResource::class),


            MenuItem::make(__('moonshine::ui.resource.vehicles'), VehicleResource::class),
            MenuItem::make('Articles', ArticleResource::class),

        ];
    }

    /**
     * @param ColorManager $colorManager
     */
    protected function colors(ColorManagerContract $colorManager): void
    {
        parent::colors($colorManager);

        // $colorManager->primary('#00000');
    }

    public function build(): Layout
    {
        return parent::build();
    }
}
