$urlbase = $("body").attr('urlbase');
document.write("<script type='text/javascript' src='" + $urlbase + "/js/ubigeo.js'></script>");
$cboDepartamentoNacimiento = $('#txtdepartamento');
$cboProvinciaNacimiento = $('#txtprovincia');
$cboDistritoNacimiento = $('#txtdistrito');
$cboDepartamentoNacimiento.change(function() {
    if ($cboDepartamentoNacimiento.val() == 0) {
        $cboProvinciaNacimiento.html($optionSelecciona).prop('disabled', true);
        $cboDistritoNacimiento.html($optionSelecciona).prop('disabled', true);
    } else {
        $cboProvinciaNacimiento.html(getProvinciaOptions($cboDepartamentoNacimiento.val())).prop('disabled', false);
        $cboDistritoNacimiento.html(getDistritosOptions()).prop('disabled', true);
    }
});
$cboProvinciaNacimiento.change(function() {
    if ($cboProvinciaNacimiento.val() == 0) $cboDistritoNacimiento.html($optionSelecciona).prop('disabled', true);
    else $cboDistritoNacimiento.html(getDistritosOptions($cboProvinciaNacimiento.val())).prop('disabled', false);
});
var obtener_data_editar = function(tbody, dataTable) {
    $(tbody).on("click", "button.editar", function() {
        var forms = document.getElementById('form_familiar');
        forms.classList.remove('was-validated');
        document.getElementById('titulomodal').innerHTML = 'MODIFICAR DATOS DEL FAMILIAR';
        var el2 = document.getElementById("modaldatasituacionfamiliar2");
        var modal = document.querySelector('#' + el2.getAttribute('data-modal')),
            close = modal.querySelector('.md-close');
        classie.add(modal, 'md-show');
        $('body').addClass(el2.getAttribute('data-modal'));
        if (classie.has(el2, 'md-setperspective')) {
            setTimeout(function() {
                classie.add(document.documentElement, 'md-perspective');
            }, 25);
        }
        var data = dataTable.row($(this).parents("tr")).data();
        $('#txtcodigoitem').val(data.ITEM);
        $('#txtapellidosnombresfamiliar').val(data.APELLIDOSNOMBRES);
        $('#txtparentescofamiliar').val(data.PARESTENSCO);
        $('#txtedadfamiliar').val(data.EDAD);
        if (data.SEXO == 1) {
            document.getElementById("radioSexoFamiliar5").checked = true;
        } else {
            document.getElementById("radioSexoFamiliar6").checked = true;
        }
        $('#txtestadocivilfamiliar').val(data.ESTADOCIVIL);
        $('#txtgradoinstruccionfamiliar').val(data.GRADOINSTRUCION);
        $('#txtocupacionfamiliar').val(data.OCUPACION);
        $('#txtcondicionlaboralfamiliar').val(data.CONDICIONTRABAJO);
    });
}
var obtener_data_eliminar = function(tbody, dataTable) {
    $(tbody).on("click", "button.eliminar", function() {
        var data = dataTable.row($(this).parents("tr")).data();
        var txtcodigoitem = data.ITEM;
        swal({
            title: "Esta seguro?",
            text: "Una vez eliminado, no podrá recuperar este registro!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                urlbase = $("body").attr('urlbase');
                url = urlbase + "/procesos/ficha/paso2/eliminarFamiliar";
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        txtcodigoitemE: txtcodigoitem
                    },
                    complete: function(response) {}
                }).then(function(data) {
                    dataTable.ajax.reload();
                });
            } else {}
        });
    });
}
$(document).ready(function() {
    //PASO 1
    var txtidiomamaterna = $('#txtidiomamaterna').val();
    if (txtidiomamaterna == 9) {
        document.getElementById('txtidiomamaternaespecificar').readOnly = false;
    } else if (txtidiomamaterna == 11) {
        document.getElementById('txtidiomamaternaespecificar').readOnly = false;
    } else {
        document.getElementById('txtidiomamaternaespecificar').readOnly = true;
    }
    var txttipocolegio = $('#txttipocolegio').val();
    if (txttipocolegio == 5) {
        document.getElementById('txttipocolegioespecificar').readOnly = false;
    } else {
        document.getElementById('txttipocolegioespecificar').readOnly = true;
    }
    //PASO 2
    //PASO 3
    var txtlocalizacion = $('#txtlocalizacion').val();
    if (txtlocalizacion == 4) {
        document.getElementById('txtespecificarlocalizacion').readOnly = false;
    } else {
        document.getElementById('txtespecificarlocalizacion').readOnly = true;
    }
    var txtvivienda = $('#txtvivienda').val();
    if (txtvivienda == 7) {
        document.getElementById('txtespecificarvivienda').readOnly = false;
    } else {
        document.getElementById('txtespecificarvivienda').readOnly = true;
    }
    //PASO 4
    var txttrabaja = $('input[name=txttrabaja]:checked', '#form_paso4').val();
    if (txttrabaja == 1) {
        document.getElementById('txtcondicionlaboral').disabled = false;
        document.getElementById('txtespcifiquecondicionlaboral').disabled = false;
    } else {
        document.getElementById('txtcondicionlaboral').disabled = true;
        document.getElementById('txtespcifiquecondicionlaboral').disabled = true;
        var txtcondicionlaboral = $('#txtcondicionlaboral').val('');
        var txtespcifiquecondicionlaboral = $('#txtespcifiquecondicionlaboral').val('');
    }
    var txtcondicionlaboral = $('#txtcondicionlaboral').val();
    if (txtcondicionlaboral == 5) {
        document.getElementById('txtespcifiquecondicionlaboral').readOnly = false;
    } else {
        document.getElementById('txtespcifiquecondicionlaboral').readOnly = true;
    }
    var txtfinanciaestudios = $('#txtfinanciaestudios').val();
    if (txtfinanciaestudios == 5) {
        document.getElementById('txtespeicfiquefinanciaestudios').readOnly = false;
    } else {
        document.getElementById('txtespeicfiquefinanciaestudios').readOnly = true;
    }
    //PASO 5
    var txtpadecidoenfermedad = $('input[name=txtpadecidoenfermedad]:checked', '#form_paso5').val();
    if (txtpadecidoenfermedad == 1) {
        document.getElementById('txttipoenferemedad').disabled = false;
    } else {
        document.getElementById('txttipoenferemedad').disabled = true;
        document.getElementById('txtespecificartipoenfermedad').readOnly = true;
    }
    var txttipoenferemedad = $('#txttipoenferemedad').val();
    if (txttipoenferemedad == 12) {
        document.getElementById('txtespecificartipoenfermedad').readOnly = false;
    } else {
        document.getElementById('txtespecificartipoenfermedad').readOnly = true;
    }
    var txtpadecidoenfermedadcronica = $('input[name=txtpadecidoenfermedadcronica]:checked', '#form_paso5').val();
    if (txtpadecidoenfermedadcronica == 1) {
        document.getElementById('txttipoenferemedadcronica').disabled = false;
    } else {
        document.getElementById('txttipoenferemedadcronica').disabled = true;
        document.getElementById('txtespecificartipoenfermedadcronica').readOnly = true;
    }
    var txttipoenferemedadcronica = $('#txttipoenferemedadcronica').val();
    if (txttipoenferemedadcronica == 10) {
        document.getElementById('txtespecificartipoenfermedadcronica').readOnly = false;
    } else {
        document.getElementById('txtespecificartipoenfermedadcronica').readOnly = true;
    }
    var txtpadecidoenfermedadinfecciosa = $('input[name=txtpadecidoenfermedadinfecciosa]:checked', '#form_paso5').val();
    if (txtpadecidoenfermedadinfecciosa == 1) {
        document.getElementById('txttipoenferemedadinfecciosa').disabled = false;
    } else {
        document.getElementById('txttipoenferemedadinfecciosa').disabled = true;
        document.getElementById('txtespecificartipoenfermedadinfecciosa').readOnly = true;
    }
    var txttipoenferemedadinfecciosa = $('#txttipoenferemedadinfecciosa').val();
    if (txttipoenferemedadinfecciosa == 6) {
        document.getElementById('txtespecificartipoenfermedadinfecciosa').readOnly = false;
    } else {
        document.getElementById('txtespecificartipoenfermedadinfecciosa').readOnly = true;
        var txtlocalizacion = $('#txtespecificartipoenfermedadinfecciosa').val('');
    }
    var txtalergicomedicamento = $('input[name=txtalergicomedicamento]:checked', '#form_paso5').val();
    if (txtalergicomedicamento == 1) {
        document.getElementById('txttipomedicamento').disabled = false;
    } else {
        document.getElementById('txttipomedicamento').disabled = true;
        document.getElementById('txtespecificartipomedicamento').readOnly = true;
    }
    var txttipomedicamento = $('#txttipomedicamento').val();
    if (txttipomedicamento == 10) {
        document.getElementById('txtespecificartipomedicamento').readOnly = false;
    } else {
        document.getElementById('txtespecificartipomedicamento').readOnly = true;
    }
    var txtantecedentesquirurgicos = $('input[name=txtantecedentesquirurgicos]:checked', '#form_paso5').val();
    if (txtantecedentesquirurgicos == 1) {
        document.getElementById('txttipoantecedentesquirurgicos').disabled = false;
    } else {
        document.getElementById('txttipoantecedentesquirurgicos').disabled = true;
        document.getElementById('txtespecifiquetipoantecedentesquirurgicos').readOnly = true;
    }
    var txttipoantecedentesquirurgicos = $('#txttipoantecedentesquirurgicos').val();
    if (txttipoantecedentesquirurgicos == 6) {
        document.getElementById('txtespecifiquetipoantecedentesquirurgicos').readOnly = false;
    } else {
        document.getElementById('txtespecifiquetipoantecedentesquirurgicos').readOnly = true;
    }
    var txtenfermerdadfamiliar = $('input[name=txtenfermerdadfamiliar]:checked', '#form_paso5').val();
    if (txtenfermerdadfamiliar == 1) {
        document.getElementById('txttipoenferemedadfamiliar').disabled = false;
    } else {
        document.getElementById('txttipoenferemedadfamiliar').disabled = true;
        document.getElementById('txttespecifiquetipoenfernedadfamiliar').readOnly = true;
    }
    var txttipoenferemedadfamiliar = $('#txttipoenferemedadfamiliar').val();
    if (txttipoenferemedadfamiliar == 12) {
        document.getElementById('txttespecifiquetipoenfernedadfamiliar').readOnly = false;
    } else {
        document.getElementById('txttespecifiquetipoenfernedadfamiliar').readOnly = true;
    }
    var txtpadecetipodiscapacidad = $('input[name=txtpadecetipodiscapacidad]:checked', '#form_paso5').val();
    if (txtpadecetipodiscapacidad == 1) {
        document.getElementById('txtespecifiquetipodiscapacidad').readOnly = false;
    } else {
        document.getElementById('txtespecifiquetipodiscapacidad').readOnly = true;
    }
    var txtactualidadgestando = $('input[name=txtactualidadgestando]:checked', '#form_paso5').val();
    if (txtactualidadgestando == 1) {
        document.getElementById('txtespecifiquefechamestruacion').disabled = false;
        document.getElementById('txtespecifiquefechaprobableparto').disabled = false;
    } else {
        document.getElementById('txtespecifiquefechamestruacion').disabled = true;
        document.getElementById('txtespecifiquefechaprobableparto').disabled = true;
    }
    var radioSexo = $('input[name=radioSexo]:checked', '#form_paso1').val();
    if (radioSexo == 1) {
        document.getElementById('txtactualidadgestando1').disabled = true;
        document.getElementById('txtactualidadgestando2').disabled = true;
        document.getElementById('txtespecifiquefechamestruacion').disabled = true;
        document.getElementById('txtespecifiquefechaprobableparto').disabled = true;
    } else {
        document.getElementById('txtactualidadgestando1').disabled = false;
        document.getElementById('txtactualidadgestando2').disabled = false;
    }
    var txtcheckedvivienda = $('input:checkbox[name="checkboxPS12"]:checked').val();
    var txtcheckedviviendaN = $('input:checkbox[name="checkboxPS13"]:checked').val();
    //if (txtcheckedvivienda == 9) {
    if (txtcheckedvivienda == 12) {
        $('input:checkbox[name="checkboxPS1"]').prop('checked', false);
        $('input:checkbox[name="checkboxPS2"]').prop('checked', false);
        $('input:checkbox[name="checkboxPS3"]').prop('checked', false);
        $('input:checkbox[name="checkboxPS4"]').prop('checked', false);
        $('input:checkbox[name="checkboxPS5"]').prop('checked', false);
        $('input:checkbox[name="checkboxPS6"]').prop('checked', false);
        $('input:checkbox[name="checkboxPS7"]').prop('checked', false);
        $('input:checkbox[name="checkboxPS8"]').prop('checked', false);
        $('input:checkbox[name="checkboxPS9"]').prop('checked', false);
        $('input:checkbox[name="checkboxPS10"]').prop('checked', false);
        $('input:checkbox[name="checkboxPS11"]').prop('checked', false);
        $('input:checkbox[name="checkboxPS13"]').prop('checked', false);
        document.getElementById('txtespecifiqueproblemassociales').readOnly = false;
    } else {
        document.getElementById('txtespecifiqueproblemassociales').readOnly = true;
    }
    if (txtcheckedviviendaN == 13) {
      $('input:checkbox[name="checkboxPS1"]').prop('checked', false);
      $('input:checkbox[name="checkboxPS2"]').prop('checked', false);
      $('input:checkbox[name="checkboxPS3"]').prop('checked', false);
      $('input:checkbox[name="checkboxPS4"]').prop('checked', false);
      $('input:checkbox[name="checkboxPS5"]').prop('checked', false);
      $('input:checkbox[name="checkboxPS6"]').prop('checked', false);
      $('input:checkbox[name="checkboxPS7"]').prop('checked', false);
      $('input:checkbox[name="checkboxPS8"]').prop('checked', false);
      $('input:checkbox[name="checkboxPS9"]').prop('checked', false);
      $('input:checkbox[name="checkboxPS10"]').prop('checked', false);
      $('input:checkbox[name="checkboxPS11"]').prop('checked', false);
      $('input:checkbox[name="checkboxPS12"]').prop('checked', false);
      document.getElementById('txtespecifiqueproblemassociales').readOnly = true;
    } else {
        document.getElementById('txtespecifiqueproblemassociales').readOnly = true;
        var txtespecifiqueproblemassociales = $('#txtespecifiqueproblemassociales').val('');
    }

    //PASO 6
    var txtingenierealimentosespecificar = $('input[name=radioIA]:checked', '#form_paso6').val();
    if (txtingenierealimentosespecificar == 4) {
        document.getElementById('txtingenierealimentosespecificar').readOnly = false;
    } else {
        document.getElementById('txtingenierealimentosespecificar').readOnly = true;
        var txtingenierealimentosespecificar = $('#txtingenierealimentosespecificar').val('');
    }
    //PASO 7
    var txtreligion2 = $('#txtreligion').val();
    if (txtreligion2 == 4) {
        document.getElementById('txtespecificarreligion').readOnly = false;
    } else {
        document.getElementById('txtespecificarreligion').readOnly = true;
    }
    //PASO 8
    var txtreligion = $('#txtmediotransporte').val();
    if (txtreligion == 6) {
        document.getElementById('txtmediotransportespecifique').readOnly = false;
    } else {
        document.getElementById('txtmediotransportespecifique').readOnly = true;
    }
    var txtcuentacelular = $('input[name=txtcuentacelular]:checked', '#form_paso8').val();
    if (txtcuentacelular == 1) {
        document.getElementById('txtpagoservicio').readOnly = false;
    } else {
        document.getElementById('txtpagoservicio').readOnly = true;
    }
    var txtbeneficiario = $('#txtbeneficiario').val();
    if (txtbeneficiario == 6) {
        document.getElementById('txtespecifiquebeneficiario').readOnly = false;
    } else {
        document.getElementById('txtespecifiquebeneficiario').readOnly = true;
    }
    //PASO 9
    var txtestudiaotrauniversidad = $('input[name=txtestudiaotrauniversidad]:checked', '#form_paso9').val();
    if (txtestudiaotrauniversidad == 1) {
        document.getElementById('txtespecifiqueotrauniversidad').readOnly = false;
    } else {
        document.getElementById('txtespecifiqueotrauniversidad').readOnly = true;
        var txtestudiaotrauniversidad = $('#txtespecifiqueotrauniversidad').val('');
    }
    var txtotrosestudios = $('input[name=txtotrosestudios]:checked', '#form_paso9').val();
    if (txtotrosestudios == 1) {
        document.getElementById('txtespecifiqueotrosestudios').readOnly = false;
    } else {
        document.getElementById('txtespecifiqueotrosestudios').readOnly = true;
        var txtbeneficiariox = $('#txtespecifiqueotrosestudios').val('');
    }
    //
    var btnFinish = $('<button id="btnfinalizar" disabled></button>').text('Finalizar').addClass('btn btn-info').on('click', function() {
        //var btnFinish = $('<button></button>').text('Finalizar').addClass('btn btn-info').on('click', function() {
    });
    var btnCancel = $('<button><a  href="{{ url("/procesos/ficha") }}" ></a></button>').text('Cancel').addClass('btn btn-danger').on('click', function() {
        $('#smartwizard').smartWizard("reset");
    });
    var txttelefono = $('#txtestadoficha').val();
    var pasoE = parseInt(txttelefono);
    $('#smartwizard').smartWizard({
        selected: pasoE, // Initial selected step, 0 = first step
        keyNavigation: false, // Enable/Disable keyboard navigation(left and right keys are used if enabled)
        autoAdjustHeight: true, // Automatically adjust content height
        cycleSteps: false, // Allows to cycle the navigation of steps
        backButtonSupport: true, // Enable the back button support
        useURLhash: false, // Enable selection of the step based on url hash
        lang: { // Language variables
            next: 'Siguiente',
            previous: 'Anterior'
        },
        toolbarSettings: {
            toolbarPosition: 'bottom', // none, top, bottom, both
            toolbarButtonPosition: 'right', // left, right
            showNextButton: true, // show/hide a Next button
            showPreviousButton: true,
            // show/hide a Previous button
            toolbarExtraButtons: [
                $('<button id="btnfinalizar"></button>').text('Finalizar').addClass('btnfinalizar btn btn-info').on('click', function() {
                    $("#form_paso9").submit();
                    var a = 0;
                    var b = 0;
                    var c = 0;
                    var d = 0;
                    var e = 0;
                    var f = 0;
                    var g = 0;
                    var h = 0;
                    var i = 0;
                    var txtcondicionestudiante = $('#txtcondicionestudiante').val();
                    var txtpromedioponderado = $('#txtpromedioponderado').val();
                    var txtcursosdesaprobados = $('#txtcursosdesaprobados').val();
                    var txtestudiaotrauniversidad = $('input[name=txtestudiaotrauniversidad]:checked', '#form_paso9').val();
                    var txtespecifiqueotrauniversidad = $('#txtespecifiqueotrauniversidad').val();
                    var txtotrosestudios = $('input[name=txtotrosestudios]:checked', '#form_paso9').val();
                    var txtespecifiqueotrosestudios = $('#txtespecifiqueotrosestudios').val();
                    var txtmotivoeligiounab = $('#txtmotivoeligiounab').val();
                    var txtmotivoeligioprofesion = $('#txtmotivoeligioprofesion').val();
                    var txtabandono = $('#txtabandono').val();
                    var txtimplementaruniversidad = $('#txtimplementaruniversidad').val();
                    if (txtcondicionestudiante == '') {
                        a = 1;
                    }
                    if (txtpromedioponderado == '') {
                        b = 1;
                    }
                    if (txtcursosdesaprobados == '') {
                        c = 1;
                    }
                    if (typeof txtestudiaotrauniversidad === 'undefined') {
                        d = 1;
                    } else if (txtestudiaotrauniversidad == 1) {
                        if (txtespecifiqueotrauniversidad == '') {
                            d = 1;
                        }
                    }
                    if (typeof txtotrosestudios === 'undefined') {
                        e = 1;
                    } else if (txtotrosestudios == 1) {
                        if (txtespecifiqueotrosestudios == '') {
                            e = 1;
                        }
                    }
                    if (txtmotivoeligiounab == '') {
                        f = 1;
                    }
                    if (txtmotivoeligioprofesion == '') {
                        g = 1;
                    }
                    if (txtabandono == '') {
                        h = 1;
                    }
                    if (txtimplementaruniversidad == '') {
                        i = 1;
                    }
                    var total = a + b + c + d + e + f + g + h + i;
                    if (total == 0) {} else {
                        var forms = document.getElementById('form_paso9');
                        forms.classList.add('was-validated');
                        swal("Error", "Falta algunos campos completar", "warning");
                        return false;
                    }
                }),
                $('<a type="button" href="/"></a>').text('Cancelar').addClass('btn btn-danger').on('click', function() {})
            ]
        },
        anchorSettings: {
            anchorClickable: true, // Enable/Disable anchor navigation
            enableAllAnchors: false, // Activates all anchors clickable all times
            markDoneStep: true, // add done css
            enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
        },
        contentURL: null, // content url, Enables Ajax content loading. can set as data data-content-url on anchor
        disabledSteps: [], // Array Steps disabled
        errorSteps: [], // Highlight step with errors
        theme: 'dots',
        transitionEffect: 'fade', // Effect on navigation, none/slide/fade
        transitionSpeed: '400'
    });
    $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
        if ($('button.sw-btn-next').hasClass('disabled')) {
            $('.sw-btn-group-extra').show();
        } else {
            $('.sw-btn-group-extra').hide();
        }
    });
    $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
        var total = 0;
        total = stepNumber + 1;
        $("#message-box").append("<br /> > <strong>leaveStepSSSSS</strong> called on " + total + ". Direction: " + stepDirection);
        var res = confirm("Confirma que tus datos ingresados son correcto del paso " + total + "?");
        if (!res) {
            swal("Cancelo", "Vuelva a corregir.", "warning");
        } else {
            if (total == 1) {
                $("#form_paso1").submit();
                var a = 0;
                var b = 0;
                var c = 0;
                var d = 0;
                var e = 0;
                var f = 0;
                var g = 0;
                var h = 0;
                var i = 0;
                var j = 0;
                var k = 0;
                var l = 0;
                var m = 0;
                var n = 0;
                var o = 0;
                var p = 0;
                var q = 0;
                var r = 0;
                var s = 0;
                var txtciclo = $('#txtciclo').val();
                if (txtciclo == '') {
                    a = 1;
                }
                var txtanioingreso = $('#txtanioingreso').val();
                if (txtanioingreso == '') {
                    b = 1;
                }
                var txtcorreoelectronico = $('#txtcorreoelectronico').val();
                if (txtcorreoelectronico == '') {
                    c = 1;
                } else if (validarEmail(txtcorreoelectronico) == 2) {
                    c = 1;
                }
                var txtcelular = $('#txtcelular').val();
                if (txtcelular == '') {
                    d = 1;
                } else if (txtcelular.length != 9) {
                    d = 1;
                }
                var txttelefono = $('#txttelefono').val();
                if (txttelefono == '') {
                    e = 1;
                } else if (txttelefono.length != 9) {
                    e = 1;
                }
                var txtfechanacimiento = $('#txtfechanacimiento').val();
                if (txtfechanacimiento == '') {
                    f = 1;
                }
                var txtlugarnacimiento = $('#txtlugarnacimiento').val();
                if (txtlugarnacimiento == '') {
                    g = 1;
                }
                var txttelefonoemergencia = $('#txttelefonoemergencia').val();
                if (txttelefonoemergencia == '') {
                    h = 1;
                }
                var txttutorresponsable = $('#txttutorresponsable').val();
                if (txttutorresponsable == '') {
                    i = 1;
                }
                var radioSexo = $('input[name=radioSexo]:checked', '#form_paso1').val();
                if (typeof radioSexo === 'undefined') {
                    p = 1;
                }
                var txtestadocivil = $('#txtestadocivil').val();
                if (txtestadocivil == '') {
                    j = 1;
                }
                var txtidiomamaterna = $('#txtidiomamaterna').val();
                if (txtidiomamaterna == '') {
                    k = 1;
                }
                var txtidiomamaternaespecificar = $('#txtidiomamaternaespecificar').val();
                if (txtidiomamaterna == 9) {
                    if (txtidiomamaternaespecificar == '') {
                        l = 1;
                    }
                } else if (txtidiomamaterna == 11) {
                    if (txtidiomamaternaespecificar == '') {
                        l = 1;
                    }
                }
                var txtinstitucioneducativa = $('#txtinstitucioneducativa').val();
                if (txtinstitucioneducativa == '') {
                    m = 1;
                }
                var txttipocolegio = $('#txttipocolegio').val();
                if (txttipocolegio == '') {
                    n = 1;
                } else if (txttipocolegio == 5) {
                    if (txttipocolegioespecificar == '') {
                        o = 1;
                    }
                }
                var txtdepartamento = $('#txtdepartamento').val();
                var txtprovincia = $('#txtprovincia').val();
                var txtdistrito = $('#txtdistrito').val();
                if (txtdepartamento == '') {
                    q = 1;
                } else if (txtprovincia == '') {
                    q = 1;
                } else if (txtdistrito == '') {
                    q = 1;
                }
                var total = a + b + c + d + e + f + g + h + i + j + k + l + m + n + o + p + q;
                if (total == 0) {} else {
                    var forms = document.getElementById('form_paso1');
                    forms.classList.add('was-validated');
                    swal("Error", "Falta algunos campos completar", "warning");
                    return false;
                }
            } else if (total == 2) {
                $("#form_paso2").submit();
                var a = 0;
                var table = $('#example3').DataTable();
                var totalregistro = table.rows().count();
                if (totalregistro <= 0) {
                    new PNotify({
                        title: 'Error CUADRO FAMILIAR: ',
                        text: 'Debera ingresar como minimo un familiar.',
                        type: 'error'
                    });
                    a = 1;
                }
                var total = a;
                if (total == 0) {} else {
                    return false;
                }
            } else if (total == 3) {
                $("#form_paso3").submit();
                var a = 0;
                var b = 0;
                var c = 0;
                var d = 0;
                var e = 0;
                var f = 0;
                var g = 0;
                var h = 0;
                var i = 0;
                var j = 0;
                var k = 0;
                var l = 0;
                var m = 0;
                var n = 0;
                var o = 0;
                var p = 0;
                var q = 0;
                var r = 0;
                var s = 0;
                var t = 0;
                var txtdireccionactual = $('#txtdireccionactual').val();
                var txtreferenciadomicilio = $('#txtreferenciadomicilio').val();
                var txtnrotelefono = $('#txtnrotelefono').val();
                var txtlocalizacion = $('#txtlocalizacion').val();
                var txtespecificarlocalizacion = $('#txtespecificarlocalizacion').val();
                var txtvivienda = $('#txtvivienda').val();
                var txtespecificarvivienda = $('#txtespecificarvivienda').val();
                var txtviviendaparedes = $('#txtviviendaparedes').val();
                var txtviviendatechos = $('#txtviviendatechos').val();
                var txtviviendapisos = $('#txtviviendapisos').val();
                var txtserviciosluz = $('#txtserviciosluz').val();
                var txtserviciosagua = $('#txtserviciosagua').val();
                var txtserviciosdesague = $('#txtserviciosdesague').val();
                var txtnropersonasdomicilio = $('#txtnropersonasdomicilio').val();
                var txtnroambientevivienda = $('#txtnroambientevivienda').val();
                var txtnrodormitoriovivienda = $('#txtnrodormitoriovivienda').val();
                var txtnropersonasdormitorio = $('#txtnropersonasdormitorio').val();
                var checkboxHogar1 = $('input:checkbox[name="checkboxHogar1"]:checked').val();
                var checkboxHogar2 = $('input:checkbox[name="checkboxHogar2"]:checked').val();
                var checkboxHogar3 = $('input:checkbox[name="checkboxHogar3"]:checked').val();
                var checkboxHogar4 = $('input:checkbox[name="checkboxHogar4"]:checked').val();
                var checkboxHogar5 = $('input:checkbox[name="checkboxHogar5"]:checked').val();
                var checkboxHogar6 = $('input:checkbox[name="checkboxHogar6"]:checked').val();
                var checkboxHogar7 = $('input:checkbox[name="checkboxHogar7"]:checked').val();
                var checkboxHogar8 = $('input:checkbox[name="checkboxHogar8"]:checked').val();
                var checkboxHogar9 = $('input:checkbox[name="checkboxHogar9"]:checked').val();
                var checkboxHogar10 = $('input:checkbox[name="checkboxHogar10"]:checked').val();
                var checkboxHogar11 = $('input:checkbox[name="checkboxHogar11"]:checked').val();
                var checkboxHogar12 = $('input:checkbox[name="checkboxHogar12"]:checked').val();
                var checkboxServicioC1 = $('input:checkbox[name="checkboxServicioC1"]:checked').val();
                var checkboxServicioC2 = $('input:checkbox[name="checkboxServicioC2"]:checked').val();
                var checkboxServicioC3 = $('input:checkbox[name="checkboxServicioC3"]:checked').val();
                if (txtdireccionactual == '') {
                    a = 1;
                }
                if (txtreferenciadomicilio == '') {
                    b = 1;
                }
                if (txtnrotelefono == '') {
                    c = 1;
                }
                if (txtlocalizacion == '') {
                    d = 1;
                } else if (txtlocalizacion == 4) {
                    if (txtespecificarlocalizacion == '') {
                        d = 1;
                    }
                }
                if (txtvivienda == '') {
                    d = 1;
                } else if (txtvivienda == 7) {
                    if (txtespecificarvivienda == '') {
                        d = 1;
                    }
                }
                if (txtviviendaparedes == '') {
                    e = 1;
                }
                if (txtviviendatechos == '') {
                    f = 1;
                }
                if (txtviviendapisos == '') {
                    g = 1;
                }
                if (txtserviciosluz == '') {
                    h = 1;
                }
                if (txtserviciosagua == '') {
                    i = 1;
                }
                if (txtserviciosdesague == '') {
                    j = 1;
                }
                if (txtnropersonasdomicilio == '') {
                    k = 1;
                }
                if (txtnroambientevivienda == '') {
                    l = 1;
                }
                if (txtnrodormitoriovivienda == '') {
                    m = 1;
                }
                if (txtnropersonasdormitorio == '') {
                    n = 1;
                }
                var c1 = 0;
                var c2 = 0;
                var c3 = 0;
                var c4 = 0;
                var c5 = 0;
                var c6 = 0;
                var c7 = 0;
                var c8 = 0;
                var c9 = 0;
                var c10 = 0;
                var c11 = 0;
                var c12 = 0;
                if (checkboxHogar1 == 1) {
                    c1 = 1;
                }
                if (checkboxHogar2 == 2) {
                    c2 = 1;
                }
                if (checkboxHogar3 == 3) {
                    c3 = 1;
                }
                if (checkboxHogar4 == 4) {
                    c4 = 1;
                }
                if (checkboxHogar5 == 5) {
                    c5 = 1;
                }
                if (checkboxHogar6 == 6) {
                    c6 = 1;
                }
                if (checkboxHogar7 == 7) {
                    c7 = 1;
                }
                if (checkboxHogar8 == 8) {
                    c8 = 1;
                }
                if (checkboxHogar9 == 9) {
                    c9 = 1;
                }
                if (checkboxHogar10 == 10) {
                    c10 = 1;
                }
                if (checkboxHogar11 == 11) {
                    c11 = 1;
                }
                if (checkboxHogar12 == 12) {
                    c12 = 1;
                }
                var ctotal = c1 + c2 + c3 + c4 + c5 + c6 + c7 + c8 + c9 + c10 + c11 + c12;
                if (ctotal == 0) {
                    o = 1;
                }
                var cSC1 = 0;
                var cSC2 = 0;
                var cSC3 = 0;
                if (checkboxServicioC1 == 1) {
                    cSC1 = 1;
                }
                if (checkboxServicioC2 == 2) {
                    cSC2 = 1;
                }
                if (checkboxServicioC3 == 3) {
                    cSC3 = 1;
                }
                var cSCtotal = cSC1 + cSC2 + cSC3;
                if (cSCtotal == 0) {
                    p = 1;
                };
                var total = a + b + c + d + e + f + g + h + i + j + k + l + m + n + o + p;
                if (total == 0) {} else {
                    var forms = document.getElementById('form_paso3');
                    forms.classList.add('was-validated');
                    swal("Error", "Falta algunos campos completar", "warning");
                    return false;
                }
            } else if (total == 4) {
                $("#form_paso4").submit();
                var a = 0;
                var b = 0;
                var c = 0;
                var d = 0;
                var e = 0;
                var f = 0;
                var txttotalegresosmensual = $('#txttotalegresosmensual').val();
                y = Math.round(txttotalegresosmensual);
                /*if (y <= 1) {
                    b = 1;
                }*/
                if (y <= 0) {
                    b = 1;
                }
                var txttrabaja = $('input[name=txttrabaja]:checked', '#form_paso4').val();
                var txtcondicionlaboral = $('#txtcondicionlaboral').val();
                var txtespcifiquecondicionlaboral = $('#txtespcifiquecondicionlaboral').val();
                if (typeof txttrabaja === 'undefined') {
                    c = 1;
                } else if (txttrabaja == 1) {
                    if (txtcondicionlaboral == '') {
                        c = 1;
                    } else if (txtcondicionlaboral == 5) {
                        if (txtespcifiquecondicionlaboral == '') {
                            c = 1;
                        }
                    }
                }
                var txtfinanciaestudios = $('#txtfinanciaestudios').val();
                var txtespeicfiquefinanciaestudios = $('#txtespeicfiquefinanciaestudios').val();
                if (txtfinanciaestudios == '') {
                    d = 1;
                } else if (txtfinanciaestudios == 5) {
                    if (txtespeicfiquefinanciaestudios == '') {
                        d = 1;
                    }
                }
                var txttotalgastosdiarios = $('#txttotalgastosdiarios').val();
                w = Math.round(txttotalgastosdiarios);
                if (w <= 1) {
                    e = 1;
                }
                var txtmontoeducacionmiembro = $('#txtmontoeducacionmiembro').val();
                w1 = Math.round(txtmontoeducacionmiembro);
                if (w1 <= 0) {
                    f = 1;
                }
                var total = a + b + c + d + e + f;
                if (total == 0) {} else {
                    var forms = document.getElementById('form_paso4');
                    forms.classList.add('was-validated');
                    swal("Error", "Falta algunos campos completar", "warning");
                    return false;
                }
            } else if (total == 5) {
                $("#form_paso5").submit();
                var a = 0;
                var b = 0;
                var c = 0;
                var d = 0;
                var e = 0;
                var f = 0;
                var g = 0;
                var h = 0;
                var i = 0;
                var txtseguro = $('#txtseguro').val();
                var txtpadecidoenfermedad = $('input[name=txtpadecidoenfermedad]:checked', '#form_paso5').val();
                var txttipoenferemedad = $('#txttipoenferemedad').val();
                var txtespecificartipoenfermedad = $('#txtespecificartipoenfermedad').val();
                if (txtseguro == '') {
                    a = 1;
                }
                if (typeof txtpadecidoenfermedad === 'undefined') {
                    b = 1;
                } else if (txtpadecidoenfermedad == 1) {
                    if (txttipoenferemedad == '') {
                        b = 1;
                    } else if (txttipoenferemedad == 12) {
                        if (txtespecificartipoenfermedad == '') {
                            b = 1;
                        }
                    }
                }
                var txtpadecidoenfermedadcronica = $('input[name=txtpadecidoenfermedadcronica]:checked', '#form_paso5').val();
                var txttipoenferemedadcronica = $('#txttipoenferemedadcronica').val();
                var txtespecificartipoenfermedadcronica = $('#txtespecificartipoenfermedadcronica').val();
                if (typeof txtpadecidoenfermedadcronica === 'undefined') {
                    c = 1;
                } else if (txtpadecidoenfermedadcronica == 1) {
                    if (txttipoenferemedadcronica == '') {
                        c = 1;
                    } else if (txttipoenferemedadcronica == 10) {
                        if (txtespecificartipoenfermedadcronica == '') {
                            c = 1;
                        }
                    }
                }
                var txtpadecidoenfermedadinfecciosa = $('input[name=txtpadecidoenfermedadinfecciosa]:checked', '#form_paso5').val();
                var txttipoenferemedadinfecciosa = $('#txttipoenferemedadinfecciosa').val();
                var txtespecificartipoenfermedadinfecciosa = $('#txtespecificartipoenfermedadinfecciosa').val();
                if (typeof txtpadecidoenfermedadinfecciosa === 'undefined') {
                    d = 1;
                } else if (txtpadecidoenfermedadinfecciosa == 1) {
                    if (txttipoenferemedadinfecciosa == '') {
                        d = 1;
                    } else if (txttipoenferemedadinfecciosa == 6) {
                        if (txtespecificartipoenfermedadinfecciosa == '') {
                            d = 1;
                        }
                    }
                }
                var txtalergicomedicamento = $('input[name=txtalergicomedicamento]:checked', '#form_paso5').val();
                var txttipomedicamento = $('#txttipomedicamento').val();
                var txtespecificartipomedicamento = $('#txtespecificartipomedicamento').val();
                if (typeof txtalergicomedicamento === 'undefined') {
                    e = 1;
                } else if (txtalergicomedicamento == 1) {
                    if (txttipomedicamento == '') {
                        e = 1;
                    } else if (txttipomedicamento == 10) {
                        if (txtespecificartipomedicamento == '') {
                            e = 1;
                        }
                    }
                }
                var txtantecedentesquirurgicos = $('input[name=txtantecedentesquirurgicos]:checked', '#form_paso5').val();
                var txttipoantecedentesquirurgicos = $('#txttipoantecedentesquirurgicos').val();
                var txtespecifiquetipoantecedentesquirurgicos = $('#txtespecifiquetipoantecedentesquirurgicos').val();
                if (typeof txtantecedentesquirurgicos === 'undefined') {
                    f = 1;
                } else if (txtantecedentesquirurgicos == 1) {
                    if (txttipoantecedentesquirurgicos == '') {
                        f = 1;
                    } else if (txttipoantecedentesquirurgicos == 6) {
                        if (txtespecifiquetipoantecedentesquirurgicos == '') {
                            f = 1;
                        }
                    }
                }
                var txtenfermerdadfamiliar = $('input[name=txtenfermerdadfamiliar]:checked', '#form_paso5').val();
                var txttipoenferemedadfamiliar = $('#txttipoenferemedadfamiliar').val();
                var txttespecifiquetipoenfernedadfamiliar = $('#txttespecifiquetipoenfernedadfamiliar').val();
                if (typeof txtenfermerdadfamiliar === 'undefined') {
                    g = 1;
                } else if (txtenfermerdadfamiliar == 1) {
                    if (txttipoenferemedadfamiliar == '') {
                        g = 1;
                    } else if (txttipoenferemedadfamiliar == 12) {
                        if (txttespecifiquetipoenfernedadfamiliar == '') {
                            g = 1;
                        }
                    }
                }
                var txtpadecetipodiscapacidad = $('input[name=txtpadecetipodiscapacidad]:checked', '#form_paso5').val();
                var txtespecifiquetipodiscapacidad = $('#txtespecifiquetipodiscapacidad').val();
                if (typeof txtpadecetipodiscapacidad === 'undefined') {
                    h = 1;
                } else if (txtpadecetipodiscapacidad == 1) {
                    if (txtespecifiquetipodiscapacidad == '') {
                        h = 1;
                    }
                }
                var checkboxPS1 = $('input:checkbox[name="checkboxPS1"]:checked').val();
                var checkboxPS2 = $('input:checkbox[name="checkboxPS2"]:checked').val();
                var checkboxPS3 = $('input:checkbox[name="checkboxPS3"]:checked').val();
                var checkboxPS4 = $('input:checkbox[name="checkboxPS4"]:checked').val();
                var checkboxPS5 = $('input:checkbox[name="checkboxPS5"]:checked').val();
                var checkboxPS6 = $('input:checkbox[name="checkboxPS6"]:checked').val();
                var checkboxPS7 = $('input:checkbox[name="checkboxPS7"]:checked').val();
                var checkboxPS8 = $('input:checkbox[name="checkboxPS8"]:checked').val();
                var checkboxPS9 = $('input:checkbox[name="checkboxPS9"]:checked').val();
                var checkboxPS10 = $('input:checkbox[name="checkboxPS10"]:checked').val();
                var checkboxPS11 = $('input:checkbox[name="checkboxPS11"]:checked').val();
                var checkboxPS12 = $('input:checkbox[name="checkboxPS12"]:checked').val();
                var checkboxPS13 = $('input:checkbox[name="checkboxPS13"]:checked').val();
                var c1 = 0;
                var c2 = 0;
                var c3 = 0;
                var c4 = 0;
                var c5 = 0;
                var c6 = 0;
                var c7 = 0;
                var c8 = 0;
                var c9 = 0;
                var c10 = 0;
                var c11 = 0;
                var c12 = 0;
                var c13 = 0;
                if (checkboxPS1 == 1) {
                    c1 = 1;
                }
                if (checkboxPS2 == 2) {
                    c2 = 1;
                }
                if (checkboxPS3 == 3) {
                    c3 = 1;
                }
                if (checkboxPS4 == 4) {
                    c4 = 1;
                }
                if (checkboxPS5 == 5) {
                    c5 = 1;
                }
                if (checkboxPS6 == 6) {
                    c6 = 1;
                }
                if (checkboxPS7 == 7) {
                    c7 = 1;
                }
                if (checkboxPS8 == 8) {
                    c8 = 1;
                }
                if (checkboxPS9 == 9) {
                    c9 = 1;
                }
                if (checkboxPS10 == 10) {
                    c10 = 1;
                }
                if (checkboxPS11 == 11) {
                    c11 = 1;
                }
                if (checkboxPS12 == 12) {
                    c12 = 1;
                }
                if (checkboxPS13 == 13) {
                    c13 = 1;
                    console.log("CH13A");
                    console.log(c13);
                }
                var ctotal = c1 + c2 + c3 + c4 + c5 + c6 + c7 + c8 + c9 + c10 + c11 + c12 + c13;
                console.log(ctotal);
                var txtespecifiqueproblemassociales = $('#txtespecifiqueproblemassociales').val();
                if (ctotal == 0) {
                    i = 1;
                } else if (checkboxPS12 == 12) {
                    if (txtespecifiqueproblemassociales == '') {
                        i = 1;
                    }
                }
                var total = a + b + c + d + e + f + g + h + i;
                if (total == 0) {} else {
                    var forms = document.getElementById('form_paso5');
                    forms.classList.add('was-validated');
                    swal("Error", "Falta algunos campos completar", "warning");
                    return false;
                }
            } else if (total == 6) {
                $("#form_paso6").submit();
                var a = 0;
                var b = 0;
                var txtingenierealimentos = $('input[name=radioIA]:checked', '#form_paso6').val();
                var txtingenierealimentosespecificar = $('#txtingenierealimentosespecificar').val();
                if (typeof txtingenierealimentos === 'undefined') {
                    a = 1;
                } else if (txtingenierealimentos == 4) {
                    if (txtingenierealimentosespecificar == '') {
                        b = 1;
                    }
                }
                var total = a + b;
                if (total == 0) {} else {
                    var forms = document.getElementById('form_paso6');
                    forms.classList.add('was-validated');
                    swal("Error", "Falta algunos campos completar", "warning");
                    return false;
                }
            } else if (total == 7) {
                $("#form_paso7").submit();
                var a = 0;
                var b = 0;
                var c = 0;
                var d = 0;
                var e = 0;
                var txtreligion = $('#txtreligion').val();
                var txtespecificarreligion = $('#txtespecificarreligion').val();
                var txtpracticadisciplinadeportiva = $('#txtpracticadisciplinadeportiva').val();
                var txtpracticadisciplinaartistica = $('#txtpracticadisciplinaartistica').val();
                var txtratoslibres = $('#txtratoslibres').val();
                if (txtreligion === '') {
                    a = 1;
                } else if (txtreligion == 4) {
                    if (txtespecificarreligion == '') {
                        a = 1;
                    }
                }
                if (txtpracticadisciplinadeportiva == '') {
                    b = 1;
                }
                if (txtpracticadisciplinaartistica == '') {
                    c = 1;
                }
                if (txtratoslibres == '') {
                    d = 1;
                }
                var total = a + b + c + d + e;
                if (total == 0) {} else {
                    var forms = document.getElementById('form_paso7');
                    forms.classList.add('was-validated');
                    swal("Error", "Falta algunos campos completar", "warning");
                    return false;
                }
            } else if (total == 8) {
                $("#form_paso8").submit();
                var a = 0;
                var b = 0;
                var c = 0;
                var d = 0;
                var e = 0;
                var txtmediotransporte = $('#txtmediotransporte').val();
                var txtmediotransportespecifique = $('#txtmediotransportespecifique').val();
                var txttiempodemora = $('#txttiempodemora').val();
                var txtcuentacelular = $('input[name=txtcuentacelular]:checked', '#form_paso8').val();
                var txtpagoservicio = $('#txtpagoservicio').val();
                var txtbeneficiario = $('#txtbeneficiario').val();
                var txtespecifiquebeneficiario = $('#txtespecifiquebeneficiario').val();
                if (txtmediotransporte == '') {
                    a = 1;
                } else if (txtmediotransporte == 6) {
                    if (txtmediotransportespecifique == '') {
                        a = 1;
                    }
                }
                if (txttiempodemora == '') {
                    b = 1;
                }
                if (typeof txtcuentacelular === 'undefined') {
                    c = 1;
                } else if (txtcuentacelular == 1) {
                    if (txtpagoservicio == '') {
                        c = 1;
                    }
                }
                if (txtbeneficiario == '') {
                    d = 1;
                } else if (txtbeneficiario == 6) {
                    if (txtespecifiquebeneficiario == '') {
                        d = 1;
                    }
                }
                var total = a + b + c + d;
                if (total == 0) {} else {
                    var forms = document.getElementById('form_paso8');
                    forms.classList.add('was-validated');
                    swal("Error", "Falta algunos campos completar", "warning");
                    return false;
                }
            }
        }
        return res;
    });
    $('#txtfechanacimiento').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false,
        lang: "es"
    });
    $('#txtespecifiquefechamestruacion').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false,
        lang: "es"
    });
    $('#txtespecifiquefechaprobableparto').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false,
        lang: "es"
    });
    $('input.thresold-i').maxlength({
        threshold: 255
    });
    $("input.mob_no").inputmask({
        mask: "9999-9"
    });
    $('textarea.max-textarea').maxlength({
        alwaysShow: true
    });
    $(".sw-btn-next").click(function(e) {
        $(document).on('change', '#user_form', function(event) {
            var matches = document.querySelectorAll(".paso");
        });
    });
    $('.amt').keyup(function() {
        var importe_total = 0
        $(".amt").each(function(index, value) {
            if ($.isNumeric($(this).val().replace(/,/g, ""))) {
                importe_total = importe_total + eval($(this).val().replace(/,/g, ""));
            }
        });
        $("#txttotalgastosdiarios").val(importe_total.toFixed(2));
    });
    $('.amt2').keyup(function() {
        var importe_total = 0
        $(".amt2").each(function(index, value) {
            if ($.isNumeric($(this).val().replace(/,/g, ""))) {
                importe_total = importe_total + eval($(this).val().replace(/,/g, ""));
            }
        });
        $("#txttotalegresosmensual").val(importe_total.toFixed(2));
    });
    $('.amt3').keyup(function() {
        var importe_total = 0
        $(".amt3").each(function(index, value) {
            if ($.isNumeric($(this).val().replace(/,/g, ""))) {
                importe_total = importe_total + eval($(this).val().replace(/,/g, ""));
            }
        });
        $("#txttotalingresomensual").val(importe_total.toFixed(2));
    });
    $('.autonumber').autoNumeric('init');
    consultar();
    if ($('button.sw-btn-next').hasClass('disabled')) {
        $('.sw-btn-group-extra').show();
    } else {
        $('.sw-btn-group-extra').hide();
    }
});

