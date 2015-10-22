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
            <div class="row">
                <div class="col-md-12">
                    <div class="contact-content">
                        <div class="contact-form-heading">
                            <h2>Nueva prenda</h2>
                            <p>Sube un nuevo diseño para aprobación. Recuerda que en la descripción detallada necesitamos nos proporciones tantas medidas como sea posible, por ejmplo: largo y ancho de la manga, espacio entre los hombros, largo del pantalón, medida en la cadera, medida en el muslo, en el tobillo, etc. Además puntos finos como: si va justa en la cintura, si los sierres son funcionales o de adorno,los materiales usados, y hasta tipo de cuidado y lavado. Todo lo necesario para asegurar a los compradores que la prenda les quedará muy bien :D . Todas estas medidas serán comprobadas al momento de validar tu prenda en el segundo paso de aprobación. Si tienes dudas sobre este prceso puedes leer la sección SECCIÓN o bien comunícate con nosotros por medio de un mensaje.</p>
                        </div><!-- /.contact-content -->

                        <div id="ajax-message"></div>

                        <form action="/soydisenador/solicitudPrenda" method="POST" enctype="multipart/form-data" id="contact-form" class="nuevaPrendaForm">
                            <span class="error" style="color: #ffa200;">&nbsp;</span><br><br>
                            {{Form::token()}}

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Título<sup>*</sup></label>
                                        <input type="text" class="form-control dark validamePrenda soloAlpha tiutloPrenda" name="tiutloPrenda" placeholder="Ej. Blusa a lunares primavera" data-tipo="texto" data-errorcustom="El título es requerido">
                                    </div><!-- /.form-group -->
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="categoriaPrenda">Categoría <sup>*</sup></label>
                                        <select name="categoriaPrenda" id="categoriaPrenda" class="form-control dark validamePrenda" data-tipo="select" data-errorcustom="La categoría es requerida">
                                            <option value="Selecciona una opción" >Selecciona una opción</option>
                                            <option value="1" >Blusas</option>
                                            <option value="2" >Pantalones</option>
                                            <option value="3" >Chamarras</option>
                                            <option value="4" >Abrigos</option>
                                            <option value="5" >Ropa interior</option>
                                        </select>
                                    </div><!-- /.form-group -->
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Precio<sup>*</sup></label>
                                        <input type="text" class="form-control dark validamePrenda soloAlphaNum precioPrenda" name="precioPrenda" placeholder="25.00" data-tipo="texto" data-errorcustom="El precio es requerido">
                                    </div><!-- /.form-group -->
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Medidas (separadas por #)<sup>*</sup></label>
                                        <input type="text" class="form-control dark validamePrenda soloAlphaHash medidasPrenda" name="medidasPrenda" placeholder="Chica#Mediana" data-tipo="hash" data-errorcustom="Las medidas son requeridos">
                                    </div><!-- /.form-group -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Colores (separados por #)<sup>*</sup></label>
                                        <input type="text" class="form-control dark validamePrenda soloAlphaHash coloresPrenda" name="coloresPrenda" placeholder="Verde#Azul#Roja" data-tipo="hash" data-errorcustom="Los colores son requeridos">
                                    </div><!-- /.form-group -->
                                </div>
                                
                            </div>

                           
                            <div class="row cantidades">
                                &nbsp;                                
                            </div>
                           

                            <div class="form-group">
                                <label>Texto de venta (a mostrar al público)<sup>*</sup></label>
                                <textarea name="descripcionPublico" class="form-control dark validamePrenda" rows="5" required data-tipo="area" data-errorcustom="La descripción al público es requerida"></textarea>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label>Descripción detallada de la prenda (medidas, materiales, cuidado, puntos finos, etc)<sup>*</sup></label>
                                <textarea name="descripcionDetallada" class="form-control dark validamePrenda" rows="5" required data-tipo="area" data-errorcustom="La descripción detallada es requerida"></textarea>
                            </div><!-- /.form-group -->


                            <ul class="list doc-icons-list">
                                
                                <li class="cuadrito">
                                    <label for="file-input">
                                        <span class="doc-list-icon">
                                        <i class="icon icon-plus"></i>
                                        </span>
                                        <span class="doc-list-class">Agrega imagen</span>
                                    </label>
                                    <input id="file-input" name="imagenPrincipal" class="validamePrenda imagen" type="file" style="display:none;" data-eq="0" data-tipo="archivo" data-errorcustom="La imagen principal es requerida"/>
                                </li>
                                <li class="cuadrito">
                                    <label for="file-input2">
                                        <span class="doc-list-icon">
                                        <i class="icon icon-plus"></i>
                                        </span>
                                        <span class="doc-list-class">Agrega imagen</span>
                                    </label>
                                    <input id="file-input2" name="imagen2" class="validamePrenda imagen" type="file" style="display:none;" data-eq="1" data-tipo="archivo" data-errorcustom="Debes subir 5 imágenes"/>
                                </li>
                                <li class="cuadrito">
                                    <label for="file-input3">
                                        <span class="doc-list-icon">
                                        <i class="icon icon-plus"></i>
                                        </span>
                                        <span class="doc-list-class">Agrega imagen</span>
                                    </label>
                                    <input id="file-input3" name="imagen3" class="validamePrenda imagen" type="file" style="display:none;" data-eq="2" data-tipo="archivo" data-errorcustom="Debes subir 5 imágenes"/>
                                </li>
                                <li class="cuadrito">
                                    <label for="file-input4">
                                        <span class="doc-list-icon">
                                        <i class="icon icon-plus"></i>
                                        </span>
                                        <span class="doc-list-class">Agrega imagen</span>
                                    </label>
                                    <input id="file-input4" name="imagen4" class="validamePrenda imagen" type="file" style="display:none;" data-eq="3" data-tipo="archivo" data-errorcustom="Debes subir 5 imágenes"/>
                                </li>
                                <li class="cuadrito">
                                    <label for="file-input5">
                                        <span class="doc-list-icon">
                                        <i class="icon icon-plus"></i>
                                        </span>
                                        <span class="doc-list-class">Agrega imagen</span>
                                    </label>
                                    <input id="file-input5" name="imagen5" class="validamePrenda imagen" type="file" style="display:none;" data-eq="4" data-tipo="archivo" data-errorcustom="Debes subir 5 imágenes"/>
                                </li>
                            </ul>


                            {{Form::token()}}

                            <div class="form-button">
                                <button type="submit" class="btn btn-lg btn-dark enviarSolicitud">Enviar</button>
                            </div><!-- /.form-button -->
                        </form>

                    </div>
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
            <br><br><br>    
            <div class="row">
                <div class="col-md-12">
                    <div class="divider horizontal">Prendas en inventario (haga click en la imagen para editar)</div>
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
            @if(isset($misPrendas[$i]))
            <div class="row">
                <div class="col-md-1 center">
                    {{$userL->id}}_{{$misPrendas[$i]->id}}
                </div>
                <div class="col-md-1 center">
                    <img src="/public/solicitudes/{{$misPrendas[$i]->imagenPrincipal[0]->nombreImagen}}" alt="">
                </div>
                <div class="col-md-2 center">
                    {{$misPrendas[$i]->titulo}}
                </div>
                <div class="col-md-4">
                    {{$misPrendas[$i]->descripcionPublico}}
                </div>
                <div class="col-md-1 center">
                    @foreach($misPrendas[$i]->medidas as $medida)
                    {{$medida->medida}}&nbsp; 
                    @endforeach
                </div>
                <div class="col-md-1 center">
                    @foreach($misPrendas[$i]->colors as $color)
                    {{$color->color}}&nbsp; 
                    @endforeach
                </div>
                <div class="col-md-1 center">
                    <?php $cuenta = 0; ?>
                    @foreach($misPrendas[$i]->inventarios as $inventario)
                    <?php 
                        $cuenta += $inventario->cantidad;
                    ?>
                    @endforeach
                    {{$cuenta}}
                </div>
                <div class="col-md-1 center">
                    En revisión
                </div>
            </div><!-- /.row -->
            <br>
            @endif
            @endfor
            <div class="row">
                <div class="col-md-12 center">
                    <ul class="pagination">
                        <li @if($inicio == 0) class="active" @endif><a href="/soydisenador/inventarios/">1</a></li>
                        @if(count($misPrendas)>25)<li @if($inicio == 1) class="active" @endif><a href="/soydisenador/inventarios/2">2</a></li>@endif
                        @if(count($misPrendas)>50)<li @if($inicio == 2) class="active" @endif><a href="/soydisenador/inventarios/3">3</a></li>@endif
                        @if(count($misPrendas)>75)<li @if($inicio == 3) class="active" @endif><a href="/soydisenador/inventarios/4">4</a></li>@endif
                        @if(count($misPrendas)>100)<li @if($inicio == 4) class="active" @endif><a href="/soydisenador/inventarios/5">5</a></li>@endif
                        @if(count($misPrendas)>125)<li @if($inicio == 5) class="active" @endif><a href="/soydisenador/inventarios/6">6</a></li>@endif
                        @if(count($misPrendas)>150)<li @if($inicio == 6) class="active" @endif><a href="/soydisenador/inventarios/7">7</a></li>@endif
                        @if(count($misPrendas)>175)<li @if($inicio == 7) class="active" @endif><a href="/soydisenador/inventarios/8">8</a></li>@endif
                        @if(count($misPrendas)>200)<li @if($inicio == 8) class="active" @endif><a href="/soydisenador/inventarios/9">9</a></li>@endif
                        @if(count($misPrendas)>225)<li @if($inicio == 9) class="active" @endif><a href="/soydisenador/inventarios/10">10</a></li>@endif
                    </ul><!-- ./pagination -->
                </div>
            </div>
            
        </div><!-- /.container -->
    </div><!-- /.margin-bottom-100 -->

</div><!-- /.contact-wrapper -->



            </div>

@stop 

@section('scripts')
<script src="/public/statics/js/solicitudnueva.js"></script>
@stop





