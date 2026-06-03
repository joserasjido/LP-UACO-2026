<h1>Nuevo producto</h1>
<form id="formAlta">
    <!-- <input type="hidden" name="accion" value="alta"> -->
    <div>
        <label>Nombre</label>
        <input type="text" name="nombre">
    </div>
    <div>
        <label>Codigo</label>
        <input type="text" name="codigo">
    </div>
    <div>
        <label>Descripcion</label>
        <input type="text" name="descripcion">
    </div>
    <div>
        <label>Categoria</label>
        <select name="categoriaId">
            <option value="2">Teclados</option>
            <option value="1">Monitores</option>
        </select>
    </div>
        <div>
        <label>Precio</label>
        <input type="text" name="precio">
    </div>
        <div>
        <label>Stock</label>
        <input type="text" name="stock">
    </div>
    <div>
        <br>
        <button type="button" id="btnRegistrar">Registrar producto</button>
    </div>
</form>
<a href="app/resources/views/item/index.php">Volver al listado de productos</a>