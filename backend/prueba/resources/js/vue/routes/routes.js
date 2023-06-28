import aprendices from "../components/aprendices.vue";
import libros from "../components/libros.vue";
import equipos from "../components/equipos.vue";
import prestamoLibros from "../components/prestamoLibros.vue";
import prestamoEquipos from "../components/prestamoEquipos.vue";

export const routes =[
    {path: '/', component: aprendices},
    {path: '/libros', component: libros},
    {path: '/equipos', component: equipos},
    {path: '/prestamoLibros', component: prestamoLibros},
    {path: '/prestamoEquipos', component: prestamoEquipos},
]