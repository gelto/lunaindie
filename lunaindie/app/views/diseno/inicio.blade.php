10-@section('title')
Luna Indie
@stop
@section('content')

            <div id="main">
                
                    <div class="main-header background background-image-heading-contact">
                        <div class="container">
                            <h1>Mensajes</h1>
                        </div>
                    </div>
                

                <div id="breadcrumb">
                    <div class="container">
                        <ol class="breadcrumb">
    <li><a href="/">Inicio</a></li>
    <li class="active"><span>Mensajes</span></li>
</ol>

                    </div>
                </div>

                
<div class="contact-wrapper">
    <div class="margin-bottom-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="contact-content">
                        <div class="contact-block">
                            <div class="contact-form-heading">
                                <h2>Información general y mensajes</h2>
                            </div><!-- /.contact-content -->

                            <div class="row">
                                <div class="col-md-6">
                                    <b>Saldo a favor</b>
                                </div>
                                <div class="col-md-6">
                                    $5,300
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <b>Nivel de confianza</b>
                                </div>
                                <div class="col-md-6">
                                    50-100
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <b>Mejor venta</b>
                                </div>
                                <div class="col-md-6">
                                    Blusa azul rashadita
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <b>Inventarios agotados</b>
                                </div>
                                <div class="col-md-6">
                                    5
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <b>Inventarios devueltos</b>
                                </div>
                                <div class="col-md-6">
                                    1
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <b>Inventarios</b>
                                </div>
                                <div class="col-md-6">
                                    3
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <b>Subastas</b>
                                </div>
                                <div class="col-md-6">
                                    0
                                </div>
                            </div>
    
                        </div><!-- /.contact-block -->

                    </div><!-- /.contact-content -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
            <br><br>
            <div class="row">
                <div class="col-md-12">
                    <div class="contact-content">
                        <div class="contact-form-heading">
                            <h2>Mensajes</h2>
                            <p>Comunícate con nosotros</p>
                        </div><!-- /.contact-content -->

                        <div id="ajax-message"></div>

                        <form action="/soydisenador/mensajenuevo" method="POST" enctype="multipart/form-data" id="contact-form" class="nuevoMensajeForm">
                            <span class="error" style="color: #ffa200;">&nbsp;</span><br>
                            <div class="form-group">
                                <label for="contact-name">Nuevo mensaje</label>
                                <textarea name="mensaje" class="form-control dark validameMensaje" rows="6" required data-tipo="area" data-errorcustom="Es necesario que escribas un mensaje"></textarea>
                            </div><!-- /.form-group -->
                            <ul class="list doc-icons-list">
                                <li class="cuadrito">
                                    <label for="file-input">
                                        <span class="doc-list-icon">
                                        <i class="icon icon-plus"></i>
                                        </span>
                                        <span class="doc-list-class">Agrega imagen (opcional)</span>
                                    </label>
                                    <input id="file-input" name="imagenPrincipal" class="imagen" type="file" style="display:none;" data-eq="0" data-tipo="archivo" />
                                    <input type="hidden" name="usuario" value="{{$userL->id}}"/>
                                </li>
                            </ul>


                            {{Form::token()}}

                            <div class="form-button">
                                <button type="submit" class="btn btn-lg btn-dark botonEnviarMensaje">Enviar</button>
                            </div><!-- /.form-button -->
                        </form>

                    </div>
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="divider horizontal">Historial</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1 center" style="border: 1px solid gray;">
                    Fecha
                </div>
                <div class="col-md-1 center" style="border: 1px solid gray;">
                    Remitente
                </div>
                <div class="col-md-8 center" style="border: 1px solid gray;">
                    Mensaje
                </div>
                <div class="col-md-2 center" style="border: 1px solid gray;">
                    Imagen 
                </div>
            </div><!-- /.row -->
            <br>

            @for($i=$inicio*25; $i<($inicio*25+25);$i++)
            @if(isset($mensajes[$i]))
            <div class="row">
                <div class="col-md-1">
                    <?php $creado = explode(" ", $mensajes[$i]->created_at); ?>
                    {{$creado[0]}}
                </div>
                <div class="col-md-1">
                    @if($mensajes[$i]->origen == "SISTEMA")
                    LUNA INDIE
                    @else
                    <?php $usuario = User::find($mensajes[$i]->user_id); ?>
                    {{$usuario->first_name}}
                    @endif
                </div>
                <div class="col-md-8">
                    {{$mensajes[$i]->texto}}
                </div>
                <div class="col-md-2">
                    @if($mensajes[$i]->imagen)
                    <img src="{{$mensajes[$i]->imagen}}"/>
                    @else
                    @endif
                </div>
            </div><!-- /.row -->
            <br>
            @endif
            @endfor

            <div class="row">
                <div class="col-md-12 center">
                    <ul class="pagination">
                        <li @if($inicio == 0) class="active" @endif><a href="/soydisenador/mensajes/">1</a></li>
                        @if(count($mensajes)>25)<li @if($inicio == 1) class="active" @endif><a href="/soydisenador/mensajes/2">2</a></li>@endif
                        @if(count($mensajes)>50)<li @if($inicio == 2) class="active" @endif><a href="/soydisenador/mensajes/3">3</a></li>@endif
                        @if(count($mensajes)>75)<li @if($inicio == 3) class="active" @endif><a href="/soydisenador/mensajes/4">4</a></li>@endif
                        @if(count($mensajes)>100)<li @if($inicio == 4) class="active" @endif><a href="/soydisenador/mensajes/5">5</a></li>@endif
                        @if(count($mensajes)>125)<li @if($inicio == 5) class="active" @endif><a href="/soydisenador/mensajes/6">6</a></li>@endif
                        @if(count($mensajes)>150)<li @if($inicio == 6) class="active" @endif><a href="/soydisenador/mensajes/7">7</a></li>@endif
                        @if(count($mensajes)>175)<li @if($inicio == 7) class="active" @endif><a href="/soydisenador/mensajes/8">8</a></li>@endif
                        @if(count($mensajes)>200)<li @if($inicio == 8) class="active" @endif><a href="/soydisenador/mensajes/9">9</a></li>@endif
                        @if(count($mensajes)>225)<li @if($inicio == 9) class="active" @endif><a href="/soydisenador/mensajes/10">10</a></li>@endif
                        
                    </ul><!-- ./pagination -->
                </div>
            </div>
        </div><!-- /.container -->
    </div><!-- /.margin-bottom-100 -->

</div><!-- /.contact-wrapper -->



            </div>

@stop 


@section('scripts')
<script src="/public/statics/js/mensajenuevo.js"></script>
@stop





