<x-app-layout>
  @inject('calendar', '\Carbon\Carbon')
  <header class="bg-rose-100 grid h-full place-items-center pt-12 px-1.5">
        <div class="pb-16 px-1 py-7 ">
            <div class="bg-white border-2 border-red-500 divide-red-500 grid grid-cols-1 info max-w-md lg:divide-x-2 lg:grid-cols-2 md:max-w-screen-xl mx-auto overflow-hidden py-8 rounded-xl">
                <div class="md:flex place-items-center">
                    <div class="align-center text-center">
                        <div class="md:px-32 px-4">
                            <p class="font-extrabold md:px-10 md:text-5xl mt-4 text-3xl text-black">
                                Atendente
                            </p>
                            <div class="card md:my-10 my-5">
                                <img class="md:w-80 mx-auto rounded-full w-80" src="{{ asset($attendant->img) }}">
                                <button data-modal-target="defaultModal" data-modal-toggle="defaultModal" type="button">
                                    <div class="overlay rounded-full">
                                        <h1>
                                            <img src="{{ asset('img/icons/draw.png') }}" class="w-36">
                                        </h1>
                                    </div>
                                </button>    
                            </div>
                            <p class="font-bold md:text-4xl mt-4 text-2xl text-black">
                              {{ $attendant->name . ' ' . $attendant->lastname }}
                            </p>
                            <p class="font-medium md:text-2xl mt-1 text-black text-xl">
                              {{ $attendant->username }}
                            </p>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="md:flex place-items-center justify-center">
                    <div class="align-center text-center">

                        @if (!empty(session('status')))   
                            <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                class="flex items-center bg-red-500 text-white text-sm font-bold px-3 py-1 mt-5 rounded" role="alert">
                                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                                <p class="m-2 text-lg font-medium leading-tight text-white">
                                    {{ session('status') }}
                                </p>
                            </div>
                        @endif

                        <div class="px-6">
                            <div class="font-semibold grid grid-cols-2 text-2xl text-red-500 w-full px-5 py-2">
                                <a href="{{ route('supervisor.editar-atendente',  $attendant->id) }}" class="flex items-end justify-start cursor-pointer">
                                    <img src="{{ asset('img/icons/draw.png') }}" class="w-7">
                                    <p class="max-[640px]:invisible">&nbsp;&nbsp;Editar</p>
                                </a>
                                @include('supervisor.partials.inativar-attendant')
                            </div>
                            <hr class="border-1 border-red-500">
                        </div>
                        <div class="px-8">
                            <div>
                                <p class="font-medium md:text-3xl mt-3 pb-4 pt-5 text-black text-left text-xl">
                                  <strong>Email: </strong>{{ $attendant->email }}
                                </p>

                                <p class="font-medium md:text-3xl mt-3 pb-4 text-black text-left text-xl">
                                  <strong>ID Funcionário: </strong>{{ $attendant->id }}
                                </p>

                                <p class="font-medium md:text-3xl  mt-3 pb-4 text-black text-left text-xl">
                                  <strong>Data de Nascimento: </strong>{{ $calendar->parse($attendant->birthday)->format('d/m/Y') }}
                                </p>
                                
                                <p class="font-medium md:text-3xl  mt-3 pb-4 text-black text-left text-xl">
                                  <strong>Senha: </strong>••••••••    
                                </p>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main modal -->
    <div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <p class="font-extrabold md:px-10 md:text-4xl mt-4 py-3 px-2 text-3xl text-black text-center">
                    Alterar Avatar
                </p>     
                <div class="flex items-start justify-between">
                    <button type="button" class="text-red-500 bg-transparent hover:bg-rose-200 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Fechar Janela</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form method="POST" action="{{ route('supervisor.atendente-update', $attendant->id) }}">
                    @csrf
                    @method('patch')
                    <div class="p-6 space-y-6">
                        <div class="grid md:grid-rows-2 grid-rows-4 grid-flow-col gap-4 justify-center">
                            <div>
                                <fieldset class="radio-image ">
                                    <label for="one">
                                        <input class="md:w-28 mx-auto rounded-full w-20 border-4 border-rose-400 hover:border-red-500" @if($attendant->img === 'img/avatares/avatar-one.png') checked @endif type="radio" name="img" id="one" value="img/avatares/avatar-one.png">
                                        <img class="md:w-28 mx-auto rounded-full w-20 border-4 border-rose-400 hover:border-red-500" src="{{ asset('img/avatares/avatar-one.png') }}">
                                    </label>
                                    <label for="two">
                                        <input class="md:w-28 mx-auto rounded-full w-20 border-4 border-rose-400 hover:border-red-500" @if($attendant->img === 'img/avatares/avatar-two.png') checked @endif type="radio" name="img" id="two" value="img/avatares/avatar-two.png">
                                        <img class="md:w-28 mx-auto rounded-full w-20 border-4 border-rose-400 hover:border-red-500" src="{{ asset('img/avatares/avatar-two.png') }}">
                                    </label>
                                    <label for="three">
                                        <input class="md:w-28 mx-auto rounded-full w-20 border-4 border-rose-400 hover:border-red-500" @if($attendant->img === 'img/avatares/avatar-three.png') checked @endif type="radio" name="img" id="three" value="img/avatares/avatar-three.png">
                                        <img class="md:w-28 mx-auto rounded-full w-20 border-4 border-rose-400 hover:border-red-500" src="{{ asset('img/avatares/avatar-three.png') }}">
                                    </label>
                                    <label for="four">
                                        <input class="md:w-28 mx-auto rounded-full w-20 border-4 border-rose-400 hover:border-red-500" @if($attendant->img === 'img/avatares/avatar-four.png') checked @endif type="radio" name="img" id="four" value="img/avatares/avatar-four.png">
                                        <img class="md:w-28 mx-auto rounded-full w-20 border-4 border-rose-400 hover:border-red-500" src="{{ asset('img/avatares/avatar-four.png') }}">
                                    </label>

                                    <label for="five">
                                        <input class="md:w-28 mx-auto rounded-full w-20 border-4 border-rose-400 hover:border-red-500" @if($attendant->img === 'img/avatares/avatar-five.png') checked @endif type="radio" name="img" id="five" value="img/avatares/avatar-five.png">
                                        <img class="md:w-28 mx-auto rounded-full w-20 border-4 border-rose-400 hover:border-red-500" src="{{ asset('img/avatares/avatar-five.png') }}">
                                    </label>
                                    <label for="six">
                                        <input class="md:w-28 mx-auto rounded-full w-20 border-4 border-rose-400 hover:border-red-500" @if($attendant->img === 'img/avatares/avatar-six.png') checked @endif type="radio" name="img" id="six" value="img/avatares/avatar-six.png">
                                        <img class="md:w-28 mx-auto rounded-full w-20 border-4 border-rose-400 hover:border-red-500" src="{{ asset('img/avatares/avatar-six.png') }}">
                                    </label>
                                    <label for="seven">
                                        <input class="md:w-28 mx-auto rounded-full w-20 border-4 border-rose-400 hover:border-red-500" @if($attendant->img === 'img/avatares/avatar-seven.png') checked @endif type="radio" name="img" id="seven" value="img/avatares/avatar-seven.png">
                                        <img class="md:w-28 mx-auto rounded-full w-20 border-4 border-rose-400 hover:border-red-500" src="{{ asset('img/avatares/avatar-seven.png') }}">
                                    </label>
                                    <label for="eight">
                                        <input class="md:w-28 mx-auto rounded-full w-20 border-4 border-rose-400 hover:border-red-500" @if($attendant->img === 'img/avatares/avatar-eight.png') checked @endif type="radio" name="img" id="eight" value="img/avatares/avatar-eight.png">
                                        <img class="md:w-28 mx-auto rounded-full w-20 border-4 border-rose-400 hover:border-red-500" src="{{ asset('img/avatares/avatar-eight.png') }}">
                                    </label>
                                </fieldset>
                            </div>
                            
                            <div>
                                <button type="button">
                                    <img class="md:w-28 mx-auto rounded-full w-20 border-4 border-rose-400 hover:border-red-500" src="{{ asset('img/avatares/avatar-two.png') }}">
                                </button>
                            </div>   
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="md:px-2 px-2">
                        <hr class="border-1 border-red-500">
                    </div>
                    <div class="flex text-center items-center p-6 space-x-12 rounded-b">
                        <button type="submit" class="bg-red-500 block border-2 border-red-500 font-bold info-two p-2.5 rounded text-lg text-white w-6/12">
                            Alterar
                        </button> 
                        <button data-modal-hide="defaultModal" class="bg-white block border-2 border-red-500 font-bold info-two p-2.5 rounded text-lg text-red-500 w-6/12">
                            Fechar
                        </button>                    
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>