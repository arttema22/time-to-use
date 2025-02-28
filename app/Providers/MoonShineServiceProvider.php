<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use MoonShine\Contracts\Core\DependencyInjection\ConfiguratorContract;
use MoonShine\Contracts\Core\DependencyInjection\CoreContract;
use MoonShine\Laravel\DependencyInjection\MoonShine;
use MoonShine\Laravel\DependencyInjection\MoonShineConfigurator;
use App\MoonShine\Resources\System\CategoryResource;
use App\MoonShine\Resources\System\PiersResource;
use App\MoonShine\Resources\System\OptionResource;
use App\MoonShine\Resources\System\MoonshineUserResource;
use App\MoonShine\Resources\System\MoonshineUserRoleResource;
use App\MoonShine\Resources\VehicleResource;

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
                MoonshineUserResource::class,
                MoonshineUserRoleResource::class,
                VehicleResource::class,
            ])
            ->pages([
                ...$config->getPages(),
            ])
        ;
    }
}
