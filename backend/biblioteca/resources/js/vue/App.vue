<template>
    <div>
        <div class="header">
            <h2>WorldSkills</h2>
              <img src="./images/logo.png" alt="">
        </div>

        <div class="menu">
            <router-link  style="text-decoration: none;" to="/equipos"> <p>Crear equipo</p></router-link> 
            <router-link  style="text-decoration: none;" to="/aprendices"> <p>Crear aprendices</p></router-link> 
            <router-link  style="text-decoration: none;" to="/libros"> <p>Crear libro</p></router-link> 
            <router-link  style="text-decoration: none;" to="prestarEquipos"> <p>Prestar equipos</p></router-link> 
            <router-link  style="text-decoration: none;" to="prestarLibros"> <p>Prestar libros</p></router-link> 
        </div>

            <router-view></router-view>
<footer class="footer"> Derechos reservados</footer>
    </div>
</template>

<style scoped>

img{
    border-radius: 25px;
    height: 3em;
    width: 3em;
    margin-right: 1em;
}

h2{
    margin-left: 1em;
}
.header{
    background-color :coral;
    height: 4em;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.menu{
    text-align: center;
    width: 160px;
    height: 100vh;
    position:absolute;
    background-color: rgba(255, 127, 80, 0.645);
    padding: 0px;
}

p{
    color: black;
    position: relative;
    top: 5%;
    margin-top: 0;
    margin-bottom: 10px;
    border-bottom: 1px solid white;
    width: 100%;
  }

p:hover{
    background-color: bisque;
}

.footer{
    background-color: coral;
    width: 100%;
    height: 3em;
    bottom: 0px;
    position: fixed;
    display: flex;
    align-items: center;
    justify-content:center;
}
</style>