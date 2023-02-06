<template>

        <section class="contenedor-formulario">
        
            <h1>{{ accion }} producto</h1>
        
            <form action="" class="formulario">
                <fieldset>
                    <legend>Información del producto</legend>
                    
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Escriba el nombre del producto">

                    <label for="descripcion">Descripcion</label>
                    <textarea id="descripcion" name="descripcion" :value="producto.descripcion">
                    </textarea>

                    <label for="cantidad">Cantidad</label>
                    <input type="number" id="cantidad" name="cantidad" disabled :value="producto.cantidad">

                    <label for="unidad">Unidad</label>
                    <select name="unidad" id="unidad">
                        <option value="" disabled selected>Elija la unidad del producto</option>
                        <option
                        v-for="(unidad, index) in unidades" v-bind:key="index "
                        :value="unidad.id"
                        >
                        {{ unidad.nombre }}
                        </option>
                    </select>
                </fieldset>

                <div class="contenedor-submit">
                    <input type="submit" :value="accion" class="boton">
                </div>
            </form>
        </section>
</template>

<script>
export default {
    data(){
        return{
            producto:{
                id:'',
                descripcion:'',
                cantidad:0,
                unidad:'',

            },
            accion:'Crear',
            unidades:[
                {
                    id:0,
                    nombre:'Kg'
                },
                {
                    id:1,
                    nombre:'Tonelada'
                },
                {
                    id:2,
                    nombre:'Piezas'
                },
            ]
        }
    }
}
</script>

<style lang="scss" scoped>
@import "../scss/_variables.scss";
@import "../scss/_normalize.scss";
@import "../scss/_globales.scss";
@import "../scss/_mixins.scss";

h1{
    font-weight: normal;
}

.contenedor-submit{
    width:100%;
    display:flex;
    justify-content:right;
    .boton{
    @include boton($negro, inline-block,$blanco );
    
    }
}

</style>