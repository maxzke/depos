<div>
    <div class="row">
        <!-- Datos del cliente -->
        <div class="col-md-2 cliente">
            <span class="text-muted"><strong>Cliente</strong></span>
            <br>
            <span class="text-muted">David Ramirez Flores</span>
            <br>
            <span class="text-muted"><strong>Dirección</strong></span>
            <br>
            <span class="text-muted">Guanajuato #8</span>
            <br>
            <span class="text-muted"><strong>Telefono</strong></span>
            <br>
            <span class="text-muted">281 87 0 1669</span>            
            <br>
            <span class="text-muted"><strong>Correo</strong></span>
            <br>
            <span class="text-muted">ramzdave@gmail.com</span>
            <br>
            <span class="text-muted"><strong>Rfc</strong></span>
            <br>
            <span class="text-muted">rafd841115pf5</span>
            <br>
            <span class="text-muted"><strong>Razon Social</strong></span>
            <br>
            <span class="text-muted">David Ramirez Flores</span>
            <br>
            <div class="row mt-1 mb-2">
                <div class="col text-right"><i class="fas fa-search"></i></div>
                <div class="col text-center"><i class="fas fa-pen"></i></div>
                <div class="col text-left"><i class="fas fa-user-plus"></i></div>
            </div>
        </div>
        <!-- Carrito -->
        <div class="col-md-8">
            <table class="table table-sm table-hover table-fixed">
                <thead class="text-muted">
                  <tr>
                    <th class="col-sm-8">Producto</th>
                    <th class="col-sm-1">Cant</th>
                    <th class="col-sm-1">Precio</th>
                    <th class="col-sm-1">Importe</th>
                    <th class="col-sm-1 text-center"><i class="fas fa-box-open"></i></th>
                  </tr>
                </thead>
                <tbody class="text-muted">
                <?php 
                    foreach($productos as $producto):?>                         
                         <tr>                      
                        <td class="col-sm-8"><?php echo $producto['nombre']; ?></td>
                        <td class="col-sm-1"><?php echo $producto['cantidad']; ?></td>
                        <td class="col-sm-1"><?php echo $producto['precio']; ?></td>
                        <td class="col-sm-1"><?php echo $producto['importe']; ?></td>
                        <td class="col-sm-1">
                            <a href="#"><i class="fas fa-plus-circle mr-1"></i></a>
                            <a href="#"><i class="fas fa-minus-circle mr-3"></i></a>
                        </td>
                    </tr>
                    <?php endforeach;
                    ?>
                    <tr>                      
                        <td class="col-sm-8">Lona front calidad Lona front calidad 1080 DPI 1080 DPI 3x7 jareta superior Lona front calidad 1080 DPI</td>
                        <td class="col-sm-1">7</td>
                        <td class="col-sm-1">493.0</td>
                        <td class="col-sm-1">3,259.0</td>
                        <td class="col-sm-1">
                            <a href="#"><i class="fas fa-plus-circle mr-1"></i></a>
                            <a href="#"><i class="fas fa-minus-circle mr-3"></i></a>
                        </td>
                    </tr>
                    <tr>                      
                        <td class="col-sm-8">Lona front calidad 1080 DPI 3x7 jareta superior</td>
                        <td class="col-sm-1">7</td>
                        <td class="col-sm-1">493.0</td>
                        <td class="col-sm-1">3,259.0</td>
                        <td class="col-sm-1">
                            <a href="#"><i class="fas fa-plus-circle mr-1"></i></a>
                            <a href="#"><i class="fas fa-minus-circle mr-3"></i></a>
                        </td>
                    </tr>
                    <tr>                      
                        <td class="col-sm-8">Lona front calidad 1080 DPI 3x7 jareta superior</td>
                        <td class="col-sm-1">7</td>
                        <td class="col-sm-1">493.0</td>
                        <td class="col-sm-1">3,259.0</td>
                        <td class="col-sm-1">
                            <a href="#"><i class="fas fa-plus-circle mr-1"></i></a>
                            <a href="#"><i class="fas fa-minus-circle mr-3"></i></a>
                        </td>
                    </tr>
                    <tr>                      
                        <td class="col-sm-8">Lona front calidad 1080 DPI 3x7 jareta superior</td>
                        <td class="col-sm-1">7</td>
                        <td class="col-sm-1">493.0</td>
                        <td class="col-sm-1">3,259.0</td>
                        <td class="col-sm-1">
                            <a href="#"><i class="fas fa-plus-circle mr-1"></i></a>
                            <a href="#"><i class="fas fa-minus-circle mr-3"></i></a>
                        </td>
                    </tr>
                    <tr>                      
                        <td class="col-sm-8">Lona front calidad 1080 DPI 3x7 jareta superior</td>
                        <td class="col-sm-1">7</td>
                        <td class="col-sm-1">493.0</td>
                        <td class="col-sm-1">3,259.0</td>
                        <td class="col-sm-1">
                            <a href="#"><i class="fas fa-plus-circle mr-1"></i></a>
                            <a href="#"><i class="fas fa-minus-circle mr-3"></i></a>
                        </td>
                    </tr>
                    <tr>                      
                        <td class="col-sm-8">Lona front calidad 1080 DPI 3x7 jareta superior</td>
                        <td class="col-sm-1">7</td>
                        <td class="col-sm-1">493.0</td>
                        <td class="col-sm-1">3,259.0</td>
                        <td class="col-sm-1">
                            <a href="#"><i class="fas fa-plus-circle mr-1"></i></a>
                            <a href="#"><i class="fas fa-minus-circle mr-3"></i></a>
                        </td>
                    </tr>
                    <tr>                      
                        <td class="col-sm-8">Lona front calidad 1080 DPI 3x7 jareta superior</td>
                        <td class="col-sm-1">7</td>
                        <td class="col-sm-1">493.0</td>
                        <td class="col-sm-1">3,259.0</td>
                        <td class="col-sm-1">
                            <a href="#"><i class="fas fa-plus-circle mr-1"></i></a>
                            <a href="#"><i class="fas fa-minus-circle mr-3"></i></a>
                        </td>
                    </tr>
                    <tr>                      
                        <td class="col-sm-8">Lona front calidad 1080 DPI 3x7 jareta superior</td>
                        <td class="col-sm-1">7</td>
                        <td class="col-sm-1">493.0</td>
                        <td class="col-sm-1">3,259.0</td>
                        <td class="col-sm-1">
                            <a href="#"><i class="fas fa-plus-circle mr-1"></i></a>
                            <a href="#"><i class="fas fa-minus-circle mr-3"></i></a>
                        </td>
                    </tr>
                    <tr>                      
                        <td class="col-sm-8">Lona front calidad 1080 DPI 3x7 jareta superior</td>
                        <td class="col-sm-1">7</td>
                        <td class="col-sm-1">493.0</td>
                        <td class="col-sm-1">3,259.0</td>
                        <td class="col-sm-1">
                            <a href="#"><i class="fas fa-plus-circle mr-1"></i></a>
                            <a href="#"><i class="fas fa-minus-circle mr-3"></i></a>
                        </td>
                    </tr>
                    <tr>                      
                        <td class="col-sm-8">Lona front calidad 1080 DPI 3x7 jareta superior</td>
                        <td class="col-sm-1">7</td>
                        <td class="col-sm-1">493.0</td>
                        <td class="col-sm-1">3,259.0</td>
                        <td class="col-sm-1">
                            <a href="#"><i class="fas fa-plus-circle mr-1"></i></a>
                            <a href="#"><i class="fas fa-minus-circle mr-3"></i></a>
                        </td>
                    </tr>
                </tbody>
              </table>
              <div class="row">
                  <div class="col-md-8">
                      espacio
                  </div>
                  <div class="col-md-4">
                      <div class="row">
                        <div class="col-md-4 text-right"><strong>Subtotal</strong></div>
                        <div class="col-md-4"><span class="text-muted"><strong>$ 2,3698</strong></span></div>
                        <div class="col-md-4"><input type="text" class="form-control form-control-sm" name="importe_recibido" placeholder="Importe"/></div>     
                        <div class="col-md-4 text-right"><strong>Iva</strong></div>
                        <div class="col-md-8"><span class="text-muted"><strong>$ 2,3698</strong></span></div>
                        <div class="col-md-4 text-right"><strong>Total</strong></div>
                        <div class="col-md-4"><span class="text-muted"><strong>$ 2,3698</strong></span></div>                            
                        <div class="col-md-4"><button class="btn btn-sm btn-outline-success btn-block mb-1">Cobrar</button></div>                            
                      </div>                    
                  </div>
              </div>
        </div>
        <!-- Categorias de Productos -->
        <div class="col-md-2">
            <div class="categorias-productos mt-1">
                <!-- <div class="list-group bg-dark">
                    <a href="#" class="list-group-item list-group-item-action">Lonas</a>
                    <a href="#" class="list-group-item list-group-item-action">Serigrafia</a>
                    <a href="#" class="list-group-item list-group-item-action">Sublimación</a>
                    <a href="#" class="list-group-item list-group-item-action">Viniles</a>
                    <a href="#" class="list-group-item list-group-item-action">Personalizado</a>
                </div> -->
                <ul class="nav flex-column">
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
    <div class="row pie">
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
                        <input type="text" wire:model="nombre" class="form-control form-control-sm" placeholder="Producto">                                
                      </div> 
                      <div class="col-md-1">
                        <input type="text" wire:model="cantidad" class="form-control form-control-sm" placeholder="Cantidad">                                
                      </div> 
                      <div class="col-md-1">
                        <input type="text" wire:model="precio" class="form-control form-control-sm" placeholder="Precio">                                
                      </div> 
                      <div class="col-md-1">
                        <input type="text" wire:model="importe" class="form-control form-control-sm" placeholder="Importe" disabled>                                
                      </div> 
                      <div class="col-4 col-sm-3 col-md-2">
                        <button class="btn btn-sm btn-outline-info" wire:click="addtocart()"><i class="fas fa-shopping-cart"></i> Agregar</button>
                      </div>
                  </div>
                </div>
              </div>            
        </div>
    </div>
</div>
