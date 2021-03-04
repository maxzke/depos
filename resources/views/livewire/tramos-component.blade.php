<div>
    <div class="card">
        <div class="card-header bg-dark">Tramos</div>
        <div class="card-body bg-dark">
            <form class="form-inline" wire:submit.prevent="{{ $editar ? 'update' : 'store' }}">
                <div class="form-group">
                  <input type="text" class="form-control form-control-sm" wire:model="medida" placeholder="Nuevo tramo">
                </div>
                <button type="submit" class="btn btn-sm btn-outline-success ml-1">{{ $text_boton}} </button>
            </form>
              <br>
              @error('medida') <span class="text-danger"><small>{{ $message }}</small></span> @enderror

              <hr>
              <table class="table table-sm table-hover">
                <tbody>
                  @foreach ($tramos as $tramo)
                  <tr>
                    <td class="text-capitalize">{{$tramo->medida}}</td>
                    <td>
                      <button type="button" class="btn btn-sm btn-outline-warning" wire:click="edit({{$tramo}})"><small>Editar</small></button>
                    </td>
                  </tr>
                  @endforeach                  
                </tbody>
              </table>
              <div>
                {{ $tramos->links()}}
              </div>

        </div>
      </div>






</div>
