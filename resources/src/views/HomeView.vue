<template>

    <main>
        <div class="botones">
            <Boton titulo="Nueva entrada"/>
            <Boton titulo="Historial"/>
        </div>
        <Inventario/>
    </main>
    
</template>

<script>
import Boton from '../components/Boton.vue';
import Inventario from '../components/InventarioProductos.vue';

export default{
    components:{
        Boton,
        Inventario
    },
    data(){
        return{

        }
    }
}

</script>

<style lang="scss" scoped>

main{
    margin: 2rem auto;
    width: 80%;

    .botones{
        display:flex;
        justify-content: left;
    }
}
</style>