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
                    Your Appointments of day 18/10/2022
                    {{-- @csrf --}}
                    {{-- @method('PUT') --}}
                    <br><a href="{{route('appointments.create')}}">Add Appointment</a>
                    
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
                          <tr>
                            <th scope="row">02:30</th>
                            <td>Mark Peter Arson</td>
                            <td><a href="#">See</a></td>
                            <td>Edit | Delete</td>
                          </tr>
                          <tr>
                            <th scope="row">03:00</th>
                            <td>Mark Peter Arson</td>
                            <td><a href="#">See</a></td>
                            <td>Edit | Delete</td>
                          </tr>
                          <tr>
                            <th scope="row">03:30</th>
                            <td>Mark Peter Arson</td>
                            <td><a href="#">See</a></td>
                            <td>Edit | Delete</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>