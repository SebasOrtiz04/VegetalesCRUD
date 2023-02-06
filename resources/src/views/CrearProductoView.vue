<template>
    <main class="main">
        <div class="botones">
            <Boton titulo="atras" @click="$router.go(-1)"/>
        </div>
        <Formulario/>
    </main>
</template>

<script>
import Boton from "../components/Boton.vue"
import Formulario from "../components/FormularioProducto.vue"
export default {
    components:{
        Boton,
        Formulario
    }
}
</script>

<style lang="scss" scoped>
@import "../scss/_variables.scss";
@import "../scss/_normalize.scss";
@import "../scss/_globales.scss";
@import "../scss/_mixins.scss";

</style>