<?php

    $clave = 'admin123';
    echo '<pre>';
    $claveEncriptada = password_hash($clave, PASSWORD_DEFAULT);
    echo $claveEncriptada;
    echo '</pre>';
    echo '<p>Longitud: ' . strlen($claveEncriptada) . '</p>';

    $intento = 'admin123';
    var_dump(password_verify($intento, $claveEncriptada));

    const DSN = "mysql:host=localhost;dbname=lp2026;charset=UTF8";
    $result = [];
    try {
        $pdo = new PDO(DSN, "root", "", array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ));
        
        $sql = "SELECT * FROM usuarios";
        $stmt = $pdo->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $ex) {
        echo "Error base de datos => " . $ex->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITEM</title>
    <base href="http://localhost/lab_prog_2026_rasjido_jose/">
    <script type="module" src="public/app/js/item/index.js"></script>
</head>
<body>
    <h1>Productos</h1>
    <button type="button" id="btnList">Listar items</button>
    <a href="javascript:void(0)" id="btnNewItem">Nuevo item</a>

    <table>
        <thead>
            <th>Apellido</th>
            <th>Nombres</th>
            <th>Cuenta</th>
            <th>Estado</th>
            <th>Opciones</th>
        </thead>
        <tbody>
<?php
    foreach($result as $item){
        echo '<tr>';
        echo "<td>{$item['apellido']}</td>";
        echo "<td>{$item['nombres']}</td>";
        echo "<td>{$item['cuenta']}</td>";
        echo "<td>{$item['estado']}</td>";
        echo "<td><a href='#'>Editar</a> | <a href='#'>Eliminar</a></td>";
        echo '</tr>';
    }
?>
        </tbody>
    </table>

</body>
</html>