@extends('base')
@section('content')
    @include('commons.language')
    @include('commons.breadcrumb', [
        'hierarchy' => [
            'Home' => url('/'),
            __('messages.model.players') => url("/players"),
            $quest->questGroup->user->userId => url("/players/". $quest->questGroup->user->userId. "?mode=quest"),
            "Quest" => url("/players/". $quest->questGroup->user->userId. "?mode=quest"),
            $quest->questGroup->user->namespace->namespaceName => url("/players/". $quest->questGroup->user->userId. "/quest/". $quest->questGroup->user->namespace->namespaceName),
            "Quest Group Model" => url("/players/". $quest->questGroup->user->userId. "/quest/". $quest->questGroup->user->namespace->namespaceName),
            $quest->questGroup->questGroupModelName => url("/players/". $quest->questGroup->user->userId. "/quest/". $quest->questGroup->user->namespace->namespaceName. "/questGroup/". $quest->questGroup->questGroupModelName),
            "Quest Model" => url("/players/". $quest->questGroup->user->userId. "/quest/". $quest->questGroup->user->namespace->namespaceName. "/questGroup/". $quest->questGroup->questGroupModelName),
            $quest->questModelName => url()->current(),
        ]
    ])
    <div class="p-8">
        <div class="bg-white shadow-sm rounded-lg">
            <div class="bg-gray-100 shadow-sm rounded-lg justify-between items-center">
                <div class="flex justify-between items-center">
                    <div class="flex flex-wrap">
                        <div class="px-6 py-4 whitespace-nowrap">
                            <p class="text-xl font-bold text-gray-500">{{ $quest->questModelName }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex">
                @if($permission != 'null')
                <div class="w-25">
                    <div class="m-4 bg-white shadow rounded-lg">
                        <label class="p-4 block mb-2 text-lg font-medium text-gray-900 dark:text-gray-300">
                            {{ __('messages.model.current') }}
                        </label>
                        {{ $quest->questGroup->user->progress()->infoView('quest/components/namespace/user/progress/info') }}
                        {{ $quest->infoView('quest/components/namespace/user/questGroup/quest/info') }}
                        <div class="p-2"></div>
                    </div>
                </div>
                @endif
                <div class="w-75">
                    <div class="m-4 bg-white shadow rounded-lg">
                        <label class="p-4 block mb-2 text-lg font-medium text-gray-900 dark:text-gray-300">
                            {{ __('messages.model.timelines') }}
                        </label>
                        {{ $quest->timelineView('commons/timeline') }}
                        <div class="p-2"></div>
                    </div>
                </div>
            </div>
            <div class="p-2"></div>
        </div>
    </div>
@endsection
