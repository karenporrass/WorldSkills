<template>
    <div class="cuerpo">
      <div class="theader">
        <h1 >Libros</h1>
        <button   @click="info = true" v-show="info == false"> crear libro</button>
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
            <td>  <button @click="deleteBok(i.id)">❌</button> </td>
          </tr>
        </table>

      <div class="registro" v-else>
      <h1 >Registrar</h1>

      <div class="form">
        <div class="colum">
          <label for="">Nombre</label>
          <input type="text" name="" v-model="nombre">
          <label for="">Editorial</label>
          <input type="text" name="" v-model="editorial">
        </div>
        <div class="colum">
          <label for="">ISBN</label>
          <input type="text" name="" v-model="isbn">
        </div>
      </div>
      <button class="guardar" @click="post()">Registrar</button>
      </div>

  </div>
</template>

<script setup>
import {onBeforeMount, ref} from "vue"
let info = ref(false)
let libros = ref([])
let nombre = ref()
let editorial = ref()
let isbn= ref()

async function get(){
  try{
    const books = await axios.get('/api/get-libros')
   libros.value = books.data
   console.log(libros.value);
  }
  catch(error){
    consoleg.log(error)
  }
}

async function post(){
  try{
    const books = await axios.post('/api/save-libro',{
      nombre: nombre.value,
      editorial: editorial.value,
      isbn: isbn.value
    },
    info.value = false,
    console.log(books)
  )
  }
  catch(error){
    consoleg.log(error)
  }
  get()
}


async function deleteBok(id){
  const book= await axios.delete(`/api/delete-libro/${id}`);
  console.log('elimine el libro');
}

onBeforeMount(()=>{
  get()
})

</script>

<style scoped>

  button{
    margin-right: 10px;
    height:2em;
    font-size: 15px;
    padding: 5px;
    
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
  background-color: coral;
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
  margin-left: 10em;
  display: flex;
  flex-direction: column;
  align-items:center
}
.registro{
    width: 70%;
    height: 100%;
    border: 1px solid coral ;
    text-align: center;
  }
  .form{
    text-align: left;
    display: grid;
    grid-template-columns: repeat(2,45%);
    justify-content: space-evenly;
  }

  label, input{
    width:90%;
    margin-bottom: 1em;
  }

  input{
    padding: 5px;
  }
  .guardar{
    border: 1px solid coral;
    padding: 5px;
    margin-top: 15px;
    margin-bottom: 15px;
    width: 40%;
  };
</style>