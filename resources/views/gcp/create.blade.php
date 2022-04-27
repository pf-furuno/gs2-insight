@extends('base')
@section('content')
    @include('commons.language')
    @include('commons.breadcrumb', [
        'hierarchy' => [
            'Home' => url('/'),
            'BigQuery Credential' => url()->current(),
        ]
    ])
    <div class="p-8">
    <form action="{{ $url }}" method="post">
        @csrf
        <div class="bg-white p-6 shadow-sm rounded-lg justify-between items-center">

            <div class="px-6 py-4 whitespace-nowrap">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    {{ __('messages.model.gcp.properties.datasetName') }}
                </label>
                <div class="w-full">
                    <div class="whitespace-nowrap">
                        <input
                            name="datasetName"
                            type="text"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                </div>
            </div>

            <div class="px-6 py-4 whitespace-nowrap">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    TimeSpan
                </label>
                <div class="flex flex-wrap">
                    <div class="whitespace-nowrap">
                        <input
                            name="startAt"
                            type="datetime-local"
                            value="{{ substr(now()->addHours(-24)->format(DateTime::ATOM), 0, 16) }}"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                    <div class="px-6 py-3.5 whitespace-nowrap">
                        〜
                    </div>
                    <div class="whitespace-nowrap">
                        <input
                            name="endAt"
                            type="datetime-local"
                            value="{{ substr(now()->format(DateTime::ATOM), 0, 16) }}"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                </div>
                {{ __('messages.model.gcp.properties.timespan.warning') }}
            </div>

            <div class="px-6 py-4 whitespace-nowrap">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    {{ __('messages.model.gcp.properties.credentials') }}
                </label>
                <div class="w-full">
                    <div class="whitespace-nowrap">
                        <textarea
                            name="credentials"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"></textarea>
                    </div>
                </div>
            </div>

            <div class="px-6 whitespace-nowrap">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('messages.model.gcp.action.create') }}
                </button>
            </div>
        </div>
    </form>
    </div>
@endsection
