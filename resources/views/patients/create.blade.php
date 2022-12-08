<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Formulacio para editar historial medico del paciente: ') }}
            {{ $patient->patientname }}
        </h2>
    </x-slot>

    <div class="py-12" onload="getLocation()">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{route('patients.saveRecords')}}" method="post" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        {{-- @csrf --}}
                        <div class="grid grid-cols-2 gap-6">
                            <div class="grid grid-row-2 gap-6">
                                {{-- Para llamar un componente se usa x-nombre --}}
                                
                                <div>
                                    <x-label for="name" :value="__('Etnia')"></x-label>
                                    <x-input class="block mt-1 w-full" type="text" name="id" value="{{$patient->id}}" type="hidden"></x-input>
                                    <x-input class="block mt-1 w-full" type="text" name="ethnicity" required></x-input>
                                </div>
                                
                                <div>
                                    <x-label for="email" :value="__('Dia de Nacimiento')"></x-label>
                                    <x-input class="block mt-1 w-full" type="date" name="dob" required></x-input>
                                </div>

                                <div>
                                    <x-label for="email" :value="__('Cirugias (sino tiene especifique como ninguna)')"></x-label>
                                    <x-input class="block mt-1 w-full" type="text" name="surgeries" required></x-input>
                                </div>
                                <div>
                                    <x-label for="email" :value="__('Sexo')"></x-label>
                                    <x-input class="block mt-1 w-full" type="text" name="sex" list="sex" required></x-input>
                                    <datalist id="sex">
                                        <option value="Mujer">
                                        <option value="Hombre">
                                      </datalist>
                                </div>
                                <div>
                                    <x-label for="email" :value="__('Numero de celular')"></x-label>
                                    <x-input class="block mt-1 w-full" type="text" name="numbre_phone" placeholder="314-100-4281" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" autocomplete="off" required></x-input>
                                </div>
                                <div>
                                    <x-label for="email" :value="__('Descripcion del historial medico familiar')"></x-label>
                                    <x-input class="block mt-1 w-full" type="text" name="familybackgr" required></x-input>
                                </div>
                                <div>
                                    <x-label for="email" :value="__('Diabetes')"></x-label>
                                    <x-input class="block mt-1 w-full" type="text" name="diabetes" list="diab" required></x-input>
                                    <datalist id="diab">
                                        <option value="Si">
                                        <option value="NO">
                                        <option value="Desconoce">
                                      </datalist>
                                </div>
                                <div>
                                    <x-label for="email" :value="__('Huesos rotos')"></x-label>
                                    <x-input class="block mt-1 w-full" type="text" name="broken_bones" required></x-input>
                                </div>
                                <div>
                                    <x-label for="email" :value="__('Tipo de sangre')"></x-label>
                                    <x-input class="block mt-1 w-full" type="text" name="blood_type" list="bot" required></x-input>
                                    <datalist id="bot">
                                        <option value="A+">
                                        <option value="A-">
                                        <option value="B+">
                                        <option value="B-">
                                        <option value="AB+">
                                        <option value="AB-">
                                        <option value="O+">
                                        <option value="O-">
                                    </datalist>
                                </div>
                            </div>                
                        
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                                Actualizar
                            </x-button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
          alert(msg);
        }
      </script>
    
    
</x-app-layout>