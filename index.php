<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Generador de firmas</title>


    <style>

html,
body {
  height: 100%;
}

body {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      
    </style>

  </head>
  <body class="text-center">
   <div class="container">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  
    <form class="form-signin" action="result.php" method="post">
    <h4>Bienvenido al <br>Generador de Firmas</h4><br>
  <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre y Apellido" required="" autofocus="" autocomplete="off" style=""><br>
  <input type="text" id="cargo" name="cargo" class="form-control" placeholder="Cargo" required="" autofocus="" autocomplete="off" style=""><br>
  <input type="text" id="telf" name="telf" class="form-control" placeholder="Telefono" required="" autofocus="" autocomplete="off" style=""><br>   
  <select class="custom-select d-block w-100" id="company" name="company" required="">
              <option value="">Selecciona empresa...</option>
              <option value="1">Redragon</option>
              <option value="2">Latamly</option>
              <option value="3">Colorful</option>
              <option value="4">XP-PEN</option>
            </select><br>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Crear firma</button>
    </form>
    <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">Instrucciones: En la próxima pantalla, <br>teclee CTRL + A para seleccionar todo. <br> Luego CTRL + C para Copiar y luego <br>vaya al correo y en Configuración<br>
    en la sección firmas haga CTRL + V <br>para pegar la firma.</p>
    
    <p class="mb-1">Version 1.0 Creada por Luís Garcés <br> Con Bootstrap y PHP 7</p>

  </footer>

  </div>
  </body>
</html>