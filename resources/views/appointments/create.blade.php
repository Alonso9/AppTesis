<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Personal Dashboard for create a new Appointment') }} --}}
            <h1 class="title">Dashboard personal del medico {{Auth::user()->name}} para creacion de citas</h1>
            {{-- {{ Auth::user()->name }} --}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{route('appointments.store')}}" method="POST" >
                        @csrf
                        @method('POST')
                        <x-input class="block mt-1 w-full" type="hidden" name="medicId" value="{{ Auth::user()->id }}"></x-input>
                        {{-- <div>{{ Auth::user()->id }}</div> --}}
                        <div class="grid grid-cols-2 gap-6">
                            <div class="grid grid-row-2 gap-6">
                                {{-- Para llamar un componente se usa x-nombre --}}
                                <div>
                                    {{-- <x-label for="name" :value="__('Date')"></x-label> --}}
                                    <x-label for="name" :value="__('Dia de la cita:')"></x-label>
                                    <x-input class="block mt-1 w-full" type="date" name="date" required></x-input>
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
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-6">
                            <div class="grid grid-row-2 gap-6">
                                {{-- Para llamar un componente se usa x-nombre --}}
                                <div>
                                    {{-- <x-label for="password" :value="__('Hour')"></x-label> --}}
                                    <x-label for="password" :value="__('Hora de la cita:')"></x-label>
                                    <x-input class="block mt-1 w-full"  name="hour" list="horas" autocomplete="off" required/>
                                    <datalist id="horas">
                                        <option value="7:00">
                                        <option value="7:30">
                                        <option value="8:00">
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
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
          alert(msg);
        }
      </script>
    
    
</x-app-layout>