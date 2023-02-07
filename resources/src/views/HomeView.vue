<template>

    <main class="main">
        <div class="botones">
            <Boton titulo="Nueva entrada" @click="$router.push({path:'/movimiento'})"/>
            <Boton titulo="Historial" @click="$router.push({path:'/historial'})"/>
        </div>
        
        <p 
        class="msg"
        v-if="mensaje">
        {{ $route.params.mensaje }}
        </p>

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
            mensaje:false
        }
    },
    beforeMount(){
        if(this.$route.params.mensaje) this.mensaje = true;
    }
}

</script>

<style lang="scss" scoped>
@import "../scss/_variables.scss";
@import "../scss/_normalize.scss";
@import "../scss/_globales.scss";
@import "../scss/_mixins.scss";
</style>