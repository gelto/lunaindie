@section('title')
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

                        <form action="" method="POST"  id="contact-form">
                            <span class="error" style="color: #ffa200;">&nbsp;</span><br>
                            <div class="form-group">
                                <label for="contact-name">Nuevo mensaje</label>
                                <textarea name="message" id="contact-message" class="form-control dark" rows="5" required></textarea>
                            </div><!-- /.form-group -->
                            <ul class="list doc-icons-list">
                                <li>
                                    <span class="doc-list-icon">
                                        <i class="icon icon-plus"></i>
                                    </span>
                                    <span class="doc-list-class">Agrega imagen</span>
                                </li>
                            </ul>


                            {{Form::token()}}

                            <div class="form-button">
                                <button type="submit" class="btn btn-lg btn-dark botonEnviarRec">Enviar</button>
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

            <div class="row">
                <div class="col-md-1">
                    10-Oct-15
                </div>
                <div class="col-md-1">
                    Luna Indie
                </div>
                <div class="col-md-8">
                    Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje 
                </div>
                <div class="col-md-2">
                    &nbsp; 
                </div>
            </div><!-- /.row -->
            <br>

            <div class="row">
                <div class="col-md-1">
                    10-Oct-15
                </div>
                <div class="col-md-1">
                    Zamitis
                </div>
                <div class="col-md-8">
                    Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje 
                </div>
                <div class="col-md-2">
                    &nbsp; 
                </div>
            </div><!-- /.row -->
            <br>

            <div class="row">
                <div class="col-md-1">
                    10-Oct-15
                </div>
                <div class="col-md-1">
                    Luna Indie
                </div>
                <div class="col-md-8">
                    Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje Mensaje 
                </div>
                <div class="col-md-2">
                    &nbsp; 
                </div>
            </div><!-- /.row -->
            <br>
        </div><!-- /.container -->
    </div><!-- /.margin-bottom-100 -->

</div><!-- /.contact-wrapper -->



            </div>

@stop 





