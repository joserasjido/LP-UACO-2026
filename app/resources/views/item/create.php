<?php
    const DSN = "mysql:host=localhost;dbname=lp2026;charset=UTF8";
    try {
        $pdo = new PDO(DSN, "root", "", array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ));

        if(isset($_POST['accion']) && $_POST['accion'] === 'alta'){
            // $sql = "INSERT INTO productos VALUES(DEFAULT, :nombre, :codigo, :descripcion, :categoriaId, :precio, :stock)";
            $sql = "INSERT INTO productos VALUES(DEFAULT, ?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                $_POST['nombre'], 
                $_POST['codigo'], 
                $_POST['descripcion'],
                (int) $_POST['categoriaId'],
                (float) $_POST['precio'],
                (int) $_POST['stock']
            ]);
            $mensaje = '<p>Se registro con exito el producto</p>';
        }

    } catch (PDOException $ex) {
        echo "Error base de datos => " . $ex->getMessage();
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NUEVO ITEM</title>
    <base href="http://localhost/lab_prog_2026_rasjido_jose/">
    <script type="module" src="public/app/js/item/create.js"></script>
</head>
<body>
    <h1>Nuevo producto</h1>
    <form action="app/resources/views/item/create.php" method="POST">
        <input type="hidden" name="accion" value="alta">
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
            <button>Registrar producto</button>
        </div>
    </form>
    <br>
<?php
    if(isset($mensaje)){
        echo $mensaje;
    }
?>
    <br>
    <a href="app/resources/views/item/index.php">Volver al listado de productos</a>
</body>
</html>