function consultar() {
    $('#modaldatasituacionfamiliar').click(function() {
        var forms = document.getElementById('form_familiar');
        forms.classList.remove('was-validated');
        document.getElementById('titulomodal').innerHTML = 'AGREGAR DATOS DEL FAMILIAR';
        txtcodigoitem = $('#txtcodigoitem').val('');
        txtapellidosnombresfamiliar = $('#txtapellidosnombresfamiliar').val('');
        txtparentescofamiliar = $('#txtparentescofamiliar').val('');
        document.getElementById("radioSexoFamiliar5").checked = false;
        document.getElementById("radioSexoFamiliar6").checked = false;
        txtedadfamiliar = $('#txtedadfamiliar').val('');
        txtestadocivilfamiliar = $('#txtestadocivilfamiliar').val('');
        txtgradoinstruccionfamiliar = $('#txtgradoinstruccionfamiliar').val('');
        txtocupacionfamiliar = $('#txtocupacionfamiliar').val('');
        txtcondicionlaboralfamiliar = $('#txtcondicionlaboralfamiliar').val('');
    });
    $mensaje = '';
    $("#message").html($mensaje);
	urlbase = $("body").attr('urlbase');
	urllistar = urlbase + "/procesos/ficha/paso2/listarFamiliares";
    var dataTable = $('#example3').DataTable({
        "destroy": true,
        "searching": false,
        "paging": false,
        "ordering": false,
        "info": false,
        "order": [
            [0, "desc"]
        ],
        "ajax": {
            url: urllistar,
            type: "POST",
            data: {}
        },
        "columns": [{
            "title": "#",
            "data": "ITEM",
            "width": 5
        }, {
            "title": "APELLIDOS Y NOMBRES",
            "data": "APELLIDOSNOMBRES",
            "width": 5
        }, {
            "title": "PARENTESCO",
            "data": "DESCRIPCIONPARENSTESCO",
            "width": 5
        }, {
            "title": "PARENTESCO",
            "data": "PARESTENSCO",
            "width": 5,
            "visible": false
        }, {
            "title": "EDAD",
            "data": "EDAD",
            "width": 5
        }, {
            "title": "SEXO",
            "data": "DESCRIPCIONSEXO",
            "width": 5
        }, {
            "title": "SEXO",
            "data": "SEXO",
            "width": 5,
            "visible": false
        }, {
            "title": "ESTADO CIVIL",
            "data": "DESCRIPCIONESTADOCIVIL",
            "width": 80
        }, {
            "title": "ESTADO CIVIL",
            "data": "ESTADOCIVIL",
            "width": 80,
            "visible": false
        }, {
            "title": "GRADO DE INST.",
            "data": "DESCRIPCIONGRADOINSTRUCCION",
            "width": 80
        }, {
            "title": "GRADO DE INST.",
            "data": "GRADOINSTRUCION",
            "width": 80,
            "visible": false
        }, {
            "title": "OCUPACION",
            "data": "DESCRIPCIONOCUPACION",
            "width": 80
        }, {
            "title": "OCUPACION",
            "data": "OCUPACION",
            "width": 80,
            "visible": false
        }, {
            "title": "CONDICIONTRABAJO",
            "data": "CONDICIONTRABAJO",
            "width": 80,
            "visible": false
        }, {
            "title": "CONDICION TRABAJO",
            "data": "DESCRIPCIONCONDICIONTRABAJO",
            "width": 80
        }, {
            "title": "MODIFICAR",
            "render": function(data, type, row) {
                return "<center><button data-modal='modal-2' id='modaldatasituacionfamiliar2' type='button' class='editar btn btn-warning md-trigger'><span class='feather icon-edit'></span></button></center>"
            },
            "width": 5
        }, {
            "title": "ELIMINAR",
            "render": function(data, type, row) {
                return "<center><button type='button' id='modaldatasituacionfamiliareliminar' class='eliminar btn btn-danger sweet-multiple'><span class='feather icon-trash-2'></span></button></center>"
            },
            "width": 5
        }],
        dom: 'Bfrtip',
        buttons: [],
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
    });
    obtener_data_editar("#example3 tbody", dataTable);
    obtener_data_eliminar("#example3 tbody", dataTable);
}
$(document).on('click', '#btnguardarfamiliar', function(ev) {
    _token = $('#_token').val();
    var a = 0;
    var b = 0;
    var c = 0;
    var d = 0;
    var e = 0;
    var f = 0;
    var g = 0;
    var h = 0;
    var i = 0;
    txtcodigoitem = $('#txtcodigoitem').val();
    txtapellidosnombresfamiliar = $('#txtapellidosnombresfamiliar').val();
    if (txtapellidosnombresfamiliar == '') {
        new PNotify({
            title: 'Error APELLIDOS Y NOMBRES: ',
            text: 'Ingrese los apellidos y nombres.',
            type: 'error'
        });
        a = 1;
    }
    txtparentescofamiliar = $('#txtparentescofamiliar').val();
    if (txtparentescofamiliar == '') {
        new PNotify({
            title: 'Error PARENTESCO: ',
            text: 'Selecione el parentesco.',
            type: 'error'
        });
        b = 1;
    }
    radioSexoFamiliar = $('input[name=radioSexoFamiliar]:checked', '#form_familiar').val();
    if (typeof radioSexoFamiliar === 'undefined') {
        new PNotify({
            title: 'Error SEXO: ',
            text: 'Seleccione Masculino o Femenino.',
            type: 'error'
        });
        c = 1;
    }
    txtedadfamiliar = $('#txtedadfamiliar').val();
    if (txtedadfamiliar == '') {
        new PNotify({
            title: 'Error EDAD: ',
            text: 'Ingrese su edad.',
            type: 'error'
        });
        e = 1;
    }
    txtestadocivilfamiliar = $('#txtestadocivilfamiliar').val();
    if (txtestadocivilfamiliar == '') {
        new PNotify({
            title: 'Error ESTADO CIVIL: ',
            text: 'Selecione el parentesco.',
            type: 'error'
        });
        f = 1;
    }
    txtgradoinstruccionfamiliar = $('#txtgradoinstruccionfamiliar').val();
    if (txtgradoinstruccionfamiliar == '') {
        new PNotify({
            title: 'Error GRADO DE INSTRUCCION: ',
            text: 'Selecione el parentesco.',
            type: 'error'
        });
        g = 1;
    }
    txtocupacionfamiliar = $('#txtocupacionfamiliar').val();
    if (txtocupacionfamiliar == '') {
        new PNotify({
            title: 'Error OCUPACION: ',
            text: 'Selecione la ocupacion.',
            type: 'error'
        });
        h = 1;
    }
    txtcondicionlaboralfamiliar = $('#txtcondicionlaboralfamiliar').val();
    if (txtcondicionlaboralfamiliar == '') {
        new PNotify({
            title: 'Error CONDICION LABORAL: ',
            text: 'Selecione la condicion laboral.',
            type: 'error'
        });
        i = 1;
    }
    urlbase = $("body").attr('urlbase');
    var total = a + b + c + d + e + f + g + h + i;
    if (total == 0) {
        if (txtcodigoitem == '') {
            url = urlbase + "/procesos/ficha/paso2/nuevoFamiliar";
        } else {
            url = urlbase + "/procesos/ficha/paso2/actualizarFamiliar";
        }
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: {
                _token: _token,
                txtcodigoitem: txtcodigoitem,
                txtapellidosnombresfamiliar: txtapellidosnombresfamiliar,
                txtparentescofamiliar: txtparentescofamiliar,
                radioSexoFamiliar: radioSexoFamiliar,
                txtedadfamiliar: txtedadfamiliar,
                txtestadocivilfamiliar: txtestadocivilfamiliar,
                txtgradoinstruccionfamiliar: txtgradoinstruccionfamiliar,
                txtocupacionfamiliar: txtocupacionfamiliar,
                txtcondicionlaboralfamiliar: txtcondicionlaboralfamiliar
            },
            complete: function(response) {}
        }).then(function(data) {
            if (data.success == true) {
                var el2 = document.getElementById("modaldatasituacionfamiliar");
                var modal = document.querySelector('#' + el2.getAttribute('data-modal')),
                    close = modal.querySelector('.md-close2');

                function removeModal(hasPerspective) {
                    classie.remove(modal, 'md-show');
                    $('body').removeClass(el2.getAttribute('data-modal'));
                    if (hasPerspective) {
                        classie.remove(document.documentElement, 'md-perspective');
                    }
                }

                function removeModalHandler() {
                    removeModal(classie.has(el2, 'md-setperspective'));
                }
                ev.stopPropagation();
                removeModalHandler();
                var dataTable = $('#example3').DataTable();
                dataTable.ajax.reload();
            }
        });
    } else {
        var forms = document.getElementById('form_familiar');
        forms.classList.add('was-validated');
        swal("Error", "Falta algunos campos completar", "warning");
        return false;
    }
});
$(document).on('click', '#btnResfrecar', function() {
    dataTable.ajax.reload();
});
$(document).on('submit', '#form_paso1', function(event) {
    event.preventDefault();
    _token = $('#_token').val();
    var a = 0;
    var b = 0;
    var c = 0;
    var d = 0;
    var e = 0;
    var f = 0;
    var g = 0;
    var h = 0;
    var i = 0;
    var j = 0;
    var k = 0;
    var l = 0;
    var m = 0;
    var n = 0;
    var o = 0;
    var p = 0;
    var q = 0;
    var r = 0;
    var s = 0;
    var txtciclo = $('#txtciclo').val();
    if (txtciclo == '') {
        new PNotify({
            title: 'Error CICLO: ',
            text: 'Seleccione el ciclo.',
            type: 'error'
        });
        a = 1;
    }
    var txtanioingreso = $('#txtanioingreso').val();
    if (txtanioingreso == '') {
        new PNotify({
            title: 'Error AÑO DE INGRESO: ',
            text: 'Ingrese el año de ingreso.',
            type: 'error'
        });
        b = 1;
    }
    var txtcorreoelectronico = $('#txtcorreoelectronico').val();
    if (txtcorreoelectronico == '') {
        new PNotify({
            title: 'Error CORREO ELECTRONICO: ',
            text: 'Ingrese su correo electronico.',
            type: 'error'
        });
        c = 1;
    } else if (validarEmail(txtcorreoelectronico) == 2) {
        new PNotify({
            title: 'Error CORREO ELECTRONICO: ',
            text: 'Ingrese un correo electronico valido.',
            type: 'error'
        });
        var x = validarEmail(txtcorreoelectronico);
        c = 1;
    }
    var txtcelular = $('#txtcelular').val();
    if (txtcelular == '') {
        new PNotify({
            title: 'Error CELULAR: ',
            text: 'Ingrese su numero de celular.',
            type: 'error'
        });
        d = 1;
    } else if (txtcelular.length != 9) {
        new PNotify({
            title: 'Error CELULAR: ',
            text: 'Numero de celular debe tener 9 digitos.',
            type: 'error'
        });
        d = 1;
    }
    var txttelefono = $('#txttelefono').val();
    if (txttelefono == '') {
        new PNotify({
            title: 'Error TELEFONO: ',
            text: 'Ingrese su numero de telefono.',
            type: 'error'
        });
        e = 1;
    } else if (txttelefono.length != 9) {
        new PNotify({
            title: 'Error TELEFONO: ',
            text: 'Numero de telefono debe tener 8 digitos.',
            type: 'error'
        });
        e = 1;
    }
    var txtfechanacimiento = $('#txtfechanacimiento').val();
    if (txtfechanacimiento == '') {
        new PNotify({
            title: 'Error FECHA DE NACIMIENTO: ',
            text: 'Ingrese su fecha de nacimiento.',
            type: 'error'
        });
        f = 1;
    }
    var txtlugarnacimiento = $('#txtlugarnacimiento').val();
    if (txtlugarnacimiento == '') {
        new PNotify({
            title: 'Error LUGAR DE NACIMIENTO: ',
            text: 'Ingrese su lugar de nacimiento.',
            type: 'error'
        });
        g = 1;
    }
    var txttelefonoemergencia = $('#txttelefonoemergencia').val();
    if (txttelefonoemergencia == '') {
        new PNotify({
            title: 'Error TELEFONOS DE EMERGENCIA: ',
            text: 'Ingrese su telefonos de emergencia.',
            type: 'error'
        });
        h = 1;
    }
    var txttutorresponsable = $('#txttutorresponsable').val();
    if (txttutorresponsable == '') {
        new PNotify({
            title: 'Error TUTOR RESPONSABLE: ',
            text: 'Ingrese su tutor responsable.',
            type: 'error'
        });
        i = 1;
    }
    var radioSexo = $('input[name=radioSexo]:checked', '#form_paso1').val();
    if (typeof radioSexo === 'undefined') {
        new PNotify({
            title: 'Error SEXO: ',
            text: 'Seleccione masculino o femenino.',
            type: 'error'
        });
        p = 1;
    }
    var txtestadocivil = $('#txtestadocivil').val();
    if (txtestadocivil == '') {
        new PNotify({
            title: 'Error ESTADO CIVIL: ',
            text: 'Seleccione su estado civil.',
            type: 'error'
        });
        j = 1;
    }
    var txtidiomamaterna = $('#txtidiomamaterna').val();
    if (txtidiomamaterna == '') {
        new PNotify({
            title: 'Error IDIOMA O LENGUA MATERNA: ',
            text: 'Seleccione el idioma o lengua materna.',
            type: 'error'
        });
        k = 1;
    }
    var txtidiomamaternaespecificar = $('#txtidiomamaternaespecificar').val();
    if (txtidiomamaterna == 9) {
        if (txtidiomamaternaespecificar == '') {
            new PNotify({
                title: 'Error ESPECIFICAR IDIOMA O LENGUA MATERNA: ',
                text: 'Ingrese la especificacion del idioma o lengua materna.',
                type: 'error'
            });
            l = 1;
        }
    } else if (txtidiomamaterna == 11) {
        if (txtidiomamaternaespecificar == '') {
            new PNotify({
                title: 'Error ESPECIFICAR IDIOMA O LENGUA MATERNA: ',
                text: 'Ingrese la especificacion del idioma o lengua materna.',
                type: 'error'
            });
            l = 1;
        }
    }
    var txtinstitucioneducativa = $('#txtinstitucioneducativa').val();
    if (txtinstitucioneducativa == '') {
        new PNotify({
            title: 'Error INSTITUCION EDUCATIVA: ',
            text: 'Ingrese la institucion educativa.',
            type: 'error'
        });
        m = 1;
    }
    var txttipocolegio = $('#txttipocolegio').val();
    if (txttipocolegio == '') {
        new PNotify({
            title: 'Error TIPO DE COLEGIO: ',
            text: 'Ingrese el tipo de colegio.',
            type: 'error'
        });
        n = 1;
    } else if (txttipocolegio == 5) {
        if (txttipocolegioespecificar == '') {
            new PNotify({
                title: 'Error ESPECIFICAR TIPO DE COLEGIO: ',
                text: 'Ingrese la especificacion del tipo de colegio.',
                type: 'error'
            });
            o = 1;
        }
    }
    var txtdepartamento = $('#txtdepartamento').val();
    var txtprovincia = $('#txtprovincia').val();
    var txtdistrito = $('#txtdistrito').val();
    if (txtdepartamento == '') {
        new PNotify({
            title: 'Error DEPARTAMENTO: ',
            text: 'Seleccione el departamento.',
            type: 'error'
        });
        q = 1;
    } else if (txtprovincia == '') {
        new PNotify({
            title: 'Error PROVINCIA: ',
            text: 'Seleccione la provincia.',
            type: 'error'
        });
        q = 1;
    } else if (txtdistrito == '') {
        new PNotify({
            title: 'Error DISTRITO: ',
            text: 'Seleccione el distrito.',
            type: 'error'
        });
        q = 1;
    }
    var total = a + b + c + d + e + f + g + h + i + j + k + l + m + n + o + p + q;
    if (total == 0) {
        urlbase = $("body").attr('urlbase');
        url = urlbase + "/procesos/ficha/paso1";
        $.ajax({
            url: url,
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            complete: function(response) {}
        }).then(function(data) {
            if (data.success == true) {
                swal(data.message, "Hacer click!", "success");
                var forms = document.getElementById('form_paso1');
                forms.classList.remove('was-validated');
            } else {
                swal("Error", data.message, "warning");
            }
        });
    } else {
        return false;
    }
});
$(document).on('submit', '#form_paso2', function(event) {
    event.preventDefault();
    _token = $('#_token').val();
    urlbase = $("body").attr('urlbase');
    url = urlbase + "/procesos/ficha/paso2";
    var a = 0;
    var table = $('#example3').DataTable();
    var totalregistro = table.rows().count();
    if (totalregistro <= 0) {
        a = 1;
    }
    var total = a;
    if (total == 0) {
        $.ajax({
            url: url,
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            complete: function(response) {}
        }).then(function(data) {
            if (data.success == true) {
                swal(data.message, "Hacer click!", "success");
            } else {
                swal("Error", data.message, "warning");
            }
        });
    } else {
        return false;
    }
});
$(document).on('submit', '#form_paso3', function(event) {
    event.preventDefault();
    _token = $('#_token').val();
    urlbase = $("body").attr('urlbase');
    url = urlbase + "/procesos/ficha/paso3";
    var a = 0;
    var b = 0;
    var c = 0;
    var d = 0;
    var e = 0;
    var f = 0;
    var g = 0;
    var h = 0;
    var i = 0;
    var j = 0;
    var k = 0;
    var l = 0;
    var m = 0;
    var n = 0;
    var o = 0;
    var p = 0;
    var txtdireccionactual = $('#txtdireccionactual').val();
    var txtreferenciadomicilio = $('#txtreferenciadomicilio').val();
    var txtnrotelefono = $('#txtnrotelefono').val();
    var txtlocalizacion = $('#txtlocalizacion').val();
    var txtespecificarlocalizacion = $('#txtespecificarlocalizacion').val();
    var txtvivienda = $('#txtvivienda').val();
    var txtespecificarvivienda = $('#txtespecificarvivienda').val();
    var txtviviendaparedes = $('#txtviviendaparedes').val();
    var txtviviendatechos = $('#txtviviendatechos').val();
    var txtviviendapisos = $('#txtviviendapisos').val();
    var txtserviciosluz = $('#txtserviciosluz').val();
    var txtserviciosagua = $('#txtserviciosagua').val();
    var txtserviciosdesague = $('#txtserviciosdesague').val();
    var txtnropersonasdomicilio = $('#txtnropersonasdomicilio').val();
    var txtnroambientevivienda = $('#txtnroambientevivienda').val();
    var txtnrodormitoriovivienda = $('#txtnrodormitoriovivienda').val();
    var txtnropersonasdormitorio = $('#txtnropersonasdormitorio').val();
    var checkboxHogar1 = $('input:checkbox[name="checkboxHogar1"]:checked').val();
    var checkboxHogar2 = $('input:checkbox[name="checkboxHogar2"]:checked').val();
    var checkboxHogar3 = $('input:checkbox[name="checkboxHogar3"]:checked').val();
    var checkboxHogar4 = $('input:checkbox[name="checkboxHogar4"]:checked').val();
    var checkboxHogar5 = $('input:checkbox[name="checkboxHogar5"]:checked').val();
    var checkboxHogar6 = $('input:checkbox[name="checkboxHogar6"]:checked').val();
    var checkboxHogar7 = $('input:checkbox[name="checkboxHogar7"]:checked').val();
    var checkboxHogar8 = $('input:checkbox[name="checkboxHogar8"]:checked').val();
    var checkboxHogar9 = $('input:checkbox[name="checkboxHogar9"]:checked').val();
    var checkboxHogar10 = $('input:checkbox[name="checkboxHogar10"]:checked').val();
    var checkboxHogar11 = $('input:checkbox[name="checkboxHogar11"]:checked').val();
    var checkboxHogar12 = $('input:checkbox[name="checkboxHogar12"]:checked').val();
    var checkboxServicioC1 = $('input:checkbox[name="checkboxServicioC1"]:checked').val();
    var checkboxServicioC2 = $('input:checkbox[name="checkboxServicioC2"]:checked').val();
    var checkboxServicioC3 = $('input:checkbox[name="checkboxServicioC3"]:checked').val();
    if (txtdireccionactual == '') {
        new PNotify({
            title: 'Error DIRECCION ACTUAL: ',
            text: 'Ingrese su direccion actual.',
            type: 'error'
        });
        a = 1;
    }
    if (txtreferenciadomicilio == '') {
        new PNotify({
            title: 'Error REFERENCIA DEL DOMICILIO: ',
            text: 'Ingrese su referencia del domicilio.',
            type: 'error'
        });
        b = 1;
    }
    if (txtnrotelefono == '') {
        new PNotify({
            title: 'Error TELEFONO: ',
            text: 'Ingrese su telefono.',
            type: 'error'
        });
        c = 1;
    }
    if (txtlocalizacion == '') {
        new PNotify({
            title: 'Error LOCALIZACION: ',
            text: 'Seleccione la localizacion.',
            type: 'error'
        });
        d = 1;
    } else if (txtlocalizacion == 4) {
        if (txtespecificarlocalizacion == '') {
            new PNotify({
                title: 'Error ESPECIFICAR LOCALIZACION: ',
                text: 'Ingrese la especificacion de localizacion.',
                type: 'error'
            });
            d = 1;
        }
    }
    if (txtvivienda == '') {
        new PNotify({
            title: 'Error VIVIENDA: ',
            text: 'Seleccione la vivienda.',
            type: 'error'
        });
        d = 1;
    } else if (txtvivienda == 7) {
        if (txtespecificarvivienda == '') {
            new PNotify({
                title: 'Error ESPECIFICAR VIVIENDA: ',
                text: 'Ingrese la especificacion su vivienda.',
                type: 'error'
            });
            d = 1;
        }
    }
    if (txtviviendaparedes == '') {
        new PNotify({
            title: 'Error MATERIAL QUE PREDOMINA EN LA PAREDES: ',
            text: 'Selecione el material de la paredes.',
            type: 'error'
        });
        e = 1;
    }
    if (txtviviendatechos == '') {
        new PNotify({
            title: 'Error MATERIAL QUE PREDOMINA EN LOS TECHOS: ',
            text: 'Selecione el material en los techos.',
            type: 'error'
        });
        f = 1;
    }
    if (txtviviendapisos == '') {
        new PNotify({
            title: 'Error MATERIAL QUE PREDOMINA EN LOS PISOS: ',
            text: 'Selecione el material de los pisos.',
            type: 'error'
        });
        g = 1;
    }
    if (txtserviciosluz == '') {
        new PNotify({
            title: 'Error SERVICIOS BASICOS - LUZ: ',
            text: 'Selecione la Luz.',
            type: 'error'
        });
        h = 1;
    }
    if (txtserviciosagua == '') {
        new PNotify({
            title: 'Error SERVICIOS BASICOS - AGUA: ',
            text: 'Selecione la Agua.',
            type: 'error'
        });
        i = 1;
    }
    if (txtserviciosdesague == '') {
        new PNotify({
            title: 'Error SERVICIOS BASICOS - DESAGUE: ',
            text: 'Selecione la Desague.',
            type: 'error'
        });
        j = 1;
    }
    if (txtnropersonasdomicilio == '') {
        new PNotify({
            title: 'Error N° DE PERSONAS QUE HABITAN EN SU DOMICILIO: ',
            text: 'Selecione.',
            type: 'error'
        });
        k = 1;
    }
    if (txtnroambientevivienda == '') {
        new PNotify({
            title: 'Error TOTAL DE AMBIENTES CON LOS QUE CUENTA SU VIVIENDA: ',
            text: 'Selecione.',
            type: 'error'
        });
        l = 1;
    }
    if (txtnrodormitoriovivienda == '') {
        new PNotify({
            title: 'Error TOTAL DE DORMITORIOS EN SU VIVIENDA: ',
            text: 'Selecione.',
            type: 'error'
        });
        m = 1;
    }
    if (txtnropersonasdormitorio == '') {
        new PNotify({
            title: 'Error TOTAL DE PERSONAS POR DORMITORIO: ',
            text: 'Selecione.',
            type: 'error'
        });
        n = 1;
    }
    var c1 = 0;
    var c2 = 0;
    var c3 = 0;
    var c4 = 0;
    var c5 = 0;
    var c6 = 0;
    var c7 = 0;
    var c8 = 0;
    var c9 = 0;
    var c10 = 0;
    var c11 = 0;
    var c12 = 0;
    if (checkboxHogar1 == 1) {
        c1 = 1;
    }
    if (checkboxHogar2 == 2) {
        c2 = 1;
    }
    if (checkboxHogar3 == 3) {
        c3 = 1;
    }
    if (checkboxHogar4 == 4) {
        c4 = 1;
    }
    if (checkboxHogar5 == 5) {
        c5 = 1;
    }
    if (checkboxHogar6 == 6) {
        c6 = 1;
    }
    if (checkboxHogar7 == 7) {
        c7 = 1;
    }
    if (checkboxHogar8 == 8) {
        c8 = 1;
    }
    if (checkboxHogar9 == 9) {
        c9 = 1;
    }
    if (checkboxHogar10 == 10) {
        c10 = 1;
    }
    if (checkboxHogar11 == 11) {
        c11 = 1;
    }
    if (checkboxHogar12 == 12) {
        c12 = 1;
    }
    var ctotal = c1 + c2 + c3 + c4 + c5 + c6 + c7 + c8 + c9 + c10 + c11 + c12;
    if (ctotal == 0) {
        new PNotify({
            title: 'Error SU HOGAR TIENE: ',
            text: 'Selecione una opcion como minimo.',
            type: 'error'
        });
        o = 1;
    }
    var cSC1 = 0;
    var cSC2 = 0;
    var cSC3 = 0;
    if (checkboxServicioC1 == 1) {
        cSC1 = 1;
    }
    if (checkboxServicioC2 == 2) {
        cSC2 = 1;
    }
    if (checkboxServicioC3 == 3) {
        cSC3 = 1;
    }
    var cSCtotal = cSC1 + cSC2 + cSC3;
    if (cSCtotal == 0) {
        new PNotify({
            title: 'Error SERVICIOS COMPLEMENTARIOS: ',
            text: 'Selecione una opcion como minimo.',
            type: 'error'
        });
        p = 1;
    }
    var total = a + b + c + d + e + f + g + h + i + j + k + l + m + n + o + p;
    if (total == 0) {
        $.ajax({
            url: url,
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            complete: function(response) {}
        }).then(function(data) {
            if (data.success == true) {
                swal(data.message, "Hacer click!", "success");
                var forms = document.getElementById('form_paso3');
                forms.classList.remove('was-validated');
            } else {
                swal("Error", data.message, "warning");
            }
        });
    } else {
        return false;
    }
});
$(document).on('submit', '#form_paso4', function(event) {
    event.preventDefault();
    _token = $('#_token').val();
    urlbase = $("body").attr('urlbase');
    url = urlbase + "/procesos/ficha/paso4";
    var a = 0;
    var b = 0;
    var c = 0;
    var d = 0;
    var e = 0;
    var f = 0;
    var txttotalingresomensual = $('#txttotalingresomensual').val();
    x = Math.round(txttotalingresomensual);
    var txttotalegresosmensual = $('#txttotalegresosmensual').val();
    y = Math.round(txttotalegresosmensual);
    /*if (y <= 1) {
        new PNotify({
            title: 'Error TOTAL DE EGRESO MENSUAL FAMILIAR: ',
            text: 'El total de egreso debe ser mayor a 0.00 soles.',
            type: 'error'
        });
        b = 1;
    }*/
    if (y <= 0) {
        new PNotify({
            title: 'Error TOTAL DE EGRESO MENSUAL FAMILIAR: ',
            text: 'El total de egreso debe ser mayor a 0.00 soles.',
            type: 'error'
        });
        b = 1;
    }
    var txttrabaja = $('input[name=txttrabaja]:checked', '#form_paso4').val();
    var txtcondicionlaboral = $('#txtcondicionlaboral').val();
    var txtespcifiquecondicionlaboral = $('#txtespcifiquecondicionlaboral').val();
    if (typeof txttrabaja === 'undefined') {
        new PNotify({
            title: 'Error UD. TRABAJA: ',
            text: 'Seleccione una opcion Si o No.',
            type: 'error'
        });
        c = 1;
    } else if (txttrabaja == 1) {
        if (txtcondicionlaboral == '') {
            new PNotify({
                title: 'Error CONDICION LABORAL: ',
                text: 'Seleccione su condicion laboral.',
                type: 'error'
            });
            c = 1;
        } else if (txtcondicionlaboral == 5) {
            if (txtespcifiquecondicionlaboral == '') {
                new PNotify({
                    title: 'Error ESPECIFIQUE LA CONDICION LABORAL: ',
                    text: 'Ingrese la especificacion.',
                    type: 'error'
                });
                c = 1;
            }
        }
    }
    var txtfinanciaestudios = $('#txtfinanciaestudios').val();
    var txtespeicfiquefinanciaestudios = $('#txtespeicfiquefinanciaestudios').val();
    if (txtfinanciaestudios == '') {
        new PNotify({
            title: 'Error FINANCIA SUS ESTUDIOS: ',
            text: 'Seleccione como financia sus estudios.',
            type: 'error'
        });
        d = 1;
    } else if (txtfinanciaestudios == 5) {
        if (txtespeicfiquefinanciaestudios == '') {
            new PNotify({
                title: 'Error ESPECIFIQUE COMO FINANCIA SUS ESTUDIOS: ',
                text: 'Ingrese la especificacion.',
                type: 'error'
            });
            d = 1;
        }
    }
    var txttotalgastosdiarios = $('#txttotalgastosdiarios').val();
    w = Math.round(txttotalgastosdiarios);
    if (w <= 1) {
        new PNotify({
            title: 'Error TOTAL DE GASTOS EN SUS ESTUDIOS UNIVERSITARIOS: ',
            text: 'El total de gastos debe ser mayor a 0.00 soles.',
            type: 'error'
        });
        e = 1;
    }
    var txtmontoeducacionmiembro = $('#txtmontoeducacionmiembro').val();
    w1 = Math.round(txtmontoeducacionmiembro);
    if (w1 <= 0) {
        new PNotify({
            title: 'Error EDUCACION DE CADA MIEMBRO: ',
            text: 'La educacion de cada miembro debe ser mayor a 0.00 soles.',
            type: 'error'
        });
        f = 1;
    }
    var total = a + b + c + d + e + f;
    if (total == 0) {
        $.ajax({
            url: url,
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            complete: function(response) {}
        }).then(function(data) {
            if (data.success == true) {
                swal(data.message, "Hacer click!", "success");
                var forms = document.getElementById('form_paso4');
                forms.classList.remove('was-validated');
            } else {
                swal("Error", data.message, "warning");
            }
        });
    } else {
        return false;
    }
});
$(document).on('submit', '#form_paso5', function(event) {
    event.preventDefault();
    _token = $('#_token').val();
    urlbase = $("body").attr('urlbase');
    url = urlbase + "/procesos/ficha/paso5";
    var a = 0;
    var b = 0;
    var c = 0;
    var d = 0;
    var e = 0;
    var f = 0;
    var g = 0;
    var h = 0;
    var i = 0;
    var i1 = 0;
    var txtseguro = $('#txtseguro').val();
    var txtpadecidoenfermedad = $('input[name=txtpadecidoenfermedad]:checked', '#form_paso5').val();
    var txttipoenferemedad = $('#txttipoenferemedad').val();
    var txtespecificartipoenfermedad = $('#txtespecificartipoenfermedad').val();
    if (txtseguro == '') {
        new PNotify({
            title: 'Error SEGURO: ',
            text: 'Selecione con que seguro cuenta.',
            type: 'error'
        });
        a = 1;
    }
    if (typeof txtpadecidoenfermedad === 'undefined') {
        new PNotify({
            title: 'Error HA PADECIDO U. ALGUNA ENFERMEDAD: ',
            text: 'Seleccione una opcion Si o No.',
            type: 'error'
        });
        b = 1;
    } else if (txtpadecidoenfermedad == 1) {
        if (txttipoenferemedad == '') {
            new PNotify({
                title: 'Error INDIQUE QUE TIPO DE ENFERMEDAD: ',
                text: 'Seleccione.',
                type: 'error'
            });
            b = 1;
        } else if (txttipoenferemedad == 12) {
            if (txtespecificartipoenfermedad == '') {
                new PNotify({
                    title: 'Error ESPECIFIQUE TIPO DE ENFERMEDAD: ',
                    text: 'Ingrese la especificacion.',
                    type: 'error'
                });
                b = 1;
            }
        }
    }
    var txtpadecidoenfermedadcronica = $('input[name=txtpadecidoenfermedadcronica]:checked', '#form_paso5').val();
    var txttipoenferemedadcronica = $('#txttipoenferemedadcronica').val();
    var txtespecificartipoenfermedadcronica = $('#txtespecificartipoenfermedadcronica').val();
    if (typeof txtpadecidoenfermedadcronica === 'undefined') {
        new PNotify({
            title: 'Error UD. PADECE ACTUALMENTE ALGUNA ENFERMEDA CRONICA: ',
            text: 'Seleccione una opcion Si o No.',
            type: 'error'
        });
        b = 1;
    } else if (txtpadecidoenfermedadcronica == 1) {
        if (txttipoenferemedadcronica == '') {
            new PNotify({
                title: 'Error INDIQUE QUE TIPO DE ENFERMEDAD CRONICA: ',
                text: 'Seleccione.',
                type: 'error'
            });
            c = 1;
        } else if (txttipoenferemedadcronica == 10) {
            if (txtespecificartipoenfermedadcronica == '') {
                new PNotify({
                    title: 'Error ESPECIFIQUE TIPO DE ENFERMEDAD CRONICA: ',
                    text: 'Ingrese la especificacion.',
                    type: 'error'
                });
                c = 1;
            }
        }
    }
    var txtpadecidoenfermedadinfecciosa = $('input[name=txtpadecidoenfermedadinfecciosa]:checked', '#form_paso5').val();
    var txttipoenferemedadinfecciosa = $('#txttipoenferemedadinfecciosa').val();
    var txtespecificartipoenfermedadinfecciosa = $('#txtespecificartipoenfermedadinfecciosa').val();
    if (typeof txtpadecidoenfermedadinfecciosa === 'undefined') {
        new PNotify({
            title: 'Error UD. PADECE ACTUALMENTE ALGUNA ENFERMEDA INFECCIOSA: ',
            text: 'Seleccione una opcion Si o No.',
            type: 'error'
        });
        d = 1;
    } else if (txtpadecidoenfermedadinfecciosa == 1) {
        if (txttipoenferemedadinfecciosa == '') {
            new PNotify({
                title: 'Error INDIQUE QUE TIPO DE ENFERMEDAD INFECCIOSA: ',
                text: 'Seleccione.',
                type: 'error'
            });
            d = 1;
        } else if (txttipoenferemedadinfecciosa == 6) {
            if (txtespecificartipoenfermedadinfecciosa == '') {
                new PNotify({
                    title: 'Error ESPECIFIQUE TIPO DE ENFERMEDAD INFECCIOSA: ',
                    text: 'Ingrese la especificacion.',
                    type: 'error'
                });
                d = 1;
            }
        }
    }
    var txtalergicomedicamento = $('input[name=txtalergicomedicamento]:checked', '#form_paso5').val();
    var txttipomedicamento = $('#txttipomedicamento').val();
    var txtespecificartipomedicamento = $('#txtespecificartipomedicamento').val();
    if (typeof txtalergicomedicamento === 'undefined') {
        new PNotify({
            title: 'Error UD. ALERGICO A ALGUN MEDICAMENTO: ',
            text: 'Seleccione una opcion Si o No.',
            type: 'error'
        });
        e = 1;
    } else if (txtalergicomedicamento == 1) {
        if (txttipomedicamento == '') {
            new PNotify({
                title: 'Error INDIQUE QUE TIPO DE MEDICAMENTO: ',
                text: 'Seleccione.',
                type: 'error'
            });
            e = 1;
        } else if (txttipomedicamento == 10) {
            if (txtespecificartipomedicamento == '') {
                new PNotify({
                    title: 'Error ESPECIFIQUE TIPO DE MEDICAMENTO: ',
                    text: 'Ingrese la especificacion.',
                    type: 'error'
                });
                e = 1;
            }
        }
    }
    var txtantecedentesquirurgicos = $('input[name=txtantecedentesquirurgicos]:checked', '#form_paso5').val();
    var txttipoantecedentesquirurgicos = $('#txttipoantecedentesquirurgicos').val();
    var txtespecifiquetipoantecedentesquirurgicos = $('#txtespecifiquetipoantecedentesquirurgicos').val();
    if (typeof txtantecedentesquirurgicos === 'undefined') {
        new PNotify({
            title: 'Error USTED TIENE ANTECEDENTES QUIRÚRGICO: ',
            text: 'Seleccione una opcion Si o No.',
            type: 'error'
        });
        f = 1;
    } else if (txtantecedentesquirurgicos == 1) {
        if (txttipoantecedentesquirurgicos == '') {
            new PNotify({
                title: 'Error INDIQUE QUE TIPO DE ANTECEDENTES QUIRÚRGICO: ',
                text: 'Seleccione.',
                type: 'error'
            });
            f = 1;
        } else if (txttipoantecedentesquirurgicos == 6) {
            if (txtespecifiquetipoantecedentesquirurgicos == '') {
                new PNotify({
                    title: 'Error ESPECIFIQUE TIPO DE ANTECEDENTES QUIRÚRGICO: ',
                    text: 'Ingrese la especificacion.',
                    type: 'error'
                });
                f = 1;
            }
        }
    }
    var txtenfermerdadfamiliar = $('input[name=txtenfermerdadfamiliar]:checked', '#form_paso5').val();
    var txttipoenferemedadfamiliar = $('#txttipoenferemedadfamiliar').val();
    var txttespecifiquetipoenfernedadfamiliar = $('#txttespecifiquetipoenfernedadfamiliar').val();
    if (typeof txtenfermerdadfamiliar === 'undefined') {
        new PNotify({
            title: 'Error USTED TIENE FAMILIAR QUE PADECE ALGUNA ENFERMEDAD: ',
            text: 'Seleccione una opcion Si o No.',
            type: 'error'
        });
        g = 1;
    } else if (txtenfermerdadfamiliar == 1) {
        if (txttipoenferemedadfamiliar == '') {
            new PNotify({
                title: 'Error INDIQUE QUE TIPO DE ENFERMEDAD PADECE EL FAMILIAR: ',
                text: 'Seleccione.',
                type: 'error'
            });
            g = 1;
        } else if (txttipoenferemedadfamiliar == 12) {
            if (txttespecifiquetipoenfernedadfamiliar == '') {
                new PNotify({
                    title: 'Error ESPECIFIQUE TIPO DE ENFERMEDAD PADECE EL FAMILIAR: ',
                    text: 'Ingrese la especificacion.',
                    type: 'error'
                });
                g = 1;
            }
        }
    }
    var txtpadecetipodiscapacidad = $('input[name=txtpadecetipodiscapacidad]:checked', '#form_paso5').val();
    var txtespecifiquetipodiscapacidad = $('#txtespecifiquetipodiscapacidad').val();
    if (typeof txtpadecetipodiscapacidad === 'undefined') {
        new PNotify({
            title: 'Error PADECE ALGUN TIPO DE DISCAPACIDAD: ',
            text: 'Seleccione una opcion Si o No.',
            type: 'error'
        });
        h = 1;
    } else if (txtpadecetipodiscapacidad == 1) {
        if (txtespecifiquetipodiscapacidad == '') {
            new PNotify({
                title: 'Error ESPECIFIQUE EL TIPO DE DISCAPACIDAD: ',
                text: 'Seleccione.',
                type: 'error'
            });
            h = 1;
        }
    }
    /*
    var txtactualidadgestando = $('input[name=txtactualidadgestando]:checked', '#form_paso5').val();
    var txtespecifiquefechamestruacion = $('#txtespecifiquefechamestruacion').val();
    var txtespecifiquefechaprobableparto = $('#txtespecifiquefechaprobableparto').val();
    if (typeof txtactualidadgestando === 'undefined') {
        new PNotify({
            title: 'Error PADECE ALGUN TIPO DE DISCAPACIDAD: ',
            text: 'Seleccione una opcion Si o No.',
            type: 'error'
        });
        i1 = 1;
    } else if (txtactualidadgestando == 1) {
        if (txtespecifiquefechamestruacion == '') {
            new PNotify({
                title: 'Error ESPECIFIQUE FECHA MESTRUACION: ',
                text: 'Seleccione.',
                type: 'error'
            });
            i1 = 1;
        }
        if (txtespecifiquefechaprobableparto == '') {
            new PNotify({
                title: 'Error ESPECIFIQUE FECHA DE PARTO: ',
                text: 'Seleccione.',
                type: 'error'
            });
            i2 = 1;
        }
    }*/
    var checkboxPS1 = $('input:checkbox[name="checkboxPS1"]:checked').val();
    var checkboxPS2 = $('input:checkbox[name="checkboxPS2"]:checked').val();
    var checkboxPS3 = $('input:checkbox[name="checkboxPS3"]:checked').val();
    var checkboxPS4 = $('input:checkbox[name="checkboxPS4"]:checked').val();
    var checkboxPS5 = $('input:checkbox[name="checkboxPS5"]:checked').val();
    var checkboxPS6 = $('input:checkbox[name="checkboxPS6"]:checked').val();
    var checkboxPS7 = $('input:checkbox[name="checkboxPS7"]:checked').val();
    var checkboxPS8 = $('input:checkbox[name="checkboxPS8"]:checked').val();
    var checkboxPS9 = $('input:checkbox[name="checkboxPS9"]:checked').val();
    var checkboxPS10 = $('input:checkbox[name="checkboxPS10"]:checked').val();
    var checkboxPS11 = $('input:checkbox[name="checkboxPS11"]:checked').val();
    var checkboxPS12 = $('input:checkbox[name="checkboxPS12"]:checked').val();
    var checkboxPS13 = $('input:checkbox[name="checkboxPS13"]:checked').val();
    console.log(checkboxPS12);
    console.log(checkboxPS13);
    var c1 = 0;
    var c2 = 0;
    var c3 = 0;
    var c4 = 0;
    var c5 = 0;
    var c6 = 0;
    var c7 = 0;
    var c8 = 0;
    var c9 = 0;
    var c10 = 0;
    var c11 = 0;
    var c12 = 0;
    var c13 = 0;
    if (checkboxPS1 == 1) {
        c1 = 1;
    }
    if (checkboxPS2 == 2) {
        c2 = 1;
    }
    if (checkboxPS3 == 3) {
        c3 = 1;
    }
    if (checkboxPS4 == 4) {
        c4 = 1;
    }
    if (checkboxPS5 == 5) {
        c5 = 1;
    }
    if (checkboxPS6 == 6) {
        c6 = 1;
    }
    if (checkboxPS7 == 7) {
        c7 = 1;
    }
    if (checkboxPS8 == 8) {
        c8 = 1;
    }
    if (checkboxPS9 == 9) {
        c9 = 1;
    }
    if (checkboxPS10 == 10) {
        c10 = 1;
    }
    if (checkboxPS11 == 11) {
        c11 = 1;
    }
    if (checkboxPS12 == 12) {
        c12 = 1;
    }
    if (checkboxPS13 == 13) {
        c13 = 1;
        console.log("CH13B");
        console.log(c13);
    }
    var ctotal = c1 + c2 + c3 + c4 + c5 + c6 + c7 + c8 + c9 + c10 + c11 + c12 + c13;
    console.log(ctotal);
    var txtespecifiqueproblemassociales = $('#txtespecifiqueproblemassociales').val();
    if (ctotal == 0) {
        new PNotify({
            title: 'Error PROBLEMAS SOCIALES QUE SE PRESENTAN EN SU FAMILIA: ',
            text: 'Selecione una opcion como minimo.',
            type: 'error'
        });
        i = 1;
        console.log("A");
    } else if (checkboxPS12 == 12) {
        if (txtespecifiqueproblemassociales == '') {
            new PNotify({
                title: 'Error ESPECIFIQUE QUE PROBLEMAS SOCIALES QUE SE PRESENTAN EN SU FAMILIA: ',
                text: 'Ingrese la especificacion.',
                type: 'error'
            });
            i = 1;
        }
    }
    var total = a + b + c + d + e + f + g + h + i;
    if (total == 0) {
        $.ajax({
            url: url,
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            complete: function(response) {}
        }).then(function(data) {
            if (data.success == true) {
                swal(data.message, "Hacer click!", "success");
                var forms = document.getElementById('form_paso5');
                forms.classList.remove('was-validated');
            } else {
                swal("Error", data.message, "warning");
            }
        });
    } else {
        return false;
    }
});
$(document).on('submit', '#form_paso6', function(event) {
    event.preventDefault();
    _token = $('#_token').val();
    urlbase = $("body").attr('urlbase');
    url = urlbase + "/procesos/ficha/paso6";
    var a = 0;
    var b = 0;
    var txtingenierealimentos = $('input[name=radioIA]:checked', '#form_paso6').val();
    var txtingenierealimentosespecificar = $('#txtingenierealimentosespecificar').val();
    if (typeof txtingenierealimentos === 'undefined') {
        new PNotify({
            title: 'Error DONDE INGIERE SSU ALIMENTOS: ',
            text: 'Seleccione el dobnde ingiere sus alimentos.',
            type: 'error'
        });
        a = 1;
    } else if (txtingenierealimentos == 4) {
        if (txtingenierealimentosespecificar == '') {
            new PNotify({
                title: 'Error ESPECIFIQUE: ',
                text: 'Seleccione el dobnde ingiere sus alimentos.',
                type: 'error'
            });
            b = 1;
        }
    }
    var total = a + b;
    if (total == 0) {
        $.ajax({
            url: url,
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            complete: function(response) {}
        }).then(function(data) {
            if (data.success == true) {
                swal(data.message, "Hacer click!", "success");
                var forms = document.getElementById('form_paso6');
                forms.classList.remove('was-validated');
            } else {
                swal("Error", data.message, "warning");
            }
        });
    } else {
        return false;
    }
});
$(document).on('submit', '#form_paso7', function(event) {
    event.preventDefault();
    _token = $('#_token').val();
    urlbase = $("body").attr('urlbase');
    url = urlbase + "/procesos/ficha/paso7";
    var a = 0;
    var b = 0;
    var c = 0;
    var d = 0;
    var e = 0;
    var txtreligion = $('#txtreligion').val();
    var txtespecificarreligion = $('#txtespecificarreligion').val();
    var txtpracticadisciplinadeportiva = $('#txtpracticadisciplinadeportiva').val();
    var txtpracticadisciplinaartistica = $('#txtpracticadisciplinaartistica').val();
    var txtratoslibres = $('#txtratoslibres').val();
    if (txtreligion === '') {
        new PNotify({
            title: 'Error RELGION QJUE PERTENECE: ',
            text: 'Seleccione el dobnde ingiere sus alimentos.',
            type: 'error'
        });
        a = 1;
    } else if (txtreligion == 4) {
        if (txtespecificarreligion == '') {
            new PNotify({
                title: 'Error ESPECIFIQUE: ',
                text: 'Ingrese la especificacion de que religion pertenece',
                type: 'error'
            });
            b = 1;
        }
    }
    if (txtpracticadisciplinadeportiva == '') {
        new PNotify({
            title: 'Error PRACTICA DISCIPLINA DEPORTIVA: ',
            text: 'Ingrese si practica alguna discipliba artistica.',
            type: 'error'
        });
        c = 1;
    }
    if (txtpracticadisciplinaartistica == '') {
        new PNotify({
            title: 'Error PRACTICA DISCIPLINA ARTISTICA: ',
            text: 'Ingrese si practica alguna discipliba artistica.',
            type: 'error'
        });
        d = 1;
    }
    if (txtratoslibres == '') {
        new PNotify({
            title: 'Error QUE SE DEDICA EN SUS RATOS LIBRES: ',
            text: 'Ingrese a que se dedica en sus ratos libres.',
            type: 'error'
        });
        e = 1;
    }
    var total = a + b + c + d + e;
    if (total == 0) {
        $.ajax({
            url: url,
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            complete: function(response) {}
        }).then(function(data) {
            if (data.success == true) {
                swal(data.message, "Hacer click!", "success");
                var forms = document.getElementById('form_paso7');
                forms.classList.remove('was-validated');
            } else {
                swal("Error", data.message, "warning");
            }
        });
    } else {
        return false;
    }
});
$(document).on('submit', '#form_paso8', function(event) {
    event.preventDefault();
    _token = $('#_token').val();
    urlbase = $("body").attr('urlbase');
    url = urlbase + "/procesos/ficha/paso8";
    var a = 0;
    var b = 0;
    var c = 0;
    var d = 0;
    var e = 0;
    var txtmediotransporte = $('#txtmediotransporte').val();
    var txtmediotransportespecifique = $('#txtmediotransportespecifique').val();
    var txttiempodemora = $('#txttiempodemora').val();
    var txtcuentacelular = $('input[name=txtcuentacelular]:checked', '#form_paso8').val();
    var txtpagoservicio = $('#txtpagoservicio').val();
    var txtbeneficiario = $('#txtbeneficiario').val();
    var txtespecifiquebeneficiario = $('#txtespecifiquebeneficiario').val();
    if (txtmediotransporte == '') {
        new PNotify({
            title: 'Error MEDIO DE TRANSPORTE: ',
            text: 'Seleccione el medio transporte.',
            type: 'error'
        });
        a = 1;
    } else if (txtmediotransporte == 6) {
        if (txtmediotransportespecifique == '') {
            new PNotify({
                title: 'Error ESPECIFIQUE EL MEDIO DE TRANSPORTE: ',
                text: 'Ingrese la especificacion del medio de transporte.',
                type: 'error'
            });
            a = 1;
        }
    }
    if (txttiempodemora == '') {
        new PNotify({
            title: 'Error TIEMPO DEMORA: ',
            text: 'Ingrese el tiempo que se demora en llegar a la universidad.',
            type: 'error'
        });
        b = 1;
    }
    if (typeof txtcuentacelular === 'undefined') {
        new PNotify({
            title: 'Error CUENTA CON CELULAR: ',
            text: 'Seleccione una opcion SI o NO.',
            type: 'error'
        });
        c = 1;
    } else if (txtcuentacelular == 1) {
        if (txtpagoservicio == '') {
            new PNotify({
                title: 'Error PAGO POR SERVICIO: ',
                text: 'Ingrese el monto que paga.',
                type: 'error'
            });
            c = 1;
        }
    }
    if (txtbeneficiario == '') {
        new PNotify({
            title: 'Error BENEFECIARIO DE ALGUN PROGRAMA: ',
            text: 'Seleccione una opcion SI o NO.',
            type: 'error'
        });
        d = 1;
    } else if (txtbeneficiario == 6) {
        if (txtespecifiquebeneficiario == '') {
            new PNotify({
                title: 'Error ESPECIFIQUE: ',
                text: 'Ingrese la especificacion.',
                type: 'error'
            });
            d = 1;
        }
    }
    var total = a + b + c + d + e;
    if (total == 0) {
        $.ajax({
            url: url,
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            complete: function(response) {}
        }).then(function(data) {
            if (data.success == true) {
                swal(data.message, "Hacer click!", "success");
                var forms = document.getElementById('form_paso8');
                forms.classList.remove('was-validated');
            } else {
                swal("Error", data.message, "warning");
            }
        });
    } else {
        return false;
    }
});
$(document).on('submit', '#form_paso9', function(event) {
    event.preventDefault();
    _token = $('#_token').val();
    urlbase = $("body").attr('urlbase');
    url = urlbase + "/procesos/ficha/paso9";
    var a = 0;
    var b = 0;
    var c = 0;
    var d = 0;
    var e = 0;
    var f = 0;
    var g = 0;
    var h = 0;
    var i = 0;
    var txtcondicionestudiante = $('#txtcondicionestudiante').val();
    var txtpromedioponderado = $('#txtpromedioponderado').val();
    var txtcursosdesaprobados = $('#txtcursosdesaprobados').val();
    var txtestudiaotrauniversidad = $('input[name=txtestudiaotrauniversidad]:checked', '#form_paso9').val();
    var txtespecifiqueotrauniversidad = $('#txtespecifiqueotrauniversidad').val();
    var txtotrosestudios = $('input[name=txtotrosestudios]:checked', '#form_paso9').val();
    var txtespecifiqueotrosestudios = $('#txtespecifiqueotrosestudios').val();
    var txtmotivoeligiounab = $('#txtmotivoeligiounab').val();
    var txtmotivoeligioprofesion = $('#txtmotivoeligioprofesion').val();
    var txtabandono = $('#txtabandono').val();
    var txtimplementaruniversidad = $('#txtimplementaruniversidad').val();
    if (txtcondicionestudiante == '') {
        new PNotify({
            title: 'Error CONDICION ESTUDIANTE: ',
            text: 'Seleccione la condiion del estudiante.',
            type: 'error'
        });
        a = 1;
    }
    if (txtpromedioponderado == '') {
        new PNotify({
            title: 'Error PROMEDIO PONDERADO: ',
            text: 'Ingrese el promedio ponderado.',
            type: 'error'
        });
        b = 1;
    }
    if (txtcursosdesaprobados == '') {
        new PNotify({
            title: 'Error CURSOS DESAPROBADOS: ',
            text: 'Ingrese el total de cursos desaprobados.',
            type: 'error'
        });
        c = 1;
    }
    if (typeof txtestudiaotrauniversidad === 'undefined') {
        new PNotify({
            title: 'Error ESTUDIA OTRA UNIVERSIDAD: ',
            text: 'Seleccione una opcion SI o NO.',
            type: 'error'
        });
        d = 1;
    } else if (txtestudiaotrauniversidad == 1) {
        if (txtespecifiqueotrauniversidad == '') {
            new PNotify({
                title: 'Error ESPECIFIQUE OTRA UNIVERSIDAD: ',
                text: 'Ingrese la especificacion.',
                type: 'error'
            });
            d = 1;
        }
    }
    if (typeof txtotrosestudios === 'undefined') {
        new PNotify({
            title: 'Error SIGUE OTROS ESTUDIOS: ',
            text: 'Seleccione una opcion Si o No.',
            type: 'error'
        });
        e = 1;
    } else if (txtotrosestudios == 1) {
        if (txtespecifiqueotrosestudios == '') {
            new PNotify({
                title: 'Error ESPECIFIQUE OTROS ESTUDIOS: ',
                text: 'Ingrese la especificaci.',
                type: 'error'
            });
            e = 1;
        }
    }
    if (txtmotivoeligiounab == '') {
        new PNotify({
            title: 'Error PRINCIPAL MOTIVO POR EL QUE ELIGIO LA UNAB: ',
            text: 'Ingrese el motivo.',
            type: 'error'
        });
        f = 1;
    }
    if (txtmotivoeligioprofesion == '') {
        new PNotify({
            title: 'Error PRINCIPAL MOTIVO POR EL QUE ELIGIO LA PROFESION QUE ESTUDIA: ',
            text: 'Ingrese el motivo.',
            type: 'error'
        });
        g = 1;
    }
    if (txtabandono == '') {
        new PNotify({
            title: 'Error ABADONO SUS ESTUDIOS UNIVERSITARIOS: ',
            text: 'Ingrese el motivo.',
            type: 'error'
        });
        h = 1;
    }
    if (txtimplementaruniversidad == '') {
        new PNotify({
            title: 'Error QUE DEBERIA IMPLEMENTAR LA UNIVERSIDAD: ',
            text: 'Ingrese el motivo.',
            type: 'error'
        });
        i = 1;
    }
    var total = a + b + c + d + e + f + g + h + i;
    if (total == 0) {
        swal({
            title: "AVISO",
            text: "Desea finalizar la ficha socioeconomica?",
            icon: "info",
            buttons: true,
            dangerMode: true,
            buttons: ["Cancelar", "Finalizar"],
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    complete: function(response) {}
                }).then(function(data) {
                    console.log('1');
                    if (data.success == false) {
                        swal("Error", data.messagea + '---' + data.messageb + '---,' + data.messagec + '---' + data.messaged + '---' + data.messagee + '---' + data.messagef + '---' + data.messageg + '---' + data.messageh, "warning");
                        return false;
                    }
                    swal("Finalizo corretamente la ficha socioeconomica!", {
                        icon: "success",
                    });
                    window.location.replace(urlbase + '/procesos/ficha');
                });
            } else {
                swal("Cancelo la finalizacion de su ficha socioeconomica!", {
                    icon: "error",
                });
            }
        });
    } else {
        return false;
    }
});

