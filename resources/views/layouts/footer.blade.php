
<footer>
    @if (!Auth::user())
    
        <hr class="border-2 border-red-300">
        <div class="bottom-0 static w-full">
            <div class="bg-red-400 font-bold grid grid-cols-1 md:grid-cols-2 px-3 w-full">
            <div class="flex items-center justify-center lg:items-start lg:justify-start pt-2">
                <img class="footer py-2 w-52" src="{{ asset('img/logos/logoTres.png') }}">
            </div>
            <div class="grid grid-cols-3 justify-center lg:flex lg:justify-end lg:space-x-4 place-items-center">
                <a href="https://twitter.com/LadySteel461386?t=jocU3oaxCapXrYixzkLjiA&s=08"><img class="info-two py-2 w-11" src="{{ asset('img/icons/twitter.png') }}"></a>
                <a href="https://www.instagram.com/ladysteel_tcc/?utm_source=qr&igshid=MzNlNGNkZWQ4Mg%3D%3D"><img class="info-two py-2 w-11" src="{{ asset('img/icons/instagram.png') }}"></a>
                <a href="https://api.whatsapp.com/send?phone=5511932212110"><img class="info-two py-2 w-11" src="{{ asset('img/icons/whatsapp.png') }}"></a>
            </div>
            </div>

            <hr class="border-2 border-red-300">
            <div class="bg-red-400 p-5">
            <div class="max-w-7xl mt-5 mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-3 text-center">
                <div class="mb-2 px-10">
                    <h4 class="font-black pb-4 text-3xl">LadySteel</h4>
                    <p class="text-justify text-lg">
                    Buscando um meio de auxiliar no
                    combate a um fenômeno social
                    de tamanha proporção como a
                    violência doméstica contra a
                    mulher, o LadySteel foi criado. <br><br>
                    </p>
                </div>

                <div class="mb-5">
                    <a href="https://www.planalto.gov.br/ccivil_03/_ato2004-2006/2006/lei/l11340.htm" target="_blank">
                        <h4 class="font-black pb-4 text-3xl">A Lei</h4>
                        <p class="text-lg">
                        Acesse a Lei Maria da Penha<br> 
                        <strong> Lei 11.340/2006</strong><br>
                        </p>
                    </a>    
                </div>
                <div class="mb-5">
                    <h4 class="font-black pb-4 text-3xl">Contato</h4>
                    <p class="text-lg"><strong>Phone:</strong>
                    +55 (11) 9 3221-2110 <br>
                    <a href="mailto:ladysteelmvj@gmail.com?subject=Mensagem ao LadySteel">
                        <strong>Email:</strong>
                        ladysteelmvj@gmail.com<br></p>
                    </a>    
                </div>
                </div>
            </div>
            </div>

            <hr class="border-2 border-red-300">
            <div class="bg-red-400 px-10 py-3 w-full">
                <div>
                    <div class="text-center">
                    <div class="text-lg">
                        @2023 Copyright <strong><span>LadySteel</span></strong> | Todos
                        os Direitos Reservados
                    </div>
                    </div>
                </div>
            </div>
        </div>
    @else

        <div class="relative bottom-0 w-full bg-red-400 px-10 py-3">
            <hr class="fixed border-red-300">
            <div class="text-center text-lg">
                @2023 Copyright <strong><span>LadySteel</span></strong> | Todos os Direitos Reservados
            </div>
            <hr class="fixed border-red-300">
        </div>

    @endif
</footer>
