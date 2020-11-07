<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $ciudad = intval($_POST['ciudad']);
  $tipo = intval($_POST['tipo']);
  $precio = explode(';', $_POST['precio']);

  $sql = "SELECT bien.`id`, bien.`direccion`, ciudad.`nombre` AS ciudad, bien.`telefono`, bien.`codigo_postal`, tipo.`nombre` AS tipo, bien.`precio` FROM bien INNER JOIN ciudad ON bien.`ciudad_id` = ciudad.`id` INNER JOIN tipo ON bien.`tipo_id` = tipo.`id` WHERE bien.`precio` BETWEEN $precio[0] AND $precio[1] AND ciudad.`id` = $ciudad AND tipo.`id` = $tipo";

  $bienes = $mysqli->query($sql);

}else {
  $sql = "SELECT bien.`id`, bien.`direccion`, ciudad.`nombre` AS ciudad, bien.`telefono`, bien.`codigo_postal`, tipo.`nombre` AS tipo, bien.`precio` FROM bien INNER JOIN ciudad ON bien.`ciudad_id` = ciudad.`id` INNER JOIN tipo ON bien.`tipo_id` = tipo.`id`";

  $bienes = $mysqli->query($sql);
}
