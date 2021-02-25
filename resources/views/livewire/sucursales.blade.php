<div>
    <div class="card border-secondary mb-3" style="max-width: 20rem;">
        <div class="card-header">Sucursales</div>
        <div class="card-body">
            <form class="form-inline" wire:submit.prevent="store">
                <div class="form-group mb-1">
                  <input type="text" class="form-control form-control-sm" wire:model="sucursal" placeholder="nombre">
                </div>
                <button type="submit" class="btn btn-sm btn-outline-success ml-1">Guardar</button>
              </form>
              <br>
              @error('sucursal') <span class="error">{{ $message }}</span> @enderror
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Cras justo odio
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Dapibus ac facilisis in
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Morbi leo risus
                </li>
              </ul>
        </div>
      </div>
</div>
