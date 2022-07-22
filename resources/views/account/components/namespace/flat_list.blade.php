@foreach($namespaces as $namespace)
    <div class="bg-gray-100 shadow-sm rounded-lg justify-between items-center">
        <div class="flex justify-between items-center">
            <div class="flex flex-wrap">
                <div class="px-6 py-4 whitespace-nowrap">
                    <p class="text-xl font-bold text-gray-500">{{ $namespace->namespaceName }}</p>
                </div>
            </div>
            <div class="pr-4">
                <a href="{{ url()->current() . "/account/$namespace->namespaceName" }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    {{ __('messages.model.account.namespace.action.detail') }}
                </a>
            </div>
        </div>
    </div>
    @if($permission != 'null')
    <div class="m-4 bg-white shadow rounded-lg">
        <label class="p-4 block mb-2 text-lg font-medium text-gray-900 dark:text-gray-300">
            {{ __('messages.model.account.takeOvers') }}
        </label>
        {{ $namespace->user(request()->userId)->currentTakeOversView('account/components/namespace/user/takeOver/current_list') }}
    </div>
    @endif
    @if($namespace->model()->namespace->getDifferentUserIdForLoginAndDataRetention())
    <div class="m-4 bg-white shadow rounded-lg">
        <label class="p-4 block mb-2 text-lg font-medium text-gray-900 dark:text-gray-300">
            {{ __('messages.model.account.dataOwners') }}
        </label>
        {{ $namespace->user(request()->userId)->dataOwner()->infoView('account/components/namespace/user/dataOwner/info') }}
    </div>
    @endif
@endforeach
<div class="pt-4">
    {{ $namespaces->appends(request()->input())->links() }}
</div>
