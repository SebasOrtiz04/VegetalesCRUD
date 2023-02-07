<template>
    <section>
        <div class="titulo">
            <h2>Historial de movimientos
            </h2>
        </div>
        <Loader v-if="loader"/>
        <table v-if="tabla">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Tipo</th>
                    <th>Fecha</th>
                    <th>Cantidad</th>
                    <th>Unidad</th>
                </tr>
            </thead>

            <tbody>
                <tr v-for="(movimiento, id) in movimientos" 
                v-bind:key="id">

                    <td>{{ movimiento.nombre}}</td>
                    <td>{{ movimiento.tipo}}</td>
                    <td>{{ 
                            movimiento.fecha.getDate() +'/' +
                            (movimiento.fecha.getMonth()+1) +'/' +
                            movimiento.fecha.getFullYear() +' '+
                            movimiento.fecha.getHours() + ':'+
                            movimiento.fecha.getMinutes()
                        }}</td>
                    <td>{{ movimiento.cantidad}}</td>
                    <td>{{ movimiento.unidad}}</td>
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
            movimientos:[]
        }
    },
    methods:{
        peticion(url){
            const respuesta = axios.get(url);
            respuesta.then(respuesta=>{
                this.movimientos=respuesta.data.lista;
                this.configurarDate();
                this.getUnidad();
            });
        },
        configurarDate(){
            this.movimientos.forEach(movimiento=>{
                    movimiento.fecha = new Date(movimiento.updated_at);
                });

        },
        getUnidad(){
            this.movimientos.forEach(movimiento=>{
                    const respuesta = axios.get('http://localhost:8000/api/unidad/'+movimiento.unidad_id);
                    respuesta.then(respuesta=>{
                        movimiento.unidad = respuesta.data.unidad.unidad;
                    });
                });
            setTimeout(()=>{
                this.loader=false;
                this.tabla=true;
            },3000);

        },
    },
    beforeMount(){
        if(this.$route.params.id){
            this.peticion('http://localhost:8000/api/movimientos-filtrado/' + this.$route.params.id);
        } else{
            this.peticion('http://localhost:8000/api/movimientos');
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