<template>
    <main class="main">
        <div class="botones">
            <Boton titulo="atras" @click="$router.go(-1)"/>
        </div>
        <Historial/>
    </main>
</template>

<script>
import Boton from "../components/Boton.vue"
import Historial from "../components/HistorialMovimientos.vue"

export default {
    components:{
        Boton,
        Historial
    },
    data(){
        return{
            id:this.$route.params.id
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