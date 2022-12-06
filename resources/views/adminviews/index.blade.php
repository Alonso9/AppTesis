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
                    Tabla de usuarios registrados
                  </h1><br>

                  <div class="col-xl-12">
                    <form action="{{route('appointments.search')}}" method="POST">
                        @csrf
                        @method("POST")
                        <div class="form-row">
                            <div class="col-sm-4 my-1">
                                <input type="text" class="form-control" name="search" placeholder="Usuario" list="users">
                                <datalist id="users">
                                    @foreach($users as $user)
                                        <option value="{{$user->name}}">
                                        <option value="{{$user->email}}">
                                    @endforeach
                                  </datalist>
                            </div>
                            <div class="col-auto my-1">
                                <button type="submit" class="btn btn-outline-primary">Buscar Usuario</button>
                                {{-- <button type="submit" class="btn btn-outline-primary">Search Appointment</button> --}}
                            </div>
                            <div class="col-auto my-1">
                                <a href="{{route('profile.create')}}" class="btn btn-outline-warning">Agregar Usuario</a>
                                {{-- <a href="{{route('appointments.create')}}" class="btn btn-outline-warning">Add Appointment</a> --}}
                            </div>
                        </div>
                    </form>
                </div>

                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Nombre:</th>
                            <th scope="col">Correo del Usuario:</th>
                            <th scope="col">Rol del Usuario:</th>
                            <th scope="col">Opciones:</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if (count($users)<=0)
                          <tr>
                            <td  colspan="4" align="center">No hay Pacientes registrados aun</td>
                          </tr>
                          @else
                          @foreach ($users as $user)
                          <tr>
                            <th scope="row">{{$user->name}}</th>
                            <th scope="row">{{$user->email}}</th>
                            <th scope="row">{{$user->rol}}</th>
                            <td><a href="{{route('profile.index', $user->id)}}" class="btn btn-outline-primary"><box-icon name='calendar-edit'></box-icon></a> | <a href="{{route('patients.index',$user->id)}}" class="btn btn-outline-danger"><box-icon name='trash'></box-icon></a> </td>
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
