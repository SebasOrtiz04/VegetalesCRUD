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
                    <th>Descripcion</th>
                    <th>Cantidad</th>
                    <th>Unidad</th>
                    <th>Última actualización</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                <tr v-for="(producto, id) in productos" 
                v-bind:key="id">
                    <td>{{ producto.id}}</td>
                    <td>{{ producto.nombre}}</td>
                    <td>{{ producto.descripcion}}</td>
                    <td>{{ producto.cantidad}}</td>
                    <td>{{ producto.unidad}}</td>
                    <td>{{ producto.fecha}}</td>
                    <td>
                        <Boton titulo="Editar" 
                        @click="$router.push({path:'/admin/editar/'+producto.id})"/>
                        <Boton titulo="Eliminar"
                        v-if="producto.cantidad===0"/>
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
                    cantidad:0,
                    unidad:'kg'
                },
                {
                    id:1,
                    nombre:'Lechuga',
                    descripcion:'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ut tortor pellentesque, sodales massa a, pharetra nisi. In nibh lorem, maximus non risus vitae, accumsan efficitur eros.',
                    fecha:'00-00-00',
                    cantidad:1111,
                    unidad:'kg'
                },
                {
                    id:2,
                    nombre:'Lechuga',
                    descripcion:'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ut tortor pellentesque, sodales massa a, pharetra nisi. In nibh lorem, maximus non risus vitae, accumsan efficitur eros.',
                    fecha:'00-00-00',
                    cantidad:1111,
                    unidad:'kg'
                },
                {
                    id:3,
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

</style>