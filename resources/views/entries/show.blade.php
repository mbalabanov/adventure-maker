<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Entries') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <p><a href="{{ route('entries.index') }}" class="btn-link btn-lg mb-2">Back to Entries</a></p>
            <div class="py-6 text-gray-900">
                <div class="my-2 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    @if(session('success'))
                        <x-alert-success>{{ session('success') }}</x-alert-success>
                    @endif
                    <div class="flex my-4">
                        <p><strong>Adventure:</strong> {{ $entry->adventure }}</p>
                        <p class="ml-6"><strong>Unique ID:</strong> {{ $entry->uuid }}</p>
                        <x-primary-button class="ml-auto"><a href="{{ route('entries.edit', $entry) }}">Edit Entry</a></x-primary-button>
                        <form action="{{ route('entries.destroy', $entry)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <x-danger-button class="ml-2" type="submit" onclick="return confirm('Are you sure you want to delete this entry?')">Delete Entry</x-danger-button>
                        </form>
                    </div>
                    <h2 class="font-bold text-4xl">
                        {{ $entry->title }}
                    </h2>
                    <p class="mt-4 whitespace-pre-wrap">{{ $entry->description }}</p>
                    <div class="flex mt-4">
                        <p class="opacity-70"><strong>Created: </strong> {{$entry->created_at->diffForHumans()}}</p>
                        <p class="opacity-70 ml-8"><strong>Updated: </strong> {{$entry->updated_at->diffForHumans()}}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
