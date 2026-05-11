import { service } from './service.js';

export const controller = {
    load: id => {

    },
    save: () => {

    },
    list: () => {
        console.table(service.list());
    }
};