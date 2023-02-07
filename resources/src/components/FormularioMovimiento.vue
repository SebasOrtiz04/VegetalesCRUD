<template>

    <main class="movimiento">
        
        <aside>
            <p>Disponible:<span>{{ producto.cantidad }}</span></p>
            <p>Tras este movimiento:<span>{{operacion}}</span></p>
        </aside>

        <section class="contenedor-formulario">
        
            <h1>Nuevo movimiento</h1>
            <p class="error"
            v-for="error in errores"
            v-bind:key="error">
            {{ error }}
            </p>

            <form action="" class="formulario">
                <fieldset>
                    <legend>Información del movimiento</legend>
                    
                    <label for="producto">Producto</label>
                    <select v-model="productoId" id="producto">
                        <option value="" disabled selected>Elija el producto</option>
                        <option
                        v-for="(producto, index) in productos" v-bind:key="index "
                        :value="producto.id"
                        >
                        {{ producto.nombre }}
                        </option>
                    </select>

                    <label for="tipo">Tipo de movimiento</label>
                    <select v-model="tipoId" id="tipo">
                        <option value="" disabled selected>Elija el tipo de movimiento</option>
                        <option
                        v-for="(tipo, index) in tipos" v-bind:key="index "
                        :value="tipo.id"
                        >
                        {{ tipo.tipo }}
                        </option>
                    </select>

                    <label for="cantidad">Cantidad (Unidades: {{ producto.unidad}})</label>
                    <input type="number" v-model="cantidad" placeholder="Ingrese la cantidad">
                </fieldset>
                <div class="contenedor-submit">
                    <input type="submit" @click="enviar($event)" value="Crear" class="boton">
                </div>
            </form>
        </section>
    </main>
</template>

<script>
export default {
    data(){
        return{
            productoId:'',
            tipoId:'',
            cantidad:'',
            errores:[],
            operacion:null,
            producto:{
                unidad:'',
                cantidad:''
            },
            productos:[],
            tipos:[],
            movimiento:{
                producto_id:'',
                tipo_id:'',
                cantidad:0
            }
        }
    },
    watch: {

        productoId(newProducto, oldProducto) {
          this.peticionProducto(newProducto);
        },

        tipoId(newTipoId,oldTipoId){
            this.calcular(this.cantidad);
        },

        cantidad(newCantidad,oldCantidad){
            this.calcular(newCantidad);
        }
    },
    methods:{
        async peticion(url){
            let respuesta;
            try {
                const result = await axios.get(url);
                respuesta = result;
            } catch (error) {
                
            }

            return respuesta;
        },
        peticionProducto(id){
            const respuesta = this.peticion('http://localhost:8000/api/productos/join/' + id)
            respuesta.then((respuesta)=>{
                this.producto = respuesta.data.lista[0];
                console.log(respuesta.data.lista[0]);
            })
        },
        peticionProductos(){
            const respuesta = this.peticion('http://localhost:8000/api/productos/join')
            respuesta.then((respuesta)=>{
                this.productos = respuesta.data.lista;
            })
        },

        peticionTipos(){
            const respuesta = this.peticion('http://localhost:8000/api/tipos')
            respuesta.then((respuesta)=>{
            this.tipos = respuesta.data;
        })
        },
        calcular(cantidad){
            switch(this.tipoId){
                case 1:
                    this.operacion = this.producto.cantidad + cantidad;
                break;

                case 2:
                    this.operacion = this.producto.cantidad - cantidad;
                break;

                default:
                break;
            }
        },
        validar(){
            this.errores = [];

            if(!this.productoId) this.errores.push('El producto es obligatorio');
            if(!this.tipoId) this.errores.push('El tipo de movimiento es obligatorio');
            if(!this.cantidad) this.errores.push('La cantidad es obligatoria');
            if(this.operacion<0)this.errores.push('No hay producto suficiente para esta operacion');

            if(!this.errores.length) return true;

            return false;

        },

        guardar(){
            const data ={
                cantidad : this.cantidad,
                producto_id :this.productoId,
                tipo_id : this.tipoId
            }

            const respuesta = axios.post('http://localhost:8000/api/movimientos',data);
            respuesta.then(respuesta=>{
                if(respuesta.data.res){
                    this.$router.replace({path:'/Movimiento creado'});
                }
            });
        },

        enviar(event){
            event.preventDefault();
            
            if(this.validar()){
                this.guardar();
            } 

        }
    },
    beforeMount(){
        this.peticionProductos();
        this.peticionTipos();
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