function calcularEdad() {
    var fechaseleccionada = document.getElementById("txtfechanacimiento").value;
    var hoy = new Date();
    var cumpleanos = new Date(fechaseleccionada);
    var edad = hoy.getFullYear() - cumpleanos.getFullYear();
    var m = hoy.getMonth() - cumpleanos.getMonth();
    if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
        edad--;
    }
    $('#txtedad').val(edad);
}

function habilitarEspecificarIdioma() {
    var txtidiomamaterna = $('#txtidiomamaterna').val();
    if (txtidiomamaterna == 9) {
        document.getElementById('txtidiomamaternaespecificar').readOnly = false;
    } else if (txtidiomamaterna == 11) {
        document.getElementById('txtidiomamaternaespecificar').readOnly = false;
    } else {
        document.getElementById('txtidiomamaternaespecificar').readOnly = true;
        var txtidiomamaterna = $('#txtidiomamaternaespecificar').val('');
    }
}

function habilitarEspecificarTipoColegio() {
    var txtidiomamaterna = $('#txttipocolegio').val();
    if (txtidiomamaterna == 5) {
        document.getElementById('txttipocolegioespecificar').readOnly = false;
    } else {
        document.getElementById('txttipocolegioespecificar').readOnly = true;
        var txtidiomamaterna = $('#txtidiomamaternaespecificar').val('');
    }
}

