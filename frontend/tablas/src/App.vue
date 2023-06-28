<template>
  <div>
    <!-- header es boton hamburguesa y titulo -->
    <div class="header">
      <h2>WorldSkills</h2>
    </div>

    <!-- menu con items -->

    <div class="menu">
        <p>Hola</p>
        <p>Hola</p>
        <p>Hola</p>
        <p>Hola</p>
    </div>

    <!-- el cuerpo de la pagina donde va el router view -->
    <div class="cuerpo">
      <div class="theader">
        <h1 >Libros</h1>
        <button @click="info = true" v-show="info == false"> crear libro</button>
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
            <td> <button>📝</button> <button>❌</button> <button>✅</button></td>
          </tr>
        </table>

      <form class="registro" v-else>
      <h1 >Registrar</h1>
      <label for="">Codigo del Libro</label>
      <input type="text" name="" id="id">
      <label for="">Codigo del Libro</label>
      <input type="text" name="" id="id">
      <label for="">Codigo del Libro</label>
      <input type="text" name="" id="id">
      <label for="">Codigo del Libro</label>
      <input type="text" name="" id="id">
      <button class="guardar" @click="info= false">Registrar</button>
      </form>

    </div>

    <!-- footer -->
    <footer class="footer">Derechos reservados</footer>
  </div>
</template>

<script setup>
import {ref} from "vue"
let m = ref(true)
let info = ref(true)

let libros = ref([
  { id: "1", nombre: "pedro", editorial: "velez", isbn: "lotes" },
  { id: "1", nombre: "pedro", editorial: "velez", isbn: "lotes" },
  { id: "1", nombre: "pedro", editorial: "velez", isbn: "lotes" },
  { id: "1", nombre: "pedro", editorial: "velez", isbn: "lotes" }
])

</script>

<style scoped>
  .header{
    background-color: blue;
    height:50px;
    display: flex;
    padding: 5px;
    align-items: center;
  }

  .button{
    margin-right: 10px;
    height:30px;
    font-size: 15px;
    
  }

  .footer{
    height:5%;
    background-color: blue;
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    bottom: 0;
    width: 100%;
  }

  .menu{
    width: 150px;
    height: 100%;
    background-color: gray;
    position: fixed;
  }

  p{
    position: relative;
    top: 5%;
    margin-top: 0;
    margin-left: 5px;
    margin-bottom: 10px;
    border-bottom: 1px solid white;
    width: 100%;
  }

  table{
  width: 70%;
 }

th,td{
  text-align: left;
  border: 1px solid black ;
  padding: 5px;
  width: 20%;
}

th{
  background-color: rgb(16, 150, 150);
}
tr:nth-child(odd) {
  background-color: #929292;
}

.theader{
  width: 70%;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.cuerpo{
  display: flex;
  flex-direction: column;
  align-items:center
}

.registro{
    width: 60%;
    height: 100%;
    border: 1px solid blueviolet;
    display: flex;
    flex-direction: column;
    align-items: center;
    
  }

  label, input{
    width:80%;
    margin: 4px;
  }

  label{
    color: darkblue;
  }

  input{
    padding: 5px;
  }

  .guardar{
    border: 1px solid blueviolet;
    padding: 5px;
    margin-top: 15px;
    margin-bottom: 15px;
    width: 80%;
  };
</style>