<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Entry') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-2 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

                <form action="{{ route('entries.update', $entry) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <x-text-input
                        type="text"
                        field="title"
                        name="title"
                        placeholder="Title"
                        class="w-full"
                        aria-autocomplete="off"
                        :value="@old('title', $entry->title)"></x-text-input>
                    <x-text-input
                        type="text"
                        field="adventure"
                        name="adventure"
                        placeholder="Adventure ID"
                        class="w-full mt-6"
                        aria-autocomplete="off"
                        :value="@old('adventure', $entry->adventure)"></x-text-input>
                    <x-text-area 
                        name="description"
                        field="description"
                        rows="10"
                        placeholder="Start typing description here..."
                        class="w-full mt-6"
                        :value="@old('description', $entry->description)"></x-text-area>
                    <x-primary-button class="mt-4">Save Entry</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
