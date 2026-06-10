import { view } from './view.js';
import { service } from './service.js';

export const controller = {
    load: id => {

    },
    save: () => {
        let data = Object.fromEntries(new FormData(view.forms.item));
        data.categoriaId = parseInt(data.categoriaId);
        data.stock = parseInt(data.stock);
        data.precio = parseFloat(data.precio);
        service.save(data);
    },
    list: async () => {
        let filters = {};
        let items = await service.list(filters);
        view.listItems(items);
    }
};