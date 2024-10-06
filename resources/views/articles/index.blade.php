<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <h1 class="mt-8 text-2xl font-medium text-gray-900">
                        Welcome to your Jetstream application!
                    </h1>

                    <p class="mt-6 text-gray-500 leading-relaxed">
                        Laravel Jetstream provides a beautiful, robust starting point for your next Laravel application.
                        Laravel is
                        designed
                        to help you build your application using a development environment that is simple, powerful, and
                        enjoyable.
                    </p>
                </div>

                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
                    @foreach ($Articles as $Article)


                    <div>
                        <div class="flex items-center">
                            <h2 class="ms-3 text-xl font-semibold text-gray-900">
                                <a href="#">{{ $Article->title }}</a>
                            </h2>
                        </div>

                        <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                            {{ $Article->description }}
                        </p>

                        <p class="mt-4 text-sm">
                            <a href="{{ route('article-show', $Article->id) }}"
                                class="inline-flex items-center font-semibold text-indigo-700">
                                {{__('More')}}

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    class="ms-1 w-5 h-5 fill-indigo-500">
                                    <path fill-rule="evenodd"
                                        d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>