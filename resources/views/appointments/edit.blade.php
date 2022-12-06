<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Personal Dashboard for create a new Appointment') }}
            {{-- {{ Auth::user()->name }} --}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if($errors->any())
                        <h4>{{$errors->first()}}</h4>
                    @endif
                    <form action="{{route('appointments.update')}}" method="POST" >
                        @csrf
                        @method('POST')
                        <x-input class="block mt-1 w-full" type="hidden" name="id" value="{{ $appointment->id }}"></x-input>
                        {{-- <div>{{ Auth::user()->id }}</div> --}}
                        <div class="grid grid-cols-2 gap-6">
                            <div class="grid grid-row-2 gap-6">
                                {{-- Para llamar un componente se usa x-nombre --}}
                                <div>
                                    <x-label for="name" :value="__('Date')"></x-label>
                                    <x-input class="block mt-1 w-full" type="date" name="date" value="{{$appointment->date}}"></x-input>
                                </div>
                                <div>
                                    <x-label for="name" :value="__('Patient name')"></x-label>
                                    <x-input class="block mt-1 w-full" type="text" name="patientname" value="{{$appointment->patientname}}"></x-input>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-6">
                            <div class="grid grid-row-2 gap-6">
                                {{-- Para llamar un componente se usa x-nombre --}}
                                <div>
                                    <x-label for="password" :value="__('Hour')"></x-label>
                                    <x-input class="block mt-1 w-full" type="time" name="hour" value="{{$appointment->hour}}"/>
                                </div>
                            </div>
                        </div>
                        <a href="{{ URL::previous() }}" class="btn btn-default">Back</a>
                        <a href="javascript:history.back()">Ir al listado</a>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                                Update
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