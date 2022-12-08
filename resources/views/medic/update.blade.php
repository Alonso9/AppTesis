<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Formulacio para editar informacion del medico: ') }}
            {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12" onload="getLocation()">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{route('medic.update')}}" method="post" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        {{-- @csrf --}}
                        @if (count($medic)<=0)
                        <div class="grid grid-cols-2 gap-6">
                            <div class="grid grid-row-2 gap-6">
                                {{-- Para llamar un componente se usa x-nombre --}}
                                
                                <div>
                                    <x-label for="name" :value="__('Numero de celula profecional')"></x-label>
                                    <x-input class="block mt-1 w-full" type="text" name="id" value="{{Auth::user()->id}}" type="hidden"></x-input>
                                    <x-input class="block mt-1 w-full" type="text" id="lat" name="lat" ></x-input>
                                    <x-input class="block mt-1 w-full" type="text" id="lng" name="lng" ></x-input>
                                    <x-input class="block mt-1 w-full" type="text" name="license"></x-input>
                                </div>
                                
                                <div>
                                    <x-label for="email" :value="__('Especialidad')"></x-label>
                                    <x-input class="block mt-1 w-full" type="text" name="specialty"></x-input>
                                </div>

                                <div>
                                    <x-label for="email" :value="__('Numero de alta ante la secretaria de salud')"></x-label>
                                    <x-input class="block mt-1 w-full" type="text" name="status"></x-input>
                                </div>
                                <div>
                                    <x-label for="email" :value="__('Descripcion profecional')"></x-label>
                                    <x-input class="block mt-1 w-full" type="text" name="description"></x-input>
                                </div>
                                <div>
                                    <x-label for="email" :value="__('Numero de celular')"></x-label>
                                    <x-input class="block mt-1 w-full" type="text" name="numbre_phone" placeholder="314-100-4281" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required></x-input>
                                </div>
                                <div>
                                    <x-label :value="__('Imagen de perfil')"></x-label>
                                    <x-input class="block mt-1 w-full" type="file" name="imagen" ></x-input>
                                </div>        
                            </div>                
                        @else
                        @foreach($medic as $medic)
                        <div class="grid grid-cols-2 gap-6">
                            <div class="grid grid-row-2 gap-6">
                                {{-- Para llamar un componente se usa x-nombre --}}
                                
                                <div>
                                    <x-label for="name" :value="__('Numero de celula profecional')"></x-label>
                                    <x-input class="block mt-1 w-full" type="text" name="id" value="{{Auth::user()->id}}" type="hidden"></x-input>
                                    <x-input class="block mt-1 w-full" type="text" id="lat" name="lat" value="{{$medic->lat}}"></x-input>
                                    <x-input class="block mt-1 w-full" type="text" id="lng" name="lng" value="{{$medic->lng}}"></x-input>
                                    <x-input class="block mt-1 w-full" type="text" name="license" value="{{$medic->status}}"></x-input>
                                </div>
                                
                                <div>
                                    <x-label for="email" :value="__('Especialidad')"></x-label>
                                    <x-input class="block mt-1 w-full" type="text" name="specialty" value="{{$medic->specialty}}"></x-input>
                                </div>

                                <div>
                                    <x-label for="email" :value="__('Numero de alta ante la secretaria de salud')"></x-label>
                                    <x-input class="block mt-1 w-full" type="text" name="status" value="{{$medic->status}}"></x-input>
                                </div>
                                <div>
                                    <x-label for="email" :value="__('Descripcion profecional')"></x-label>
                                    <x-input class="block mt-1 w-full" type="text" name="description" value="{{$medic->description}}"></x-input>
                                </div>
                                <div>
                                    <x-label for="email" :value="__('Numero de celular')"></x-label>
                                    <x-input class="block mt-1 w-full" type="text" name="numbre_phone" value="{{$medic->numbre_phone}}" placeholder="314-100-4281" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required></x-input>
                                </div>
                                <div>
                                    <x-label :value="__('Actualizar imagen para el perfil')"></x-label>
                                    <x-input class="block mt-1 w-full" type="file" name="imagen" ></x-input>
                                    {{-- <x-label for="email" :value="__('Imagen para el perfil (Solo se aceptan formato de imagenes)')"></x-label> --}}
                                    {{-- <x-input class="block mt-1 w-full" type="file" value="{{$medic->img}}" name="img" ></x-input> --}}
                                </div>        
                            </div>
                        @endforeach
                        @endif
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

        const options = {
        enableHighAccuracy: true,
        timeout: 5000,
        maximumAge: 0
        };

        function getLocation(pos) {
            const crd = pos.coords;

            console.log('Your current position is:');
            console.log(`Latitude : ${crd.latitude}`);
            console.log(`Longitude: ${crd.longitude}`);
            console.log(`More or less ${crd.accuracy} meters.`);

            document.getElementById("lat").value = crd.latitude;
            document.getElementById("lng").value = crd.longitude;
        }

        function error(err) {
             console.warn(`ERROR(${err.code}): ${err.message}`);
             alert("Es necesario acceder a su ubicacion!")
        }

        navigator.geolocation.getCurrentPosition(getLocation, error, options);



      </script>
    
    
</x-app-layout>