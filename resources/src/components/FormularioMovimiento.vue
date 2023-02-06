<template>

    <main class="movimiento">
        
        <aside>
            <p>Disponible:<span>{{ disponible.actual }}</span></p>
            <p>Tras este movimiento:<span>{{ disponible.nuevo }}</span></p>
        </aside>

        <section class="contenedor-formulario">
        
            <h1>Nuevo movimiento</h1>
        
            <form action="" class="formulario">
                <fieldset>
                    <legend>Información del movimiento</legend>
                    
                    <label for="producto">Producto</label>
                    <select name="producto" id="producto">
                        <option value="" disabled selected>Elija el producto</option>
                        <option
                        v-for="(producto, index) in productos" v-bind:key="index "
                        :value="producto.id"
                        >
                        {{ producto.nombre }}
                        </option>
                    </select>

                    <label for="tipo">Tipo de movimiento</label>
                    <select name="tipo" id="tipo">
                        <option value="" disabled selected>Elija el tipo de movimiento</option>
                        <option
                        v-for="(tipo, index) in tipos" v-bind:key="index "
                        :value="tipo.id"
                        >
                        {{ tipo.nombre }}
                        </option>
                    </select>

                    <label for="cantidad">Cantidad (Unidades: {{ producto.unidad}})</label>
                    <input type="number" value="" placeholder="Ingrese la cantidad">
                </fieldset>
                <div class="contenedor-submit">
                    <input type="submit" value="Crear" class="boton">
                </div>
            </form>
        </section>
    </main>
</template>

<script>
export default {
    data(){
        return{
            disponible:{
                actual:3000,
                nuevo:2000
            },
            producto:{
                unidad:'kg'
            },
            productos:[
                {
                    id:0,
                    nombre:'Lechuga'
                },
                {
                    id:1,
                    nombre:'Jitomate'
                },
            ],
            tipos:[
                {
                    id:0,
                    nombre:'Ingreso '
                },
                {
                    id:1,
                    nombre:'Egreso'
                },
            ],
        }
    }
}
</script>

<style lang="scss" scoped>
@import "../scss/_variables.scss";
@import "../scss/_normalize.scss";
@import "../scss/_globales.scss";
@import "../scss/_mixins.scss";

main.movimiento{
    display:flex;
    justify-content: space-between;
    .contenedor-formulario{
        width:70%;
    }
    aside{
        width:25%;
        span{
            margin-left:1rem;
        }
    }
}

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