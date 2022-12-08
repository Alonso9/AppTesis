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
                    {{-- Historial medico del paciente {{$patient->patientname}} --}}
                  </h1><br>

                  @if (empty($record))
                        <td  colspan="2" align="center">El paciente aun no cuenta con un historial</td>
                        <button type="button" class="btn btn-outline-primary" align="center"><a href="{{route('patients.createRecords',$patient->id)}}">Crear historial del paciente</a></button>
                      @else
                      <ol class="list-group list-group-numbered">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                              <div class="fw-bold">Nmbre del paciente</div>
                              {{$patient->patientname}}
                            </div>
                            <span class="badge bg-primary rounded-pill">9</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                              <div class="fw-bold">Sexo del paciente</div>
                              {{$record->sex}}
                            </div>
                            <span class="badge bg-primary rounded-pill">9</span>
                          </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                          <div class="ms-2 me-auto">
                            <div class="fw-bold">Etnia del paciente</div>
                            {{$record->ethnicity}}
                          </div>
                          <span class="badge bg-primary rounded-pill">1</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                          <div class="ms-2 me-auto">
                            <div class="fw-bold">Dia de Nacimiento</div>
                            {{$record->dob}}
                          </div>
                          <span class="badge bg-primary rounded-pill">2</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                          <div class="ms-2 me-auto">
                            <div class="fw-bold">Cirugias</div>
                            {{$record->surgeries}}
                          </div>
                          <span class="badge bg-primary rounded-pill">3</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                              <div class="fw-bold">Antecedentes Familiares</div>
                              {{$record->familybackgr}}
                            </div>
                            <span class="badge bg-primary rounded-pill">4</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                              <div class="fw-bold">Diabetes</div>
                              {{$record->diabetes}}
                            </div>
                            <span class="badge bg-primary rounded-pill">5</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                              <div class="fw-bold">Numero de Contacto</div>
                              {{$record->numbre_phone}}
                            </div>
                            <span class="badge bg-primary rounded-pill">6</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                              <div class="fw-bold">Huesos Rotos</div>
                              {{$record->broken_bones}}
                            </div>
                            <span class="badge bg-primary rounded-pill">7</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                              <div class="fw-bold">Tipo de Sangre</div>
                              {{$record->blood_type}}
                            </div>
                            <span class="badge bg-primary rounded-pill">8</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                              <div class="fw-bold">Cirugias</div>
                              {{$record->surgeries}}
                            </div>
                            <span class="badge bg-primary rounded-pill">9</span>
                          </li>
                      </ol>
                      @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
