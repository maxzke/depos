<div>
    <div class="card">
        <div class="card-header bg-dark">Roles de Usuarios</div>
        <div class="card-body bg-dark">
            <form class="form-inline" wire:submit.prevent="store">
                <div class="form-group">
                  <input type="text" class="form-control form-control-sm" wire:model="nombre" placeholder="nombre">
                </div>
                <button type="submit" class="btn btn-sm btn-outline-success ml-1">Guardar</button>
            </form>
              <br>
              @error('nombre') <span class="text-danger"><small>{{ $message }}</small></span> @enderror

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
