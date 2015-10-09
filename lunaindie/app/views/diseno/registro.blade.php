@section('title')
Luna Indie
@stop
@section('content')


            <div id="main">
                
                    <div class="main-header background background-image-heading-checkout">
                        <div class="container">
                            <h1>Checkout</h1>
                        </div>
                    </div>
                

                <div id="breadcrumb">
                    <div class="container">
                        <ol class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active"><span>Checkout</span></li>
</ol>

                    </div>
                </div>

<section>
    <div class="container">

        <div class="padding-vertical-50 border-bottom">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                    <div class="awe-box center">
                        <div class="awe-box-media">
                            <div class="awe-box-image">
                                <img src="/public/statics/template/img/logo-dark.png" alt="">
                            </div>
                        </div><!-- /.awe-box-media -->

                        <div class="awe-box-content">
                            <h2>Bienvenido a Luna Indie</h2>
                            <p>Luna Indie busca llevar el trabajo de diseñadores independientes como tú, a las clientes que saben apreciarlo. Hacerlo con la confianza que recibirán un producto de calidad y en un tiempo breve. Esperamos lograr juntos una tienda con prendas geniales y clientes felices, vestidos como tú dictes.</p>
                        </div><!-- /.awe-box-content -->
                    </div><!-- /.awe-box -->

                </div>
            </div>
        </div><!-- /.padding-vertical-50 -->

        <div class="padding-vertical-50 border-bottom">
            <div class="row">
                <div class="col-md-4 col-sm-4">

                    <div class="awe-box center box-hover margin-bottom-25">
                        <div class="awe-box-media">
                            <div class="awe-box-icon icon-large">
                                <i class="icon icon-like"></i>
                            </div>
                        </div><!-- /.awe-box-media -->

                        <div class="awe-box-content">
                            <h3>Calidad</h3>
                            <p>Una preocupación muy grande sobre la compra en línea es la calidad de los productos. Si tú decides ser parte del portal todos tus diseños pasarán por un filtro de calidad antes de ser puestos a la vista de los visitantes.</p>
                        </div><!-- /.awe-box-content -->
                    </div><!-- /.awe-box -->

                </div>

                <div class="col-md-4 col-sm-4">

                    <div class="awe-box center box-hover margin-bottom-25">
                        <div class="awe-box-media">
                            <div class="awe-box-icon icon-large">
                                <i class="icon icon-shirt"></i>
                            </div>
                        </div><!-- /.awe-box-media -->

                        <div class="awe-box-content">
                            <h3>Inventarios y subastas</h3>
                            <p>Una vez que tu inventario haya sido aceptado será puesto en venta para las visitantes del portal, al precio que tu hayas decidido. Además, cuando tu ranqueo como diseñador haya subido y seas de los preferidos del público, podrás vender prendas únicas que serán subastadas aumentando el valor de estas.</p>
                        </div><!-- /.awe-box-content -->
                    </div><!-- /.awe-box -->

                </div>

                <div class="col-md-4 col-sm-4">

                    <div class="awe-box center box-hover margin-bottom-25">
                        <div class="awe-box-media">
                            <div class="awe-box-icon icon-large">
                                <i class="icon icon-help"></i>
                            </div>
                        </div><!-- /.awe-box-media -->

                        <div class="awe-box-content">
                            <h3>¿Cuánto gana Luna Indie?</h3>
                            <p>En las prendas de inventario tú pones el precio, en las subastas, lo hace el público. Luna Indie gana el 25% del valor total de la venta. Nos encargamos del almacenamiento, cobro en línea, empaquetado y entrega. Eso sí, tú nos mandas tu inventario a nuestras bodegas. Cada quincena te será depositado el monto por tus ganancias a la cuenta bancaria que nos indiques.</p>
                        </div><!-- /.awe-box-content -->
                    </div><!-- /.awe-box -->

                </div>
            </div><!-- /.row -->
        </div><!-- /.padding-vertical-50 -->

    </div><!-- /.container -->
