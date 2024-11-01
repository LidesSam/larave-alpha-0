<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg w-full p-4">
    @if (session()->has('success'))
        <div class="mb-4 text-green-500">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="submit">
        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                Email
            </label>
            <input type="email" id="email" wire:model="email" name="email" placeholder="{{__('Enter your email')}}" 
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="message" class="block text-gray-700 text-sm font-bold mb-2">
               {{__('Message')}}
            </label>
            <textarea id="message" wire:model="message" name="message" placeholder="Enter your message"
                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="4"></textarea>
            @error('message') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center justify-end">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline space-x-2 flex flex-growt">
                <div>{{__('Send')}}</div> <i class="fas fa-paper-plane m-2"></i> 
            </button>
        </div>
    </form>
</div>
