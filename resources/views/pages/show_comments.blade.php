<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @include('includes.header-feed')
        </h2>
    </x-slot>

    <div class="flex items-center justify-center">
        <div class="bg-white mt-4 mb-20 p-6">
            <h2 class="text-2xl font-bold mb-4">Comentários: {{ $experience->title }}</h2>

            @foreach($comments as $comment)
                <div class="mb-4">
                    <strong>{{ $comment->user->name }}:</strong>
                    {{ $comment->comment }}
                </div>
            @endforeach
        </div>
    </div>
    

</x-app-layout>