function habilitarEspecificarIngiereAlimentos() {
    var txtingenierealimentosespecificar = $('input[name=radioIA]:checked', '#form_paso6').val();
    if (txtingenierealimentosespecificar == 4) {
        document.getElementById('txtingenierealimentosespecificar').readOnly = false;
    } else {
        document.getElementById('txtingenierealimentosespecificar').readOnly = true;
        var txtingenierealimentosespecificar = $('#txtingenierealimentosespecificar').val('');
    }
}

function habilitarEspecificarReligion() {
    var txtreligion = $('#txtreligion').val();
    if (txtreligion == 4) {
        document.getElementById('txtespecificarreligion').readOnly = false;
    } else {
        document.getElementById('txtespecificarreligion').readOnly = true;
        var txtreligion = $('#txtespecificarreligion').val('');
    }
}

function habilitarEspecificarMedioTransporte() {
    var txtreligion = $('#txtmediotransporte').val();
    if (txtreligion == 6) {
        document.getElementById('txtmediotransportespecifique').readOnly = false;
    } else {
        document.getElementById('txtmediotransportespecifique').readOnly = true;
        var txtreligion = $('#txtmediotransportespecifique').val('');
    }
}

function habilitarCuentacelularNo() {
    var txtcuentacelular = $('input[name=txtcuentacelular]:checked', '#form_paso8').val();
    if (txtcuentacelular == 1) {
        document.getElementById('txtpagoservicio').readOnly = false;
    } else {
        document.getElementById('txtpagoservicio').readOnly = true;
        var txtcuentacelular = $('#txtpagoservicio').val('');
    }
}

