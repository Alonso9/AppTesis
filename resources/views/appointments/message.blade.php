<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Personal Dashboard for create a new Appointment') }} --}}
            <h1 class="title">Formulario para el crear receta medica</h1>
            {{-- {{ Auth::user()->name }} --}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="{{route('appointments.pdfGenerator')}}" method="POST" class="formulario" >
                        @csrf
                        @method('POST')
                        <label for="nombre">Nombre del paciente</label>
                        <input type="text" name="nombre" value="{{$appointment->patientname}}"/><br>
                        {{-- <input value="{{$appointment->id}}" type="hidden" name="id"> --}}
                        <x-input class="block mt-1 w-full" type="text" name="id" value="{{Auth::user()->id}}"></x-input>
                        <input value="1" type="hidden" name="status">
                    
                        <label for="apellidos">Edad del paciente</label>
                        <input type="text" name="matter"/>
                    
                        <label for="mensaje" class="mensaje">Prescripción</label>
                        <textarea name="description" for="mensaje" placeholder="describe brevemente en menos de 300 carácteres" maxlength="300"></textarea>
                        
                        <input type="submit" name="enviar" value="Generar receta"/>
                    </form>

                </div>
            </div>
        </div>
    </div>
    {{-- <script type="text/javascript" src="engine1/jquery.js"></script>  --}}
    <script>
        // $(document).ready(function(){
        //     $.ajax({

        //     })
        // });

        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
          alert(msg);
        }
      </script>
    
    
</x-app-layout>