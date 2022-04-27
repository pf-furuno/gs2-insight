@extends('base')
@section('content')
    @include('commons.language')
    @include('commons.breadcrumb', [
        'hierarchy' => [
            'Home' => url('/'),
            'GS2 Credential' => url()->current(),
        ]
    ])
    <div class="p-8">
    <form action="{{ $url }}" method="post">
        @csrf
        <div class="bg-white p-6 shadow-sm rounded-lg justify-between items-center">

            <div class="px-6 py-4 whitespace-nowrap">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    {{ __('messages.model.gs2.properties.clientId') }}
                </label>
                <div class="w-full">
                    {{ $gs2->clientId }}
                </div>
            </div>

            <div class="px-6 py-4 whitespace-nowrap">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    {{ __('messages.model.gs2.properties.region') }}
                </label>
                <div class="w-full">
                    <div class="whitespace-nowrap">
                        <select
                            name="region"
                            type="text"
                            class="form-select border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="ap-northeast-1" @if($gs2->region == "ap-northeast-1") selected @endif>ap-northeast-1 (Tokyo)</option>
                            <option value="us-east-1" @if($gs2->region == "us-east-1") selected @endif>us-east-1 (United States)</option>
                            <option value="eu-west-1" @if($gs2->region == "eu-west-1") selected @endif>eu-west-1 (Europe)</option>
                            <option value="ap-sountheast-1" @if($gs2->region == "ap-sountheast-1") selected @endif>ap-sountheast-1 (Asia)</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="px-6 py-4 whitespace-nowrap">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    {{ __('messages.model.gs2.properties.permission') }}
                </label>
                <div class="w-full">
                    <div class="whitespace-nowrap">
                        <select
                            name="permission"
                            type="text"
                            class="form-select border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="view" @if($gs2->permission == "view") selected @endif>Viewer</option>
                            <option value="operator" @if($gs2->permission == "operator") selected @endif>Operator</option>
                            <option value="administrator" @if($gs2->permission == "administrator") selected @endif>Administrator</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="px-6 whitespace-nowrap">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('messages.model.gs2.action.create') }}
                </button>
            </div>
        </div>
    </form>
    </div>
@endsection
