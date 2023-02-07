<template>

        <section class="contenedor-formulario">
        
            <h1>{{ accion }} producto</h1>
        
            <form action="" class="formulario">
                <fieldset>
                    <legend>Información del producto</legend>
                    
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" v-model="producto.nombre" placeholder="Escriba el nombre del producto">

                    <label for="descripcion">Descripcion</label>
                    <textarea id="descripcion" v-model="producto.descripcion">
                    </textarea>

                    <label for="cantidad">Cantidad</label>
                    <input type="number" id="cantidad" min="0" disabled v-model="producto.cantidad">

                    <label for="unidad">Unidad</label>
                    <select name="unidad" id="unidad" v-model="producto.unidad_id">
                        <option value="" disabled selected>Elija la unidad del producto</option>
                        <option
                        v-for="(unidad, index) in unidades" v-bind:key="index "
                        :value="unidad.id"
                        :selected = "producto.unidad_id === unidad.id ? true :false"
                        >
                        {{ unidad.unidad }}
                        </option>
                    </select>
                </fieldset>
                <p class="error" v-for="error in errores"
                v-bind:key="error">
                {{ error }}
                </p>
                <div class="contenedor-submit">
                    <input type="submit" :value="accion" class="boton" @click="enviar($event)">
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
                nombre:'',
                descripcion:'',
                cantidad:0,
                unidad:'',
                unidad_id:''
            },
            accion:'Crear',
            unidades:[],
            errores:[],
            listo:false
        }
    },
    methods:{
        async getProducto(id){
            try {
                const respuesta = await axios.get('http://localhost:8000/api/producto/'+id);
                this.producto = respuesta.data.producto;
            } catch (error) {
                
            }
        },
        async getUnidades(){
            try {
                const respuesta = await axios.get('http://localhost:8000/api/unidades');
                this.unidades = respuesta.data;
            } catch (error) {
                
            }
        },
        validar(){
            this.errores = [];

            if(!this.producto.nombre) this.errores.push('El nombre es obligatorio');
            if(!this.producto.descripcion) this.errores.push('La descripcion es obligatoria');
            if(!this.producto.unidad_id) this.errores.push('Eliga la unidad de medida');

            if(!this.errores.length) return true;

            return false;

        },
        guardar(){
            const post ={
                nombre : this.producto.nombre,
                descripcion : this.producto.descripcion,
                unidad_id : this.producto.unidad_id
            }
            const guardar = axios.post('http://localhost:8000/api/productos',post)
            guardar.then(resultado=>{
                if(resultado.data.res) this.$router.replace({path:'/admin/Producto creado'});
            });
        },
        actualizar(){
            const post ={
                nombre : this.producto.nombre,
                descripcion : this.producto.descripcion,
                unidad_id : this.producto.unidad_id
            }
            const guardar = axios.put('http://localhost:8000/api/producto/' + this.producto.id,post)
            guardar.then(resultado=>{
                if(resultado.data.res) this.$router.replace({path:'/admin/Producto actualizado'});
            });
        },
        enviar(event){
            event.preventDefault();

            if(this.validar()){
                switch (this.accion){
                    case 'Crear':
                        this.guardar();
                    break;

                    case 'Editar':
                        this.actualizar();
                    break;

                    default:
                        this.$route.push({path:'/'});
                    break;
                }
            }
        }
    },
    beforeMount(){
        if(this.$route.params.id){
            this.accion='Editar';
            this.getProducto(this.$route.params.id)
        }

        this.getUnidades()
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

.error{
    text-align:right;
    text-transform:uppercase;
    padding: .2rem;
    margin:0;
    color:red;
}

</style>