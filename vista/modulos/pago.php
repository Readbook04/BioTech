<!--FORMULARIO DE PAGO-->
<main class="main-content">
    <div class="container-payment">

        <form action="">

            <div class="row">

                <div class="col">

                    <h3 class="title">dirección de facturación</h3>

                    <div class="inputBox">
                        <span>nombre completo :</span>
                        <input type="text" placeholder="Tim Bergling">
                    </div>
                    <div class="inputBox">
                        <span>email :</span>
                        <input type="email" placeholder="example@example.com">
                    </div>
                    <div class="inputBox">
                        <span>dirección :</span>
                        <input type="text" placeholder="apartamento - calle - localidad">
                    </div>
                    <div class="inputBox">
                        <span>ciudad :</span>
                        <input type="text" placeholder="México">
                    </div>

                    <div class="flex">
                        <div class="inputBox">
                            <span>estado :</span>
                            <input type="text" placeholder="México">
                        </div>
                        <div class="inputBox">
                            <span>codigo postal :</span>
                            <input type="text" placeholder="57000">
                        </div>
                    </div>

                </div>

                <div class="col">

                    <h3 class="title">pago</h3>

                    <div class="inputBox">
                        <span>Tarjetas disponibles :</span>
                        <img src="../../Source/card_img.png.jpeg" alt="">
                    </div>
                    <div class="inputBox">
                        <span>nombre en tarjeta :</span>
                        <input type="text" placeholder="Mr white">
                    </div>
                    <div class="inputBox">
                        <span>Numero de tarjeta :</span>
                        <input type="number" placeholder="1111-2222-3333-4444">
                    </div>
                    <div class="inputBox">
                        <span>exp mes :</span>
                        <input type="text" placeholder="septiembre">
                    </div>

                    <div class="flex">
                        <div class="inputBox">
                            <span>exp año :</span>
                            <input type="number" placeholder="2022">
                        </div>
                        <div class="inputBox">
                            <span>CVV :</span>
                            <input type="text" placeholder="123">
                        </div>
                    </div>

                </div>

            </div>
            <a href="TU_URL_DE_PAYPAL" class="paypal-button">
                <img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-large.png"
                    alt="Pagar con PayPal">
            </a>
            <div class="container-options">

                <a href="#"><span>Confirmar pago</span></a>
            </div>

            <div id="paypal-button-container"></div>
            <div id="paypal-button-container"></div>
    </div>
    </div>
</main>