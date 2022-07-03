<div wire:ignore.self data-backdrop="static" data-keyboard="false" class="modal fade" id="modalCreate" tabindex="-1"
    role="dialog" aria-labelledby="modalCreateLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Empleados</h5>
            </div>

            <div class="modal-body pt-1">
                <form>
                    <div class="form-group">
                        <label for="inputFirstName">Nombre</label>
                        <input type="text" class="form-control" name="first_name" wire:model.lazy="first_name">
                        @if ($errors->has('first_name'))
                            <span class="text-danger text-left">{{ $errors->first('first_name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="inputLastName">Apellidos</label>
                        <input type="text" class="form-control" name="last_name" wire:model.lazy="last_name">
                        @if ($errors->has('last_name'))
                            <span class="text-danger text-left">{{ $errors->first('last_name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Correo</label>
                        <input type="text" class="form-control" name="email" wire:model.lazy="email">
                        @if ($errors->has('email'))
                            <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="inputPhone">Telefono</label>
                        <input type="text" class="form-control" name="phone" wire:model.lazy="phone">
                        @if ($errors->has('phone'))
                            <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="company_id" class="form-label">Compañia</label>
                        <select wire:model="company_id" class="form-control">
                            <option value="Elegir">Elegir</option>
                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}">
                                    {{ $company->name }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('company_id'))
                            <span class="text-danger text-left">{{ $errors->first('company_id') }}</span>
                        @endif
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    wire:click=" restart">Cancelar</button>
                <button type="button" class="btn btn-primary" wire:loading.attr="disabled" wire:target="store, logo"
                    wire:click="store">Guardar</button>
            </div>
        </div>
    </div>
</div>
