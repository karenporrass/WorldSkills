<template>
    <div class="cuerpo">
        <div class="theader">
            <h1>Préstamo equipos</h1>
            <button @click="info = true" v-show="info == false"> crear nuevo prestamo</button>
        </div>
        <div class="search"  >
            <div class="info">
                <label for="">Documento</label>
                <input type="text" name="" id="id">
            </div>
            <div class="btn">
                <button style="background-color:coral; border-color:coral">Buscar</button>
            </div>
            <div class="person" v-show="info == true">
                <h2>pepito</h2>
            </div>
            
        </div>

        <div class="book" v-show="info == true" >
            <div class="info">
                <label for="">equipo</label>
                <input type="text" name="" id="id">
            </div>
            <div class="btn">
                <button style="background-color:coral; border-color:coral" @click="info = false">Buscar</button>
            </div>
            <div class="infoBook">
                <h2>mouse</h2>
            </div>
            
        </div>

        <table v-if="info == false">
            <tr>
                <th>id</th>
                <th>nombre</th>
                <th>editorial</th>
                <th>isbn</th>
                <th>opciones</th>
            </tr>
            <tr v-for=" i in libros" :key="i">
                <td>{{ i.id }} </td>
                <td>{{ i.nombre }} </td>
                <td>{{ i.editorial }} </td>
                <td>{{ i.isbn }} </td>
                <td> <button>👁</button> </td>
            </tr>
        </table>

     

        <!-- <div class="registro" v-else>
            <h1>Registrar</h1>

            <div class="form">
                <div class="colum">
                    <label for="">Codigo del Libro</label>
                    <input type="text" name="" id="id">
                    <label for="">Codigo del Libro</label>
                    <input type="text" name="" id="id">
                </div>
                <div class="colum">
                    <label for="">Codigo del Libro</label>
                    <input type="text" name="" id="id">
                    <label for="">Codigo del Libro</label>
                    <input type="text" name="" id="id">
                </div>
            </div>
            <button class="guardar" @click="info = false">Registrar</button>
        </div> -->

    </div>
</template>

<script setup>
import { ref } from "vue"
let info = ref(false)

let libros = ref([
    { id: "1", nombre: "pedro", editorial: "velez", isbn: "lotes" },
    { id: "1", nombre: "pedro", editorial: "velez", isbn: "lotes" },
    { id: "1", nombre: "pedro", editorial: "velez", isbn: "lotes" },
    { id: "1", nombre: "pedro", editorial: "velez", isbn: "lotes" }
])

</script>

<style scoped>
.search {
    width: 70%;
    text-align: start;
    display: grid;
    grid-template-columns: repeat(4,25%);
    justify-content: space-evenly;
    margin-bottom: 1em;
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
  