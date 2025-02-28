<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Vehicle;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Date;
use MoonShine\UI\Fields\Switcher;

/**
 * @extends ModelResource<Vehicle>
 */
class VehicleResource extends ModelResource
{
    protected string $model = Vehicle::class;

    protected string $title = 'VehicleResource';

    public function indexFields(): iterable
    {
        // TODO correct labels values
        return [
			ID::make('id'),
			Number::make('user_id', 'user_id'),
			Text::make('name', 'name'),
			Number::make('qnty_places', 'qnty_places'),
			Date::make('date_from', 'date_from'),
			Date::make('date_to', 'date_to'),
			Switcher::make('flag_activity', 'flag_activity'),
			Text::make('attribute1', 'attribute1'),
			Text::make('attribute2', 'attribute2'),
			Text::make('attribute3', 'attribute3'),
			Text::make('description', 'description'),
			Text::make('license_plate', 'license_plate'),
			Number::make('qnty_siutes', 'qnty_siutes'),
			Number::make('qnty_toilets', 'qnty_toilets'),
			Text::make('colour', 'colour'),
			Number::make('length', 'length'),
			Number::make('width', 'width'),
			Number::make('speed', 'speed'),
			Switcher::make('flag_captain', 'flag_captain'),
			Switcher::make('flag_shower', 'flag_shower'),
			Switcher::make('flag_fridge', 'flag_fridge'),
			Switcher::make('flag_kitchen', 'flag_kitchen'),
			Switcher::make('flag_audio', 'flag_audio'),
			Switcher::make('flag_tv', 'flag_tv'),
			Switcher::make('flag_open_deck', 'flag_open_deck'),
			Switcher::make('flag_flybridge', 'flag_flybridge'),
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
			'user_id' => ['int', 'nullable'],
			'name' => ['string', 'nullable'],
			'qnty_places' => ['int', 'nullable'],
			'date_from' => ['string', 'nullable'],
			'date_to' => ['string', 'nullable'],
			'flag_activity' => ['accepted', 'sometimes'],
			'attribute1' => ['string', 'nullable'],
			'attribute2' => ['string', 'nullable'],
			'attribute3' => ['string', 'nullable'],
			'description' => ['string', 'nullable'],
			'license_plate' => ['string', 'nullable'],
			'qnty_siutes' => ['int', 'nullable'],
			'qnty_toilets' => ['int', 'nullable'],
			'colour' => ['string', 'nullable'],
			'length' => ['int', 'nullable'],
			'width' => ['int', 'nullable'],
			'speed' => ['int', 'nullable'],
			'flag_captain' => ['accepted', 'sometimes'],
			'flag_shower' => ['accepted', 'sometimes'],
			'flag_fridge' => ['accepted', 'sometimes'],
			'flag_kitchen' => ['accepted', 'sometimes'],
			'flag_audio' => ['accepted', 'sometimes'],
			'flag_tv' => ['accepted', 'sometimes'],
			'flag_open_deck' => ['accepted', 'sometimes'],
			'flag_flybridge' => ['accepted', 'sometimes'],
        ];
    }
}
