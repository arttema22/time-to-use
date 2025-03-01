<section class="bg-[url(/public/hero/vawe-01.jpg)] bg-no-repeat bg-cover bg-bottom bg-gray-300 bg-blend-multiply">
    <div class="px-4 mx-auto max-w-screen-xl text-center py-24">
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">
            Арендовать яхту
        </h1>
        <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">
            Прямо сейчас в Санкт-Петербурге {{ $vehicle_count }} предложений и {{ $orders_count }} заявок.
        </p>
        <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
            <input id="datepicker-autohide" datepicker datepicker-autohide type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Select date">
            <x-input id="email" class="block mt-1 w-full" type="number" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <input type="time" id="time"
                class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                min="09:00" max="18:00" value="00:00" required />
            <div>
                <label for="visitors" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unique
                    visitors (per
                    month)</label>
                <input type="number" id="visitors"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" required />
            </div>

            <x-button class="ms-4">
                {{ __('Look') }}
            </x-button>
        </div>
    </div>
</section>
