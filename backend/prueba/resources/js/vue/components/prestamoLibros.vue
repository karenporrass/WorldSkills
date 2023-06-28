<template>
        <div class="cuerpo">
            <div class="header">
                <h3>Pretamo ibros</h3>
                <button v-show="info == false"  @click="info = true">Agregar</button>
            </div>

            <div class="info">
                <div class="doc">
                    <label for=""> Digite el documento</label>
                    <input type="text" v-model="doc">
                </div>

                <div class="btn">
                    <button  v-show="info == false">Buscar</button>
                </div>

                <div class="btn">
                    <button  v-show="info == true">Buscar</button>
                </div>

                <div class="person" v-show="info == true">
                <h2>{{ nombrePer }}</h2>
                </div>
            </div>


            <table v-show="info == false">
                <tr>
                    <th>Id</th>
                    <th>Aprendiz</th>
                    <th>Fecha Prestamo</th>
                    <th>Opciones</th>
                </tr>
                <tr v-for="i in todos" :key="i">
                    <td>{{ i.id }}</td>
                    <td>{{ i.aprendiz }}</td>
                    <td>{{ i.fechaPrestamo }}</td>
                    <td><button class="eliminar" @click="delet(i.id)"> 🗑</button></td>
                </tr>
            </table>

            <div class="new" v-show="info== true">
                <h4>registro</h4>
                <div class="form">
                    <div class="colum">
                        <label for=""> Digite el nombre</label>
                    <input type="text" v-model="nombre">
                    <label for=""> Digite el editorial</label>
                    <input type="text" v-model="editorial">
                    </div>
                    <div class="colum">
                        <label for=""> Digite el Isbn</label>
                    <input type="text" v-model="isbn">
                    </div>
                </div>
                <div>
                    <button class="guardar" @click="post()">Guardar</button>
                </div>
                
            </div>
            
        </div>
</template>

<script setup>
// import axios from 'axios';
import {onBeforeMount, ref} from 'vue';

let info = ref(false)
let nombre = ref()
let editorial = ref()
let isbn = ref()
let todos = ref([])

async function getInfo(){
    const all =  await axios.get('/libros')
    console.log(all)
    for( let i in all.data){
        todos.value.push(all.data[i])
        console.log(todos.value);
    }
}
async function delet(id){
    console.log(id)
    const all =  await axios.delete(`/borrar-libro/${id}`)
    console.log(all)
    getInfo()
}

async function post(){
    const equipo = await axios.post('/guardar-libro',{
        nombre: nombre.value,
        editorial: editorial.value,
        isbn: isbn.value
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
    grid-template-columns: repeat(2, 42%);
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
    /* margin-left: 15em; */
    display: flex;
    flex-direction: column;
    align-items: center;
}

.btn{
    width: 20%;
    margin-top: 11%;
    margin-left: 2em;
}

.info{
    width: 70%;
    text-align: start;
   display: grid;
   grid-template-columns: repeat(4, 25%);
   justify-content: space-evenly;
   margin-bottom: 1em;
}
.header{
    width: 70%;
   display: flex;
   align-items: center;
   justify-content: space-between;
   align-items: center;
}

table{
    width: 70%;
    margin: 0px;
}

th, td{
    border: 1px solid black;
    width: 20%;
    padding: 5px;
}

th{
    background-color: coral;
}

.new{
    display: grid;
    grid-template-columns: c;
}


</style>