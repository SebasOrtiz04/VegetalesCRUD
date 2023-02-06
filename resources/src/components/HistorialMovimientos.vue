<template>
    <section>
        <div class="titulo">
            <h2>Historial de movimientos</h2>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Movimiento</th>
                    <th>Producto</th>
                    <th>Tipo</th>
                    <th>Fecha</th>
                    <th>Cantidad</th>
                    <th>Unidad</th>
                </tr>
            </thead>

            <tbody>
                <tr v-for="(producto, id) in productos" 
                v-bind:key="id">
                    <td>{{ producto.id}}</td>
                    <td>{{ producto.producto}}</td>
                    <td>{{ producto.tipo}}</td>
                    <td>{{ producto.fecha}}</td>
                    <td>{{ producto.cantidad}}</td>
                    <td>{{ producto.unidad}}</td>
                </tr>
            </tbody>

        </table>

    </section>
</template>

<script>

import Boton from "../components/Boton.vue"

export default {
    components:{
        Boton
    },
    data(){
        return{
            productos:[
                {
                    id:0,
                    producto:'Lechuga',
                    tipo:'Entrada',
                    fecha:'00-00-00',
                    cantidad:1111,
                    unidad:'kg'
                }
            ]
        }
    }
}
</script>

<style lang="scss" scoped>
@import "../scss/_variables.scss";
@import "../scss/_normalize.scss";
@import "../scss/_globales.scss";

.titulo{
    margin:2rem 2rem 2rem 0;
    border-bottom:2px solid $azul;

    h2{
        margin:0;
    }
}

</style>