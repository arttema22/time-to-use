<x-guest-layout>
    <button class="btn btn-blue">
        Button
    </button>

    <button class="btn btn-red">
        Button
    </button>

    <button class="btn btn-green">
        Button
    </button>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div
                    class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 p-6 lg:p-8">
                    @foreach ( $Articles as $Article )
                    <a href="{{ route('article-show', $Article->slug) }}">
                        <div class="border max-w-sm w-full lg:max-w-full lg:flex">
                            @empty(!$Article->thumbnail)
                            <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover text-center overflow-hidden"
                                style="background-image: url('{{ config('app.url') . '/storage/' . $Article->thumbnail }}')"
                                title="{{ $Article->title }}">
                            </div>
                            @endempty
                            <div class=" bg-white p-4 flex flex-col justify-between leading-normal">
                                <div class="mb-8">
                                    <div class="text-gray-900 font-bold text-xl mb-2">
                                        {{ $Article->title }}
                                    </div>
                                    <p class="text-gray-700 text-base">
                                        {{ $Article->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>