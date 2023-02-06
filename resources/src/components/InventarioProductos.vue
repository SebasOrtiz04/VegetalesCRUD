<template>
    <section>
        <div class="titulo">
            <h2>Inventario</h2>
            <div>
                <label for="buscar">
                    <img class="lupa" src="../assets/lupa.png" alt="buscar">
                </label>
                <input type="text" id="buscar">
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Disponible</th>
                    <th>Unidades</th>
                    <th>Más</th>
                </tr>
            </thead>

            <tbody>
                <tr v-for="(producto, id) in productos" 
                v-bind:key="id">
                    <td>{{ producto.id}}</td>
                    <td>{{ producto.nombre}}</td>
                    <td>{{ producto.cantidad}}</td>
                    <td>{{ producto.unidad}}</td>
                    <td>
                        <Boton titulo="Movimientos"/>
                    </td>
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
                    nombre:'Lechuga',
                    descripcion:'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ut tortor pellentesque, sodales massa a, pharetra nisi. In nibh lorem, maximus non risus vitae, accumsan efficitur eros.',
                    fecha:'00-00-00',
                    cantidad:1111,
                    unidad:'kg'
                },
                {
                    id:0,
                    nombre:'Lechuga',
                    descripcion:'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ut tortor pellentesque, sodales massa a, pharetra nisi. In nibh lorem, maximus non risus vitae, accumsan efficitur eros.',
                    fecha:'00-00-00',
                    cantidad:1111,
                    unidad:'kg'
                },
                {
                    id:0,
                    nombre:'Lechuga',
                    descripcion:'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ut tortor pellentesque, sodales massa a, pharetra nisi. In nibh lorem, maximus non risus vitae, accumsan efficitur eros.',
                    fecha:'00-00-00',
                    cantidad:1111,
                    unidad:'kg'
                },
                {
                    id:0,
                    nombre:'Lechuga',
                    descripcion:'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ut tortor pellentesque, sodales massa a, pharetra nisi. In nibh lorem, maximus non risus vitae, accumsan efficitur eros.',
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
    display: flex;
    justify-content: space-between;
    align-items: baseline;

    h2{
        margin:0;
    }
    .lupa{
    height: 1rem;
    width:1rem;
    margin: 0 3px;
    &:hover{
        cursor:pointer;
    }
    }
    input{
        border:1px solid $negro;
        border-radius:2px;
        background:$blanco;
        height:2rem;
        margin: .5rem;
        outline:none;
        padding: 0 .5rem;
    }
}


table{
    margin: 0 auto;
    border-collapse: collapse;
    thead{
        background-color: $azul;
        color:$blanco;
        text-transform:uppercase;
    }
    th, td{
        padding:1rem;
        text-align:center;
    }

    tbody{
        tr{
            border-bottom:1px solid $azul;
        }
    }
}
</style>