const items = [
    {id: 1, nombre: 'Coca Cola 3L', codigo: 'cod0001', descripcion: 'Coca cola 3 Litros', categoriaId: 4, precio: 3200, stock: 100},
    {id: 2, nombre: 'Pepsi 3L', codigo: 'cod0001', descripcion: 'Pepsi 3 Litros', categoriaId: 4, precio: 3200, stock: 100},
    {id: 3, nombre: 'Sprite 3L', codigo: 'cod0001', descripcion: 'Sprite 3 Litros', categoriaId: 4, precio: 3200, stock: 100}
];

export const service = {
    load: id => {
        return items.find(item => item.id === id);
    },
    save: item => {
        items.push(item);
    },
    list: () => {
        return items;
    }
};