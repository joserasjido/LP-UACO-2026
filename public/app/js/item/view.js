export const view = {
    forms: {},
    init: () => {
        view.forms.item = document.forms['formAlta']
    },
    resetForm: () => {},
    listItems: items => {
        console.log(items);
        alert("pasar los items a la tabla");
    }
};