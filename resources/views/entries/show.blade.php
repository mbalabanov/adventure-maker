<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Entries') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="py-6 text-gray-900">
                <div class="my-2 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <span class="block mt-4 text-sm">Adventure: <strong>{{ $entry->adventure }}</strong></span>
                    <span class="block mb-4 text-sm">Entry: <strong>{{ $entry->id }}</strong></span>
                    <h2 class="font-bold text-2xl">
                        {{ $entry->title }}
                    </h2>
                    <p class="mt-4">{{ $entry->description }}</p>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
