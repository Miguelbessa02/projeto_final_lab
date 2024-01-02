<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @include('includes.header-feed')
        </h2>
    </x-slot>

    <div class="mt-5 ml-16 mr-16 bg-white pt-4 pb-4 pr-10 pl-10 shadow-md text-black text-center">
        <h2 class="text-3xl mb-6 font-bold">Ajuda</h2>
    
        <section class="mb-8 text-left">
            <h3 class="text-2xl mb-4 font-bold">Como Funciona?</h3>
            <p class="text-gray-700 text-lg">O nosso site proporciona uma plataforma dinâmica para que os utilizadores possam partilhar experiências, produtos e serviços.</p> 
            <p class="text-gray-700 text-lg">Aqui estão algumas funcionalidades principais:</p>
            <ul class="list-disc ml-8">
                <li>Explore anúncios em diversas cidades e países.</li>
                <li>Interaja com a comunidade através de likes, comentários e favoritos.</li>
                <li>Realize transações seguras através da nossa plataforma.</li>
            </ul>
        </section>
    
        <section class="mb-8 text-left">
            <h3 class="text-2xl mb-4 font-bold">Como comprar?</h3>
            <p class="text-gray-700 text-lg">Para fazer uma compra, siga estes passos simples:</p>
            <ol class="list-decimal ml-8">
                <li>Faça login na sua conta ou registe-se se ainda não tiver uma.</li>
                <li>Escolha a cidade e categoria apropriadas.</li>
                <li>Clique no que deseja comprar no feed.</li>
                <li>Preencha as informações necessárias.</li>
                <li>Clique em "Finalizar compra".</li>
            </ol>
        </section>
    </div>
    

</x-app-layout>