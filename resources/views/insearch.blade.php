<x-guest-layout>

    <h1>Найдено {{ $vehicles->count() }} предложения</h1>

    <section class="bg-[url(/public/hero/vawe-01.jpg)] bg-no-repeat bg-cover bg-bottom bg-gray-300 bg-blend-multiply">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">
                Давайте уточним
            </h1>
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">
                Прямо сейчас в Санкт-Петербургезаявок.
            </p>
            <div class="bg-white p-4 border border-transparent rounded-md">
                <form method="POST" action="{{ route('insearch') }}"
                    class="flex flex-col space-y-4 sm:flex-row sm:justify-between sm:space-y-0">
                    @csrf

                    <div>
                        <x-label for="date" value="{{ __('Когда') }}" />
                        <x-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date')"
                            required autofocus autocomplete="date" />
                    </div>

                    <div class="mt-4">
                        <x-label for="time" value="{{ __('Во сколько') }}" />
                        <x-input id="time" class="block mt-1 w-full" type="time" name="time" required
                            autocomplete="time" />
                    </div>

                    <div class="mt-4">
                        <x-label for="qnty_places" value="{{ __('Количество пассажиров') }}" />
                        <x-input id="qnty_places" class="block mt-1 w-full" type="number" name="qnty_places"
                            autocomplete="qnty_places" />
                    </div>

                    <x-button class="ms-4">
                        {{ __('Хочу кататься') }}
                    </x-button>
                </form>
            </div>
        </div>
    </section>

    @foreach ($vehicles as $vehicle)
    <div>
        {{ $vehicle->name }}
    </div>
    @endforeach

</x-guest-layout>