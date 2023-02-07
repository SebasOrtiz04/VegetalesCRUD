<template>
    <section>
        <div class="titulo">
            <h2>Inventario</h2>
        </div>

        <Loader v-if="loader"/>

        <table v-if="tabla">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Disponible</th>
                    <th>Unidad de medida</th>
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
                        <Boton titulo="Movimientos" 
                        @click="$router.push(
                            {path:'/historial/'+producto.id}
                            )"
                        />
                    </td>
                </tr>
            </tbody>

        </table>

    </section>
</template>

<script>

import Boton from "../components/Boton.vue"
import Loader from "../components/Loader.vue"

export default {
    components:{
        Boton,
        Loader
    },
    data(){
        return{
            loader:true,
            tabla:false,
            productos:[]
        }
    },
    methods:{
        peticion(){
            const respuesta = axios.get('http://localhost:8000/api/productos/join');
            respuesta.then(respuesta=>{
                this.productos = respuesta.data.lista;
                this.loader=false;
                this.tabla=true;
            })
        }
    },
    beforeMount(){
        this.peticion();
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