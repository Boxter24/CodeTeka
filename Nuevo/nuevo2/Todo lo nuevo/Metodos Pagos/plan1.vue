<style>

*{
    margin:0;
    padding:0;
    box-sizing: border-box;
}



.Background{
    background-image: url('./Prueba.jpg');
    width: 100%;
    height: 487px;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
}

.Titulo{
    display: flex;
    justify-content: center;
    text-align: center;

}

.TitleH{
    margin: 35px;
    color:white;
}

.Parrafo2{
    font-size: 1.2rem;
    color:white;
    font-weight: bold;
}

.CardExplanation h1{
    display: flex;
    justify-content: center;
    margin: 60px;

}

.CardExplanation{
    margin-bottom: 100px;
    display: grid;
    justify-content: center;
}

.BackgroundCard{
    gap: 15px;
    grid-template-columns: 1fr 1fr 1fr;
}


.TitleCH{
    margin-left: 20px;
}

.BackgroundFinal{
    transform: translateX(2rem) translateY(5rem);
}

.IMG {
    width: 120px;
    height: 90px;
}


.CardImage{
    margin: 20px;
}

.CardText{
    margin: 20px;
}

.TitleCH{
    font-size:2.2rem;    
    margin-bottom:  15px;
}

p{
    font-size: 1.5rem;
    width: 500px;
}

</style>

<template>
   <div class="CardExplanation">
       <!--  TITULO DE LAS CARTAS  -->
       <h1>Plan basico</h1>
       <div class="BackgroundCard">
            <div class="Card">
                    <div class="CardImage">
                        <!-- UBICACION DE LA IMAGEN -->
                        <img class="IMG" src="Phone.png" alt="">
                        <!--  -->
                    </div>
                    <div class="CardText">
                        <h2 class="TitleCH">Seguridad</h2>
                        <p>VyprVPN ofrece una seguridad de primera clase, con una cifrado de 256 bits, una autenticación de dos factores y una autenticación de dos factores.</p>
                    </div>
            </div>
            <div class="Card">
                <div class="CardImage">
                    <!-- UBICACION DE LA IMAGEN -->
                    <img class="IMG" src="Phone.png" alt="">
                    <!--  -->
                </div>
                <div class="CardText">
                    <h2 class="TitleCH">Seguridad</h2>
                    <p>VyprVPN ofrece una seguridad de primera clase, con una cifrado de 256 bits, una autenticación de dos factores y una autenticación de dos factores.</p>
                </div>
            </div>
            <div class="Card">
                <div class="CardImage">
                    <!-- UBICACION DE LA IMAGEN -->
                    <img class="IMG" src="Phone.png" alt="">
                    <!--  -->
                </div>
                <div class="CardText">
                    <h2 class="TitleCH">Seguridad</h2>
                    <p>VyprVPN ofrece una seguridad de primera clase, con una cifrado de 256 bits, una autenticación de dos factores y una autenticación de dos factores.</p>
                </div>
            </div>
            <div id="paypal-button"></div> <!-- Boton de paypal -->
        <script src="https://www.paypalobjects.com/api/checkout.js"></script>
        <script>
            paypal.Button.render({
               
                env: 'sandbox', 
                style:{
                    size:'small',
                    color:'gold',
                    shape:'pill',
                },

                payment: function(data, actions) {
                    return actions.request.post('/api/create-payment/')
                        .then(function(res)){
                            return res.id;
                        })
                },

                onAuthorize: function(data, actions) {
                    return actions.request.post('/api/create-payment/',{
                        paymentID: data.paymentID,
                        payerID: data.payerID
                    })
                        .then(function(res){
                            console.log(res);
                            alert('PAYMENT WENT THROUGH!!');
                        });
                }

            }, '#paypal-button');
        </script>
       </div>
   </div>
</template>