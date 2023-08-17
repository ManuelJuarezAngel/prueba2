<?php
error_reporting(0);
$subtotal = $_POST['producto'];
$iva = intval($subtotal) * 0.16;
$total = $subtotal + $iva;
$array = array(
    "Emisor" => 'Manuel Juarez Angel',
    "Emisor RFC" => 'XAXX010101000',
    "Receptor" => $_POST['name'],
    "Telefono" => $_POST['telefono'],
    "Email" => $_POST['email'],
    "Receptor RFC" => $_POST['rfc'],
    "Subtotal" => number_format($subtotal),
    "IVA" => number_format($iva),
    "Total" => number_format($total)
);
if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['factura'])){
    $_SESSION['factura'] = $array;
}
?>
<html>

<head>
    <title>Practica</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100"> <br>
    <!-- Nota: Use tailwind por que queria ver como funciona jeje -->
    <div class="w-full flex justify-center items-center">
        <h1 class="flex items-center text-5xl font-extrabold dark:text-white"><span class="bg-purple-100 text-purple-800 text-2xl font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-purple-200 dark:text-purple-800 ml-2">Formulario</span></h1>
    </div> <br>
    <div class="w-full flex justify-center items-center">
        <form action="" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 max-w-xs w-3/4">

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nombre Completo*</label>
                <input type="text" name="name" placeholder="Nombre Completo" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Telefono*</label>
                <input type="text" name="telefono" placeholder="Telefono" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Correo Electronico*</label>
                <input type="mail" name="email" placeholder="Correo Electronico" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">RFC*</label>
                <input type="text" name="rfc" placeholder="RFC" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Producto*</label>
                <select name="producto" required class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="" selected disabled>Seleccione un producto</option>
                    <option value="150">Producto 1 - $150 pesos</option>
                    <option value="400">Producto 2 - $400 pesos</option>
                    <option value="30">Producto 3 - $30 pesos</option>
                </select>
            </div>

            <button type="submit" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">Enviar</button>
        </form>
    </div>
    <br>
    <div class="w-full flex justify-center items-center">
        <h1 class="flex items-center text-5xl font-extrabold dark:text-white"><span class="bg-purple-100 text-purple-800 text-2xl font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-purple-200 dark:text-purple-800 ml-2">Array antes de ser procesado</span></h1>
    </div>
    <br>
    <div class="w-full flex justify-center items-center">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-1/2">
            <pre>
        <?php var_dump($array) ?>
            </pre>
        </div>
    </div>
    <br>
    <div class="w-full flex justify-center items-center">
        <h1 class="flex items-center text-5xl font-extrabold dark:text-white"><span class="bg-purple-100 text-purple-800 text-2xl font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-purple-200 dark:text-purple-800 ml-2">Array despues de ser procesado</span></h1>
    </div>
    <br>
    <div class="w-full flex justify-center items-center">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-1/2">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <?php foreach ($array as $key => $value) { ?>
                        <?php if (in_array($key, array("Emisor", "Emisor RFC"))) { ?>
                            <p class="block text-gray-700 text-sm mb-2"><span class="block text-gray-700 text-sm font-bold mb-2"><?= $key ?>:</span> <?= $value ?></p>
                        <?php } ?>
                    <?php } ?>
                </div>
                <div>
                    <?php foreach ($array as $key => $value) { ?>
                        <?php if (in_array($key, array("Receptor", "Telefono", "Email", "Receptor RFC"))) { ?>
                            <p class="block text-gray-700 text-sm mb-2"><span class="block text-gray-700 text-sm font-bold mb-2"><?= $key ?>:</span> <?= $value ?></p>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
            <div class="w-full flex flex-col justify-center items-start">
                <?php foreach ($array as $key => $value) { ?>
                    <?php if (in_array($key, array("Subtotal", "IVA", "Total"))) { ?>
                        <p class="block text-gray-700 text-sm mb-2"><span class="block text-gray-700 text-sm font-bold mb-2"><?= $key ?>:</span> $<?= $value ?></p>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>



</body>

</html>