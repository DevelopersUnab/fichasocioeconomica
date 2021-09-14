$optionSelecciona = "<option value=''>(Selecciona)</option>";

function getProvincias($idDepartamento) {
	$provincias = "";
	$.ajax({
    	type: "GET",
	    dataType: 'json',
	    async:false,
	    url: $urlbase+'/provincias/'+$idDepartamento,
	    success: function(datos) {
	    	$provincias = datos.provincias;
	    }
	});
	return $provincias;
}
function getDistritos($idProvincia){
	$distritos = "";
	$.ajax({
    	type: "GET",
	    dataType: 'json',
	    async:false,
	    url: $urlbase+'/distritos/'+$idProvincia,
	    success: function(datos) {
			$distritos = datos.distritos;
	    }
	});
	return $distritos;
}
function getColegios($idDistrito) {
	$colegios = "";
	$.ajax({
    	type: "GET",
	    dataType: 'json',
	    async:false,
	    url: $urlbase+'/colegios/'+$idDistrito,
	    success: function(datos) {
			$colegios = datos.colegios;
	    }
	});
	return $colegios;
}

//Devuelve lista de opciones de provincias para select
function getProvinciaOptions($idDepartamento, $idprovinciaselected = 0){
	$provincias = getProvincias($idDepartamento);
	$html = $optionSelecciona;
	for(var i in $provincias){
		$html +="<option value='"+$provincias[i].idprov+"' "+ ($provincias[i].idprov==$idprovinciaselected? "selected":"") +">"+$provincias[i].provincia+"</option>";
	}
	return $html;
}
function getDistritosOptions($idProvincia = 0, $iddistritoselected = 0) {
	if($idProvincia == 0) return $optionSelecciona;
	$distritos = getDistritos($idProvincia);
	$html = $optionSelecciona;
	for(var i in $distritos){
		$html +="<option value='"+$distritos[i].iddist+"' "+ ($distritos[i].iddist==$iddistritoselected? "selected":"") +">"+$distritos[i].distrito+"</option>";
	}
	return $html;
}

function getIeOptions($idDistrito = 0, $idIeselected = 0) {
	if($idDistrito == 0) return $optionSelecciona;
	$colegios = getColegios($idDistrito);
	$html = $optionSelecciona;
	for(var i in $colegios){
		$html +="<option value='"+$colegios[i].idie+"' "+ ($colegios[i].idie==$idIeselected? "selected":"") +">"+$colegios[i].nombreie+"</option>";
	}
	return $html;
}
