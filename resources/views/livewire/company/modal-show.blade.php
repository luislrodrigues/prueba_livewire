<div wire:ignore.self  data-backdrop="static" data-keyboard="false"  class="modal fade" id="modalShow" tabindex="-1" role="dialog" aria-labelledby="modalShowLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detalles de {{$name}}</h5>
          </div>
          <div class="mt-3 text-center">
              <img width="100px" height="100px" class="rounded-circle" src="{{$image}}"/>
          </div>
          <div class="modal-body pt-1">
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Nombre
                <span >{{$company->name}}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
               Correo
                <span >{{$company->email}}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Pagina Web
                <a href="{{$company->pagina}}" target="_blank">{{$company->pagina}}</a>
              </li>
            </ul>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"  wire:click=" restart">Atras</button>
          </div>
        </div>
      </div>
</div>