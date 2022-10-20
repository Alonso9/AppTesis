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
                    Your Patients Table
                    {{-- @csrf --}}
                    {{-- @method('PUT') --}}
                    {{-- <a href="{{route('appointments.create')}}">C</a> --}}
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Patient:</th>
                            <th scope="col">Records</th>
                            <th scope="col">Options</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Mark Peter Arson</td>
                            <td><a href="#"><box-icon name='history'></box-icon></a></td>
                            <td>Edit | Delete</td>
                          </tr>
                          <tr>
                            <td>Mark Peter Arson</td>
                            <td><a href="#"><box-icon name='history'></box-icon></a></td>
                            <td>Edit | Delete</td>
                          </tr>
                          <tr>
                            <td>Mark Peter Arson</td>
                            <td><a href="#"><box-icon name='history'></box-icon></a></td>
                            <td>Edit | Delete</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
