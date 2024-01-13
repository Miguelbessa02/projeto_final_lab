<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @include('includes.header-feed')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Seção dos botões -->
                    <div id="category-buttons" class="mb-4">
                        <button onclick="filterByCategory('sport')" class="bg-blue-500 text-white py-2 px-4 rounded">Desporto</button>
                        <button onclick="filterByCategory('culture')" class="bg-blue-500 text-white py-2 px-4 rounded">Cultura</button>
                        <button onclick="filterByCategory('gastronomy')" class="bg-blue-500 text-white py-2 px-4 rounded">Gastronomia</button>
                        <button onclick="filterByCategory('nature')" class="bg-blue-500 text-white py-2 px-4 rounded">Natureza</button>
                        <!--<button onclick="window.location='{{url('/dashboard')}} '" class="bg-blue-500 text-black py-2 px-4 rounded">Feed</button> -->
                    </div>

                    <!-- Seção de exibição das atividades -->
                    <div id="activities-section" class="flex flex-wrap -mx-2">
                        @foreach ($experiences as $index => $experience)
                            <div class="relative w-full sm:w-1/2 md:w-1/4 lg:w-1/4 px-2 experience {{ $experience['category'] }}">
                                <div class="w-full h-full m-0 bg-white rounded border border-black pl-4 pt-4 pb-20 pr-20">

                                    <div class="mb-8">
                                        <img src="{{ asset('storage/' . $experience['image']) }}" alt="{{ $experience['title'] }}" class="w-full mb-2 rounded" />
                                        <h3 class="text-lg font-semibold">{{ $experience['title'] }}</h3>
                                        <p class="text-gray-700">Descrição: {{ $experience['description'] }}.</p>
                                        <p class="text-gray-800 font-bold">Preço: {{ $experience['price'] }}€</p>
                                        <p class="text-gray-800 font-bold">Morada: {{ $experience['address'] }}.</p>
                                        <p class="text-gray-800 font-bold">Categoria: {{ $experience['category'] }}.</p>
                                        <span class="text-gray-800 font-bold pr-1">Likes: {{ $experience->likes->count() }}</span>
                                    </div>

                                    <div class="absolute bottom-2">
                                        <form method="post" action="{{ route('like.store') }}" class="inline">
                                            @csrf
                                            <input type="hidden" name="experience_id" value="{{ $experience['id'] }}">
                                            <button type="submit" class="text-blue-500 no-underline border-2 border-blue-500 px-2 py-1 rounded">Like</button>
                                        </form>

                                        <form action="{{ route('stripe.checkout') }}" method="POST" class="inline">
                                            @csrf
                                            <input type="hidden" name="experience_id" value="{{ $experience['id'] }}">
                                            <button type="submit" id="checkout-live-button" class="text-blue-500 no-underline border-2 border-blue-500 px-2 py-1 rounded mt-2">Comprar</button>
                                        </form>

                                        <form action="{{ route('favorito.store') }}" method="POST" class="inline">
                                            @csrf
                                            <input type="hidden" name="experience_id" value="{{ $experience['id'] }}">
                                            <button type="submit" id="checkout-live-button" class="text-yellow-500 no-underline border-2 border-yellow-500 px-2 py-1 rounded mt-2">Favorito</button>
                                        </form>
                                        
                                        <div class="flex mt-2 space-x-2">
                                            <a href="{{ route('comment.create', ['experience_id' => $experience['id']]) }}" class="text-blue-500 no-underline border-2 border-blue-500 px-2 py-1 rounded">Comentar</a>
                                            <a href="{{ route('experience.comments', ['experience_id' => $experience['id']]) }}" class="text-blue-500 no-underline border-2 border-blue-500 px-2 py-1 rounded">Comentários</a>
                                        </div>
                                    </div>
                            
                                    
                                </div>
                            </div>

                            

                            @if (($index + 1) % 4 == 0)
                                <div class="w-full my-4"></div>
                            @endif
                        @endforeach
                    </div>

                    <script>
                        function filterByCategory(category) {
                            // Esconde todas as atividades
                            document.querySelectorAll('.experience').forEach(experience => {
                                experience.style.display = 'none';
                            });
                    
                            // Mostra apenas as atividades da categoria selecionada
                            document.querySelectorAll(`.experience.${category}`).forEach(experience => {
                                experience.style.display = 'flex';
                            });
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
