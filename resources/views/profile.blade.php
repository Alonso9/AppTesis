<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Personal Dashboard for medic: ') }}
            {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{route('profile.update')}}" method="post">
                        @method('PUT')
                        @csrf
                        {{-- @csrf --}}
                        <div class="grid grid-cols-2 gap-6">
                            <div class="grid grid-row-2 gap-6">
                                {{-- Para llamar un componente se usa x-nombre --}}
                                <div>
                                    <x-label for="name" :value="__('Name')"></x-label>
                                    <x-input class="block mt-1 w-full" type="text" name="name" value="{{Auth::user()->name}}"></x-input>
                                </div>

                                <div>
                                    <x-label for="email" :value="__('Email')"></x-label>
                                    <x-input class="block mt-1 w-full" type="text" name="email" value="{{Auth::user()->email}}"></x-input>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-6">
                            <div class="grid grid-row-2 gap-6">
                                {{-- Para llamar un componente se usa x-nombre --}}
                                <div>
                                    <x-label for="password" :value="__('New Password')"></x-label>
                                    <x-input class="block mt-1 w-full" type="password" name="password"
                                    autocomplete="new-password"/>
                                </div>

                                <div>
                                    <x-label for="password_confirmation" :value="__('Confirm Password')"></x-label>
                                    <x-input class="block mt-1 w-full" type="password" name="password_confirmation"/>
                                </div>
                            </div>
                        </div>
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