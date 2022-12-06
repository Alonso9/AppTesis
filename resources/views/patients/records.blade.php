@if($patient->idMedic != Auth::user()->id)
  <script>
    window.alert("El sistema ha dectetado anomalias en la URL, sera enviado a su Dashboard");
    window.location = "/dashboard";
  </script>
@else
  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
      
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  <h1 class="textAppo">
                    Tabla del paciente {{$patient->patientname}}
                  </h1><br>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Hora:</th>
                        <th scope="col">Paciente:</th>
                        <th scope="col">Ver cita:</th>
                        <th scope="col">Opciones de cita:</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if (count($appointments)<=0)
                      <tr>
                        <td  colspan="4" align="center">No hay citas de esta paciente aun: {{ $patient->patientname }} </td>
                      </tr>
                      @else
                      @foreach ($appointments as $appointment)
                      <tr>
                        <th scope="row">{{$appointment->hour}}</th>
                        <td>{{$appointment->date}}</td>
                        <td><a href="{{route('patients.index',$patient->id)}}"><button type="button" class="btn btn-light"><i class="fa-solid fa-eye"></i></button></a></td>
                            <td><a href="{{route('patients.index', $patient->id)}}" class="btn btn-outline-primary"><box-icon name='calendar-edit'></box-icon></a> | <a href="{{route('patients.index',$patient->id)}}" class="btn btn-outline-danger"><box-icon name='trash'></box-icon></a> </td>
                      </tr>
                      @endforeach
                      @endif
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
  </x-app-layout>

@endif
