import { view } from './view.js';
import { controller } from './controller.js';


document.addEventListener('DOMContentLoaded', ()=>{

    view.init();

    //Asignacion de funcionalidad al boton de ALTA
    document.getElementById("btnRegistrar").onclick = () => {
        controller.save();
    };
});