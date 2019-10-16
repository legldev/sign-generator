<!doctype html>
<html lang="en">
    <!-- Generador de Firmas V3.0 Release by Luís Garcés -->
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Material Design for Bootstrap fonts and icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">

    <!-- Material Design for Bootstrap CSS -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">

    <title>Generador de Firmas</title>

  
<script type="text/javascript">
        
//<![CDATA[
// array of possible countries in the same order as they appear in the country selection list
var countryLists = new Array(4)
countryLists["0"] = ["Selecciona una marca"];
countryLists["1"] = ["4", "9", "15", "14", "10", "5", "6", "7"];
countryLists["2"] = ["1", "11", "2", "12", "3"];
countryLists["3"] = ["13"];

var countryLists2 = new Array(4)
countryLists2["0"] = ["Selecciona una marca"];
countryLists2["1"] = ["Montironi Ford Caraffa", "Montironi Ford Ventas Monseñor Pablo Cabrera", "Montironi Ford Servicio Posventa Monseñor Pablo Cabrera", "Montironi Ford Repuestos Monseñor Pablo Cabrera", "Montironi Ford Ventas Rio Cuarto", "Montironi Ford Posventa Rio Cuarto", "Montironi Ford Jesús María", "Montironi Ford Oncativo", "Montironi Ford Stand Villa Carlos Paz"];
countryLists2["2"] = ["Montironi Fiat Ventas Cordoba", "Montironi Fiat Posventa Cordoba", "Montironi Fiat Ventas Jesus Maria", "Montironi Fiat Posventa Jesús Maria", "Montironi Fiat Oncativo"];
countryLists2["3"] = ["Automont Hyundai"];

/* CountryChange() is called from the onchange event of a select element.
 * param selectObj - the select object which fired the on change event.
 */
function countryChange(selectObj) {
	// get the index of the selected option
	var idx = selectObj.selectedIndex;
	// get the value of the selected option
	var which = selectObj.options[idx].value;
	// use the selected option value to retrieve the list of items from the coutnryLists array
	cList = countryLists[which];
	cText = countryLists2[which];
	// get the country select element via its known id
	var cSelect = document.getElementById("country");
	// remove the current options from the country select
	var len=cSelect.options.length;
	while (cSelect.options.length > 0) {
		cSelect.remove(0);
	}
	var newOption;
	// create new options
	for (var i=0; i<cList.length; i++) {
		newOption = document.createElement("option");
		newOption.value = cList[i];  // assumes option string and value are the same
		newOption.text=cText[i];
		// add the new option
		try {
			cSelect.add(newOption);  // this will fail in DOM browsers but is needed for IE
		}
		catch (e) {
			cSelect.appendChild(newOption);
					}
	}
}
//]]>

    </script>
    
  </head>
  <body>
      
          <div class="container">
<div class="py-2 text-center">
    <h4>Generador de Firmas</h4></div>
<div class="row">
    <div class="col-md-2"></div>
    
    <div class="col-md-8">
    
    <form class="form-signin" action="result.php" method="post" target="_blank">
  <div class="form-group">
<label for="nombre" class="bmd-label-floating">Nombre y Apellido</label>    
<input type="text" id="nombre" name="nombre" class="form-control" placeholder="" required="" autofocus="" autocomplete="off" style="">
  </div>
  <div class="form-group">
    <label for="cargo" class="bmd-label-floating">Cargo</label>
   <input type="text" id="cargo" name="cargo" class="form-control" placeholder="" required="" autofocus="" autocomplete="off" style="">
  </div>
  <div class="form-group">
    <label for="company" class="bmd-label-floating">Seleccionar Marca</label>
    
<select class="form-control" id="company" name="company" onchange="countryChange(this);">
    <option value="0"></option>
    <option value="1">Montironi Ford</option>
    <option value="2">Montironi Fiat</option>
    <option value="3">Automont Hyundai</option>
</select>
</div>

  <div class="form-group">
    <label for="company" class="bmd-label-floating">Seleccionar Sucursal</label>
    
<select class="form-control" id="country" name="country">
 
<!--    <option value="0"></option>
    <option value="1">Montironi Fiat Ventas Cordoba</option>
    <option value="11">Montironi Fiat Posventa Cordoba</option>
    <option value="2">Montironi Fiat Ventas Jesus Maria</option>
    <option value="12">Montironi Fiat Posventa Jesús Maria</option>
    <option value="3">Montironi Fiat Oncativo</option>
    
    <option value="4">Montironi Ford Caraffa</option>
    <option value="9">Montironi Ford Ventas Monseñor Pablo Cabrera</option>    
    <option value="15">Montironi Ford Servicio Posventa Monseñor Pablo Cabrera</option>  Last One
    <option value="14">Montironi Ford Repuestos Monseñor Pablo Cabrera</option>  
    <option value="10">Montironi Ford Posventa Rio Cuarto</option>
    <option value="5">Montironi Ford Jesús María</option>
    <option value="6">Montironi Ford Oncativo</option>
    <option value="7">Montironi Ford Stand Villa Carlos Paz</option>
    
    <option value="13">Automont Hyundai</option>   -->
    </select>
  
</div>  

  <div class="form-group">
    <label for="coreo" class="bmd-label-floating">Email</label>
    <input type="text" id="coreo" name="coreo" class="form-control" placeholder="" autofocus="" autocomplete="off" style="">
    <small class="bmd-help">Ingresa tu dirección de correo electrónico</small>
  </div>

  <div class="form-group">
    <label for="telf" class="bmd-label-floating">Teléfono Móvil (Opcional)</label>
    <input type="text" id="telf" name="telf" class="form-control" placeholder="" autofocus="" autocomplete="off" style="">
    <small class="bmd-help">Ingresa tu teléfono de contacto. Este dato es opcional.</small>
  </div>
  
    <div class="form-group">
    <label for="interno" class="bmd-label-floating">Teléfono Interno (Opcional)</label>
    <input type="text" id="interno" name="interno" class="form-control" placeholder="" autofocus="" autocomplete="off" style="">
    <small class="bmd-help">Ingresa el número de extensión interno a la que podrán contactarte. Este dato es opcional.</small>
  </div>
 <!---
    <div class="form-group">
    <label for="skype" class="bmd-label-floating">Skype (Opcional)</label>
    <input type="text" id="skype" name="skype" class="form-control" placeholder="" autofocus="" autocomplete="off" style="">
    <small class="bmd-help">Ingresa usuario de Skype. Este dato es opcional.</small>
  </div>-->
  <div class="form-group">
    <div class="checkbox">
    <label>
      <input type="checkbox" name="separador" id="separador"> Incluir separador
    </label></div>
  </div>

  <button type="submit" class="btn btn-primary btn-raised">Crear firma</button>
</form>

</div>

  <div class="col-md-2"></div>
    
</div>

</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
    <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
    
  
    
  </body>
</html>