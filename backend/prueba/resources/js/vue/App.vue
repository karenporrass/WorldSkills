<template>
    <div class="container">
      <div class="header">
        <h2>WorldSkilss</h2>
        <h4>Imagen</h4>
      </div>
      <div class="contenido">
        <div class="menu">
              <router-link to="/" style="text-decoration:none"><p>Crear Aprendiz</p></router-link>
              <router-link to="/libros" style="text-decoration:none"><p>Crear Libro</p></router-link>
              <router-link to="/equipos" style="text-decoration:none"><p>Crear Equipo</p></router-link>
              <router-link to="/prestamoLibros" style="text-decoration:none"><p>Prestamo Libro</p></router-link>
              <router-link to="/prestamoEquipos" style="text-decoration:none"><p>Prestamo Equipo</p></router-link>
          </div>
          <div class="rutas">
            <router-view></router-view>

          </div>
      </div>
      <div class="footer">
        <h4>Derechos reservados @Karen</h4>
      </div>
    </div>
  </template>
  
  <script setup>
  
  </script>
  
  <style scoped>
  *{
    margin:0;
  }

  .rutas{
    display: flex;
    justify-content: center;
  }
    .container{
      display: grid;
      grid-template-rows: 15% 70% 15%;
      height: 100vh;
    }
  
    .header{
      background-color: pink;
      display: flex;
      flex-direction: row;
      justify-content: space-between;
      align-items: center;
    }
  
    .footer{
      background-color: pink;
      display: flex;
      align-items: center;
      justify-content: center;
      position: fixed;
      width: 100%;
      bottom: 0px;
      height: 15%;
    }
  
    .contenido{
      display: flex;
      flex-direction: row;
  
    }
  
    .menu{
      background-color: white;
      width: 30%;
  }
  
  .rutas{
    width: 70%;
  }
  
  
  p{
      color: black;
      padding: 10px;
      font-size: 17px;
  }
  
  p:hover{
    background-color:gray;
    color: white;
    cursor: pointer;
  }

  @media(max-width: 800px){
    .header h2{
      font-size: 30px;
      color: beige;
    }
    .header{
      background-color: black;
    }
  }
  </style>