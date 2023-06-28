<template>
    <div class="full">
        <div class="cuerpo">
            <div class="header">
                <h3>Aprendices</h3>
                <button v-show="info == false"  @click="info = true">Agregar</button>
            </div>

            <table v-show="info == false">
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Documento</th>
                    <th>Celular</th>
                    <th>Email</th>
                    <th>Opciones</th>
                </tr>
                <tr v-for="i in todos" :key="i">
                    <td>{{ i.id }}</td>
                    <td>{{ i.nombre }}</td>
                    <td>{{ i.apellido }}</td>
                    <td>{{ i.documento }}</td>
                    <td>{{ i.telefono }}</td>
                    <td>{{ i.email }}</td>
                    <td><button class="eliminar" @click="delet(i.id)"> 🗑</button></td>
                </tr>
            </table>

            <div class="new" v-show="info== true">
                <h4>registro</h4>
                <div class="form">
                    <div class="colum">
                        <label for=""> Digite el nombre</label>
                    <input type="text" v-model="nombre">
                    <label for=""> Digite el nombre</label>
                    <input type="text" v-model="apellidos">
                    <label for=""> Digite el nombre</label>
                    <input type="text" v-model="documento">
                    </div>
                    <div class="colum">
                        <label for=""> Digite el nombre</label>
                        <input type="text" v-model="cel">
                        <label for=""> Digite el nombre</label>
                        <input type="text" v-model="email">
                    </div>
                </div>
                <div>
                    <button class="guardar" @click="post()">Guardar</button>
                </div>
                
            </div>
            
        </div>
    </div>
</template>

<script setup>
// import axios from 'axios';
import {onBeforeMount, ref} from 'vue';

let info = ref(false)
let nombre = ref()
let apellidos = ref()
let documento = ref()
let cel = ref()
let email = ref()
let todos = ref([])

async function getInfo(){
    const all =  await axios.get('/aprendices')
    console.log(all)
    for( let i in all.data){
        todos.value.push(all.data[i])
        console.log(todos.value);
    }
}
async function delet(id){
    console.log(id)
    const all =  await axios.delete(`/borrar-aprendiz/${id}`)
    console.log(all)
    getInfo()
}

async function post(){
    const aprendiz = await axios.post('/guardar-aprendiz',{
        nombre: nombre.value,
        apellido: apellidos.value,
        documento: documento.value,
        telefono: cel.value,
        email: email.value
    })
    console.log('guarde');
    console.log(aprendiz);
}

onBeforeMount(()=>{
    getInfo()
})



</script>

<style scoped>

.new{
    border: 1px solid black;
    text-align: center;
    display: flex;
    height: 100%;
}

.form{
    display: grid;
    text-align: left;
    grid-template-columns: repeat(2, 45%);
    justify-content: space-evenly;
}

.guardar{
    width: 20%;
    margin: 1em;
    padding: 5px

}

label, input{
    width: 100%;
    color:black;
    margin: 5px
}

.cuerpo{
    margin-top: 2em;
    width: 70%;
    /* margin-left: 15em; */
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.header{
    width: 100%;
   display: flex;
   align-items: center;
   justify-content: space-between;
}

.table{
    width: 70%;
    margin: 0px;
}

th, td{
    border: 1px solid black;
    width: 20%;
    padding: 1em;
}

th{
    background-color: coral;
}

.new{
    display: grid;
    grid-template-columns: c;
}





</style>