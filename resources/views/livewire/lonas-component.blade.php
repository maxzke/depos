<div>
    <div class="card">
        <div class="card-header bg-dark">Lonas</div>
        <div class="card-body bg-dark">
          <form class="form-inline" wire:submit.prevent="{{ $editar ? 'update' : 'store' }}">
            {{-- <div class="form-group"> --}}
              <input type="text" class="col-sm-5 form-control form-control-sm" wire:model="nombre" placeholder="Nombre">
              <input type="text" class="form-control form-control-sm ml-1" wire:model="calidad_360" placeholder="calidad_360">
              <input type="text" class="form-control form-control-sm ml-1" wire:model="calidad_720" placeholder="calidad_720">
              <input type="text" class="form-control form-control-sm ml-1" wire:model="calidad_1024" placeholder="calidad_1024">
              <input type="text" class="form-control form-control-sm ml-1" wire:model="calidad_fullhd" placeholder="calidad_fullhd">
            {{-- </div> --}}
            <button type="submit" class="btn btn-sm btn-outline-success ml-1">{{ $text_boton}} </button>
        </form>
          <br>
          @error('nombre') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
          <hr>
          <table class="table table-sm table-hover">
            <tbody>
              @foreach ($lonas as $lona)
              <tr>
                <td class="text-capitalize">{{$lona->nombre}}</td>
                <td>
                  <button type="button" class="btn btn-sm btn-outline-warning" wire:click="edit({{$lona}})"><small>Editar</small></button>
                </td>
              </tr>
              @endforeach                  
            </tbody>
          </table>

        </div>
      </div>
</div>
