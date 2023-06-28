import info from "../components/info.vue";
import book from "../components/createBook.vue";
import equipment from "../components/createEquipment.vue";
import student from "../components/createStudent.vue";
import loanBook from "../components/loanBooks.vue";
import loanEquipments from "../components/loanEquipments.vue";

export const routes = [
    {path:"/", component: info},
    {path:"/libros", component: book},
    {path:"/equipos", component: equipment},
    {path:"/aprendices", component: student},
    {path:"/prestarLibros", component: loanBook},
    {path:"/prestarEquipos", component: loanEquipments},
]