<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @include('includes.header-feed')
        </h2>
    </x-slot>

    <div class="flex items-center justify-center ">
        <div class="bg-white mt-4 mb-20">
            
            <form method="post" action="{{ route('comment.store', ['experience_id' => $experience_id]) }}" class="bg-white shadow-md rounded px-20 pb-8 my-6 mx-6">
                @csrf

                <div class="mb-2 ">
                    <label for="description" class="block text-gray-700 text-lg font-bold mb-2">Comentario:</label>
                    <textarea class="form-input pr-20" id="comment" name="comment" required></textarea>
                </div>
                
                <input type="hidden" name="experience_id" value="{{ $experience_id }}">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Comentar</button>
            </form>
        </div>
    </div>
    

</x-app-layout>