<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <h1 class="mt-8 text-2xl font-medium text-gray-900">
                        {{ $Article->title }}
                    </h1>

                    <div class="mt-6 text-gray-500 leading-relaxed">
                        {!! $Article->text !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @empty(!$Article->thumbnail)
    <div style="background:url({{ config('app.url') . '/storage/' . $Article->thumbnail }}) no-repeat center;background-size:cover"
        class="py-64 px-1 md:px-8 text-center relative text-white font-bold text-2xl md:text-3xl overflow-auto">
    </div>
    @endempty

</x-guest-layout>
