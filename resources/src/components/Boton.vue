<template>

    <div class="contenedor-boton">
        <div class="contenido">
            <a href="/">{{ titulo }}</a>
        </div>
    </div>

</template>

<script>
export default{
    props:['titulo']
}
</script>

<style lang="scss" scoped >
@import "../scss/_variables.scss";
@import "../scss/_normalize.scss";
@import "../scss/_globales.scss";
@import "../scss/_mixins.scss";

.contenedor-boton{
    position:relative;
    margin: .5rem;
    width: 90%;
    height: 3rem;
    overflow:hidden;
    border-radius: 10px;

    @include telefono{
        width:15rem;
    }

    &:hover{
        cursor:pointer;
        &::after{
            animation: giroBoton 2s ease-in-out infinite;
 
        }

    }
}

.contenedor-boton::after{
    content:'';
    top:-18.5rem;
    left:-12rem;
    position:absolute;
    background-image:conic-gradient($verde,$blanco,$azul,$blanco);
    width:40rem;
    height: 40rem;
    transition: all 2s ease;
    transform: rotate(0deg);
}

.contenido{  
    position:absolute;
    top:0px;
    left:0px;
    padding:.5rem;
    margin: 1px;
    z-index:2;
    width:99%;
    background-color: $blanco;
    display:flex;
    justify-content: center;
    align-items:center;
    border-radius: 10px;
    transition: all .4s linear;

    &:hover{
        background-color: $verdeClaro;
        & a{
            color:$negro;
        }
    }
    a{
        text-decoration:none;
        font-size:1.5rem;
        color:$azul;
        text-transform:uppercase;
        font-weight: $bold;
        text-align: center;
    }
}


</style>