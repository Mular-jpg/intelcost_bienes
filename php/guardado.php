<?php

$guardados = $mysqli->query("SELECT bien.`id`, bien.`direccion`, ciudad.`nombre` AS ciudad, bien.`telefono`, bien.`codigo_postal`, tipo.`nombre` AS tipo, bien.`precio` FROM guardado INNER JOIN bien ON guardado.`bien_id` = bien.`id` INNER JOIN ciudad ON bien.`ciudad_id` = ciudad.`id` INNER JOIN tipo ON bien.`tipo_id` = tipo.`id`");

if (isset($_GET['item'])) {

  $id = intval($_GET['item']);

  $query = "INSERT INTO guardado(bien_id) VALUES($id)";

  if ($mysqli->query($query)) {
    header('Location: ./');
  }else {
    echo "Error: " . $query . "<br>" . $mysqli->error;
  }

}
