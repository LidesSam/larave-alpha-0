<div class="p-4 bg-gray-100 flex flex-grotw">
    {{-- Care about people's approval and you will be their prisoner. --}}
    @foreach($turnRequests as $request)
        <div class="bg-white rounded-lg shadow-md p-4 mb-4">
            <div class="text-lg font-semibold mb-2">
                Request ID: {{ $request->id }}
            </div>
            <div class="text-gray-700">
                Turn Date: 
                @if($request->turndate)
                    {{ $request->turndate }}
                @else
                    {{ 'N/A' }}
                @endif
            </div>
        </div>
    @endforeach
</div>
