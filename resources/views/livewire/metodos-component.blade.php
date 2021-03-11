<div>
    <div class="card">
        <div class="card-header bg-dark">Métodos de Pagos / Cobro</div>
        <div class="card-body bg-dark">
          <form class="form-inline" wire:submit.prevent="{{ $editar ? 'update' : 'store' }}">
            <div class="form-group">
              <input type="text" class="form-control form-control-sm text-lowercase" wire:model="nombre" placeholder="Nuevo metodo">
            </div>
            <button type="submit" class="btn btn-sm btn-outline-success ml-1">{{ $text_boton}} </button>
        </form>
          <br>
          @error('nombre') <span class="text-danger"><small>{{ $message }}</small></span> @enderror

          <hr>
          <table class="table table-sm table-hover">
            <tbody>
              @foreach ($metodos as $metodo)
              <tr>
                <td class="text-capitalize">{{$metodo->nombre}}</td>
                <td>
                  <button type="button" class="btn btn-sm btn-outline-warning" wire:click="edit({{$metodo}})"><small>Editar</small></button>
                </td>
              </tr>
              @endforeach                  
            </tbody>
          </table>

        </div>
      </div>
</div>
