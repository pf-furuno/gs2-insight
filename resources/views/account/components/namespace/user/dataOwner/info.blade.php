@if(isset($dataOwner->dataOwner))
<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto">
        <div class="py-2 align-middle inline-block min-w-full">
            <table class="min-w-full divide-y divide-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3 w-25 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('messages.model.account.dataOwner.name') }}
                    </th>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $dataOwner->dataOwner->getName() }}
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

    @if($permission != 'view')
        @if($permission != 'operator')
            <div class="btn-group" role="group">
                <button id="dataOwnerDelete" type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ __('messages.model.account.dataOwner.action.delete') }}
                </button>
                <ul class="dropdown-menu p-0" style="min-width: 0" aria-labelledby="dataOwnerDelete">
                    <li>
                        <form action="{{ "/players/{$dataOwner->user->userId}/account/{$dataOwner->user->namespace->namespaceName}/dataOwner/delete" }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger w-100">
                                {{ __('messages.model.account.dataOwner.action.accept') }}
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        @endif
    @endif
@endif
