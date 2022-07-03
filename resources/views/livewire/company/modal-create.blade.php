<div wire:ignore.self  data-backdrop="static" data-keyboard="false"  class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="modalCreateLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Crear Compañia</h5>
          </div>
          <div class="mt-3 text-center">
            @if ($logo)
              <img width="100px" height="100px" class="rounded-circle" src="{{$logo->temporaryUrl()}}"/>
            @endif
            <div wire:loading wire:target="logo" class="alert alert-primary w-75" role="alert">
              Por favor espere..imagen cargando
            </div>
          </div>
          <div class="modal-body pt-1">
            <form>
                <div class="form-group">
                  <label for="inputName">Nombre</label>
                  <input type="text" class="form-control" name="name" wire:model.lazy="name">
                  @if ($errors->has('name'))
                  <span class="text-danger text-left">{{ $errors->first('name') }}</span>
              @endif
                </div>
                <div class="form-group">
                    <label for="inputEmail1">Correo</label>
                    <input type="text" class="form-control" name="correo" wire:model.lazy="email">
                    @if ($errors->has('email'))
                    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                @endif
                  </div>
                  <div class="form-group">
                    <label for="inputPagina">Pagina web</label>
                    <input type="text" class="form-control" name="pagina" wire:model.lazy="pagina">
                    @if ($errors->has('pagina'))
                    <span class="text-danger text-left">{{ $errors->first('pagina') }}</span>
                @endif
                  </div>
                  <div class="form-group">
                    <label for="inputLogo">Logo</label>
                    <input type="file" class="form-control" name="logo" accept="image/*" wire:model.lazy="logo">
                    @if ($errors->has('logo'))
                    <span class="text-danger text-left">{{ $errors->first('logo') }}</span>
                @endif
                  </div>
              </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"  wire:click=" restart">Cancelar</button>
            <button type="button" class="btn btn-primary"  wire:loading.attr="disabled" wire:target="store, logo" wire:click="store">Guardar</button>
          </div>
        </div>
      </div>
</div>