function habilitarBenefeciariorNo() {
    var txtbeneficiario = $('#txtbeneficiario').val();
    if (txtbeneficiario == 6) {
        document.getElementById('txtespecifiquebeneficiario').readOnly = false;
    } else {
        document.getElementById('txtespecifiquebeneficiario').readOnly = true;
        var txtbeneficiario = $('#txtespecifiquebeneficiario').val('');
    }
}

function habilitarEstudiaUnviversidadNo() {
    var txtestudiaotrauniversidad = $('input[name=txtestudiaotrauniversidad]:checked', '#form_paso9').val();
    if (txtestudiaotrauniversidad == 1) {
        document.getElementById('txtespecifiqueotrauniversidad').readOnly = false;
    } else {
        document.getElementById('txtespecifiqueotrauniversidad').readOnly = true;
        var txtestudiaotrauniversidad = $('#txtespecifiqueotrauniversidad').val('');
    }
}

function habilitarOtrosEstudiosNo() {
    var txtotrosestudios = $('input[name=txtotrosestudios]:checked', '#form_paso9').val();
    if (txtotrosestudios == 1) {
        document.getElementById('txtespecifiqueotrosestudios').readOnly = false;
    } else {
        document.getElementById('txtespecifiqueotrosestudios').readOnly = true;
        var txtbeneficiario = $('#txtespecifiqueotrosestudios').val('');
    }
}

