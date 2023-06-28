<template>
    <div class="cuerpo">
        <div class="theader">
            <h1>Préstamo libros</h1>
            <button @click="info = true" v-show="info == false"> crear nuevo prestamo</button>
        </div>
        <div class="search"  >
            <div class="info">
                <label for="">Documento</label>
                <input type="number" name="" v-model="documento">
            </div>
            <div class="btn" v-if="info == true">
                <button style="background-color:coral; border-color:coral" @click="getAprendiz()">Buscar1</button>
            </div>
            <div class="btn" v-else>
                <button style="background-color:coral; border-color:coral" @click=" getAprendiz(), tableFilter()">Buscar2</button>
            </div>
            <div class="person" v-show="info == true">
                <h2>{{ nombrePer }}</h2>
            </div>
            
        </div>

        <div class="book" v-show="info == true" >
            <div class="info">
                <label for="">Libro</label>
                <input type="text" name="" v-model="isbn">
            </div>
            <div class="btn">
                <button style="background-color:coral; border-color:coral" @click="getLibro()">Buscar</button>
            </div>
            <div class="infoBook">
                <h2>{{ nombreLi }}</h2>
            </div>
            <div class="add">
                <button>Agregar</button>
            </div>
            
        </div>

        <table v-if="info == true">
            <tr>
                <th>id</th>
                <th>nombre</th>
                <th>editorial</th>
                <th>isbn</th>
            </tr>
            <tr v-for=" i in prestamoLibros" :key="i">
                <td>{{ i.id }} </td>
                <td>{{ i.nombre }} </td>
                <td>{{ i.editorial }} </td>
                <td>{{ i.isbn }} </td>
            </tr>
        </table>

            <div class="save" v-show="info == true">
                <button @click="postPrestamo()">Guardar</button>
            </div>

        <table v-if="info == false">
            <tr>
                <th>id</th>
                <th>nombre</th>
                <th>Fecha Prestamo</th>
                <th>opciones</th>
            </tr>
            <tr v-for=" i in prestadosTable" :key="i">
                <td>{{ i.id }} </td>
                <td>{{ i.nombre }} </td>
                <td>{{ i.fechaPrestamo }} </td>
                <td> <button @click=" view = true ,details(i.id)">👁</button> </td>
            </tr>
        </table>

        <table v-show="view == true" style="margin-top:2em; width: 50%;">
            <tr>
                <th>Nombre</th>
                <th>editorial</th>
                <th>Fecha devolucion</th>
                <th>Opciones</th>
            </tr>
            <tr v-for="d in detalles" :key="d">
                 <td>{{ d.nombre }}</td>
                 <td>{{ d.editorial }}</td>
                 <td>{{ d.fechaDevolucion }}</td>
                 <td><button  @click="update(d.id)">Entegar</button></td>
            </tr>
        </table>

        <div class="close" v-show="view == true">
            <button @click="view = false">cerrar</button>
        </div>
    </div>
</template>

<script setup>
import { onBeforeMount, ref } from "vue"
let info = ref(false)
let persona = ref()
let nombrePer= ref()
let nombreLi = ref()
let libro = ref()
let documento = ref()
let isbn = ref()
let prestadosTable = ref([])
let prestamoLibros = ref([])
let detalles = ref([])
let idPer = ""
let view = ref(false)


async function update(id){
    const detalle =  await axios.put(`/api/detalleLibros/${id}`)
    console.log('hola');
    tabla()
}

async function getAprendiz(){
    console.log('function');
    const aprendiz = await axios.get( `/api/get-aprendiz/${documento.value}`);
    console.log(aprendiz.data);
    nombrePer.value = aprendiz.data[0].nombre
    persona.value = aprendiz.data[0]
    idPer = aprendiz.data[0].id
    console.log(idPer);
}

async function getLibro(){
    console.log('function2');
    const libros = await axios.get( `/api/get-libros/${isbn.value}`)
    nombreLi.value = libros.data[0].nombre
    libro.value = libros.data[0]
    prestamoLibros.value.push(libros.data[0])
}

async function postPrestamo(){
    const prestamo = await axios.post('/api/prestamoLibros',{
        aprendizId: persona.value.id,
        data:[{
            prestamoLibros: libro.value.id
        }
    ] 
    })
    console.log('guarde prestamo');
}

async function tabla(){
    const prestado = await axios.get('/api/detalleLibros')
    for( let i in prestado.data){
        prestadosTable.value.push(prestado.data[i])
    }  
}

async function details(id){
    detalles.value = []
    const dell = await axios.get(`/api/detalleLibros/${id}`)
    for( let i in dell.data){
        detalles.value.push(dell.data[i])
    }
}

async function tableFilter(){
    const forDoc = await axios.get(`/api/detalleLibrosDoc/${idPer}`)
    console.log(forDoc);
    prestadosTable.value = []
    for( let i in forDoc.data){
        prestadosTable.value.push(forDoc.data[i])
    }
}

onBeforeMount(()=>{
    tabla();
})

</script>

<style scoped>

.close{
    margin-top: 1em;
    width: 50%;
    display: flex;
    justify-content: end;
}
.search {
    width: 70%;
    text-align: start;
    display: grid;
    grid-template-columns: repeat(4,25%);
    justify-content: space-evenly;
    margin-bottom: 1em;
}
.save{
    margin-top: 1em;
    width: 70%;
    display: flex;
    justify-content: end;
}
.btn{
    width: 20%;
    margin-top: 9.5%;
}

.book{
    width: 70%;
    text-align: start;
    display: grid;
    grid-template-columns: repeat(4,25%);
    justify-content: space-evenly;
    margin-bottom: 1em;
}

button {
    margin-right: 10px;
    height: 2em;
    font-size: 15px;
    padding: 5px;
}

table {
    width: 70%;
}

th,
td {
    text-align: left;
    border: 1px solid black;
    padding: 5px;
    width: 20%;
}

th {
    background-color:coral;
}

tr:nth-child(odd) {
    background-color: #929292;
}

.theader {
    width: 70%;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.cuerpo {
    margin-left: 10em;
    display: flex;
    flex-direction: column;
    align-items: center
}

.registro {
    width: 70%;
    height: 100%;
    border: 1px solid coral;
    text-align: center;
}

.form {
    text-align: left;
    display: grid;
    grid-template-columns: repeat(2, 45%);
    justify-content: space-evenly;
}

label,
input {
    width: 90%;
}


input {
    padding: 5px;
}

.guardar {
    border: 1px solid coral;
    padding: 5px;
    margin-top: 15px;
    margin-bottom: 15px;
    width: 40%;
}

;</style>
  