</section><!-- /section -->

                
<form action="registrodisenador" method="POST" enctype="multipart/form-data" class="formaRegistroDiseno">
    <div class="checkout-wrapper">
        <div class="container">

            

            <div class="row">
                <div class="col-md-6">
                    <h2>Datos personales</h2>
                    <span class="error" style="color: #ffa200;">&nbsp;</span><br><br>
                    {{Form::token()}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name">Nombre <sup>*</sup></label>
                                <input type="text" class="form-control dark validameDiseno soloAlpha nombreDiseno" name="nombreDiseno" id="first_name" placeholder="Nombre(s)" data-tipo="texto" data-errorcustom="El nombre es requerido">
                            </div><!-- /.form-group -->
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last_name">Apellido <sup>*</sup></label>
                                <input type="text" class="form-control dark validameDiseno soloAlpha apellidoDiseno" name="apellidoDiseno" id="last_name" placeholder="Last Name" data-tipo="texto" data-errorcustom="El apellido es requerido">
                            </div><!-- /.form-group -->
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="company-name">Nombre artístico / Marca / Distintivo de tu ropa</label>
                        <input type="text" class="form-control dark validameDiseno soloAlpha marcaDiseno" name="marcaDiseno" id="company-name" placeholder="Company Name" data-tipo="texto" data-errorcustom="¿Cómo identificamos tus productos? ">
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label for="address">Dirección*</label>
                        <input type="text" class="form-control dark validameDiseno soloAlpha direccionDiseno" name="direccionDiseno" id="address" placeholder="Street Address" data-tipo="texto" data-errorcustom="Tú dirección es requerida">
                    </div><!-- /.form-group -->

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="street-address">Estado <sup>*</sup></label>
                                <input type="text" class="form-control dark validameDiseno soloAlpha estadoDiseno" name="estadoDiseno" id="street-address" placeholder="Town / City" data-tipo="texto" data-errorcustom="El estado es requerido">
                            </div><!-- /.form-group -->
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="town_country">Delegación o Municipio <sup>*</sup></label>
                                <input type="text" class="form-control dark validameDiseno soloAlpha delegacionDiseno" name="delegacionDiseno" id="town_country" placeholder="Country" data-tipo="texto" data-errorcustom="La delegación es requerida">
                            </div><!-- /.form-group -->
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="order-notes">Háblanos un poco de ti</label>
                        <textarea name="order-notes" name="descripcionDiseno" id="order-notes" class="form-control dark validameDiseno soloAlpha descripcionDiseno" rows="3" placeholder="Notes about your order, eg. special notes for delivery" data-tipo="area" data-errorcustom="Danos una idea de ti por favor"></textarea>
                    </div><!-- /.form-group -->

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="">
                            <span>Aceptas vender tu alma</span>
                        </label>
                    </div><!-- /.checkbox -->

                    <div class="wc-proceed-to-checkout">
                        <button class="btn btn-lg btn-primary botonEnviarDiseno">Enviar</button>
                    </div><!-- /.wc-proceed-to-checkout -->
                </div>

                <div class="col-md-6">
                    <div class="payment-right">
                        <h2>Nos gustaría ver algo de tu trabajo (opcional)</h2>

                        <div class="payment-detail-wrapper">
                            <ul class="cart-list">
                                
                                <li>
                                    <div class="cart-item">
                                        <div class="product-image">
                                            <a href="#" title="">
                                                <img src="/public/statics/template/img/samples/products/cart/1.jpg" alt="">
                                            </a>
                                        </div>

                                        <div class="product-body">
                                            <div class="product-name">
                                                <h3>
                                                    <a href="#" title="">Blusa-Roja-Azulada</a>
                                                </h3>
                                            </div>
                                            <div class="product-price">
                                                <input type="file" name="ejemplo1">
                                            </div>
                                        </div>
                                    </div><!-- /.cart-item -->

                                    
                                </li>
                                
                                <li>
                                    <div class="cart-item">
                                        <div class="product-image">
                                            <a href="#" title="">
                                                <img src="/public/statics/template/img/samples/products/cart/2.jpg" alt="">
                                            </a>
                                        </div>

                                        <div class="product-body">
                                            <div class="product-name">
                                                <h3>
                                                    <a href="#" title="">Panto-negro-como-ves</a>
                                                </h3>
                                            </div>
                                            <div class="product-price">
                                                <input type="file" name="ejemplo2">
                                            </div>
                                        </div>
                                    </div><!-- /.cart-item -->

                                    
                                </li>
                                
                                <li>
                                    <div class="cart-item">
                                        <div class="product-image">
                                            <a href="#" title="">
                                                <img src="/public/statics/template/img/samples/products/cart/3.jpg" alt="">
                                            </a>
                                        </div>

                                        <div class="product-body">
                                            <div class="product-name">
                                                <h3>
                                                    <a href="#" title="">Blusa-Roja-Azulada</a>
                                                </h3>
                                            </div>
                                            <div class="product-price">
                                                <input type="file" name="ejemplo3">
                                            </div>
                                        </div>
                                    </div><!-- /.cart-item -->

                                    
                                </li>
                                
                            </ul> <!-- /.cart-list -->
                        </div><!-- /.payment-detail-wrapper -->

                    </div>
                </div>
            </div>
        </div><!-- /.container -->
    </div><!-- /.checkout-wrapper -->
</form>

            </div>

            
        <footer class="footer">
            <div class="footer-wrapper">
                <div class="footer-widgets">
                    
                        
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12 col-sm-6">
                            
                            <div class="widget">
                                <h3 class="widget-title">ABOUT HOSOREN</h3>

                                <div class="widget-content">
                                    <p>Lorem ipsum dolor sit amet isse potenti. Vesquam ante aliquet lacusemper elit. Cras neque nulla, convallis non commodo et, euismod nonsese.</p>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-12 col-sm-6">
                            
                            <div class="widget">
                                <h3 class="widget-title">WE CAN HELP YOU?</h3>
                 
                                <div class="widget-content">
                                    <p>Phone 1: 8 (495) 989—20—11</p>
                                    <p>Phone 2: 8 (800) 875—05—26</p>
                                    <p>Open - Close: 09:00-21:00</p>
                                    <p>Mail: hosoren@gmail.com</p>
                                </div>
                            </div><!-- /.widget -->

                        </div>
                    </div>
                </div>

                <div class="col-md-2 col-sm-6">
                    
                           <div class="widget">
                                <h3 class="widget-title">Shopping</h3>

                                <ul>
                                    <li><a href="#" title="">Your Cart</a></li>
                                    <li><a href="#" title="">Your Orders</a></li>
                                    <li><a href="#" title="">Compared Items</a></li>
                                    <li><a href="#" title="">Wishlist Items</a></li>
                                    <li><a href="#" title="">Shipping Detail</a></li>
                                </ul>
                            </div><!-- /.widget -->

                </div>

                <div class="col-md-2 col-sm-6">
                    
                            <div class="widget">
                                <h3 class="widget-title">MORE LINK</h3>
  
                                <ul>
                                    <li><a href="#" title="">Blog</a></li>
                                    <li><a href="#" title="">Gift Center</a></li>
                                    <li><a href="#" title="">Buying Guides</a></li>
                                    <li><a href="#" title="">New Arrivals</a></li>
                                    <li><a href="#" title="">Clearance</a></li>
                                </ul>
                            </div><!-- /.widget -->

                </div>

                <div class="col-md-4">
                    
                            <div class="widget">
                                <h3 class="widget-title">Are You Like Me</h3>

                                <ul class="list-socials">
                                    <li><a href="#" title=""><i class="icon icon-twitter"></i></a></li>
                                    <li><a href="#" title=""><i class="icon icon-facebook"></i></a></li>
                                    <li><a href="#" title=""><i class="icon icon-google-plus"></i></a></li>
                                    <li><a href="#" title=""><i class="icon icon-pinterest"></i></a></li>
                                </ul>
                            </div>


                    
                            <div class="widget">
                                <h3 class="widget-title">PAYMENT ACCEPT</h3>

                                <ul class="list-socials">
                                    <li>
                                        <a href="#" title="">
                                            <i class="fa fa-cc-paypal"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" title="">
                                            <i class="fa fa-cc-visa"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" title="">
                                            <i class="fa fa-cc-amex"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div><!-- /.widget -->

                </div>
            </div>
        </div>

@stop

@section('scripts')
<script src="/public/statics/js/registrodiseno.js"></script>
@stop


