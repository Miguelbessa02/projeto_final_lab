<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @include('includes.header-feed')
        </h2>
    </x-slot>

    <div class="flex items-center justify-center ">
        <div class="bg-white mt-4 mb-20">
            <h2 class="text-2xl font-bold my-2 ml-10 ">Crie um anúncio novo:</h2>

            <form method="post" action="{{ route('dashboard') }}" enctype="multipart/form-data" class="bg-white shadow-md rounded px-20 pb-8 mb-4 mx-6">                @csrf

                <div class="mb-2 ">
                    <label for="title" class="block text-gray-700 text-lg font-bold mb-2">Titulo:</label>
                    <input type="text" class="form-input pr-8" id="title" name="title" required>
                </div>

                <div class="mb-2 ">
                    <label for="description" class="block text-gray-700 text-lg font-bold mb-2">Descrição:</label>
                    <textarea class="form-input pr-8" id="description" name="description" required></textarea>
                </div>

                <div class="mb-2 ">
                    <label for="price" class="block text-gray-700 text-lg font-bold mb-2">Preço:</label>
                    <input type="number" class="form-input pr-8" id="price" name="price" required>
                </div>

                <div class="mb-2 ">
                    <label for="address" class="block text-gray-700 text-lg font-bold mb-2">Morada:</label>
                    <input type="text" class="form-input pr-8" id="address" name="address" required>
                </div>

                <div class="mb-4 ">
                    <label for="category" class="block text-gray-700 text-lg font-bold mb-2">Categoria:</label>
                    <select class="form-select pr-8" id="category" name="category" required>
                        <option value="sport">Sport</option>
                        <option value="culture">Culture</option>
                        <option value="nature">Nature</option>
                        <option value="gastronomy">Gastronomy</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Imagem da Experiência</label>
                    <input type="file" name="image" id="image" accept="image/*">
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Criar Anuncio</button>
            </form>
        </div>
    </div>
    

</x-app-layout>