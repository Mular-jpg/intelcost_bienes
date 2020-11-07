<?php
require_once 'php/config.php';
include 'php/ciudad.php';
include 'php/tipo.php';
include 'php/bien.php';
include 'php/guardado.php'
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="css/customColors.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="css/index.css" media="screen,projection" />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Formulario</title>
</head>

<body>
  <video src="img/video.mp4" id="vidFondo"></video>

  <div class="contenedor">
    <div class="card rowTitulo">
      <h1>Bienes Intelcost</h1>
    </div>
    <div class="colFiltros">
      <form action="#" method="post" id="formulario">
        <div class="filtrosContenido">
          <div class="tituloFiltros">
            <h5>Filtros</h5>
          </div>
          <div class="filtroCiudad input-field">
            <p><label for="selectCiudad">Ciudad:</label><br></p>
            <select name="ciudad" id="selectCiudad">
              <option value="" selected>Elige una ciudad</option>

              <?php while($ciudad = $ciudades->fetch_assoc()): ?>
                <option value="<?php echo $ciudad['id'] ?>"><?php echo $ciudad['nombre'] ?></option>
              <?php endwhile; ?>

            </select>
          </div>
          <div class="filtroTipo input-field">
            <p><label for="selecTipo">Tipo:</label></p>
            <br>
            <select name="tipo" id="selectTipo">
              <option value="">Elige un tipo</option>

              <?php while($tipo = $tipos->fetch_assoc()): ?>
                <option value="<?php echo $tipo['id'] ?>"><?php echo $tipo['nombre'] ?></option>
              <?php endwhile; ?>

            </select>
          </div>
          <div class="filtroPrecio">
            <label for="rangoPrecio">Precio:</label>
            <input type="text" id="rangoPrecio" name="precio" value="" />
          </div>
          <div class="botonField">
            <input type="submit" class="btn white" value="Buscar" id="submitButton">
          </div>
        </div>
      </form>
    </div>

    <div id="tabs" style="width: 75%;">
      <ul>
        <li><a href="#tabs-1">Bienes disponibles</a></li>
        <li><a href="#tabs-2">Mis bienes</a></li>
      </ul>
      <div id="tabs-1">
        <div class="colContenido" id="divResultadosBusqueda">
          <div class="tituloContenido card" style="justify-content: center;">
            <h5>Resultados de la búsqueda:</h5>

            <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>

              <?php while($bien = $bienes->fetch_assoc()): ?>

                <div class="itemMostrado">

                  <img src="img/home.jpg" alt="">

                  <div class="card-stacked">
                    <ul>
                      <li><b>Dirección:</b> <?php echo $bien['direccion'] ?></li>
                      <li><b>Ciudad:</b> <?php echo $bien['ciudad'] ?></li>
                      <li><b>Teléfono:</b> <?php echo $bien['telefono'] ?></li>
                      <li><b>Código postal:</b> <?php echo $bien['codigo_postal'] ?></li>
                      <li><b>Tipo:</b> <?php echo $bien['tipo'] ?></li>
                      <li><b>Precio:</b> <?php echo '$'.$bien['precio'] ?></li>
                    </ul>
                  </div>

                  <a href="<?php echo '?item='.$bien['id'] ?>" class="button btn">Guardar</a>

                </div>

                <div class="divider"></div>

              <?php endwhile; ?>

            <?php endif; ?>


            <?php if ($_SERVER['REQUEST_METHOD'] != 'POST'): ?>

              <?php while($bien = $bienes->fetch_assoc()): ?>

                <div class="itemMostrado">

                  <img src="img/home.jpg" alt="">

                  <div class="card-stacked">
                    <ul>
                      <li><b>Dirección:</b> <?php echo $bien['direccion'] ?></li>
                      <li><b>Ciudad:</b> <?php echo $bien['ciudad'] ?></li>
                      <li><b>Teléfono:</b> <?php echo $bien['telefono'] ?></li>
                      <li><b>Código postal:</b> <?php echo $bien['codigo_postal'] ?></li>
                      <li><b>Tipo:</b> <?php echo $bien['tipo'] ?></li>
                      <li><b>Precio:</b> <?php echo '$'.$bien['precio'] ?></li>
                    </ul>
                  </div>

                  <a href="<?php echo '?item='.$bien['id'] ?>" class="button btn">Guardar</a>

                </div>

                <div class="divider"></div>

              <?php endwhile; ?>

            <?php endif; ?>


          </div>
        </div>
      </div>

      <div id="tabs-2">
        <div class="colContenido" id="divResultadosBusqueda">
          <div class="tituloContenido card" style="justify-content: center;">
            <h5>Bienes guardados:</h5>

            <?php while($guardado = $guardados->fetch_assoc()): ?>

              <div class="itemMostrado">

                <img src="img/home.jpg" alt="">

                <div class="card-stacked">
                  <ul>
                    <li><b>Dirección:</b> <?php echo $guardado['direccion'] ?></li>
                    <li><b>Ciudad:</b> <?php echo $guardado['ciudad'] ?></li>
                    <li><b>Teléfono:</b> <?php echo $guardado['telefono'] ?></li>
                    <li><b>Código postal:</b> <?php echo $guardado['codigo_postal'] ?></li>
                    <li><b>Tipo:</b> <?php echo $guardado['tipo'] ?></li>
                    <li><b>Precio:</b> <?php echo '$'.$guardado['precio'] ?></li>
                  </ul>
                </div>

              </div>

              <div class="divider"></div>

            <?php endwhile; ?>

          </div>
        </div>
      </div>
    </div>


    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <script type="text/javascript" src="js/ion.rangeSlider.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <script type="text/javascript" src="js/buscador.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("#tabs").tabs();
      });
    </script>
</body>

</html>
