<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tenant') . ': ' . auth()->user()->tenant->name}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table-auto">
                        <thead>
                            <tr class="odd:bg-white even:bg-gray-100">
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Name</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Last Name</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Email</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Tenant id</th>
                            </tr>
                        </thead>
                        @can(\App\Domains\User\Roles\PermissionEnum::TENANT_VIEW->value)
                            <tbody>
                                @foreach($users as $user)
                                    <tr class="odd:bg-white even:bg-gray-100">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $user->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $user->last_name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $user->email }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $user->tenant->id }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @endcan
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
