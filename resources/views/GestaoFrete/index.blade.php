<x-layout tittle="Sistema de Gestão de Fretes M.M.D.S Transportes Rodoviários">

    <body class="">
        <div class="container-fluid border bg-primary">
            <div class="row">
                    <div class="btn-group btn-group-lg">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                </svg>
                                Controle de Motoristas
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('motorista-create')}}">Cadastrar Motorista</a>
                                <a class="dropdown-item" href="{{ route('motorista-index')}}">Consultar Motorista</a>
                            </div>
                        </div>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck-front" viewBox="0 0 16 16">
                                        <path d="M5 11a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm8 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm-6-1a1 1 0 1 0 0 2h2a1 1 0 1 0 0-2H7Z"/>
                                        <path fill-rule="evenodd" d="M4 2a1 1 0 0 0-1 1v3.9c0 .625.562 1.092 1.17.994C5.075 7.747 6.792 7.5 8 7.5c1.208 0 2.925.247 3.83.394A1.008 1.008 0 0 0 13 6.9V3a1 1 0 0 0-1-1H4Zm0 1h8v3.9c0 .002 0 .001 0 0l-.002.004a.013.013 0 0 1-.005.002h-.004C11.088 6.761 9.299 6.5 8 6.5s-3.088.26-3.99.406h-.003a.013.013 0 0 1-.005-.002L4 6.9c0 .001 0 .002 0 0V3Z"/>
                                        <path fill-rule="evenodd" d="M1 2.5A2.5 2.5 0 0 1 3.5 0h9A2.5 2.5 0 0 1 15 2.5v9c0 .818-.393 1.544-1 2v2a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5V14H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2a2.496 2.496 0 0 1-1-2v-9ZM3.5 1A1.5 1.5 0 0 0 2 2.5v9A1.5 1.5 0 0 0 3.5 13h9a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 12.5 1h-9Z"/>
                                    </svg>    Controle de Caminhões
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('caminhao-create')}}">Cadastrar caminhão</a>
                                    <a class="dropdown-item" href="{{ route('caminhao-index')}}">Consultar caminhão</a>
                                </div>
                            </div>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                                </svg>
                                Controle de Clientes
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('cliente-create')}}">Cadastrar Cliente</a>
                                <a class="dropdown-item" href="{{ route('cliente-index')}}">Consultar Cliente</a>
                            </div>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                                    <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                </svg>
                                Controle de Fretes
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('frete-create')}}">Cadastrar Frete</a>
                                <a class="dropdown-item" href="{{ route('frete-index')}}">Consultar Frete</a>
                            </div>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
                                    <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
                                    <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
                                    <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
                                </svg>
                                Despesas Fixas
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('despesasfixas-create')}}">Cadastrar Despesas Fixas</a>
                                <a class="dropdown-item" href="{{ route('despesasfixas-index')}}">Despesas Fixas</a>
                            </div>
                        </div>

                        </div>
                    </div>
            </div>
        <div class="container-fluid flex  p-3 my-3 align-items-center d-flex">
            <img src="/img/caminhaoMMDS1.jpg" alt="Banner" class="w-50">
            <img src="/img/caminhaoMMDS2.jpg" alt="Banner" class="w-50">
        </div>
        <footer class="text-center text-white fixed-bottom" style="background-color: #0c63e4;">
            <!-- Grid container -->
            <div class="container p-4"></div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: #0c63e4;">
                © 2022 Copyright: M.M.D.S Transportes Rodoviários
                <a class="text-white" href="https://mdbootstrap.com/"></a>
            </div>
            <!-- Copyright -->
        </footer>
    </body>
</x-layout>