function habilitarEspecificarLocalizacion() {
    var txtlocalizacion = $('#txtlocalizacion').val();
    if (txtlocalizacion == 4) {
        document.getElementById('txtespecificarlocalizacion').readOnly = false;
    } else {
        document.getElementById('txtespecificarlocalizacion').readOnly = true;
        var txtlocalizacion = $('#txtespecificarlocalizacion').val('');
    }
}

function habilitarEspecificarvivienda() {
    var txtlocalizacion = $('#txtvivienda').val();
    if (txtlocalizacion == 7) {
        document.getElementById('txtespecificarvivienda').readOnly = false;
    } else {
        document.getElementById('txtespecificarvivienda').readOnly = true;
        var txtlocalizacion = $('#txtespecificarvivienda').val('');
    }
}

function habilitarTipoEnfermedadSI() {
    var txtpadecidoenfermedad = $('input[name=txtpadecidoenfermedad]:checked', '#form_paso5').val();
    if (txtpadecidoenfermedad == 1) {
        document.getElementById('txttipoenferemedad').disabled = false;
    } else {
        document.getElementById('txttipoenferemedad').disabled = true;
        var txttipoenferemedad = $('#txttipoenferemedad').val('');
        document.getElementById('txtespecificartipoenfermedad').readOnly = true;
        var txtespecificartipoenfermedad = $('#txtespecificartipoenfermedad').val('');
    }
}

