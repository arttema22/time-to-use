<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $Article->title }}
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <h1 class="mt-8 text-2xl font-medium text-gray-900">
                        {{ $Article->title }}
                    </h1>

                    <div class="mt-6 text-gray-500 leading-relaxed">
                        {!! $Article->article !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>