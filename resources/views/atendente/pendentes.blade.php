<x-app-layout>
    <header class="bg-rose-100 grid h-screen place-items-center pt-12 px-1.5">
        <div class="pb-16 px-1 py-7">
            <div class="bg-white border-2 border-red-500 info max-w-md md:max-w-screen-xl mx-auto overflow-hidden py-5 rounded-xl">
                <p class="font-extrabold md:pb-10 md:px-10 md:text-5xl mt-4 pb-5 px-2 text-4xl text-black text-center">
                    Denúncias Pendentes
                </p>

                <div class="px-8">
                    <hr class="border-1 border-red-500">
                </div> 
                @if (!empty(session('status')))   
                    <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="flex items-center bg-red-500 text-white text-sm font-bold px-3 py-1 mt-5 rounded mx-8" role="alert">
                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                        <p class="m-2 text-lg font-medium leading-tight text-white">
                            {{ session('status') }}
                        </p>
                    </div>
                @endif
                
                <div class="max-h-96 overflow-y-auto">
                    @if(!empty($reports[0]))
                        @foreach ($reports as $report)
                            <div class="grid grid-cols-1 md:grid-cols-2">                
                                <div class="md:flex">
                                    <div class="align-center text-center">
                                        <div class="px-4">       
                                            <div class="md:px-20">
                                                <p class="font-medium md:text-3xl  mt-3 pb-6 pt-2 text-2xl text-black md:text-left text-center">
                                                    <strong>Dispositivo Emissor: </strong>{{ $report->victim->device->id }}    
                                                </p>
                                                <p class="font-medium md:text-3xl  mt-3 pb-6 text-2xl text-black md:text-left text-center">
                                                    <strong>Data da Realização: </strong>{{ $report->created_at->format('d/m/Y') }}  
                                                </p>
                                                <p class="font-medium md:text-3xl mt-3 pb-6 text-2xl text-black md:text-left text-center">
                                                    <strong>Hora da Realização: </strong>{{ $report->created_at->format('H:i') }}  
                                                </p>        
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                                <div class="md:flex mx-auto place-items-center">
                                    <div class="align-center justify-end ml-auto">
                                        <div class="px-4">
                                            <div class="md:pb-0 md:pl-72 pb-4">
                                                <button data-modal-target="defaultModal{{ $report->id }}" data-modal-toggle="defaultModal{{ $report->id }}" class="bg-white border-2 border-red-500 duration-500 mx-2 navbar-btn rounded-full" type="button">
                                                    <img class="md:w-11 px-2 py-2 w-9" src="{{ asset('img/icons/plus.png') }}">
                                                </button>
                                                
                                            </div>    
                                        </div>   
                                    </div>
                                </div>  
                            </div>
                            <div class="px-8">
                                <hr class="border-1 border-red-500">
                            </div> 
                        @endforeach 
                </div>
                    @else    
                        <div class="px-8 text-center">
                            <p class="px-4 py-2 text-red-500 md:text-2xl text-2xl">Não há nenhuma denúncia pendente neste momento.</p>
                            <hr class="border-1 border-red-500">
                        </div>    
                    @endif
            </div>
        </div>
    </header>


    @if(!empty($reports[0]))
        @foreach ($reports as $report)
            <!-- Main modal -->
                <div id="defaultModal{{ $report->id }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow">
                            <!-- Modal header -->
                            <p class="font-extrabold  md:px-10 md:text-4xl mt-4 py-3 px-2 text-3xl text-black text-center">
                                Detalhes da Denúncia
                            </p>     
                        <div class="flex items-start justify-between">
                        <button type="button" class="text-red-500 bg-transparent hover:bg-rose-200 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal{{ $report->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Fechar Janela</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="md:px-2 px-2">
                        <hr class="border-1 border-red-500">
                    </div>
                    <div class="px-6">
                        <div class="grid md:grid-rows-1 grid-rows-1 grid-flow-col">
                            <div>
                                <p class="font-medium md:text-2xl md:text-center mt-3 pb-4 text-xl text-black text-center">
                                    <strong>DENÚNCIA</strong>
                                </p>
                            </div>
                        </div>
                        <div class="grid md:grid-rows-1 grid-rows-1 grid-flow-col pb-3">
                            <div>
                                <p class="font-medium md:text-2xl md:text-center mt-3 pb-4 text-xl text-black text-center"> 
                                    <strong>Dispositivo Emissor: </strong>{{ $report->victim->device->id }}           
                                </p>
                            </div>
                        </div>    
                        <div class="grid md:grid-rows-1 grid-rows-2 grid-flow-col gap-3">    
                            <div>
                                <p class="font-medium md:text-2xl md:text-center mt-3 pb-4 text-xl text-black text-center">
                                    <strong>Data da Realização: </strong><br>{{ $report->created_at->format('d/m/Y') }}            
                                </p>
                            </div>
                            <div>
                                <p class="font-medium md:text-2xl md:text-center mt-3 pb-4 text-xl text-black text-center">
                                    <strong>Hora da Realização: </strong><br>{{ $report->created_at->format('H:i') }}     
                                </p>
                            </div>
                        </div>
                        <div>
                            <hr class="border-1 border-red-500">
                        </div>    
                        <div class="grid md:grid-rows-1 grid-rows-1 grid-flow-col">
                            <div>
                                <p class="font-medium md:text-2xl md:text-center mt-3 pb-4 text-xl text-black text-center">
                                    <strong>LOCALIZAÇÃO</strong>
                                </p>
                            </div>
                        </div>

                        <div class="grid md:grid-rows-1 grid-rows-2 grid-flow-col gap-3">    
                            <div>
                                <p class="font-medium md:text-2xl md:text-center mt-3 pb-4 text-xl text-black text-center"> 
                                    <strong>Latitude: </strong>{{ $report->latitude }}       
                                </p>
                            </div>
                            <div>
                                <p class="font-medium md:text-2xl md:text-center mt-3 pb-4 pl-18 text-xl text-black text-center">
                                    <strong>Longitude: </strong>{{ $report->longitude }}  
                                </p>
                            </div>   
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="md:px-2 px-2">
                        <hr class="border-1 border-red-500">
                    </div>
                    <div class="grid md:grid-rows-1 grid-rows-2 grid-flow-col">    
                        <form method="post" action="{{ route('atendente.acatar', $report->id) }}"> 
                            <div class="flex justify-center items-center md:py-6 py-3 rounded-b">
                                @csrf
                                @method('patch')
                                <button type="submit" class="bg-red-500 block border-2 border-red-500 font-bold info-two p-2.5 rounded text-lg text-white w-10/12">
                                    Acatar
                                </button>
                            </div>     
                        </form> 
                        <div class="flex justify-center items-center md:py-6 py-3 rounded-b">  
                            <button data-modal-hide="defaultModal{{ $report->id }}" class="bg-white block border-2 border-red-500 font-bold info-two p-2.5 rounded text-lg text-red-500 w-10/12">
                                Fechar
                            </button>  
                        </div>     
                    </div>          
                </div>
                </div>
                </div>
        @endforeach 
    @endif

</x-app-layout>