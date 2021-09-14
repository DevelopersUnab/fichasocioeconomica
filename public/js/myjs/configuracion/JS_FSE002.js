$urlbase = $("body").attr('urlbase');
$tipo = $("#tipobusqueda");
$txtcodigoparametro2 = $("#txtcodigoparametro2");
var fecha = new Date();
var mes = fecha.getMonth() + 1;
var dia = fecha.getDate();
var ano = fecha.getFullYear();
if (dia < 10) dia = '0' + dia;
if (mes < 10) mes = '0' + mes
$('#txtfechainicio').val(ano + "-" + mes + "-" + dia);
$('#txtfechafin').val(ano + "-" + mes + "-" + dia);
var obtener_data_editar = function(tbody, dataTable) {
    $(tbody).on("click", "button.editar", function() {
        var data = dataTable.row($(this).parents("tr")).data();
        if (typeof(data) === "undefined") {} else {
            var estado = data.ESTADO;
            if (estado == 3) {
                limpiar();
                $("#alertDanger").show(0).delay(4000).hide(0);
                $("#mensajeDanger").text('Ya esta anulado este registro no se puede modificar.');
                $('#myModalEliminar').modal('hide');
                return false;
            } else {
                var txtcodigoparametrodetalle = $('#txtcodigoparametrodetalle').val(data.CODIGOPARAMETRODETALLE);
                var select3 = document.getElementById("txtcodigoparametro");
                select3.options.length = 0;
                select3.options[select3.options.length] = new Option('Buscar', '');
                select3.options[select3.options.length] = new Option(data.DESCRIPCIONPARAMETRO, data.CODIGOPARAMETRO);
                var txtcodigo = $('#txtcodigoparametro').val(data.CODIGOPARAMETRO);
                var txtnombre = $('#txtnombre').val(data.DESCRIPCION);
                var txtpuntuacion = $('#txtpuntuacion').val(data.PUNTUACION);
                var txtfechainicio = $('#txtfechainicio').val(data.FECHAINICIO);
                var txtfechafin = $('#txtfechafin').val(data.FECHAFIN);
                var txtestado = $('#txtestado').val(data.ESTADO);
            }
            document.getElementById('modaldataparametro').disabled = true;
        }
    });
}
var obtener_data_eliminar = function(tbody, dataTable) {
    $(tbody).on("click", "button.eliminar", function() {	
        var data = dataTable.row($(this).parents("tr")).data();
        if (typeof(data) === "undefined") {} else {
            var txtcodigoE = $('#txtcodigoE').val(data.CODIGOPARAMETRODETALLE);
            var txtcodigoparametroE = $('#txtcodigoparametroE').val(data.CODIGOPARAMETRO);
            var txtnombreparametroE = $('#txtnombreparametroE').val(data.DESCRIPCIONPARAMETRO);
            var txtnombre = $('#txtnombreE').val(data.DESCRIPCION);
            var estado = data.ESTADO;
            if (estado == 3) {
                $("#alertDanger").show(0).delay(4000).hide(0);
                $("#mensajeDanger").text('Ya esta anulado este registro no se puede eliminar.');
                $('#myModalEliminar').modal('hide');
                return false;
            }
        }
    });
}
var obtener_data_parametro = function(tbody, dataTable) {
    $(tbody).on("click", "button.btnseleccionarUsuario", function(ev) {
        var data = dataTable.row($(this).parents("tr")).data();
        var select = document.getElementById("txtcodigoparametro");
        select.options.length = 0;
        select.options[select.options.length] = new Option('Buscar', '');
        select.options[select.options.length] = new Option(data.DESCRIPCION, data.CODIGOPARAMETRO);
        var txtcodigorol = $('#txtcodigoparametro').val(data.CODIGOPARAMETRO);
        var el2 = document.getElementById("modaldataparametro");
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
        ev.stopPropagation();
        removeModalHandler();
    });
}
var obtener_data_parametro2 = function(tbody, dataTable) {
    $(tbody).on("click", "button.btnseleccionarUsuario", function(ev) {
        var data = dataTable.row($(this).parents("tr")).data();
        var select = document.getElementById("txtcodigoparametro2");
        select.options.length = 0;
        select.options[select.options.length] = new Option('Buscar', '');
        select.options[select.options.length] = new Option(data.DESCRIPCION, data.CODIGOPARAMETRO);
        var txtcodigorol = $('#txtcodigoparametro2').val(data.CODIGOPARAMETRO);
        var el2 = document.getElementById("modaldataparametro2");
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
        ev.stopPropagation();
        removeModalHandler();
        consultar();
    });
}
$(document).ready(function() {
    consultar();
    listarParametros();
    listarParametros2();
});

