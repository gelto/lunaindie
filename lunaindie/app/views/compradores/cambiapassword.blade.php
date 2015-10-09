@section('title')
Luna Indie
@stop
@section('content')

            <div id="main">
                
                    <div class="main-header background background-image-heading-contact">
                        <div class="container">
                            <h1>Recuperar password</h1>
                        </div>
                    </div>
                

                <div id="breadcrumb">
                    <div class="container">
                        <ol class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active"><span>Recuperar password</span></li>
</ol>

                    </div>
                </div>

                
<div class="contact-wrapper">
    <div class="margin-bottom-100">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-content">
                        <div class="contact-header">
                            <div class="contact-image">
                                <img src="/public/statics/template/img/samples/banners/contact/banner-contact-1.jpg" alt="">
                            </div>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos <strong>dolores et quas molestias excepturi sint occaecati</strong> cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
                        </div><!-- /.contact-header -->

                        <div class="contact-block">
                            <h3>SHOP INFOMATION</h3>

                            <dl class="dl-horizontal">
                                <dt>Address</dt>
                                <dd>225 Richardson St, Australian</dd>

                                <dt>Phone</dt>
                                <dd>+61 2 6854 8496</dd>

                                <dt>Email</dt>
                                <dd>hosoren@gmail.com</dd>
                            </dl>
                        </div><!-- /.contact-block -->

                        <div class="contact-block">
                            <h3>CUSTOMER SERVICE HOURS</h3>

                            <dl class="dl-horizontal">
                                <dt>M-F</dt>
                                <dd>8 am to 10 pm </dd>

                                <dt>Sat</dt>
                                <dd>9 am to 10 pm</dd>

                                <dt>Sun</dt>
                                <dd>10 am to 10 pm</dd>
                            </dl>
                        </div><!-- /.contact-block -->
                    </div><!-- /.contact-content -->
                </div><!-- /.col-md-6 -->

                <div class="col-md-6">
                    <div class="contact-content">
                        <div class="contact-form-heading">
                            <h2>EMAIL TO OUR</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since</p>
                        </div><!-- /.contact-content -->

                        <div id="ajax-message"></div>

                        <form action="" method="POST"  id="contact-form">
                            <span class="error" style="color: #ffa200;">&nbsp;</span><br>
                            <div class="form-group">
                                <label for="contact-name">Password</label>
                                <input type="password" name="name" id="contact-name" class="form-control dark validameRec passwordRec" required data-tipo="password" data-errorcustom="El password es requerido">
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label for="contact-email">Confirma el password</label>
                                <input type="password" name="email" id="contact-email" class="form-control dark validameRec passwordRec" required data-tipo="password" data-errorcustom="Confirmar el password es requerido">
                                <input type="hidden" class="resetcode" name='resetcode' value="{{$resetcode}}" >
                                <input type="hidden" class="id" name='id' value="{{$id}}" >
                            </div><!-- /.form-group -->

                            {{Form::token()}}

                            <div class="form-button">
                                <button type="submit" class="btn btn-lg btn-dark botonEnviarRec">Enviar</button>
                            </div><!-- /.form-button -->
                        </form>
                    </div>
                </div><!-- /.col-md-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.margin-bottom-100 -->

</div><!-- /.contact-wrapper -->



            </div>

@stop 





