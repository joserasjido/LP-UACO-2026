import { view } from './view.js';
import { controller } from './controller.js';

document.addEventListener('DOMContentLoaded', () => {
    // Se inicializan las librerias externas
    view.init();

    // Se agrega funcionalidad a los botones de la vista
    document.querySelector('#btnList').onclick = () => {
        controller.list();
    };

    // Se relizan peticiones asincronas para cargar datos en al vista
    
});