function limpiar() {
    $('#txtcodigoparametrodetalle').val('');
    $('#txtnombre').val('');
    $('#txtpuntuacion').val('');
    $('#txtfechainicio').val(ano + "-" + mes + "-" + dia);
    $('#txtfechafin').val(ano + "-" + mes + "-" + dia);
    $('#txtestado').val('');
    var forms = document.getElementById('user_form');
    forms.classList.remove('was-validated');
    document.getElementById('btnGuardarDatos').disabled = false;
    document.getElementById('modaldataparametro').disabled = false;
    var select = document.getElementById("txtcodigoparametro");
    select.options.length = 0;
    select.options[select.options.length] = new Option('Buscar', '');
}

function consultar() {
    $('#btnNuevo').click(function() {
        limpiar();
    });
    $mensaje = getMessage();
    $("#message").html($mensaje);
    var dataTable = $('#res-config').DataTable({
        "destroy": true,
        "order": [
            [0, "desc"]
        ],
        "ajax": {
            url: "listarParametrosDetalle",
            type: "POST",
            data: {
                txtcodigoparametro2: $txtcodigoparametro2.val()
            }
        },
        "columns": [{
            "title": "EDITAR",
            "render": function(data, type, row) {
                return "<center><button data-toggle='modal' data-target='#myModalVentana' type='button' class='editar btn btn-warning'><span class='feather icon-edit'></span></button></center>"
            },
            "width": 5
        }, {
            "title": "ELIMINAR",
            "render": function(data, type, row) {
                return "<center><button type='button' class='eliminar btn btn-danger' data-toggle='modal' data-target='#myModalEliminar'><span class='feather icon-trash-2'></span></button></center>"
            },
            "width": 5
        }, {
            "title": "CODIGO",
            "data": "CODIGOPARAMETRODETALLE",
            "width": 5
        }, {
            "title": "PARAMETRO",
            "data": "DESCRIPCIONPARAMETRO",
            "width": 5
        }, {
            "title": "CODIGOPARAMETRO",
            "data": "CODIGOPARAMETRO",
            "width": 5,
            "visible": false
        }, {
            "title": "DESCRIPCION",
            "data": "DESCRIPCION",
            "width": 5
        }, {
            "title": "PUNTUACION",
            "data": "PUNTUACION",
            "width": 5
        }, {
            "title": "FECHA INICIO",
            "data": "FECHAINICIO",
            "width": 80
        }, {
            "title": "FECHA FIN",
            "data": "FECHAFIN",
            "width": 80
        }, {
            "title": "ESTADO",
            "data": "DESCRIPCIONESTADO",
            "width": 80
        }, {
            "title": "ESTADO",
            "data": "ESTADO",
            "width": 80,
            "visible": false
        }],
        dom: 'Bfrtip',
        buttons: [{
            extend: 'excel',
            messageTop: $mensaje,
            footer: true,
            exportOptions: {
                columns: [3, 5, 6]
            }
        }, {
            extend: 'pdfHtml5',
            messageTop: $mensaje,
            footer: true,
            exportOptions: {
                columns: [3, 5, 6]
            },
            customize: function(doc) {
                doc.content.splice(1, 0, {
                    margin: [0, 0, 0, 12],
                    title: 's',
                    alignment: 'center',
                    image: 'data:image/jpeg;base64,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'
                });
            }
        }, {
            extend: 'print',
            messageTop: $mensaje,
            footer: true,
            exportOptions: {
                columns: [3, 5, 6]
            },
            customize: function(win) {
                $(win.document.body).css('font-size', '7pt').css('text-align', 'center');
                $(win.document.body).find('table').addClass('compact').css('font-size', 'inherit');
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
    });
    obtener_data_editar("#res-config tbody", dataTable);
    obtener_data_eliminar("#res-config tbody", dataTable);
    $(document).on('click', '#btnResfrecar', function() {
        dataTable.ajax.reload();
    });
}
$(document).on('click', '#btnEliminarE', function() {
    _token = $('#_token').val();
    txtcodigo = $('#txtcodigoE').val();
    txtcodigoparametroE = $('#txtcodigoparametroE').val();
    urlbase = $("body").attr('urlbase');
    url = urlbase + "/configuracion/eliminarParametrosDetalle";
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: {
            _token: _token,
            txtcodigo: txtcodigo,
            txtcodigoparametroE: txtcodigoparametroE,
        },
        complete: function(response) {}
    }).then(function(data) {
        if (data.success == true) {
            $('#myModalEliminar').modal('hide');
            swal(data.message, "Hacer click!", "success");
            limpiar();
            var dataTable = $('#res-config').DataTable();
            dataTable.ajax.reload();
            var forms = document.getElementById('user_form');
            forms.classList.remove('was-validated');
        }
    });
});
$(document).on('submit', '#user_form', function(event) {
    event.preventDefault();
    _token = $('#_token').val();
    txtcodigo = $('#txtcodigoparametrodetalle').val();
    txtnombre = $('#txtnombre').val();
    var a = 0;
    var b = 0;
    var c = 0;
    var d = 0;
    var e = 0;
    var f = 0;
    var txtcodigoparametro = $('#txtcodigoparametro').val();
    var txtnombre = $('#txtnombre').val();
    var txtpuntuacion = $('#txtpuntuacion').val();
    var txtfechainicio = $('#txtfechainicio').val();
    var txtfechafin = $('#txtfechafin').val();
    var txtestado = $('#txtestado').val();
    if (txtcodigoparametro == '') {
        a = 1;
    }
    if (txtnombre == '') {
        b = 1;
    }
    if (txtpuntuacion < 0) {
        c = 1;
    } else {
        if (txtpuntuacion == '') {
            c = 1;
        }
    }
    if (txtfechainicio == '') {
        d = 1;
    } else {
        if (txtfechainicio > txtfechafin) {
            d = 1;
        }
    }
    if (txtfechafin == '') {
        e = 1;
    } else {
        if (txtfechafin < txtfechainicio) {
            e = 1;
        }
    }
    if (txtestado == '') {
        f = 1;
    } else {
        if (txtestado == 3) {
            f = 1;
        }
    }
    var total = a + b + c + d + e + f;
    if (total == 0) {
        urlbase = $("body").attr('urlbase');
        if (txtcodigo == '') {
            url = urlbase + "/configuracion/insertarParametrosDetalle";
        } else {
            url = urlbase + "/configuracion/actualizarParametrosDetalle";
        }
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
                limpiar();
                var dataTable = $('#res-config').DataTable();
                dataTable.ajax.reload();
                var forms = document.getElementById('user_form');
                forms.classList.remove('was-validated');
            } else {
                swal("Error", data.message, "warning");
                var dataTable = $('#res-config').DataTable();
                dataTable.ajax.reload();
            }
        });
    } else {
        return false;
    }
});

