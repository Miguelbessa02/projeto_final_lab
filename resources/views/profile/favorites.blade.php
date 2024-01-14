<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @include('includes.header-perfil')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    @if(count($favorites) > 0)
                    
                    <div class="flex items-center justify-center">
                        <h1 class="text-3xl font-bold mb-6">Favoritos:</h1>
                    </div>
                    
                    <div id="activities-section" class="flex flex-wrap -mx-2">
                        @foreach ($favorites as $index => $favorite)
                            <div class="relative w-full sm:w-1/2 md:w-1/4 lg:w-1/4 px-2">
                                <div class="w-full h-full m-0 bg-white rounded border border-black pl-4 pt-4 pb-20 pr-20">
                                    
                                    <div class="mb-8">
                                        <img src="{{ asset('storage/' . $favorite->experience['image']) }}" alt="{{ $favorite->experience['title'] }}" class="w-full mb-2 rounded" />
                                        <h3 class="text-lg font-semibold">{{ $favorite->experience->title }}</h3>
                                        <p class="text-gray-700">Descrição: {{ $favorite->experience->description }}.</p>
                                        <p class="text-gray-800 font-bold">Preço: {{ $favorite->experience->price }}€</p>
                                        <p class="text-gray-800 font-bold">Morada: {{ $favorite->experience->address }}.</p>
                                        <p class="text-gray-800 font-bold">Categoria: {{ $favorite->experience->category }}.</p>
                                        <span class="text-gray-800 font-bold pr-1">Likes: {{ $favorite->experience->likes->count() }}</span>
                                    </div>

                                    <div class="absolute bottom-2">
                                        <form method="post" action="{{ route('like.store') }}" class="inline">
                                            @csrf
                                            <input type="hidden" name="experience_id" value="{{ $favorite->experience['id'] }}">
                                            <button type="submit" class="text-blue-500 no-underline border-2 border-blue-500 px-2 py-1 rounded">Like</button>
                                        </form>

                                        <div class="flex mt-2 space-x-2">
                                            <a href="{{ route('comment.create', ['experience_id' => $favorite->experience['id']]) }}" class="text-blue-500 no-underline border-2 border-blue-500 px-2 py-1 rounded">Comentar</a>
                                            <a href="{{ route('experience.comments', ['experience_id' => $favorite->experience['id']]) }}" class="text-blue-500 no-underline border-2 border-blue-500 px-2 py-1 rounded">Comentários</a>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            @if (($index + 1) % 4 == 0)
                                <div class="w-full my-4"></div>
                            @endif
                        @endforeach
                    </div>
                    @else
                        <p class="text-3xl font-bold mb-6">Não tens Favoritos.</p>
                        <p>Os teus anúncios adicionados aos favoritos irão aparecer aqui assim que 
                            adicionares o teu primeiro anúncio.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>