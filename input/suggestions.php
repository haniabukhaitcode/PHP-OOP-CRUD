<?php
$existingNames = array("Hani1", "Hani2", "Hani3", "Hani4", "Hani5", "Hani6");
if (isset($_POST['suggestion'])) {
    $name = $_POST['suggestion'];

    if (!empty($name)) {
        foreach ($existingNames as $exisingName) {
            //stpos what ever inside input matches the array
            if (strpos($exisingName, $name !== false)) {
                echo $exisingName;
                echo "<br>";
            }
        }
    }
}
