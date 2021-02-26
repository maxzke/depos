<div>
    <div class="card border-secondary  bg-dark mb-3" style="max-width: 20rem;">
        <div class="card-header bg-dark">Sucursales</div>
        <div class="card-body">
            <form class="form-inline" wire:submit.prevent="store">
                <div class="form-group mb-1">
                  <input type="text" class="form-control form-control-sm" wire:model="sucursal" placeholder="nombre">
                </div>
                <button type="submit" class="btn btn-sm btn-outline-success ml-1">Guardar</button>
            </form>
              <br>
              @error('sucursal') <span class="text-danger">{{ $message }}</span> @enderror

              <hr>
              <table class="table table-sm table-hover">
                <tbody>
                  <tr>
                    <td>Column content</td>
                  </tr>
                </tbody>
              </table>

        </div>
      </div>






</div>
