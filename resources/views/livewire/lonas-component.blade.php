<div>
    <div class="card">
        <div class="card-header bg-dark">Lonas</div>
        <div class="card-body bg-dark">
          <form wire:submit.prevent="{{ $editar ? 'update' : 'store' }}"> 
            <div class="form-row">
              <input type="text" class="col-sm-5 form-control form-control-sm" wire:model="nombre" placeholder="Nombre">
              <input type="text" class="col-sm-1 form-control form-control-sm ml-1" wire:model="calidad_360" placeholder="$ calidad 360">
              <input type="text" class="col-sm-1 form-control form-control-sm ml-1" wire:model="calidad_720" placeholder="$ calidad 720">
              <input type="text" class="col-sm-1 form-control form-control-sm ml-1" wire:model="calidad_1024" placeholder="$ calidad 1024">
              <input type="text" class="col-sm-1 form-control form-control-sm ml-1" wire:model="calidad_fullhd" placeholder="$ calidad fullhd">              
            </div>           
            <div class="form-row">
              <span class="mr-3"><strong>TRAMOS: {{$pertenece }} </strong></span>
              <h6>ztramo: {{ implode(', ',$check_tramos)}} </h6>
              <select wire:model="check_tramos" class="bg-dark text-white" multiple>
              @foreach($tramos as $tramo)
                <option value="{{ $tramo->id }}">{{ $tramo->medida }}</option>
              @endforeach
              </select>
              <!-- @foreach($tramos as $tramo)
                <div class="custom-control custom-checkbox mr-4">                  
                  <input type="checkbox" wire:model="check_tramos" class="custom-control-input" value="{{ $tramo->id }}" id="customCheck{{ $tramo->id}}">
                  <label class="custom-control-label" for="customCheck{{ $tramo->id }}">{{ $tramo->medida }}</label>                   
                </div>
              @endforeach -->
            </div>              
            <button type="submit" class="btn btn-sm btn-outline-success ml-1">{{ $text_boton}} </button>
        </form>
          <br>
          @error('nombre') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
          @error('calidad_360') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
          @error('calidad_720') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
          @error('calidad_1024') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
          @error('calidad_fullhd') <span class="text-danger"><small>{{ $message }}</small></span> @enderror          
          @error('check_tramos') <span class="text-danger"><small>{{ $message }}</small></span> @enderror 
          <table class="table table-sm table-hover">
            <tbody>
              @foreach ($lonas as $lona)
              <tr>
                <td class="text-capitalize">{{$lona->nombre}}</td>
                <td class="text-capitalize">{{$lona->calidad_360}}</td>
                <td class="text-capitalize">{{$lona->calidad_720}}</td>
                <td class="text-capitalize">{{$lona->calidad_1024}}</td>
                <td class="text-capitalize">{{$lona->calidad_fullhd}}</td>
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
