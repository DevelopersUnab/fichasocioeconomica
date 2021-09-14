$urlbase = $("body").attr('urlbase');
$tipo = $("#tipobusqueda");
$txtproceso = $("#txtproceso");
var fecha = new Date();
var mes = fecha.getMonth() + 1;
var dia = fecha.getDate();
var ano = fecha.getFullYear();
if (dia < 10) dia = '0' + dia;
if (mes < 10) mes = '0' + mes
$('#txtfechainicio').val(ano + "-" + mes + "-" + dia);
$('#txtfechafin').val(ano + "-" + mes + "-" + dia);
$(document).ready(function() {
    consultar();
});

function consultar() {
    $mensaje = getMessage();
    $("#message").html($mensaje);
    var dataTable = $('#example2').DataTable( {
      "destroy": true,
      "order": [
          [0, "asc"]
      ],
      "ajax": {
          url: "listarfichasCalificadasDatos",
          type: "POST",
          data: {
              txtproceso: $txtproceso.val()
          }
      },
      "columns": [ {
          "title": "CARNET UNIVERSITARIO",
          "data": "CARNETUNIVERSITARIO",
          "width": 1
      }, {
          "title": "NRO. DOCUMENTO",
          "data": "NRODOCUMENTO",
          "width": 1
      }, {
          "title": "NOMBRES COMPLETOS",
          "data": "NOMBRECOMPLETO",
          "width": 5,
          "visible": true
      }, {
          "title": "ESCUELA",
          "data": "DESCRIPCIONESCUELA",
          "width": 5
      }, {
          "title": "SEXO",
          "data": "SEXO",
          "width": 5,
          "visible": true
      }, {
          "title": "EDAD",
          "data": "EDAD",
          "width": 5
      }, {
          "title": "CICLO",
          "data": "CICLO",
          "width": 5
      }, {
          "title": "AÑO DE INGRESO",
          "data": "ANIOINGRESO",
          "width": 5
      }, {
          "title": "CORREO ELECTRONICO",
          "data": "CORREOELECTRONICO",
          "width": 5
      }, {
          "title": "NRO. CELULAR",
          "data": "NROCELULAR",
          "width": 5
      }, {
          "title": "NRO. TELEFONO",
          "data": "NROTELEFONO",
          "width": 5
      }, {
          "title": "FECHA NACIMIENTO",
          "data": "FECHANACIMIENTO",
          "width": 5
      }, {
          "title": "UBIGEO PROCEDENCIA",
          "data": "UBIGEOPROCEDENCIA",
          "width": 5
      }, {
          "title": "LUGAR NACIMIENTO",
          "data": "LUGARNACIMIENTO",
          "width": 5
      }, {
          "title": "ESTADO CIVIL",
          "data": "ESTADOCIVIL",
          "width": 5
      }, {
          "title": "TUTOR RESPONSABLE",
          "data": "TUTORRESPONSABLE",
          "width": 5
      }, {
          "title": "IDIOMA",
          "data": "IDIOMA",
          "width": 5
      }, {
          "title": "IDIOMA ESPECIFICAR",
          "data": "IDIOMAESPECIFICAR",
          "width": 5
      }, {
          "title": "INSTITUCION EDUCATIVA",
          "data": "INSTITUCIONEDUCATIVA",
          "width": 5
      }, {
          "title": "TIPO COLEGIO",
          "data": "TIPOCOLEGIO",
          "width": 5
      }, {
          "title": "TIPO COLEGIO ESPECIFICAR",
          "data": "TIPOCOLEGIOESPECIFICAR",
          "width": 5
      }, {
          "title": "DIRECCION ACTUAL",
          "data": "DIRECCIONACTUAL",
          "width": 5
      }, {
          "title": "REFERENCIA DOMICILIO",
          "data": "REFERENCIADOMICILIO",
          "width": 5
      }, {
          "title": "TELEFONO",
          "data": "TELEFONO",
          "width": 5
      }, {
          "title": "LOCALIZACION",
          "data": "LOCALIZACION",
          "width": 5
      }, {
          "title": "ESPECIFICAR LOCALIZACION",
          "data": "ESPECIFICARLOCALIZACION",
          "width": 5
      }, {
          "title": "VIVIENDA",
          "data": "VIVIENDA",
          "width": 5
      }, {
          "title": "ESPECIFICAR VIVIENDA",
          "data": "ESPECIFICARVIVIENDA",
          "width": 5
      }, {
          "title": "PAREDES",
          "data": "PAREDES",
          "width": 5
      }, {
          "title": "TECHOS",
          "data": "TECHOS",
          "width": 5
      }, {
          "title": "PISO",
          "data": "PISO",
          "width": 5
      }, {
          "title": "LUZ",
          "data": "LUZ",
          "width": 5
      }, {
          "title": "AGUA",
          "data": "AGUA",
          "width": 5
      }, {
          "title": "DESAGUE",
          "data": "DESAGUE",
          "width": 5
      }, {
          "title": "NRO. PERSONAS DOMICILIO",
          "data": "NROPERSONASDOMICILIO",
          "width": 5
      }, {
          "title": "TOTAL AMBIENTES VIVIENDA",
          "data": "TOTALAMBIENTESVIVIENDA",
          "width": 5
      }, {
          "title": "HOGARTIENE",
          "data": "HOGARTIENE",
          "width": 5
      }, {
          "title": "HOGARTIENE1",
          "data": "HOGARTIENE1",
          "width": 5
      }, {
          "title": "HOGARTIENE2",
          "data": "HOGARTIENE2",
          "width": 5
      }, {
          "title": "HOGARTIENE3",
          "data": "HOGARTIENE3",
          "width": 5
      }, {
          "title": "HOGARTIENE4",
          "data": "HOGARTIENE4",
          "width": 5
      }, {
          "title": "HOGARTIENE5",
          "data": "HOGARTIENE5",
          "width": 5
      }, {
          "title": "HOGARTIENE6",
          "data": "HOGARTIENE6",
          "width": 5
      }, {
          "title": "HOGARTIENE7",
          "data": "HOGARTIENE7",
          "width": 5
      }, {
          "title": "HOGARTIENE8",
          "data": "HOGARTIENE8",
          "width": 5
      }, {
          "title": "HOGARTIENE9",
          "data": "HOGARTIENE9",
          "width": 5
      }, {
          "title": "HOGARTIENE10",
          "data": "HOGARTIENE10",
          "width": 5
      }, {
          "title": "HOGARTIENE11",
          "data": "HOGARTIENE11",
          "width": 5
      }, {
          "title": "HOGARTIENE12",
          "data": "HOGARTIENE12",
          "width": 5
      }, {
          "title": "SERVICIOSCOMPLEMETARIOS1",
          "data": "SERVICIOSCOMPLEMETARIOS1",
          "width": 5
      }, {
          "title": "SERVICIOSCOMPLEMETARIOS2",
          "data": "SERVICIOSCOMPLEMETARIOS2",
          "width": 5
      }, {
          "title": "SERVICIOSCOMPLEMETARIOS3",
          "data": "SERVICIOSCOMPLEMETARIOS3",
          "width": 5
      }, {
          "title": "TRABAJA",
          "data": "TRABAJA",
          "width": 5
      }, {
          "title": "CONDICION LABORAL",
          "data": "CONDICIONLABORAL",
          "width": 5
      }, {
          "title": "ESPECIFIQUE CONDICION LABORAL",
          "data": "ESPECIFIQUECONDICIONLABORAL",
          "width": 5
      }, {
          "title": "FINANCIA ESTUDIOS",
          "data": "FINANCIAESTUDIOS",
          "width": 5
      }, {
          "title": "ESPECIFIQUE FINANCIA ESTUDIOS",
          "data": "ESPECIFIQUEFINANCIAESTUDIOS",
          "width": 5
      }, {
          "title": "SEGURO",
          "data": "SEGURO",
          "width": 5
      }, {
          "title": "PADECE ENFERMEDAD",
          "data": "PADECEENFERMEDAD",
          "width": 5
      }, {
          "title": "TIPO ENFERMEDAD",
          "data": "TIPOENFERMEDAD",
          "width": 5
      }, {
          "title": "ESPECIFIQUE TIPO ENFERMEDAD",
          "data": "ESPECIFIQUETIPOENFERMEDAD",
          "width": 5
      }, {
          "title": "PADECE ENFERMEDAD CRONICA",
          "data": "PADECEENFERMEDADCRONICA",
          "width": 5
      }, {
          "title": "TIPO ENFERMEDAD CRONICA",
          "data": "TIPOENFERMEDADCRONICA",
          "width": 5
      }, {
          "title": "ESPECIFIQUE ENFERMEDAD CRONICA",
          "data": "ESPECIFIQUEENFERMEDADCRONICA",
          "width": 5
      }, {
          "title": "PADECE ENFERMEDAD INFECCIOSA",
          "data": "PADECEENFERMEDADINFECCIOSA",
          "width": 5
      }, {
          "title": "TIPO ENFERMEDAD INFECCIOSA",
          "data": "TIPOENFERMEDADINFECCIOSA",
          "width": 5
      }, {
          "title": "ESPECIFIQUE ENFERMEDAD INFECCIOSA",
          "data": "ESPECIFIQUEENFERMEDADINFECCIOSA",
          "width": 5
      }, {
          "title": "ALERGICO MEDICAMENTO",
          "data": "ALERGICOMEDICAMENTO",
          "width": 5
      }, {
          "title": "TIPO MEDICAMENTO",
          "data": "TIPOMEDICAMENTO",
          "width": 5
      }, {
          "title": "ANTECEDENTES QUIRURGICO",
          "data": "ANTECEDENTESQUIRURGICO",
          "width": 5
      }, {
          "title": "TIPO ANTECEDENTES QUIRURGICO",
          "data": "TIPOANTECEDENTESQUIRURGICO",
          "width": 5
      }, {
          "title": "ESPECIFIQUE TIPO ANTECEDENTES QUIRURGICOS",
          "data": "ESPECIFIQUETIPOANTECEDENTESQUIRURGICOS",
          "width": 5
      }, {
          "title": "TIPO ENFERMEDAD FAMILIAR",
          "data": "TIPOENFERMEDADFAMILIAR",
          "width": 5
      }, {
          "title": "ESPECIFIQUE TIPO ENFERMEDAD FAMILIAR",
          "data": "ESPECIFIQUETIPOENFERMEDADFAMILIAR",
          "width": 5
      }, {
          "title": "PADECE TIPO DISCAPACIDAD",
          "data": "PADECETIPODISCAPACIDAD",
          "width": 5
      }, {
          "title": "ESPECIFIQUE TIPO DISCAPACIDAD",
          "data": "ESPECIFIQUETIPODISCAPACIDAD",
          "width": 5
      }, {
          "title": "ACTUALIDAD GESTANDO",
          "data": "ACTUALIDADGESTANDO",
          "width": 5
      }, {
          "title": "ESPECIFIQUE ACTUALIDAD GESTANDO",
          "data": "ESPECIFIQUEACTUALIDADGESTANDO",
          "width": 5
      }, {
          "title": "ESPECIFIQUE GESTANDO",
          "data": "ESPECIFIQUEGESTANDO",
          "width": 5
      }, {
          "title": "INGIERE ALIMENTOS",
          "data": "INGIEREALIMENTOS",
          "width": 5
      }, {
          "title": "ESPECIFICAR INGIERE ALIMENTOS",
          "data": "ESPECIFICARINGIEREALIMENTOS",
          "width": 5
      }, {
          "title": "RELIGION",
          "data": "RELIGION",
          "width": 5
      }, {
          "title": "ESPECIFIQUE RELIGION",
          "data": "ESPECIFIQUERELIGION",
          "width": 5
      }, {
          "title": "PRACTICA DISCIPLINA DEPORTIVA",
          "data": "PRACTICADISCIPLINADEPORTIVA",
          "width": 5
      }, {
          "title": "PRACTICA DISCIPLINA ARTISTICA",
          "data": "PRACTICADISCIPLINAARTISTICA",
          "width": 5
      }, {
          "title": "RATOS LIBRES",
          "data": "RATOSLIBRES",
          "width": 5
      }, {
          "title": "MEDIO TRANSPORTE",
          "data": "MEDIOTRANSPORTE",
          "width": 5
      }, {
          "title": "ESPECIFIQUE MEDIO TRANSPORTE",
          "data": "ESPECIFIQUEMEDIOTRANSPORTE",
          "width": 5
      }, {
          "title": "CUENTA CON CELULAR",
          "data": "CUENTACONCELULAR",
          "width": 5
      }, {
          "title": "PAGO SERVICIO",
          "data": "PAGOSERVICIO",
          "width": 5
      }, {
          "title": "BENEFICIARIO PROGRAMA ESTADO",
          "data": "BENEFICIARIOPROGRAMAESTADO",
          "width": 5
      }, {
          "title": "ESPECIFIQUE BENEFICIARIO PROGRAMA",
          "data": "ESPECIFIQUEBENEFICIARIOPROGRAMA",
          "width": 5
      }, {
          "title": "CONDICION ESTUDIANTE",
          "data": "CONDICIONESTUDIANTE",
          "width": 5
      }, {
          "title": "PROMEDIO PONDERADO",
          "data": "PROMEDIOPONDERADO",
          "width": 5
      }, {
          "title": "CURSOSD ESAPROBADOS",
          "data": "CURSOSDESAPROBADOS",
          "width": 5
      }, {
          "title": "ESTUDIA OTRA UNIVERSIDAD",
          "data": "ESTUDIAOTRAUNIVERSIDAD",
          "width": 5
      }, {
          "title": "ESPECIFIQUE ESTUDIA OTRA UNIVERSIDAD",
          "data": "ESPECIFIQUEESTUDIAOTRAUNIVERSIDAD",
          "width": 5
      }, {
          "title": "OTROS ESTUDIOS COMPLEMENTARIOS",
          "data": "OTROSESTUDIOSCOMPLEMENTARIOS",
          "width": 5
      }, {
          "title": "ESPECIFIQUE OTROS ESTUDIOS UNIVERSITARIOS",
          "data": "ESPECIFIQUEOTROSESTUDIOSUNIVERSITARIOS",
          "width": 5
      }, {
          "title": "MOTIVO ELIGIO UNAB",
          "data": "MOTIVOELIGIOUNAB",
          "width": 5
      }, {
          "title": "MOTIVO ELIGIO PROFESION",
          "data": "MOTIVOELIGIOPROFESION",
          "width": 5
      }, {
          "title": "ABANDONO ESTUDIOS UNIVERSITARIOS",
          "data": "ABANDONOESTUDIOSUNIVERSITARIOS",
          "width": 5
      }, {
          "title": "IMPLEMENTAR UNIVERSIDAD",
          "data": "IMPLEMENTARUNIVERSIDAD",
          "width": 5
      }],
      dom: 'Bfrtip',
      buttons: [{
          extend: 'excel',
          messageTop: $mensaje,
          exportOptions: {
              columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,101,102]
          }
      }],
      "language": {
          "lengthMenu": "Mostrar _MENU_ postulaciones",
          "zeroRecords": "No se encontró ningún registro",
          "info": "_PAGE_ de _PAGES_",
          "infoEmpty": "No records available",
          "infoFiltered": "(Filtrado de un total de _MAX_ total registros)",
          "search": "Buscar:",
          "paginate": {
              "first": "Primero",
              "last": "Último",
              "next": "Siguiente",
              "previous": "Anterior"
          },
      },
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );

                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
    $(document).on('click', '#btnResfrecar', function() {
        dataTable.ajax.reload();
    });
}

function getMessage() {
    $mensaje = "";
    switch ($tipo.val()) {
        default: $mensaje = "Listado de Fichas por Alumno - Datos";
    }
    return $mensaje;
}

function pad(n, length) {
    var n = n.toString();
    while (n.length < length) n = "0" + n;
    return n;
}

function reFresh() {
    location.reload();
}

function mayus(e) {
    e.value = e.value.toUpperCase();
}

$('#footer-select').DataTable({
            initComplete: function() {
                this.api().columns().every(function() {
                    var column = this;
                    var select = $('<select class="form-control form-control-sm"><option value=""></option></select>')
                        .appendTo($(column.footer()).empty())
                        .on('change', function() {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });

                    column.data().unique().sort().each(function(d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>')
                    });
                });
            }
        });
