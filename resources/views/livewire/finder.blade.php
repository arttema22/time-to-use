<div>
    <section class="bg-[url(/public/hero/vawe-01.jpg)] bg-no-repeat bg-cover bg-bottom bg-gray-300 bg-blend-multiply">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">
                Арендовать яхту
            </h1>
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">
                Прямо сейчас в Санкт-Петербурге {{ $vehicle_count }} предложений и {{ $orders_count }} заявок.
            </p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">

            </div>
        </div>
    </section>

    @foreach ($responses as $response)
    <a href="#" class="flex flex-col items-center bg-white border border-gray-200
             rounded-lg shadow-sm md:flex-row hover:bg-gray-100
              dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
        <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
            src="/hero/vawe-01.jpg" alt="">
        <div class="flex flex-col justify-between p-4 leading-normal">
            <div>
                @foreach ( $response->vehicle->categories as $Categories )
                <span
                    class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-gray-700 dark:text-gray-300">
                    {{ $Categories->name }}
                </span>
                @endforeach
            </div>

            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{ $response->vehicle->name }}
            </h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                {{ $response->vehicle->description }}
                <br>
                {{-- @if ($Vehicle->priceList)
            Цены<br>
            @foreach ( $Vehicle->priceList->where('flag_activity') as $Price )
            {{ $Price->date_from }} -
                {{ $Price->date_to }} -
                {{ $Price->price }}<br>
                @endforeach
                @endif --}}
            </p>
            <div>
                Причалы<br>
                @foreach ($response->vehicle->piers->where('flag_activity') as $Piers)
                {{ $Piers->name }}
                @endforeach
            </div>

            <div>
                Опции<br>
                @foreach ($response->vehicle->availableOption->where('flag_activity') as $Options)
                @foreach ($Options->option as $test)
                <div>{{$test}}</div>
                @endforeach
                @endforeach
            </div>

        </div>
        <div class="flex flex-col justify-between p-4 leading-normal">
            <div>
                <div>
                    {{ __('до') }} {{ $response->vehicle->qnty_places }} {{ __('qnty_places') }}
                </div>
                <br>{{ __('qnty_siutes') }}{{ $response->vehicle->qnty_siutes }}
                <br>{{ __('qnty_toilets') }}{{ $response->vehicle->qnty_toilets }}
                <br>{{ __('colour') }}{{ $response->vehicle->colour }}
                <br>{{ __('length') }}{{ $response->vehicle->length }}
                <br>{{ __('width') }}{{ $response->vehicle->width }}
            </div>

            <div class="flex gap-1">
                @if ($response->vehicle->flag_shower)
                <x-flag.flag-shower />
                @endif

                @if ($response->vehicle->flag_fridge)
                <x-flag.flag-fridge />
                @endif

                @if ($response->vehicle->flag_kitchen)
                <x-flag.flag-kitchen />
                @endif

                @if ($response->vehicle->flag_audio)
                <x-flag.flag-audio />
                @endif

                @if ($response->vehicle->flag_tv)
                <x-flag.flag-tv />
                @endif

                @if ($response->vehicle->flag_open_deck)
                <x-flag.flag-open-deck />
                @endif

                @if ($response->vehicle->flag_flybridge)
                <x-flag.flag-flybridge />
                @endif
            </div>
        </div>
    </a>
    @endforeach
</div>
