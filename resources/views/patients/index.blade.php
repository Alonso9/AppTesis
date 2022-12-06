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
                    Tabla de Pacientes registrados
                  </h1><br>
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Nombre:</th>
                            <th scope="col">Historial de citas:</th>
                            <th scope="col">Datos del paciente:</th>
                            <th scope="col">Opciones:</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if (count($patients)<=0)
                          <tr>
                            <td  colspan="4" align="center">No hay Pacientes registrados aun</td>
                          </tr>
                          @else
                          @foreach ($patients as $patient)
                          <tr>
                            <th scope="row">{{$patient->patientname}}</th>
                            <td><a href="{{route('patients.show',$patient->id)}}"><button type="button" class="btn btn-light"><i class="fa-solid fa-clock-rotate-left"></i></button></a></td>
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
