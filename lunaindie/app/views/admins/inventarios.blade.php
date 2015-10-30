@section('title')
Luna Indie
@stop
@section('content')

            <div id="main">
                
                    <div class="main-header background background-image-heading-contact">
                        <div class="container">
                            <h1>Inventarios</h1>
                        </div>
                    </div>
                

                <div id="breadcrumb">
                    <div class="container">
                        <ol class="breadcrumb">
    <li><a href="/">Inicio</a></li>
    <li class="active"><span>Inventarios</span></li>
</ol>

                    </div>
                </div>

                
<div class="contact-wrapper">
    <div class="margin-bottom-100">
        <div class="container">
            <br><br>
            @if(isset($prendaEditar))
            <div class="row">
                <div class="col-md-12">
                    <div class="product-details-wrapper">
                        <h2 class="product-name">
                            <a href="#" title=" Gin Lane Greenport Cotton Shirt"> {{$prendaEditar->usuario->first_name}} {{$prendaEditar->usuario->last_name}}</a>
                        </h2><!-- /.product-name -->

                        <div class="product-status">
                            <span>Nivel</span>
                            <span>-</span>
                            <small>3</small>
                        </div><!-- /.product-status -->

                        <div class="product-stars">
                            <span class="rating">
                                <span class="@if($prendaEditar->usuario->banderaVendedor == 3) star @endif"></span>
                                <span class="@if($prendaEditar->usuario->banderaVendedor > 3) star @endif"></span>
                                <span class="@if($prendaEditar->usuario->banderaVendedor > 10) star @endif"></span>
                                <span class="@if($prendaEditar->usuario->banderaVendedor > 50) star @endif"></span>
                                <span class="@if($prendaEditar->usuario->banderaVendedor > 100) star @endif"></span>
                            </span>
                        </div><!-- /.product-stars -->

                        <div class="product-actions-wrapper">
                            
                            <div class="product-list-actions">
                                <button class="btn btn-lg btn-primary enviarMensaje" data-disenador="{{$prendaEditar->usuario->id}}">Enviar mensaje</button>
                            </div><!-- /.product-list-actions -->
                        </div><!-- /.product-actions-wrapper -->

                        
                    </div><!-- /.product-details-wrapper -->
                </div>
            </div>
            <br><hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="contact-content">
                        <div class="contact-form-heading">
                            <h2>Edición de prenda</h2>
                        </div><!-- /.contact-content -->


                        <form action="/soyadministrador/edicionPrenda" method="POST" enctype="multipart/form-data" id="contact-form" class="nuevaPrendaForm">
                            <span class="error" style="color: #ffa200;">&nbsp;</span><br><br>
                            {{Form::token()}}

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Título<sup>*</sup></label>
                                        <input type="text" value="{{$prendaEditar->titulo}}" class="form-control dark validamePrenda soloAlpha tiutloPrenda" name="tiutloPrenda" placeholder="Ej. Blusa a lunares primavera" data-tipo="texto" data-errorcustom="El título es requerido">
                                    </div><!-- /.form-group -->
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="categoriaPrenda">Categoría <sup>*</sup></label>
                                        <select name="categoriaPrenda" id="categoriaPrenda" class="form-control dark validamePrenda" data-tipo="select" data-errorcustom="La categoría es requerida">
                                            <option value="Selecciona una opción" >Selecciona una opción</option>
                                            <option value="1" @if($prendaEditar->categoria->id == 1) selected @endif >Blusas</option>
                                            <option value="2" @if($prendaEditar->categoria->id == 2) selected @endif>Pantalones</option>
                                            <option value="3" @if($prendaEditar->categoria->id == 3) selected @endif>Chamarras</option>
                                            <option value="4" @if($prendaEditar->categoria->id == 4) selected @endif>Abrigos</option>
                                            <option value="5" @if($prendaEditar->categoria->id == 5) selected @endif>Ropa interior</option>
                                        </select>
                                    </div><!-- /.form-group -->
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Precio<sup>*</sup></label>
                                        <input type="text" value="{{$prendaEditar->precio}}" class="form-control dark validamePrenda soloAlphaNum precioPrenda" name="precioPrenda" placeholder="25.00" data-tipo="texto" data-errorcustom="El precio es requerido">
                                        <input type="hidden" value="{{$prendaEditar->id}}" name="idPrenda" >
                                    </div><!-- /.form-group -->
                                </div>
                            </div>

                            <hr>

                            <div class="row medidas">
                                @foreach($prendaEditar->medidas as $medida)
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Texto para {{$medida->medida}}<sup>*</sup></label>
                                        <input type="text" value="{{$medida->medida}}" class="form-control dark medidaPrenda" name="medidaPrenda#{{$medida->id}}" placeholder="0" data-tipo="texto"  data-tipo="texto" data-errorcustom="NADA">
                                    </div>
                                </div>  
                                @endforeach                          
                            </div>

                            <hr>

                            <div class="row colores">
                                @foreach($prendaEditar->colors as $color)
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Texto para {{$color->color}}<sup>*</sup></label>
                                        <input type="text" value="{{$color->color}}" class="form-control dark medidaPrenda" name="colorPrenda#{{$color->id}}" placeholder="0" data-tipo="texto"  data-tipo="texto" data-errorcustom="NADA">
                                    </div>
                                </div>  
                                @endforeach                          
                            </div>

                            <hr>
                            
                            <div class="row cantidades">
                                @foreach($prendaEditar->inventarios as $cantidad)
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Unidades para {{$cantidad->medida->medida}}-{{$cantidad->color->color}}<sup>*</sup></label>
                                        <input type="text" value="{{$cantidad->cantidad}}" class="form-control dark validamePrenda soloAlphaNum cantidadPrenda {{$cantidad->cantidad}}" name="cantidadPrenda#{{$cantidad->medida_id}}#{{$cantidad->color_id}}" placeholder="0" data-tipo="texto" data-medida="{{$cantidad->medida_id}}" data-color="{{$cantidad->color_id}}" data-tipo="cantidad" data-errorcustom="La cantidad para la talla {{$cantidad->medida_id}}, color {{$cantidad->color_id}} es requerida">
                                    </div>
                                </div>  
                                @endforeach                          
                            </div>
                            


                           

                            <div class="form-group">
                                <label>Texto de venta (a mostrar al público)<sup>*</sup></label>
                                <textarea name="descripcionPublico" class="form-control dark validamePrenda" rows="5" required data-tipo="area" data-errorcustom="La descripción al público es requerida">{{$prendaEditar->descripcionPublico}}</textarea>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label>Descripción detallada de la prenda (medidas, materiales, cuidado, puntos finos, etc)<sup>*</sup></label>
                                <textarea name="descripcionDetallada" class="form-control dark validamePrenda" rows="5" required data-tipo="area" data-errorcustom="La descripción detallada es requerida">{{$prendaEditar->descripcionDetallada}}</textarea>
                            </div><!-- /.form-group -->


                            <ul class="list doc-icons-list">
                                
                                <li class="cuadrito">
                                    <label for="file-input">
                                        <span class="doc-list-icon">
                                        <img src="/public/solicitudes/{{$prendaEditar->imagenes[0]->nombreImagen}}" />
                                        </span>
                                        <span class="doc-list-class">Cambiar imagen</span>
                                    </label>
                                    <input id="file-input" name="imagenPrincipal" class=" imagen" type="file" style="display:none;" data-eq="0" data-tipo="archivo" data-errorcustom="La imagen principal es requerida"/>
                                </li>
                                <li class="cuadrito">
                                    <label for="file-input2">
                                        <span class="doc-list-icon">
                                        <img src="/public/solicitudes/{{$prendaEditar->imagenes[1]->nombreImagen}}" />
                                        </span>
                                        <span class="doc-list-class">Cambiar imagen</span>
                                    </label>
                                    <input id="file-input2" name="imagen2" class=" imagen" type="file" style="display:none;" data-eq="1" data-tipo="archivo" data-errorcustom="Debes subir 5 imágenes"/>
                                </li>
                                <li class="cuadrito">
                                    <label for="file-input3">
                                        <span class="doc-list-icon">
                                        <img src="/public/solicitudes/{{$prendaEditar->imagenes[2]->nombreImagen}}" />
                                        </span>
                                        <span class="doc-list-class">Cambiar imagen</span>
                                    </label>
                                    <input id="file-input3" name="imagen3" class=" imagen" type="file" style="display:none;" data-eq="2" data-tipo="archivo" data-errorcustom="Debes subir 5 imágenes"/>
                                </li>
                                <li class="cuadrito">
                                    <label for="file-input4">
                                        <span class="doc-list-icon">
                                        <img src="/public/solicitudes/{{$prendaEditar->imagenes[3]->nombreImagen}}" />
                                        </span>
                                        <span class="doc-list-class">Cambiar imagen</span>
                                    </label>
                                    <input id="file-input4" name="imagen4" class=" imagen" type="file" style="display:none;" data-eq="3" data-tipo="archivo" data-errorcustom="Debes subir 5 imágenes"/>
                                </li>
                                <li class="cuadrito">
                                    <label for="file-input5">
                                        <span class="doc-list-icon">
                                        <img src="/public/solicitudes/{{$prendaEditar->imagenes[4]->nombreImagen}}" />
                                        </span>
                                        <span class="doc-list-class">Cambiar imagen</span>
                                    </label>
                                    <input id="file-input5" name="imagen5" class=" imagen" type="file" style="display:none;" data-eq="4" data-tipo="archivo" data-errorcustom="Debes subir 5 imágenes"/>
                                </li>
                            </ul>
                            <ul class="list doc-icons-list">
                                
                                <li class="cuadrito">
                                    <label for="file-input6">
                                        <span class="doc-list-icon">
                                        @if(isset($prendaEditar->imagenes[5]))
                                        <img src="/public/solicitudes/{{$prendaEditar->imagenes[5]->nombreImagen}}" />
                                        @else
                                        <i class="icon icon-plus"></i>
                                        @endif
                                        </span>
                                        <span class="doc-list-class">Imagen de calidad</span>
                                    </label>
                                    <input id="file-input6" name="imagen6" class=" imagen" type="file" style="display:none;" data-eq="5" data-tipo="archivo" data-errorcustom="imagen1 de sistema"/>
                                </li>
                                <li class="cuadrito">
                                    <label for="file-input7">
                                        <span class="doc-list-icon">
                                        @if(isset($prendaEditar->imagenes[6]))
                                        <img src="/public/solicitudes/{{$prendaEditar->imagenes[6]->nombreImagen}}" />
                                        @else
                                        <i class="icon icon-plus"></i>
                                        @endif
                                        </span>
                                        <span class="doc-list-class">Imagen de calidad</span>
                                    </label>
                                    <input id="file-input7" name="imagen7" class=" imagen" type="file" style="display:none;" data-eq="6" data-tipo="archivo" data-errorcustom="imagen2 de sistema"/>
                                </li>
                                <li class="cuadrito">
                                    <label for="file-input8">
                                        <span class="doc-list-icon">
                                        @if(isset($prendaEditar->imagenes[7]))
                                        <img src="/public/solicitudes/{{$prendaEditar->imagenes[7]->nombreImagen}}" />
                                        @else
                                        <i class="icon icon-plus"></i>
                                        @endif
                                        </span>
                                        <span class="doc-list-class">Imagen de calidad</span>
                                    </label>
                                    <input id="file-input8" name="imagen8" class=" imagen" type="file" style="display:none;" data-eq="7" data-tipo="archivo" data-errorcustom="imagen3 de sistema"/>
                                </li>
                            </ul>

                            <div class="row medidas">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="statusPrenda">Status <sup>*</sup></label>
                                        <select name="statusPrenda" id="statusPrenda" class="form-control dark validamePrenda" data-tipo="select" data-errorcustom="La categoría es requerida">
                                            <option value="SOLICITADA" @if($prendaEditar->status == 'SOLICITADA') selected @endif >SOLICITADA</option>
                                            <option value="CONTROLDECALIDAD" @if($prendaEditar->status == 'CONTROLDECALIDAD') selected @endif>CONTROLDECALIDAD</option>
                                            <option value="ACTIVA" @if($prendaEditar->status == 'ACTIVA') selected @endif>ACTIVA</option>
                                            <option value="AGOTADA" @if($prendaEditar->status == 'AGOTADA') selected @endif>AGOTADA</option>
                                            <option value="RECHAZADA" @if($prendaEditar->status == 'RECHAZADA') selected @endif>RECHAZADA</option>
                                            <option value="SUBASTA" @if($prendaEditar->status == 'SUBASTA') selected @endif>SUBASTA</option>
                                            <option value="SUBASTATERMINADA" @if($prendaEditar->status == 'SUBASTATERMINADA') selected @endif>SUBASTATERMINADA</option>
                                        </select>
                                    </div><!-- /.form-group -->
                                </div>                           
                            </div>


                            {{Form::token()}}

                            <div class="form-button">
                                <button type="submit" class="btn btn-lg btn-dark enviarAjuste">Enviar</button>
                            </div><!-- /.form-button -->
                        </form>

                        <div class="row">
                            <div class="col-md-12">
                                
                            </div>
                        </div>

                    </div>
                </div><!-- /.col-md-12 -->
            </div><!-- /.row --><br><br><br>   
            @endif
             
            <div class="row">
                <div class="col-md-12">
                    <div class="divider horizontal">Prendas {{$modoTitulo}}</div>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-1 center" style="border: 1px solid gray;">
                    Folio
                </div>
                <div class="col-md-1 center" style="border: 1px solid gray;">
                    Imagen
                </div>
                <div class="col-md-2 center" style="border: 1px solid gray;">
                    Título
                </div>
                <div class="col-md-4 center" style="border: 1px solid gray;">
                    Mensaje al público
                </div>
                <div class="col-md-1 center" style="border: 1px solid gray;">
                    Talla
                </div>
                <div class="col-md-1 center" style="border: 1px solid gray;">
                    Color
                </div>
                <div class="col-md-1 center" style="border: 1px solid gray;">
                    Unidades
                </div>
                <div class="col-md-1 center" style="border: 1px solid gray;">
                    Estado
                </div>
            </div><!-- /.row -->
            <br>

            @for($i=$inicio*25; $i<($inicio*25+25);$i++)
            @if(isset($prendas[$i]))
            <div class="row">
                <div class="col-md-1 center">
                    {{$prendas[$i]->user_id}}_{{$prendas[$i]->id}}
                </div>
                <div class="col-md-1 center">
                    <a href="/soyadministrador/inventarios/prenda/{{$inicio+1}}/{{$prendas[$i]->id}}" ><img src="/public/solicitudes/{{$prendas[$i]->imagenPrincipal[0]->nombreImagen}}" alt=""></a>
                </div>
                <div class="col-md-2 center">
                    {{$prendas[$i]->titulo}}
                </div>
                <div class="col-md-4">
                    {{$prendas[$i]->descripcionPublico}}
                </div>
                <div class="col-md-1 center">
                    @foreach($prendas[$i]->medidas as $medida)
                    {{$medida->medida}}&nbsp; 
                    @endforeach
                </div>
                <div class="col-md-1 center">
                    @foreach($prendas[$i]->colors as $color)
                    {{$color->color}}&nbsp; 
                    @endforeach
                </div>
                <div class="col-md-1 center">
                    <?php $cuenta = 0; ?>
                    @foreach($prendas[$i]->inventarios as $inventario)
                    <?php 
                        $cuenta += $inventario->cantidad;
                    ?>
                    @endforeach
                    {{$cuenta}}
                </div>
                <div class="col-md-1 center">
                    {{$prendas[$i]->status}}
                </div>
            </div><!-- /.row -->
            <br>
            @endif
            @endfor

            <div class="row">
                <div class="col-md-12 center">
                    <ul class="pagination">
                        <li @if($inicio == 0) class="active" @endif><a href="/soydisenador/inventarios/">1</a></li>
                        @if(count($prendas)>25)<li @if($inicio == 1) class="active" @endif><a href="/soydisenador/inventarios/2">2</a></li>@endif
                        @if(count($prendas)>50)<li @if($inicio == 2) class="active" @endif><a href="/soydisenador/inventarios/3">3</a></li>@endif
                        @if(count($prendas)>75)<li @if($inicio == 3) class="active" @endif><a href="/soydisenador/inventarios/4">4</a></li>@endif
                        @if(count($prendas)>100)<li @if($inicio == 4) class="active" @endif><a href="/soydisenador/inventarios/5">5</a></li>@endif
                        @if(count($prendas)>125)<li @if($inicio == 5) class="active" @endif><a href="/soydisenador/inventarios/6">6</a></li>@endif
                        @if(count($prendas)>150)<li @if($inicio == 6) class="active" @endif><a href="/soydisenador/inventarios/7">7</a></li>@endif
                        @if(count($prendas)>175)<li @if($inicio == 7) class="active" @endif><a href="/soydisenador/inventarios/8">8</a></li>@endif
                        @if(count($prendas)>200)<li @if($inicio == 8) class="active" @endif><a href="/soydisenador/inventarios/9">9</a></li>@endif
                        @if(count($prendas)>225)<li @if($inicio == 9) class="active" @endif><a href="/soydisenador/inventarios/10">10</a></li>@endif
                    </ul><!-- ./pagination -->
                </div>
            </div>
            
        </div><!-- /.container -->
    </div><!-- /.margin-bottom-100 -->

</div><!-- /.contact-wrapper -->



            </div>

@stop 

@section('scripts')
    <script src="/public/statics/js/admins/editarprenda.js"></script>
@stop