function habilitarTipoEnfermedadEspecifique() {
    var txttipoenferemedad = $('#txttipoenferemedad').val();
    if (txttipoenferemedad == 12) {
        document.getElementById('txtespecificartipoenfermedad').readOnly = false;
    } else {
        document.getElementById('txtespecificartipoenfermedad').readOnly = true;
        var txtlocalizacion = $('#txtespecificartipoenfermedad').val('');
    }
}

function habilitarTipoEnfermedadCronicaSI() {
    var txtpadecidoenfermedadcronica = $('input[name=txtpadecidoenfermedadcronica]:checked', '#form_paso5').val();
    if (txtpadecidoenfermedadcronica == 1) {
        document.getElementById('txttipoenferemedadcronica').disabled = false;
    } else {
        document.getElementById('txttipoenferemedadcronica').disabled = true;
        var txttipoenferemedadcronica = $('#txttipoenferemedadcronica').val('');
        document.getElementById('txtespecificartipoenfermedadcronica').readOnly = true;
        var txtespecificartipoenfermedadcronica = $('#txtespecificartipoenfermedadcronica').val('');
    }
}

function habilitarTipoEnfermedadCronicaEspecifique() {
    var txttipoenferemedadcronica = $('#txttipoenferemedadcronica').val();
    if (txttipoenferemedadcronica == 10) {
        document.getElementById('txtespecificartipoenfermedadcronica').readOnly = false;
    } else {
        document.getElementById('txtespecificartipoenfermedadcronica').readOnly = true;
        var txtlocalizacion = $('#txtespecificartipoenfermedadcronica').val('');
    }
}

