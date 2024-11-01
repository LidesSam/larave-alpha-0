<div class="p-6 bg-white border-b border-gray-200">
    <h3 class="text-lg font-medium text-gray-900">{{__('Request Table')}}</h3>
    <div class="mt-6 overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-2 py-1 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('ID') }}</th>
                    <th class="px-2 py-1 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Email') }}</th>
                    <th class="px-2 py-1 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Message') }}</th>
                    <th class="px-2 py-1 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('State') }}</th>
                    <th class="px-2 py-1 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Type') }}</th>
                    <th class="px-2 py-1 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Turn') }}</th>
                    <th class="px-2 py-1 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Created At') }}</th>
                    <th class="px-2 py-1 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($requests as $request)
                    <tr>
                        <td class="px-2 py-1 whitespace-nowrap text-sm">{{ $request->id }}</td>
                        <td class="px-2 py-1 whitespace-nowrap text-sm">{{ $request->email }}</td>
                        <td class="px-2 py-1 text-break text-sm">{{ $request->message }}</td>
                        <td class="px-2 py-1 whitespace-nowrap text-sm">{{ $request->state->def_es }}</td>
                        <td class="px-2 py-1 whitespace-nowrap text-sm">{{ $request->type->def_es }}</td>
                        
                        <td class="px-6 py-4 whitespace-nowrap text-sm"
                            title="{{ $request->turndate ? \Carbon\Carbon::parse($request->turndate)->format('d-m-Y') : 'N/A' }}">
                            {{ $request->turndate ? \Carbon\Carbon::parse($request->turndate)->format('d-m-y') : 'N/A' }}
                        </td>
                        
                        <td class="px-6 py-4 whitespace-nowrap text-sm"
                            title="{{ \Carbon\Carbon::parse($request->created_at)->format('d-m-Y') }}">
                            {{ \Carbon\Carbon::parse($request->created_at)->format('d-m-y') }}
                        </td>
                        
                        <td class="px-2 py-1 whitespace-nowrap text-sm">
                            <a href="{{ route('admin.requests.manage', $request->id) }}" class="text-blue-600 hover:text-blue-900">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-2 py-1 text-center text-gray-500 text-sm">No requests found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div>
        {{ $requests->links() }}
    </div>
</div>
