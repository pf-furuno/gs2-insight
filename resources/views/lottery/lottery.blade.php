@extends('base')
@section('content')
    @include('commons.language')
    @include('commons.breadcrumb', [
        'hierarchy' => [
            'Home' => url('/'),
            __('messages.model.players') => url("/players"),
            $lottery->user->userId => url("/players/". $lottery->user->userId. "?mode=lottery"),
            "Limit" => url("/players/". $lottery->user->userId. "?mode=lottery"),
            $lottery->user->namespace->namespaceName => url("/players/". $lottery->user->userId. "/lottery/". $lottery->user->namespace->namespaceName),
            "Limit Model" => url("/players/". $lottery->user->userId. "/lottery/". $lottery->user->namespace->namespaceName),
            $lottery->lotteryModelName => url()->current(),
        ]
    ])
    <div class="p-8">
        <div class="bg-white shadow-sm rounded-lg">
            <div class="bg-gray-100 shadow-sm rounded-lg justify-between items-center">
                <div class="flex justify-between items-center">
                    <div class="flex flex-wrap">
                        <div class="px-6 py-4 whitespace-nowrap">
                            <p class="text-xl font-bold text-gray-500">{{ $lottery->lotteryModelName }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex">
                <div class="w-100">
                    <div class="m-4 bg-white shadow rounded-lg">
                        <label class="p-4 block mb-2 text-lg font-medium text-gray-900 dark:text-gray-300">
                            {{ __('messages.model.timelines') }}
                        </label>
                        {{ $lottery->timelineView('commons/timeline') }}
                        <div class="p-2"></div>
                    </div>
                </div>
            </div>
            <div class="p-2"></div>
        </div>
    </div>
@endsection
