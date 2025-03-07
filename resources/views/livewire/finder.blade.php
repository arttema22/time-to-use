<div>
    <section class="bg-blue-400 bg-no-repeat bg-cover bg-bottom bg-blend-multiply">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">
                Арендовать яхту
            </h1>
            <p class="mb-8 text-lg font-normal text-white lg:text-xl sm:px-16 lg:px-48">
                Прямо сейчас в Санкт-Петербурге предложений прокатить - {{ $vehicle_count }} и заявок покататься -
                {{ $orders_count }}.
            </p>

            <x-validation-errors class="mb-4" />

            <div class="bg-white p-4 border border-transparent rounded-md">

                <div x-data="{ open: false }" class="px-6 py-4 border rounded-lg bg-gray-100" role="accordion">
                    <button @click="open=!open" type="button"
                        class="w-full text-base text-left text-gray-800 flex flex-wrap justify-between items-start gap-2">
                        <div class="flex flex-wrap gap-2">
                            <div>
                                <x-label for="date" value="{{ __('Когда') }}" />
                                <x-input wire:model="date" id="date" class="block mt-1 w-full" type="datetime-local"
                                    name="date" :value="old('date')" required autofocus autocomplete="date" />
                                <div class="text-red-600">@error('date') {{ $message }} @enderror</div>
                            </div>
                            <div>
                                <x-label for="cat_id" value="{{ __('category') }}" />
                                <select wire:model="cat_id" id="cat_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500
                                            focus:ring-indigo-500 rounded-md shadow-sm" name="cat_id">
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <div class="text-red-600">@error('cat_id') {{ $message }} @enderror</div>
                            </div>
                            <div>
                                <x-label for="qnty_places" value="{{ __('qnty_places') }}" />
                                <x-input wire:model="qnty_places" id="qnty_places" class="block mt-1 w-full"
                                    type="number" name="qnty_places" :value="old('qnty_places')" required
                                    autocomplete="qnty_places" />
                                <div class="text-red-600">@error('qnty_places') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            Еще фильтры
                        </div>
                    </button>
                    <div x-show="open" class="flex justify-between items-center rounded-md">
                        <div class="mt-4 mr-2 text-xs text-gray-600 leading-relaxed">
                            <div class="flex flex-wrap gap-2 justify-start items-start">
                                <div class="block">
                                    <x-label for="qnty_siutes" value="{{ __('qnty_siutes') }}" />
                                    <x-input wire:model="qnty_siutes" id="qnty_siutes" class="block mt-1 w-full"
                                        type="number" name="qnty_siutes" :value="old('qnty_siutes')"
                                        autocomplete="qnty_siutes" />
                                </div>
                                <div class="block">
                                    <x-label for="qnty_toilets" value="{{ __('qnty_toilets') }}" />
                                    <x-input wire:model="qnty_toilets" id="qnty_toilets" class="block mt-1 w-full"
                                        type="number" name="qnty_toilets" :value="old('qnty_toilets')"
                                        autocomplete="qnty_toilets" />
                                </div>
                                <div class="block mt-4">
                                    <label for="flag_shower" class="flex items-center">
                                        <x-checkbox wire:model="flag_shower" id="flag_shower" name="flag_shower" />
                                        <span class="ms-2 text-sm text-gray-600">{{ __('flag_shower') }}</span>
                                    </label>
                                </div>
                                <div class="block mt-4">
                                    <label for="flag_fridge" class="flex items-center">
                                        <x-checkbox wire:model="flag_fridge" id="flag_fridge" name="flag_fridge" />
                                        <span class="ms-2 text-sm text-gray-600">{{ __('flag_fridge') }}</span>
                                    </label>
                                </div>
                                <div class="block mt-4">
                                    <label for="flag_kitchen" class="flex items-center">
                                        <x-checkbox wire:model="flag_kitchen" id="flag_kitchen" name="flag_kitchen" />
                                        <span class="ms-2 text-sm text-gray-600">{{ __('flag_kitchen') }}</span>
                                    </label>
                                </div>
                                <div class="block mt-4">
                                    <label for="flag_audio" class="flex items-center">
                                        <x-checkbox wire:model="flag_audio" id="flag_audio" name="flag_audio" />
                                        <span class="ms-2 text-sm text-gray-600">{{ __('flag_audio') }}</span>
                                    </label>
                                </div>
                                <div class="block mt-4">
                                    <label for="flag_tv" class="flex items-center">
                                        <x-checkbox wire:model="flag_tv" id="flag_tv" name="flag_tv" />
                                        <span class="ms-2 text-sm text-gray-600">{{ __('flag_tv') }}</span>
                                    </label>
                                </div>
                                <div class="block mt-4">
                                    <label for="flag_open_deck" class="flex items-center">
                                        <x-checkbox wire:model="flag_open_deck" id="flag_open_deck"
                                            name="flag_open_deck" />
                                        <span class="ms-2 text-sm text-gray-600">{{ __('flag_open_deck') }}</span>
                                    </label>
                                </div>
                                <div class="block mt-4">
                                    <label for="flag_flybridge" class="flex items-center">
                                        <x-checkbox wire:model="flag_flybridge" id="flag_flybridge"
                                            name="flag_flybridge" />
                                        <span class="ms-2 text-sm text-gray-600">{{ __('flag_flybridge') }}</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button wire:click="store" title={{ __('Edit') }}
                    class="inline-flex items-center gap-2 mt-6 px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-white" viewBox="0 0 348.882 348.882">
                        <path
                            d="m333.988 11.758-.42-.383A43.363 43.363 0 0 0 304.258 0a43.579 43.579 0 0 0-32.104 14.153L116.803 184.231a14.993 14.993 0 0 0-3.154 5.37l-18.267 54.762c-2.112 6.331-1.052 13.333 2.835 18.729 3.918 5.438 10.23 8.685 16.886 8.685h.001c2.879 0 5.693-.592 8.362-1.76l52.89-23.138a14.985 14.985 0 0 0 5.063-3.626L336.771 73.176c16.166-17.697 14.919-45.247-2.783-61.418zM130.381 234.247l10.719-32.134.904-.99 20.316 18.556-.904.99-31.035 13.578zm184.24-181.304L182.553 197.53l-20.316-18.556L294.305 34.386c2.583-2.828 6.118-4.386 9.954-4.386 3.365 0 6.588 1.252 9.082 3.53l.419.383c5.484 5.009 5.87 13.546.861 19.03z"
                            data-original="#000000" />
                        <path
                            d="M303.85 138.388c-8.284 0-15 6.716-15 15v127.347c0 21.034-17.113 38.147-38.147 38.147H68.904c-21.035 0-38.147-17.113-38.147-38.147V100.413c0-21.034 17.113-38.147 38.147-38.147h131.587c8.284 0 15-6.716 15-15s-6.716-15-15-15H68.904C31.327 32.266.757 62.837.757 100.413v180.321c0 37.576 30.571 68.147 68.147 68.147h181.798c37.576 0 68.147-30.571 68.147-68.147V153.388c.001-8.284-6.715-15-14.999-15z"
                            data-original="#000000" />
                    </svg>
                    Хочу кататься
                </button>
            </div>
        </div>

        @if ($vehicles_count != 0)
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24">
            <h3>По Вашему запросу найдено транспортных средств - {{ $vehicles_count }}</h3>
            <button wire:click="store" title={{ __('Edit') }}
                class="inline-flex items-center gap-2 mt-6 px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-white" viewBox="0 0 348.882 348.882">
                    <path
                        d="m333.988 11.758-.42-.383A43.363 43.363 0 0 0 304.258 0a43.579 43.579 0 0 0-32.104 14.153L116.803 184.231a14.993 14.993 0 0 0-3.154 5.37l-18.267 54.762c-2.112 6.331-1.052 13.333 2.835 18.729 3.918 5.438 10.23 8.685 16.886 8.685h.001c2.879 0 5.693-.592 8.362-1.76l52.89-23.138a14.985 14.985 0 0 0 5.063-3.626L336.771 73.176c16.166-17.697 14.919-45.247-2.783-61.418zM130.381 234.247l10.719-32.134.904-.99 20.316 18.556-.904.99-31.035 13.578zm184.24-181.304L182.553 197.53l-20.316-18.556L294.305 34.386c2.583-2.828 6.118-4.386 9.954-4.386 3.365 0 6.588 1.252 9.082 3.53l.419.383c5.484 5.009 5.87 13.546.861 19.03z"
                        data-original="#000000" />
                    <path
                        d="M303.85 138.388c-8.284 0-15 6.716-15 15v127.347c0 21.034-17.113 38.147-38.147 38.147H68.904c-21.035 0-38.147-17.113-38.147-38.147V100.413c0-21.034 17.113-38.147 38.147-38.147h131.587c8.284 0 15-6.716 15-15s-6.716-15-15-15H68.904C31.327 32.266.757 62.837.757 100.413v180.321c0 37.576 30.571 68.147 68.147 68.147h181.798c37.576 0 68.147-30.571 68.147-68.147V153.388c.001-8.284-6.715-15-14.999-15z"
                        data-original="#000000" />
                </svg>
                Связаться с капитаном
            </button>
        </div>
        @endif

    </section>




    @if($userModal)
    <x-dialog-modal wire:model="userModal">
        <x-slot name="title">
            {{ __('do_we_know_each_other') }}
            @if($registerForm)
            Зарегистрируйтесь пожалуйста.
            @endif
            @if($authForm)
            Войдите в аккаунт
            @endif
        </x-slot>

        <x-slot name="content">

            <x-validation-errors class="mb-4" />

            @if($registerForm)
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div>
                    <x-label for="name" value="{{ __('Name') }}" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                        autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autocomplete="username" />
                </div>

                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'"
                                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms
                                    of Service').'</a>',
                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'"
                                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy
                                    Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
                @endif

                <div class="flex items-center justify-end mt-4">
                    <x-button class="ms-4">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </form>
            @endif

            @if($authForm)
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autofocus autocomplete="username" />
                </div>

                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                    @endif

                    <x-button class="ms-4">
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </form>
            @endif

        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="toggleUserForm" class="mr-2">
                @if($registerForm)
                Войти
                @endif
                @if($authForm)
                Зарегистрироваться
                @endif
            </x-secondary-button>
            <x-secondary-button wire:click="toggleUserModal" wire:loading.attr="disabled">
                {{__('Cancel')}}
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
    @endif



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
