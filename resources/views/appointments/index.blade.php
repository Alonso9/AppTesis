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
                    {{-- Your Appointments of day 18/10/2022 --}}

                    <div style="display: none;">{{date_default_timezone_set('America/Mexico_City')}}</div>
                    <h1 class="textAppo">
                      Your Appointments of day {{ date("d-m-Y") }} -
                      {{-- {{date_default_timezone_set('America/Mexico_City')}} --}}
                       hour {{date("H:i")}}
                    </h1>
                    <div class="row">
                        <div class="col-xl-12">
                            {{-- <form action="{{route('appointments.buscar')}}" method="POST"> --}}
                            <form method="POST">
                                @csrf
                                @method("POST")
                                <div class="form-row">
                                    <div class="col-sm-4 my-1">
                                        <input type="date" class="form-control" name="busqueda"
                                        placeholder="Appointment date">
                                    </div>
                                    <div class="col-auto my-1">
                                        <button type="submit" class="btn btn-outline-primary">Search Appointment</button>
                                    </div>
                                    <div class="col-auto my-1">
                                        <a href="{{route('appointments.create')}}" class="btn btn-outline-warning">Add Appointment</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    {{-- <br><a href="{{route('appointments.create')}}">Add Appointment</a> --}}
                    
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Date:</th>
                            <th scope="col">Patient:</th>
                            <th scope="col">See</th>
                            <th scope="col">Options</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if (count($appointments)<=0)
                          <tr>
                            <td  colspan="4">No hay resultados </td>
                          </tr>
                          @else
                          @foreach ($appointments as $appointment)
                          <tr>
                            <th scope="row">{{$appointment->hour}}</th>
                            <td>{{$appointment->date}}</td>
                            <td><a href="#">See</a></td>
                            <td><box-icon name='calendar-edit'></box-icon> | <box-icon name='message-rounded-x'></box-icon></td>
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