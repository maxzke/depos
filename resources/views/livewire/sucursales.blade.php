<div>
    <div class="card">
        <div class="card-header bg-dark">Sucursales</div>
        <div class="card-body bg-dark">
            <form class="form-inline" wire:submit.prevent="{{ $editar ? 'update' : 'store' }}">
                <div class="form-group">
                  <input type="text" class="form-control form-control-sm" wire:model="nombre" placeholder="Nueva sucursal">
                </div>
                <button type="submit" class="btn btn-sm btn-outline-success ml-1">{{ $text_boton}} </button>
            </form>
              <br>
              @error('nombre') <span class="text-danger"><small>{{ $message }}</small></span> @enderror

              <hr>
              <table class="table table-sm table-hover">
                <tbody>
                  @foreach ($sucursales as $sucursal)
                  <tr>
                    <td class="text-capitalize">{{$sucursal->nombre}}</td>
                    <td>
                      <button type="button" class="btn btn-sm btn-outline-warning" wire:click="edit({{$sucursal}})"><small>Editar</small></button>
                    </td>
                  </tr>
                  @endforeach                  
                </tbody>
              </table>
              <div>
                {{ $sucursales->links()}}
              </div>

        </div>
      </div>






</div>