function habilitarTipoEnfermedadInfecciosaSI() {
    var txtpadecidoenfermedadinfecciosa = $('input[name=txtpadecidoenfermedadinfecciosa]:checked', '#form_paso5').val();
    if (txtpadecidoenfermedadinfecciosa == 1) {
        document.getElementById('txttipoenferemedadinfecciosa').disabled = false;
    } else {
        document.getElementById('txttipoenferemedadinfecciosa').disabled = true;
        var txttipoenferemedadinfecciosa = $('#txttipoenferemedadinfecciosa').val('');
        document.getElementById('txtespecificartipoenfermedadinfecciosa').readOnly = true;
        var txtespecificartipoenfermedadinfecciosa = $('#txtespecificartipoenfermedadinfecciosa').val('');
    }
}

function habilitarTipoEnfermedadInfecciosaEspecifique() {
    var txttipoenferemedadinfecciosa = $('#txttipoenferemedadinfecciosa').val();
    if (txttipoenferemedadinfecciosa == 6) {
        document.getElementById('txtespecificartipoenfermedadinfecciosa').readOnly = false;
    } else {
        document.getElementById('txtespecificartipoenfermedadinfecciosa').readOnly = true;
        var txtlocalizacion = $('#txtespecificartipoenfermedadinfecciosa').val('');
    }
}

function habilitarMedicamentoSI() {
    var txtalergicomedicamento = $('input[name=txtalergicomedicamento]:checked', '#form_paso5').val();
    if (txtalergicomedicamento == 1) {
        document.getElementById('txttipomedicamento').disabled = false;
    } else {
        document.getElementById('txttipomedicamento').disabled = true;
        var txttipomedicamento = $('#txttipomedicamento').val('');
        document.getElementById('txtespecificartipomedicamento').readOnly = true;
        var txtespecificartipomedicamento = $('#txtespecificartipomedicamento').val('');
    }
}

function habilitarMedicamentoEspecifique() {
    var txttipomedicamento = $('#txttipomedicamento').val();
    if (txttipomedicamento == 10) {
        document.getElementById('txtespecificartipomedicamento').readOnly = false;
    } else {
        document.getElementById('txtespecificartipomedicamento').readOnly = true;
        var txtespecificartipomedicamento = $('#txtespecificartipomedicamento').val('');
    }
}

function habilitAntecedentesQuirurgicosSI() {
    var txtantecedentesquirurgicos = $('input[name=txtantecedentesquirurgicos]:checked', '#form_paso5').val();
    if (txtantecedentesquirurgicos == 1) {
        document.getElementById('txttipoantecedentesquirurgicos').disabled = false;
    } else {
        document.getElementById('txttipoantecedentesquirurgicos').disabled = true;
        var txttipoantecedentesquirurgicos = $('#txttipoantecedentesquirurgicos').val('');
        document.getElementById('txtespecifiquetipoantecedentesquirurgicos').readOnly = true;
        var txtespecifiquetipoantecedentesquirurgicos = $('#txtespecifiquetipoantecedentesquirurgicos').val('');
    }
}

function habilitarAntecedentesQuirurgicosEspecifique() {
    var txttipoantecedentesquirurgicos = $('#txttipoantecedentesquirurgicos').val();
    if (txttipoantecedentesquirurgicos == 6) {
        document.getElementById('txtespecifiquetipoantecedentesquirurgicos').readOnly = false;
    } else {
        document.getElementById('txtespecifiquetipoantecedentesquirurgicos').readOnly = true;
        var txtespecifiquetipoantecedentesquirurgicos = $('#txtespecifiquetipoantecedentesquirurgicos').val('');
    }
}

function habilitEnfermedadFamiliarSI() {
    var txtenfermerdadfamiliar = $('input[name=txtenfermerdadfamiliar]:checked', '#form_paso5').val();
    if (txtenfermerdadfamiliar == 1) {
        document.getElementById('txttipoenferemedadfamiliar').disabled = false;
    } else {
        document.getElementById('txttipoenferemedadfamiliar').disabled = true;
        var txttipoenferemedadfamiliar = $('#txttipoenferemedadfamiliar').val('');
        document.getElementById('txttespecifiquetipoenfernedadfamiliar').readOnly = true;
        var txttespecifiquetipoenfernedadfamiliar = $('#txttespecifiquetipoenfernedadfamiliar').val('');
    }
}

function habilitEnfermedadFamiliarEspecifique() {
    var txttipoenferemedadfamiliar = $('#txttipoenferemedadfamiliar').val();
    if (txttipoenferemedadfamiliar == 12) {
        document.getElementById('txttespecifiquetipoenfernedadfamiliar').readOnly = false;
    } else {
        document.getElementById('txttespecifiquetipoenfernedadfamiliar').readOnly = true;
        var txttespecifiquetipoenfernedadfamiliar = $('#txttespecifiquetipoenfernedadfamiliar').val('');
    }
}

function habilitarTipoDiscapacidadSI() {
    var txtpadecetipodiscapacidad = $('input[name=txtpadecetipodiscapacidad]:checked', '#form_paso5').val();
    if (txtpadecetipodiscapacidad == 1) {
        document.getElementById('txtespecifiquetipodiscapacidad').readOnly = false;
    } else {
        document.getElementById('txtespecifiquetipodiscapacidad').readOnly = true;
        var txtespecifiquetipodiscapacidad = $('#txtespecifiquetipodiscapacidad').val('');
    }
}

function habilitarActualidadGestandoSI() {
    var txtactualidadgestando = $('input[name=txtactualidadgestando]:checked', '#form_paso5').val();
    if (txtactualidadgestando == 1) {
        document.getElementById('txtespecifiquefechamestruacion').disabled = false;
        document.getElementById('txtespecifiquefechaprobableparto').disabled = false;
    } else {
        document.getElementById('txtespecifiquefechamestruacion').disabled = true;
        document.getElementById('txtespecifiquefechaprobableparto').disabled = true;
        var txtespecifiquefechamestruacion = $('#txtespecifiquefechamestruacion').val('');
        var txtespecifiquefechaprobableparto = $('#txtespecifiquefechaprobableparto').val('');
    }
}

function habilitarSexoFemenino() {
    var radioSexo = $('input[name=radioSexo]:checked', '#form_paso1').val();
    if (radioSexo == 1) {
        document.getElementById('txtactualidadgestando1').disabled = true;
        document.getElementById('txtactualidadgestando2').disabled = true;
        document.getElementById('txtespecifiquefechamestruacion').disabled = true;
        document.getElementById('txtespecifiquefechaprobableparto').disabled = true;
    } else {
        document.getElementById('txtactualidadgestando1').disabled = false;
        document.getElementById('txtactualidadgestando2').disabled = false;
    }
}

function habilitarUstedTrabajaSI() {
    var txttrabaja = $('input[name=txttrabaja]:checked', '#form_paso4').val();
    if (txttrabaja == 1) {
        document.getElementById('txtcondicionlaboral').disabled = false;
        document.getElementById('txtespcifiquecondicionlaboral').disabled = false;
    } else {
        document.getElementById('txtcondicionlaboral').disabled = true;
        document.getElementById('txtespcifiquecondicionlaboral').disabled = true;
        var txtcondicionlaboral = $('#txtcondicionlaboral').val('');
        var txtespcifiquecondicionlaboral = $('#txtespcifiquecondicionlaboral').val('');
    }
}

function habilitCondicionLaboralEspecifique() {
    var txtcondicionlaboral = $('#txtcondicionlaboral').val();
    if (txtcondicionlaboral == 5) {
        document.getElementById('txtespcifiquecondicionlaboral').readOnly = false;
    } else {
        document.getElementById('txtespcifiquecondicionlaboral').readOnly = true;
        var txtespcifiquecondicionlaboral = $('#txtespcifiquecondicionlaboral').val('');
    }
}

function habilitFinaciaestudiosEspecifique() {
    var txtfinanciaestudios = $('#txtfinanciaestudios').val();
    if (txtfinanciaestudios == 5) {
        document.getElementById('txtespeicfiquefinanciaestudios').readOnly = false;
    } else {
        document.getElementById('txtespeicfiquefinanciaestudios').readOnly = true;
        var txtespeicfiquefinanciaestudios = $('#txtespeicfiquefinanciaestudios').val('');
    }
}

function deshabilitarHogar() {
    var txtcheckedvivienda = $('input:checkbox[name="checkboxHogar12"]:checked').val();
    if (txtcheckedvivienda == 12) {
        $('input:checkbox[name="checkboxHogar1"]').prop('checked', false);
        $('input:checkbox[name="checkboxHogar2"]').prop('checked', false);
        $('input:checkbox[name="checkboxHogar3"]').prop('checked', false);
        $('input:checkbox[name="checkboxHogar4"]').prop('checked', false);
        $('input:checkbox[name="checkboxHogar5"]').prop('checked', false);
        $('input:checkbox[name="checkboxHogar6"]').prop('checked', false);
        $('input:checkbox[name="checkboxHogar7"]').prop('checked', false);
        $('input:checkbox[name="checkboxHogar8"]').prop('checked', false);
        $('input:checkbox[name="checkboxHogar9"]').prop('checked', false);
        $('input:checkbox[name="checkboxHogar10"]').prop('checked', false);
        $('input:checkbox[name="checkboxHogar11"]').prop('checked', false);
    }
}

function deshabilitarOtrosProblemasSociales() {
    var txtcheckedvivienda = $('input:checkbox[name="checkboxPS12"]:checked').val();
    var txtcheckedviviendaN = $('input:checkbox[name="checkboxPS13"]:checked').val();
    console.log(txtcheckedviviendaN);
    if (txtcheckedvivienda == 12) {
        $('input:checkbox[name="checkboxPS1"]').prop('checked', false);
        $('input:checkbox[name="checkboxPS2"]').prop('checked', false);
        $('input:checkbox[name="checkboxPS3"]').prop('checked', false);
        $('input:checkbox[name="checkboxPS4"]').prop('checked', false);
        $('input:checkbox[name="checkboxPS5"]').prop('checked', false);
        $('input:checkbox[name="checkboxPS6"]').prop('checked', false);
        $('input:checkbox[name="checkboxPS7"]').prop('checked', false);
        $('input:checkbox[name="checkboxPS8"]').prop('checked', false);
        $('input:checkbox[name="checkboxPS9"]').prop('checked', false);
        $('input:checkbox[name="checkboxPS10"]').prop('checked', false);
        $('input:checkbox[name="checkboxPS11"]').prop('checked', false);
        $('input:checkbox[name="checkboxPS13"]').prop('checked', false);
        document.getElementById('txtespecifiqueproblemassociales').readOnly = false;
    } else {
        document.getElementById('txtespecifiqueproblemassociales').readOnly = true;
        var txtespecifiqueproblemassociales = $('#txtespecifiqueproblemassociales').val('');
    }
    if (txtcheckedviviendaN == 13) {
      $('input:checkbox[name="checkboxPS1"]').prop('checked', false);
      $('input:checkbox[name="checkboxPS2"]').prop('checked', false);
      $('input:checkbox[name="checkboxPS3"]').prop('checked', false);
      $('input:checkbox[name="checkboxPS4"]').prop('checked', false);
      $('input:checkbox[name="checkboxPS5"]').prop('checked', false);
      $('input:checkbox[name="checkboxPS6"]').prop('checked', false);
      $('input:checkbox[name="checkboxPS7"]').prop('checked', false);
      $('input:checkbox[name="checkboxPS8"]').prop('checked', false);
      $('input:checkbox[name="checkboxPS9"]').prop('checked', false);
      $('input:checkbox[name="checkboxPS10"]').prop('checked', false);
      $('input:checkbox[name="checkboxPS11"]').prop('checked', false);
      $('input:checkbox[name="checkboxPS12"]').prop('checked', false);
      document.getElementById('txtespecifiqueproblemassociales').readOnly = true;
    } else {
        document.getElementById('txtespecifiqueproblemassociales').readOnly = true;
        var txtespecifiqueproblemassociales = $('#txtespecifiqueproblemassociales').val('');
    }
}

function validarEmail(valor) {
    emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    if (emailRegex.test(valor)) {
        return 1;
    } else {
        return 2;
    }
}
var ModalEffects = (function() {
    function init() {
        var overlay = document.querySelector('.md-overlay');
        [].slice.call(document.querySelectorAll('.md-trigger')).forEach(function(el, i) {
            var el2 = document.getElementById("modaldatasituacionfamiliar");
            var modal = document.querySelector('#' + el2.getAttribute('data-modal')),
                close = modal.querySelector('.md-close');

            function removeModal(hasPerspective) {
                classie.remove(modal, 'md-show');
                $('body').removeClass(el2.getAttribute('data-modal'));
                if (hasPerspective) {
                    classie.remove(document.documentElement, 'md-perspective');
                }
            }

            function removeModalHandler() {
                removeModal(classie.has(el2, 'md-setperspective'));
            }
            el2.addEventListener('click', function(ev) {
                classie.add(modal, 'md-show');
                $('body').addClass(el2.getAttribute('data-modal'));
                if (classie.has(el2, 'md-setperspective')) {
                    setTimeout(function() {
                        classie.add(document.documentElement, 'md-perspective');
                    }, 25);
                }
            });
            close.addEventListener('click', function(ev) {
                ev.stopPropagation();
                removeModalHandler();
            });
        });
    }
    init();
})();
