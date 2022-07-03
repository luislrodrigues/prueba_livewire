<div class="container position-relative ">
    <div class="d-flex justify-content-center mb-2  ">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCreate">
            Crear Nueva Empleados
        </button>
    </div>
    @if ($employees->count())
        <div class="d-flex justify-content-center">
            <div class="table-responsive col-sm-12 col-md-10 col-lg-8">
                <table class="table align-middle mb-3 bg-white">
                    <thead class="bg-light">
                        <tr>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="fw-bold ">{{$employee->first_name}}</span>
                                      </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="fw-bold ">{{$employee->last_name}}</span>
                                      </div>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-success"data-toggle="modal" data-target="#modalShow" wire:click="show({{$employee->id}})" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                                            <path
                                                d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                            <path
                                                d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                                        </svg>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-info mx-1" data-toggle="modal" data-target="#modalUpdate" wire:click="edit({{$employee->id}})">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                        </svg>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger " onclick="deleted('employee.employee', 'destroy',{{$employee->id}})" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                                            <path
                                                d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="d-flex justify-content-center mt-3">
            <h4>No existen registros</h4>
        </div>
    @endif
    <div class="d-flex justify-content-center">
        {{ $employees->links() }}
    </div>
    <div class="col-12 position-absolute top-50 text-center ">
        <div  wire:loading class="spinner-border text-primary" role="status">
        </div>
    </div>
    @include('livewire.employee.modal-create')
    @include('livewire.employee.modal-edit')
    @if ($employees->count())
    @include('livewire.employee.modal-show')
    @endif
</div>



@push('scripts')
    <script type="text/javascript" src="{{ asset('js/alert/alert.js') }}"></script>
    <script>
        livewire.on('alertSuccess', (message) => {
            alertSuccess(message)
        });
    </script>
@endpush
