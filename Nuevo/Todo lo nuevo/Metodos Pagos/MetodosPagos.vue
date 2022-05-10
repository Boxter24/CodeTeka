<style>

    .contenedor{
        width: 90%;
        max-width: 900px;
        margin: auto;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
    }

    .tabla{
        width: 33%;
        height: 550px;
        margin: auto;
        border: 1px solid #343759;
        border-radius: 4px;
        box-shadow: 0px 0px 4px 0px #343759;
        padding: 60px;
        text-align: center;
        flex-grow: 1;
        color: #343759;
    }

    .tabla>h2{
        font-size: 30px;
        margin-bottom: 35px;
    }

    .table img{
        width: 64px;
        margin-bottom: 35px;
    }

    .tabla > h3{
        font-size: 30px;
        margin-bottom: 20px;
    }

    .tabla > p{
        display: block;
        margin-bottom: 20px;
    }

    .boton{
        display: inline-block;
        width: 150px;
        padding: 12px;
        background: #a5f059;
        text-decoration: none;
        color: #343759;
        border-radius: 100px;
        text-align: center;
        font-size: 14px;
        font-weight: 600;
        margin: auto;
    }

    .tabla:hover{
        background: #343759;
        color: #f1f1f2;
        transition: 0.5 all;
        transform: scale(1.1);
        cursor: pointer;
    }

    @media screen and(max-width: 1000px){
        .tabla{
            width: 45%;
            max-width: none;
            margin-bottom: 40px;
            flex-grow: initial;
        }
    }

    @media screen and(max-width: 700px){
        .tabla{
            width: 45%;
            padding: 30px;
        }
        .tabla > h2{
            margin-top: 40px;
        }
    }

    @media screen and(max-width: 550px){
        .tabla{
            width: 85%;
            padding: 20px;
        }
    }

</style>

<template>
    <div class="contenedor">
        <router-link to="/plan1">
        <div class="tabla">
            <h2>Basico</h2>
            <img src="png/1.png" alt="">
            <h3>100<sup>$</sup></h3>
            <p>Paga ahora y recibe un 30$ en tu hosting y dominios</p>
            <a href="" class="boton">Paga ahora</a>
        </div>
        </router-link>
        <router-link to="/plan2">
        <div class="tabla">
            <h2>Estandar</h2>
            <img src="png/2.png" alt="">
            <h3>200<sup>$</sup></h3>
            <p>Paga ahora y recibe un 30$ en tu hosting y dominios</p>
            <a href="" class="boton">Paga ahora</a>
        </div>
        </router-link>
        <router-link to="/plan3">
        <div class="tabla">
            <h2>Premium</h2>
            <img src="png/3.png" alt="">
            <h3>300<sup>$</sup></h3>
            <p>Paga ahora y recibe un 30$ en tu hosting y dominios</p>
            <a href="" class="boton">Paga ahora</a>
        </div>
        </router-link>
    </div>
</template>

<script>
export default {
    name: "MetodosPagos"
}
</script>