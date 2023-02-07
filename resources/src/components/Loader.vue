<template>
    <div class="loader">
        <div class="interno">
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
@import "../scss/_variables.scss";
@import "../scss/_normalize.scss";
@import "../scss/_globales.scss";
@import "../scss/_mixins.scss";
    .loader{
        margin:auto;
        height: 2rem;
        width:2rem;
        background-image:conic-gradient($blanco,$verdeClaro,$verde,$azul,$negro);
        border-radius:50%;
        animation:giro 1s infinite ease-in-out;
        position:relative;
        display: flex;
        justify-content: center;
        align-items: center;
        .interno{
            width:1.2rem;
            height: 1.2rem;
            background-color: $blanco;
            border-radius: 50%;
        }
    }



    @keyframes giro {
        from{
            transform: rotate(0deg);
        }

        to{
            transform: rotate(360deg);
        }
    }
</style>