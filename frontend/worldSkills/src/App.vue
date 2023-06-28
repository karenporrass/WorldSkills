<template>
  <div>
    <div class="contenedor">
      <div id="nav"  :class="i==true ? 'active' : ''">
        <div class="btn" @click="i=!i">
          <span>&#9776</span>
        </div>
        <div class="titulo">
          <h2>world</h2>
        </div>
        <div class="menu">
          <h2>Menu</h2>
        </div>
        <ul>
          <li>Crear persona</li>
          <li>Crear libro</li>
          <li>Prestar libro</li>
          <li>Crear equipo</li>
          <li>Prestar equipo</li>
        </ul>
      </div>
    </div>

    

    <div class="footer">
      <h4>Derechos reservados</h4>
    </div>
  </div>
</template>

<script setup>
import {ref} from 'vue'

let i= ref()
</script>

<style scoped>

.contenedor{
  position: fixed;
  width: 100%;
  height: 8%;
  background-color: cadetblue;
}
#nav.active{
  left: 0px;
}

#nav{
  position: fixed;
  width: 200px;
  height: 100%;
  left: -200px;

  background-color: rgb(120, 144, 145);
  transition: all 300ms linear;
}

#nav ul li{
  list-style: none;
  padding: 10px 5px;
  border-bottom: 1px solid black;
  display: flex;
  align-items: center;
  justify-content: center;
}

ul{
  padding: 0px;
}

li:hover{
  background-color: beige;
}


.menu{
  height: 8%;
  border-bottom: 1px solid black;
  display: flex;
  align-items: center;
}
.menu h2{
  margin-left: 1em;
}

.btn{
  position: absolute;
  left: 210px;
  
}

.btn span{
  font-size: 40px;
}



.titulo{
  position: absolute;
  left: 270px;
}

.footer{
  position: fixed;
  background-color: cornflowerblue;
  bottom: 0px;
  width: 100%;
  height: 8%;
  display: flex;
  justify-content: center;

}



</style>