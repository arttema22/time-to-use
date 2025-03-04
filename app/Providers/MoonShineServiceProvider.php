<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\MoonShine\Resources\ArticleResource;
use App\MoonShine\Resources\VehicleResource;
use App\MoonShine\Resources\System\OwnerResource;
use App\MoonShine\Resources\System\PiersResource;
use App\MoonShine\Resources\System\OptionResource;
use App\MoonShine\Resources\System\CategoryResource;
use MoonShine\Laravel\DependencyInjection\MoonShine;
use App\MoonShine\Resources\System\OwnerRoleResource;
use MoonShine\Contracts\Core\DependencyInjection\CoreContract;
use MoonShine\Laravel\DependencyInjection\MoonShineConfigurator;
use MoonShine\Contracts\Core\DependencyInjection\ConfiguratorContract;
use App\MoonShine\Resources\AvailableOptionResource;

class MoonShineServiceProvider extends ServiceProvider
{
    /**
     * @param  MoonShine  $core
     * @param  MoonShineConfigurator  $config
     *
     */
    public function boot(CoreContract $core, ConfiguratorContract $config): void
    {
        // $config->authEnable();

        $core
            ->resources([
                CategoryResource::class,
                PiersResource::class,
                OptionResource::class,
                VehicleResource::class,
                ArticleResource::class,
                OwnerRoleResource::class,
                OwnerResource::class,
                AvailableOptionResource::class,
            ])
            ->pages([
                ...$config->getPages(),
            ])
        ;
    }
}
