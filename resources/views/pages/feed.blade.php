@extends('dashboard')

@section('content-dashboard')
    <!-- Seção da imagem no topo -->
    <div id="header-image" class="mb-4">
        <img src="/caminho/para/sua/imagem.jpg" alt="Imagem Principal" class="w-full" />
    </div>

    <!-- Seção dos botões -->
    <div id="category-buttons" class="mb-4">
        <button onclick="filterByCategory('desporto')" class="bg-blue-500 text-black py-2 px-4 rounded">Desporto</button>
        <button onclick="filterByCategory('cultura')" class="bg-blue-500 text-black py-2 px-4 rounded">Cultura</button>
        <button onclick="filterByCategory('gastronomia')" class="bg-blue-500 text-black py-2 px-4 rounded">Gastronomia</button>
        <button onclick="filterByCategory('natureza')" class="bg-blue-500 text-black py-2 px-4 rounded">Natureza</button>
    </div>

    <!-- Seção de exibição das atividades -->
    <div id="activities-section" class="flex flex-wrap -mx-2">
        @foreach ($experiences as $index => $experience)
            <div class="w-full sm:w-1/2 md:w-1/4 lg:w-1/4 px-2 mb-4 experience {{ $experience['category'] }}">
                <div class="bg-white p-4 rounded border">
                    <img src="{{ $experience['image'] }}" alt="{{ $experience['title'] }}" class="w-full mb-2 rounded" />
                    <h3 class="text-lg font-semibold">{{ $experience['title'] }}</h3>
                    <p class="text-gray-700">{{ $experience['description'] }}</p>
                    <p class="text-gray-800 font-bold">Preço: {{ $experience['price'] }}</p>
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
    
@endsection