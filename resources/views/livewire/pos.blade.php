<div>
    <div class="row">
        <!-- Datos del cliente -->
        <div class="col-md-2 border-right">
            <div class="row">
              <div class="col-md-12 cliente">
                <span class="text-muted"><strong>Cliente</strong></span>
                <br>
                <span class="text-white">David Ramirez Flores David Ramirez Ramirez RamirezRamirezRamirez</span>
                <br>
                <span class="text-muted"><strong>Dirección</strong></span>
                <br>
                <span class="text-white">Guanajuato #8David</span>
                <br>
                <span class="text-muted"><strong>Telefono</strong></span>
                <br>
                <span class="text-white">281 87 0 16 69</span>            
                <br>
                <span class="text-muted"><strong>Correo</strong></span>
                <br>
                <span class="text-white">ramzdave@gmail.com</span>
                <br>
                <span class="text-muted"><strong>Rfc</strong></span>
                <br>
                <span class="text-white">rafd841115pf5</span>
                <br>
                <span class="text-muted"><strong>Razon Social</strong></span>
                <br>
                <span class="text-white">David Ramirez Flores</span>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="row mt-1 mb-1">
                  <div class="col text-right">
                    <i class="fas fa-search mano" 
                    wire:click="$set('tab', 'search_cliente')" 
                    data-toggle="tab" 
                    href="#tab-search-cliente">
                    </i>
                  </div>
                  <div class="col text-center">
                    <i class="fas fa-pen mano" 
                    wire:click="$set('tab', 'edit_cliente')" 
                    data-toggle="tab" 
                    href="#tab-edit-cliente"></i>
                  </div>
                  <div class="col text-left">
                    <i class="fas fa-user-plus mano"  
                    wire:click="$set('tab', 'add_cliente')" 
                    data-toggle="tab" 
                    href="#tab-add-cliente"></i>
                  </div>
              </div>
              </div>
            </div>
        </div>
        <!-- Carrito -->
        <div class="col-md-8">
            <table class="table table-sm table-hover table-fixed">
                <thead>
                  <tr>
                    <th class="col-sm-8">Producto</th>
                    <th class="col-sm-1">Cant</th>
                    <th class="col-sm-1">Precio</th>
                    <th class="col-sm-1">Importe</th>
                    <th class="col-sm-1 text-center"><i class="fas fa-shopping-cart"></i></th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                    foreach($productos as $producto):?>                         
                      <tr>                      
                        <td class="col-sm-8"><?php echo $producto['nombre']; ?></td>
                        <td class="col-sm-1"><?php echo $producto['cantidad']; ?></td>
                        <td class="col-sm-1"><?php echo number_format($producto['precio'],1,".","," ); ?></td>
                        <td class="col-sm-1"><?php echo number_format($producto['importe'],1,".","," ); ?></td>
                        <td class="col-sm-1">
                          <i wire:click="producto_increment('{{$producto['id']}}')" 
                          class="fas fa-plus-circle mr-1 mano"></i>
                          <i wire:click="producto_decrement('{{$producto['id']}}')" 
                          class="fas fa-minus-circle mr-3 mano"></i>
                        </td>
                    </tr>
                    <?php endforeach;   
                    ?>
                </tbody>
              </table>
              <div class="row">
                  <div class="col-md-8">
                      espacio
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" value="">
                          Facturar venta
                        </label>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="row">
                        <div class="col-md-4 text-right"><strong>Subtotal</strong></div>
                        <div class="col-md-4"><span><strong>$ {{number_format($subtotal,1,".","," )}}</strong></span></div>
                        <div class="col-md-4">
                          <input type="number" 
                          wire:model.debounce.lazy="abono" 
                          class="form-control form-control-sm" 
                          name="importe_recibido" 
                          onclick="this.select()"
                          placeholder="$"/>
                        </div>     
                        <div class="col-md-4 text-right"><strong>Iva</strong></div>
                        <div class="col-md-8"><span><strong>$ 2,3698</strong></span></div>
                        <div class="col-md-4 text-right"><strong>Total</strong></div>
                        <div class="col-md-4"><span><strong>$ 2,3698</strong></span></div>                            
                        <div class="col-md-4">
                          <button class="btn btn-sm btn-outline-success btn-block mb-1">Cobrar</button>
                        </div>                            
                      </div>                    
                  </div>
              </div>
        </div>
        <!-- Categorias de Productos -->
        <div class="col-md-2">
            <div class="categorias-productos mt-1">
                <ul class="nav nav-tabs flex-column">
                    <li class="nav-item">
                      <a class="nav-link {{ $tab == 'lonas' ? 'active' : '' }}" wire:click="$set('tab', 'lonas')" data-toggle="tab" href="#tab-lona">Lonas</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ $tab == 'serigrafia' ? 'active' : '' }}" wire:click="$set('tab', 'serigrafia')" data-toggle="tab" href="#tab-serigrafia">Serigrafia</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ $tab == 'sublimacion' ? 'active' : '' }}" wire:click="$set('tab', 'sublimacion')" data-toggle="tab" href="#tab-sublimacion">Sublimación</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ $tab == 'viniles' ? 'active' : '' }}" wire:click="$set('tab', 'viniles')" data-toggle="tab" href="#tab-viniles">Viniles</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ $tab == 'personalizado' ? 'active' : '' }}" wire:click="$set('tab', 'personalizado')" data-toggle="tab" href="#tab-personalizado">Personalizado</a>
                    </li>
                  </ul>
            </div>
        </div>
    </div>
    <div class="row border-top pie">
        <div class="col-md-12">
            <div id="myTabContent" class="tab-content">              
                {{-- COLUMNA-LONA --}}
                <div class="tab-pane fade {{ $tab == 'lonas' ? 'active show' : '' }}" id="tab-lona">
                  <div class="row mt-2">
                      <div class="col-md-2"></div>
                      <div class="col-md-4">
                            <div class=" row">
                                <label for="tipoLona" class="col-sm-2">Lona</label> 
                                <div class="col-sm-10">
                                    <select id="tipoLona" class="form-control form-control-sm">
                                        <option value="2">
                                            LONA FRONTLIT 10 ONZAS
                                        </option>
                                        <option value="3">
                                            LONA FRONTLIT 13 ONZAS
                                        </option>
                                        <option value="4">
                                            LONA MESH DE 18 ONZAS
                                        </option>
                                    </select>
                                </div>
                            </div> 
                            <div class=" row">
                                <label for="acabadoLona" class="col-sm-2">Acabado</label> 
                                <div class="col-sm-10">
                                    <select id="acabadoLona" class="form-control form-control-sm">
                                    </select>
                                </div>
                            </div>
                            <div class=" row">
                                <label for="calidadLona" class="col-sm-2">Calidad</label> 
                                <div class="col-sm-10">
                                    <select id="calidadLona" class="form-control form-control-sm text-uppercase">
                                    </select>
                                </div>
                            </div> 
                            <div class=" row">
                                <label for="anchoLona" class="col-sm-2">Ancho</label> 
                                <div class="col-sm-3">
                                    <input type="text" step="1" id="anchoLona" placeholder="metros" class="form-control form-control-sm" onclick="this.select();">
                                </div>
                                <label for="altoLona" class="col-sm-2">Alto</label> 
                                <div class="col-sm-3">
                                    <input type="text" id="altoLona" placeholder="metros" class="form-control form-control-sm" onclick="this.select();">
                                </div>
                            </div> 
                            <div class=" row">
                                <label for="cantidadLona" class="col-sm-2">Cantidad</label> 
                                <div class="col-sm-3">
                                    <input type="number" min="1" id="cantidadLona" class="form-control form-control-sm" onclick="this.select();">
                                </div>
                                <div class="col-sm-3 offset-sm-2">
                                    <button class="btn btn-sm btn-outline-warning btn-block">Calcular</button>
                                </div>
                            </div>
                      </div> 
                      <div class="col-md-4 mb-1">
                        <span class="text-muted"><strong>Precio</strong></span>
                        <br>
                        <span class="text-muted">$ 1,250.5</span>
                        <br>
                        <span class="text-muted"><strong>Importe</strong></span>
                        <br>
                        <span class="text-muted">$ 1,250.5</span>
                        <br>
                        <button class="btn btn-sm btn-outline-info"><i class="fas fa-shopping-cart"></i> Agregar</button>
                      </div>
                  </div>
                </div>{{-- COLUMNA-LONA --}}                
                <div class="tab-pane fade {{ $tab == 'serigrafia' ? 'active show' : '' }}" id="tab-serigrafia">
                  <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.</p>
                </div>
                <div class="tab-pane fade {{ $tab == 'sublimacion' ? 'active show' : '' }}" id="tab-sublimacion">
                  <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork.</p>
                </div>               
                <div class="tab-pane fade {{ $tab == 'viniles' ? 'active show' : '' }}" id="tab-viniles">
                    @if($users != null)
                        {{ $users }}
                    @endif
                  <hr>
                  @if($roles != null)
                    {{ $roles }}
                  @endif
                </div>
                <div class="tab-pane fade {{ $tab == 'personalizado' ? 'active show' : '' }}" id="tab-personalizado">
                    <div class="row mt-2 mb-2">
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                          Producto                               
                        </div> 
                        <div class="col-md-1">
                            Cantidad                               
                        </div> 
                        <div class="col-md-1">
                            Precio                              
                        </div> 
                        <div class="col-md-1">
                            Importe                              
                        </div> 
                        <div class="col-4 col-sm-3 col-md-2">
                          
                        </div>
                    </div>
                    <div class="row mt-2 mb-2">
                      <div class="col-md-2"></div>
                      <div class="col-md-4">
                        <input type="text" wire:model.debounce.lazy="nombre" onclick="this.select()" class="form-control form-control-sm" placeholder="Producto">                                
                      </div> 
                      <div class="col-md-1">
                        <input type="number" wire:model="cantidad" min="1" onclick="this.select()" class="form-control form-control-sm" placeholder="#">                                
                      </div> 
                      <div class="col-md-1">
                        <input type="number" wire:model="precio" min="1" onclick="this.select()" class="form-control form-control-sm" placeholder="$">                                
                      </div> 
                      <div class="col-md-1">
                        <span>$ {{ number_format($importe,1,".","," ) }} </span>
                      </div> 
                      <div class="col-4 col-sm-3 col-md-2">
                        <button class="btn btn-sm btn-outline-info" wire:click="addtocart()"><i class="fas fa-shopping-cart"></i> Agregar</button>
                      </div>
                    </div>
                </div>
                <div class="tab-pane fade {{ $tab == 'search_cliente' ? 'active show' : '' }}" id="tab-search-cliente">
                  <div class="row">
                    <div class="col-md-4 offset-3">
                      <input type="text" 
                        class="form-control form-control-sm" 
                        placeholder="Cliente" 
                        wire:model="cliente_search"
                        wire:keydown.enter="buscar_cliente">
                      @if ($listado_clientes)
                        <table class="table table-sm table-hover">
                          <tbody>
                          @foreach ($listado_clientes as $cliente)
                          <tr>
                            <td>{{ $cliente->nombre }}</td>
                            <td><i class="fas fa-check-circle mano" wire:click="select_cliente({{ $cliente->id }})"></i></td>
                          </tr>                            
                          @endforeach                          
                        </tbody>
                      </table>
                      @endif  
                    </div>
                  </div>
                </div> 
                <div class="tab-pane fade {{ $tab == 'edit_cliente' ? 'active show' : '' }}" id="tab-edit-cliente">
                  <p>Edit</p>
                </div> 
                <div class="tab-pane fade {{ $tab == 'add_cliente' ? 'active show' : '' }}" id="tab-add-cliente">
                  <p>add</p>
                </div> 
              </div>            
              <div class="row">
                <div class="col-md-8 offset-4">
                  @error('nombre') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
                  <br>
                  @error('cantidad') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
                  <br>
                  @error('precio') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
                </div>
              </div>
        </div>        
    </div>
</div>
