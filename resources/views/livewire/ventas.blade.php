<div>
    <div class="row">
        <div class="col-md-2 border-right">
            <span class="text-muted"><strong>Cliente</strong></span>
                <br>
                <span class="text-white text-capitalize">{{ $cliente ? $cliente->nombre : '' }}</span>
                <br>
                <span class="text-muted"><strong>Dirección</strong></span>
                <br>
                <span class="text-white text-capitalize">{{ $cliente ? $cliente->direccion : '' }}</span>
                <br>
                <span class="text-muted"><strong>Telefono</strong></span>
                <br>
                <span class="text-white">{{ $cliente ? $cliente->telefono : '' }}</span>            
                <br>
                <span class="text-muted"><strong>Correo</strong></span>
                <br>
                <span class="text-white">{{ $cliente ? $cliente->correo : '' }}</span>
                <br>
                <span class="text-muted"><strong>Rfc</strong></span>
                <br>
                <span class="text-white">{{ $cliente ? $cliente->rfc : '' }}</span>
                <br>
                <span class="text-muted"><strong>Razon Social</strong></span>
                <br>
                <span class="text-white">{{ $cliente ? $cliente->razon_social : '' }}</span>
        </div>
        <div class="col-md-8">
            <table class="table table-sm table-fixed table-hover">
                <thead>
                  <tr>
                    <th class="col-sm-8">Producto</th>
                    <th class="col-sm-1">Cant</th>
                    <th class="col-sm-1">Precio</th>
                    <th class="col-sm-1">Importe</th>
                  </tr>
                </thead>
                <tbody>
                    @if ($productos != null)                    
                        @foreach ($productos as $producto)
                            <tr class="renglon">                      
                                <td class="col-sm-8"> {{ $producto->producto}} </td>
                                <td class="col-sm-1">{{ $producto->cantidad}}</td>
                                <td class="col-sm-1">{{ number_format($producto->precio,1,".","," )}} </td>
                                <td class="col-sm-1">{{ number_format($producto->importe,1,".","," )}}</td>
                            </tr>
                            {{-- {{$subtotal += $producto->importe}} --}}
                        @endforeach
                    @endif
                </tbody>
            </table>    
            <div class="row">
                <div class="col-md-8">
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <span>Seleccionar método de pago</span>
                    </div>
                  </div>  
                  <div class="row mt-1">
                    {{-- METODOS DE PAGO --}}
                    @foreach ($metodos as $metodo)
                      <div class="col text-center">
                        <fieldset class="form-group">
                          <div class="form-check">
                            <label class="form-check-label text-capitalize">
                              <input 
                                wire:model="metodo_pago" 
                                type="radio" 
                                class="form-check-input" 
                                name="optionsRadios" 
                                value="{{$metodo->nombre}}">
                              {{ $metodo->nombre }}
                            </label>
                          </div>
                        </fieldset>
                      </div>
                    @endforeach
                  </div> 
                  <div class="row">
                      <div class="col-md-12 text-center">
                          <span class="text-warning"> {{ $saldo != (null) ? 'Saldo Pendiente $ '.$saldo->importe : ''  }}</span>
                      </div>
                  </div>                   
                </div>
                <div class="col-md-4">
                    <div class="row">
                      <div class="col-md-4 text-right"><strong>Subtotal</strong></div>
                      <div class="col-md-4"><span><strong>$ {{number_format($subtotal,1,".","," )}}</strong></span></div>
                      <div class="col-md-4">
                        <input type="number" 
                        wire:model="importeAbono" 
                        wire:keyup="abonar()"
                        class="form-control form-control-sm" 
                        onclick="this.select()"/>
                      </div>     
                      <div class="col-md-4 text-right"><strong>Iva</strong></div>
                      <div class="col-md-4"><span><strong>$ 1,3698</strong></span></div>
                      <div class="col-md-4">
                          @if ($facturar)
                            Factura <i class="fas fa-check text-success"></i>
                          @else
                            Factura <i class="fas fa-ban text-danger"></i>
                          @endif
                      </div>
                      <div class="col-md-4 text-right"><strong>Total</strong></div>
                      <div class="col-md-4"><span><strong>$ 2,3698</strong></span></div>                            
                      <div class="col-md-4">
                        <button class="btn btn-sm btn-outline-success btn-block mb-1" @if ($venta_seleccionada == null)
                            disabled
                        @else

                        @endif
                        wire:click="storeAbono()">Cobrar</button>
                      </div>                            
                    </div>                    
                </div>
            </div>       
        </div>
        <div class="col-md-2 border-left">
            <div class="categorias-productos mt-1">
                <ul class="nav nav-tabs flex-column">
                    <li class="nav-item">
                      <a class="nav-link {{ $tab == 'pendientes' ? 'active' : '' }}" 
                        wire:click="$set('tab', 'pendientes')" 
                        data-toggle="tab" 
                        href="#tab-pendientes"><i class="fas fa-dollar-sign"></i> Pendientes</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ $tab == 'historial' ? 'active' : '' }}" 
                        wire:click="$set('tab', 'historial')" 
                        data-toggle="tab" 
                        href="#tab-historial"><i class="fas fa-history"></i> Historial</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ $tab == 'cancelados' ? 'active' : '' }}" 
                        wire:click="$set('tab', 'cancelados')" 
                        data-toggle="tab" 
                        href="#tab-cancelados"><i class="fas fa-ban"></i> Cancelados</a>
                    </li>
                  </ul>
            </div>
        </div>
    </div>
    <div class="row border-top pie">
        <div class="col-md-3 text-center">
            <span><i class="fas fa-history"></i> Historial Abonos</span>
            <table class="table table-sm table-striped">
                <tbody>                
                    @if ($abonos != null)
                        @foreach ($abonos as $abono)
                            <tr>
                                <td>$ {{$abono->importe}}</td>
                                <td class="text-capitalize">{{$abono->metodo}}</td>
                                <td>{{date('d/m/Y H:i:s', strtotime($abono->created_at))}}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="col-md-6 text-center offset-1">            
            <div id="myTabContent" class="tab-content">              
                {{-- pendientes tab-pane --}}
                <div class="tab-pane fade {{ $tab == 'pendientes' ? 'active show' : '' }}" id="tab-pendientes">   
                    <input type="text" class="form-control form-control-sm col-md-7 mt-1" placeholder="Buscar"
                        wire:model="search_pendiente"
                        onclick="this.select()">                 
                    <table class="table table-sm table-hover table-responsive">
                        <thead>
                          <tr>
                            <th>Folio</th>
                            <th>Cliente</th>
                            <th>Saldo</th>
                            <th>Fecha</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($creditos as $venta)
                                <tr class="pointer" wire:click="show({{$venta->id}})">                      
                                    <td> {{ str_pad($venta->id,4,'0',STR_PAD_LEFT)}} </td>
                                    <td class="text-capitalize"> {{ $venta->nombre}} </td>
                                    <td>$ {{ $venta->importe}} </td>
                                    <td> {{ date('d/m/Y H:i:s', strtotime($venta->created_at)) }}</td>                            
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{ $creditos->links()}}
                    </div> 
                </div>              
                {{-- historial tab-pane --}}
                <div class="tab-pane fade {{ $tab == 'historial' ? 'active show' : '' }}" id="tab-historial">
                    <input type="text" class="form-control form-control-sm col-md-7 mt-1" placeholder="Buscar"
                        wire:model="search_historial"
                        onclick="this.select()"> 
                    <table class="table table-sm table-hover table-responsive">
                        <thead>
                          <tr>
                            <th>Folio</th>
                            <th>Cliente</th>
                            <th>Fecha</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($ventas_historial as $venta)
                                <tr class="pointer" wire:click="show({{$venta->id}})">                      
                                    <td> {{ str_pad($venta->id,4,'0',STR_PAD_LEFT)}} </td>
                                    <td class="text-capitalize"> {{ $venta->nombre}} </td>
                                    <td> {{ date('d/m/Y H:i:s', strtotime($venta->created_at)) }}</td>                            
                                </tr>
                            @endforeach
                        </tbody>
                    </table>  
                    <div>
                        {{ $ventas_historial->links()}}
                    </div> 
                </div>              
                {{-- cancelados tab-pane --}}
                <div class="tab-pane fade {{ $tab == 'cancelados' ? 'active show' : '' }}" id="tab-cancelados">
                    cancelados
                </div>
            </div>          
        </div>
    </div>
</div>
