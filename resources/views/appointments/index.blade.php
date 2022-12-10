<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
            <h1 class="title">Dashboard personal del medico {{Auth::user()->name}} para manejo de sus citas</h1>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <div style="display: none;">{{date_default_timezone_set('America/Mexico_City')}}</div>
                    {{-- <h1 class="textAppo">
                      Your Appointments of day {{ date("y-m-d") }} -
                       hour {{date("H:i")}}
                    </h1> --}}
                    <h1 class="textAppo">
                        Sus citas del dia de hoy: {{ date("d-m-y") }} -
                        Hora actual: {{date("H:i")}}
                      </h1><br>
                    <div class="row">
                        <div class="col-xl-12">
                            <form action="{{route('appointments.search')}}" method="POST">
                                @csrf
                                @method("POST")
                                <div class="form-row">
                                    <div class="col-sm-4 my-1">
                                        <input type="date" class="form-control" name="search"
                                        placeholder="Appointment date">
                                        <input type="hidden" value="{{Auth::user()->id}}" name="idMedic">
                                    </div>
                                    <div class="col-auto my-1">
                                        <button type="submit" class="btn btn-outline-primary">Buscar Cita</button>
                                        {{-- <button type="submit" class="btn btn-outline-primary">Search Appointment</button> --}}
                                    </div>
                                    <div class="col-auto my-1">
                                        <a href="{{route('appointments.create')}}" class="btn btn-outline-warning">Crear cita</a>
                                        {{-- <a href="{{route('appointments.create')}}" class="btn btn-outline-warning">Add Appointment</a> --}}
                                    </div>
                                </div>
                            </form>
                        </div>
                    
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
                            <td  colspan="4" align="center">No hay citas para el dia: {{ date("y-m-d") }} </td>
                          </tr>
                          @else
                          @foreach ($appointments as $appointment)
                          <tr>
                            <th scope="row">{{$appointment->hour, $appointment->hour}}</th>
                            <td>{{$appointment->patientname}}</td>
                            <td><a href="{{route('appointments.makeappoinment',$appointment->id)}}"><button type="button" class="btn btn-light"><i class="fa-solid fa-notes-medical"></i></button></a></td>
                            <td><a href="{{route('appointments.edit', $appointment->id)}}" class="btn btn-outline-primary"><box-icon name='calendar-edit'></box-icon></a> | <a href="{{route('appointments.edit',$appointment->id)}}" class="btn btn-outline-danger"><box-icon name='trash'></box-icon></a> </td>
                          </tr>
                          @endforeach
                          @endif
                        </tbody>
                      </table>
                      @if (Session::has('msg'))
    <div class="alert alert-success">
        <ul>
            <li>{{ Session::get('success') }}</li>
        </ul>
    </div>
@endif
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