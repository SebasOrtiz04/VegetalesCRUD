<template>
    <main class="main">
        <div class="botones">
            <Boton titulo="atras" @click="$router.go(-1)"/>
            <Boton titulo="añadir" @click="$router.push({path:'/admin/crear'})"/>
        </div>
        <p v-if="msg" class="msg">{{ $route.params.msg }}</p>
        <Tabla/>
    </main>
</template>

<script>
import Boton from "../components/Boton.vue"
import Tabla from "../components/TablaProductos.vue"
export default {
    components:{
        Boton,
        Tabla
    },
    props:['msg'],
    data(){
        return{
            msg:false
        }
    },
    beforeMount(){
        if(this.$route.params.msg){
            this.msg=true;
        }
    }
}
</script>

<style lang="scss" scoped>
@import "../scss/_variables.scss";
@import "../scss/_normalize.scss";
@import "../scss/_globales.scss";
@import "../scss/_mixins.scss";

</style>