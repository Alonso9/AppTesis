<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Personal Dashboard for create a new Appointment') }} --}}
            <h1 class="title">Dashboard personal del medico {{Auth::user()->name}} para creacion de citas</h1>
            {{-- {{ Auth::user()->name }} --}}
        </h2>
    </x-slot>

    <div class="py-12" onload="myFunction()">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{route('appointments.store')}}" method="POST" >
                        @csrf
                        @method('POST')
                        <x-input class="block mt-1 w-full" type="hidden" name="medicId" value="{{ Auth::user()->id }}"></x-input>
                        <x-input class="block mt-1 w-full" type="hidden" name="status" value="0"></x-input>
                        <div class="grid grid-cols-2 gap-6">
                            <div class="grid grid-row-2 gap-6">
                                {{-- Para llamar un componente se usa x-nombre --}}
                                <div>
                                    <x-label for="name" :value="__('Dia de la cita:')"></x-label>
                                    <x-input class="block mt-1 w-full" type="date" name="date" id="fd" min="2022-12-12" required></x-input>
                                </div>
                                <div>
                                    {{-- <x-label for="name" :value="__('Patient name')"></x-label> --}}
                                    <x-label for="name" :value="__('Nombre completo del paciente:')"></x-label>
                                    <x-input class="block mt-1 w-full" autocomplete="off" list="patientname" type="text" name="patientname" placeholder="Full name"></x-input>                                    
                                    <datalist id="patientname">
                                    @foreach ($patients as $patient)        
                                        <option value="{{ $patient->patientname }}">
                                    @endforeach
                                    </datalist>
                                </div>
                                <div>
                                    <x-label for="name" :value="__('Numero de Seguro Social:')"></x-label>
                                    <x-input class="block mt-1 w-full" type="text" name="socialNumber" required></x-input>
                                </div>
                                <div>
                                    <x-label for="password" :value="__('Hora de la cita:')"></x-label>
                                    {{-- <select class="form-control" name="hour" id="hora" size="2">
                                        <option>Seleccione una hora ...</option>
                                    </select> --}}
                                    <x-input class="block mt-1 w-full"  name="hour" list="hora" autocomplete="off" required/>
                                    <datalist id="hora">
                                    </datalist>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                                Save
                            </x-button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    <script>
        window.onload = function(){
            hours();
            function hoy(dia){
                var fechaHoy = new Date();
                var dd = fechaHoy.getDate()+dia;
                var mm = fechaHoy.getMonth()+1; //enero es 0
                var yyyy = fechaHoy.getFullYear();
                if(dd<10){
                        dd='0'+dd
                    } 
                    if(mm<10){
                        mm='0'+mm
                    }
                return fechaHoy = yyyy+'-'+mm+'-'+dd;
            }
            
            document.getElementById('fd').setAttribute("min", hoy(0));

            document.getElementById('fd').addEventListener('focusout', function(){
                let fentra = document.getElementById('fd').value;
                console.log("entrada: "+fentra);                
            });
        }

        function hours(){
            var array1 = ['7:00:00', '7:30:00', '8:00:00', '8:30:00', '9:00:00', '9:30:00', '10:00:00', '10:30:00', '11:00:00', '11:30:00', '12:00:00', '12:30:00', '13:00:00', '13:30:00'];
            var array2 = ['14:00:00', '14:30:00', '15:00:00', '15:30:00', '16:00:00', '16:30:00', '17:00:00', '17:30:00', '18:00:00', '18:30:00', '19:00:00', '19:30:00', '20:00:00', '20:30:00'];
            var horas = [].concat(array1,array2);
            var select = document.getElementById('hora');
            for(var i=0; i < horas.length; i++){ 
                var option = document.createElement("option"); //Creamos la opcion
                var value = document.createElement("value"); //Creamos la opcion
                option.innerHTML = horas[i]; //Metemos el texto en la opción
                value.innerHTML = horas[i]; //Metemos el texto en la opción
                select.appendChild(option); //Metemos la opción en el select
                // select.appendChild(value); //Metemos la opción en el select
            }
        }

        if(exist){
          alert(msg);
        }
      </script>
    
    
</x-app-layout>