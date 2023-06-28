<template>
    <div class="full">
        <div class="cuerpo">
            <div class="header">
                <h3>Equipos</h3>
                <button v-show="info == false" @click="info = true">Agregar</button>
            </div>

            <table v-show="info == false">
                <tr>
                    <th>ID</th>
                    <th>Codigo</th>
                    <th>Marca</th>
                    <th>Serial</th>
                    <th>Descripcion</th>
               
                    <th>Opciones</th>
                </tr>
                <tr v-for="i in todos" :key="i">
                    <td>{{ i.id }}</td>
                    <td>{{ i.codigo }}</td>
                    <td>{{ i.marca }}</td>
                    <td>{{ i.serial }}</td>
                    <td>{{ i.descripcion }}</td>
                    <td><button class="eliminar" @click="delet(i.id)"> 🗑</button></td>
                </tr>
            </table>

            <div class="new" v-show="info== true">
                <h4>registro</h4>
                <div class="form">
                    <div class="colum">
                        <label for=""> Digite el codigo</label>
                    <input type="text" v-model="codigo">
                    <label for=""> Digite el marca</label>
                    <input type="text" v-model="marca">
                    </div>
                    <div class="colum">
                        <label for=""> Digite el serial</label>
                    <input type="text" v-model="serial">
                    <label for=""> Digite el Descripcion</label>
                    <input type="text" v-model="descripcion">
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
let codigo = ref()
let marca = ref()
let serial = ref()
let descripcion = ref()
let todos = ref([])

async function getInfo(){
    const all =  await axios.get('/equipos')
    console.log(all)
    for( let i in all.data){
        todos.value.push(all.data[i])
        console.log(todos.value);
    }
}
async function delet(id){
    console.log(id)
    const all =  await axios.delete(`/borrar-equipo/${id}`)
    console.log(all)
    getInfo()
}

async function post(){
    const equipo = await axios.post('/guardar-equipo',{
        codigo: codigo.value,
        marca: marca.value,
        serial: serial.value,
        descripcion: descripcion.value
    })
    console.log('guarde');
    console.log(equipo);
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
    display: flex;
    flex-direction: column;
    align-items: center;
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