function getMessage() {
    $mensaje = "";
    switch ($tipo.val()) {
        default: $mensaje = "Listado de Parametros";
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

function listarParametros() {
    var dataTable = $('#res-config2').DataTable({
        responsive: true,
        "pageLength": 5,
        "destroy": true,
        "order": [
            [0, "desc"]
        ],
        "ajax": {
            url: "listarParametros",
            type: "POST",
            data: {}
        },
        "columns": [{
            "title": "ACCION",
            "render": function(data, type, row) {
                return "<center><button title='Seleccionar' type='button' class='btnseleccionarUsuario btn btn-success md-close'><span class='feather icon-check-square'></span></button></center>"
            },
            "width": 1
        }, {
            "title": "CODIGO",
            "data": "CODIGOPARAMETRO",
            "width": 1
        }, {
            "title": "DESCRIPCION",
            "data": "DESCRIPCION",
            "width": 300
        }],
        dom: 'Bfrtip',
        buttons: [],
        "language": {
            "lengthMenu": "Mostrar _MENU_ postulaciones",
            "zeroRecords": "No se encontró ningún registro",
            "info": "_PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
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
    obtener_data_parametro("#res-config2 tbody", dataTable);
}

function listarParametros2() {
    var dataTable = $('#res-config3').DataTable({
        responsive: true,
        "pageLength": 5,
        "destroy": true,
        "order": [
            [0, "desc"]
        ],
        "ajax": {
            url: "listarParametros",
            type: "POST",
            data: {}
        },
        "columns": [{
            "title": "ACCION",
            "render": function(data, type, row) {
                return "<center><button title='Seleccionar' type='button' class='btnseleccionarUsuario btn btn-success md-close'><span class='feather icon-check-square'></span></button></center>"
            },
            "width": 1
        }, {
            "title": "CODIGO",
            "data": "CODIGOPARAMETRO",
            "width": 1
        }, {
            "title": "DESCRIPCION",
            "data": "DESCRIPCION",
            "width": 300
        }],
        dom: 'Bfrtip',
        buttons: [],
        "language": {
            "lengthMenu": "Mostrar _MENU_ postulaciones",
            "zeroRecords": "No se encontró ningún registro",
            "info": "_PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
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
    obtener_data_parametro2("#res-config3 tbody", dataTable);
}
var ModalEffects = (function() {
    function init() {
        var overlay = document.querySelector('.md-overlay');
        [].slice.call(document.querySelectorAll('.md-trigger')).forEach(function(el, i) {
            var el2 = document.getElementById("modaldataparametro");
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
var ModalEffects = (function() {
    function init() {
        var overlay = document.querySelector('.md-overlay');
        [].slice.call(document.querySelectorAll('.md-trigger')).forEach(function(el, i) {
            var el2 = document.getElementById("modaldataparametro2");
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
(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
                var a = 0;
                var b = 0;
                var c = 0;
                var d = 0;
                var e = 0;
                var f = 0;
                var txtcodigoparametro = $('#txtcodigoparametro').val();
                var txtnombre = $('#txtnombre').val();
                var txtpuntuacion = $('#txtpuntuacion').val();
                var txtfechainicio = $('#txtfechainicio').val();
                var txtfechafin = $('#txtfechafin').val();
                var txtestado = $('#txtestado').val();
                if (txtcodigoparametro == '') {
                    new PNotify({
                        title: 'Error PARAMETRO: ',
                        text: 'Seleccione el Parametro',
                        type: 'error'
                    });
                    a = 1;
                }
                if (txtnombre == '') {
                    new PNotify({
                        title: 'Error DESCRIPCION: ',
                        text: 'Ingrese la Descripcion',
                        type: 'error'
                    });
                    b = 1;
                }
                if (txtpuntuacion < 0) {
                    new PNotify({
                        title: 'Error PUNTUACION: ',
                        text: 'La puntuacion debe ser mayor a 0',
                        type: 'error'
                    });
                    c = 1;
                } else {
                    if (txtpuntuacion == '') {
                        new PNotify({
                            title: 'Error PUNTUACION: ',
                            text: 'Ingrese la Puntuacion',
                            type: 'error'
                        });
                        c = 1;
                    }
                }
                if (txtfechainicio == '') {
                    new PNotify({
                        title: 'Error FECHA INICIO: ',
                        text: 'Seleccione la fecha inicio.',
                        type: 'error'
                    });
                    d = 1;
                } else {
                    if (txtfechainicio > txtfechafin) {
                        new PNotify({
                            title: 'Error FECHA INICIO: ',
                            text: 'La fecha inicio no debe ser mayor a la fecha fin.',
                            type: 'error'
                        });
                        d = 1;
                    }
                }
                if (txtfechafin == '') {
                    new PNotify({
                        title: 'Error FECHA INICIO: ',
                        text: 'Seleccione la fecha inicio.',
                        type: 'error'
                    });
                    e = 1;
                } else {
                    if (txtfechafin < txtfechainicio) {
                        new PNotify({
                            title: 'Error FECHA FIN: ',
                            text: 'La fecha fin no debe ser menor a la fecha inicio.',
                            type: 'error'
                        });
                        e = 1;
                    }
                }
                if (txtestado == '') {
                    new PNotify({
                        title: 'Error ESTADO: ',
                        text: 'Seleccione el estado.',
                        type: 'error'
                    });
                    f = 1;
                } else {
                    if (txtestado == 3) {
                        new PNotify({
                            title: 'Error ESTADO: ',
                            text: 'No puede seleccionar este estado.',
                            type: 'error'
                        });
                        f = 1;
                    }
                }
                var total = a + b + c + d + e + f;
                if (total == 0) {} else {
                    swal("Error", "Falta algunos campos completar", "warning");
                }
            }, false);
        });
    }, false);
})();