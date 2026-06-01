
document.addEventListener('DOMContentLoaded', ()=>{
    document.getElementById("btnRegistrar").onclick = () => {
        let data = Object.fromEntries(new FormData(document.forms['formAlta']));
        data.categoriaId = parseInt(data.categoriaId);
        data.stock = parseInt(data.stock);
        data.precio = parseFloat(data.precio);
        console.info(data);

        fetch('item/save', {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
            },
            body: JSON.stringify(data)
        })
        .then(response => {
            if (response.ok) return response.json();
            throw new Error(response, response.status);
        })
        .then(data => { 
            console.log(data);
        })
        .catch(error => { console.error("Ha ocurrido un error", error); });
    };
});