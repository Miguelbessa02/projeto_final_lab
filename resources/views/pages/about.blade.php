<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @include('includes.header-feed')
        </h2>
    </x-slot>

    <div class="mt-5 mb-5 bg-white pt-4 ml-16 mr-16 pb-4 pr-10 pl-10 shadow-md text-black text-center">
        <h2 class="text-3xl mb-6 font-bold">Sobre Nós</h2>
    
        <section class="mb-8">
            <h3 class="text-2xl mb-4 font-bold">História ou Missão:</h3>
            <p class="text-gray-700">A história por trás deste projeto remonta à necessidade de criar uma plataforma dinâmica que conecta usuários interessados em compartilhar experiências, produtos ou serviços em diversas cidades e países. A missão fundamental é proporcionar um espaço onde a comunidade possa interagir, descobrir novidades e, ao mesmo tempo, promover a diversidade cultural e comercial.</p>
        </section>
    
        <section class="mb-8">
            <h3 class="text-2xl mb-4 font-bold">Equipa:</h3>
            <p class="text-gray-700">A nossa equipa é composta por dois estudantes de Engenharia Informática na Universidade Fernando Pessoa, trazendo consigo uma paixão pela tecnologia e um compromisso com a excelência. Embora ainda estejamos em fase de formação, estamos empenhados em contribuir para o projeto com as nossas habilidades e conhecimentos. Reconhecemos a importância das contribuições individuais e acreditamos que, mesmo enquanto estudantes, podemos desempenhar um papel fundamental no sucesso coletivo do projeto. Estamos entusiasmados por fazer parte deste projeto e ansiosos para aprender e crescer enquanto colaboramos na criação de uma plataforma inovadora e envolvente.</p>
        </section>
    
        <section class="mb-8">
            <h3 class="text-2xl mb-4 font-bold">Visão Futura:</h3>
            <p class="text-gray-700">A nossa visão para o futuro deste projeto é construir uma comunidade online vibrante, onde utilizadores de diferentes partes do mundo possam partilhar e descobrir experiências enriquecedoras. Temos planos para expandir a plataforma, integrando funcionalidades inovadoras que proporcionem uma experiência ainda mais personalizada. O nosso objetivo é tornar esta plataforma uma referência global para interações sociais e negócios locais.</p>
        </section>
    </div>
    

</x-app-layout>