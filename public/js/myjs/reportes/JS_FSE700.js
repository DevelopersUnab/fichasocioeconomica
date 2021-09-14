$urlbase = $("body").attr('urlbase');
$tipo = $("#tipobusqueda");
$txtprocesobuscar = $("#txtprocesobuscar");
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
                var txtcodigoprocesoescuela = $('#txtcodigoprocesoescuela').val(data.CODIGOPROCESOESCUELA);
                var select3 = document.getElementById("txtcodigoproceso");
                select3.options.length = 0;
                select3.options[select3.options.length] = new Option('Buscar', '');
                select3.options[select3.options.length] = new Option(data.DESCRIPCIONSEMESTRE, data.CODIGOPROCESO);
                var txtcodigo = $('#txtcodigoproceso').val(data.CODIGOPROCESO);
                var txtcodigosemestre = $('#txtcodigosemestre').val(data.CODIGOSEMESTRE);
                var select2 = document.getElementById("txtcodigoescuela");
                select2.options.length = 0;
                select2.options[select2.options.length] = new Option('Buscar', '');
                select2.options[select2.options.length] = new Option(data.DESCRIPCIONESCUELA, data.CODIGOESCUELA);
                var txtcodigoescuela = $('#txtcodigoescuela').val(data.CODIGOESCUELA);
                var txtfechainicio = $('#txtfechainicio').val(data.FECHAINICIO);
                var txtfechafin = $('#txtfechafin').val(data.FECHAFIN);
                var txtestado = $('#txtestado').val(data.ESTADO);
            }
        }
        document.getElementById('modaldataproceso').disabled = true;
        document.getElementById('modaldataescuela').disabled = true;
    });
}
var obtener_data_eliminar = function(tbody, dataTable) {
    $(tbody).on("click", "button.eliminar", function() {
        var data = dataTable.row($(this).parents("tr")).data();
        if (typeof(data) === "undefined") {} else {
            var txtcodigoE = $('#txtcodigoprocesoescuelaE').val(data.CODIGOPROCESOESCUELA);
            var txtcodigoparametroE = $('#txtcodigoprocesoE').val(data.CODIGOPROCESO);
            var txtcodigoescuelaE = $('#txtcodigoescuelaE').val(data.CODIGOESCUELA);
            var txtcodigosemestreE = $('#txtcodigosemestreE').val(data.CODIGOSEMESTRE);
            var txtescuelaE = $('#txtescuelaE').val(data.DESCRIPCIONESCUELA);
            var txtsemestreE = $('#txtsemestreE').val(data.DESCRIPCIONSEMESTRE);
            
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
var obtener_data_proceso = function(tbody, dataTable) {
    $(tbody).on("click", "button.btnseleccionarUsuario", function(ev) {
        var data = dataTable.row($(this).parents("tr")).data();
        var select = document.getElementById("txtcodigoproceso");
        select.options.length = 0;
        select.options[select.options.length] = new Option('Buscar', '');
        select.options[select.options.length] = new Option(data.DESCRIPCIONSEMESTRE, data.CODIGOPROCESO);
        var txtcodigorol = $('#txtcodigoproceso').val(data.CODIGOPROCESO);
        var txtcodigorol = $('#txtcodigosemestre').val(data.CODIGOSEMESTRE);
        var el2 = document.getElementById("modaldataproceso");
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
var obtener_data_escuela = function(tbody, dataTable) {
    $(tbody).on("click", "button.btnseleccionarUsuario", function(ev) {
        var data = dataTable.row($(this).parents("tr")).data();
        var select = document.getElementById("txtcodigoescuela");
        select.options.length = 0;
        select.options[select.options.length] = new Option('Buscar', '');
        select.options[select.options.length] = new Option(data.DESCRIPCION, data.CODIGOESCUELA);
        var txtcodigorol = $('#txtcodigoescuela').val(data.CODIGOESCUELA);
        var el2 = document.getElementById("modaldataescuela");
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
$(document).ready(function() {
    consultar();
    listarProcesos();
    listarEscuelas();
});

function limpiar() {
    $('#txtcodigoprocesoescuela').val('');
    $('#txtcodigosemestre').val('');
    $('#txtfechainicio').val(ano + "-" + mes + "-" + dia);
    $('#txtfechafin').val(ano + "-" + mes + "-" + dia);
    $('#txtestado').val('');
    var forms = document.getElementById('user_form');
    forms.classList.remove('was-validated');
    document.getElementById('btnGuardarDatos').disabled = false;
    document.getElementById('modaldataproceso').disabled = false;
    document.getElementById('modaldataescuela').disabled = false;
    var select = document.getElementById("txtcodigoproceso");
    select.options.length = 0;
    select.options[select.options.length] = new Option('Buscar', '');
    var select2 = document.getElementById("txtcodigoescuela");
    select2.options.length = 0;
    select2.options[select2.options.length] = new Option('Buscar', '');
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
            url: "listarProcesosEscuelas",
            type: "POST",
            data: {
                txtprocesobuscar: $txtprocesobuscar.val()
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
            "data": "CODIGOPROCESOESCUELA",
            "width": 5
        }, {
            "title": "CODIGOPROCESO",
            "data": "CODIGOPROCESO",
            "width": 5,
            "visible": false
        }, {
            "title": "CODIGOSEMESTRE",
            "data": "CODIGOSEMESTRE",
            "width": 5,
            "visible": false
        }, {
            "title": "SEMESTRE",
            "data": "DESCRIPCIONSEMESTRE",
            "width": 5
        }, {
            "title": "CODIGOESCUELA",
            "data": "CODIGOESCUELA",
            "width": 5,
            "visible": false
        }, {
            "title": "ESCUELA",
            "data": "DESCRIPCIONESCUELA",
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
    obtener_data_editar("#res-config tbody", dataTable);
    obtener_data_eliminar("#res-config tbody", dataTable);
    $(document).on('click', '#btnResfrecar', function() {
        dataTable.ajax.reload();
    });
    $(document).on('click', '#btnEliminarE', function() {
        _token = $('#_token').val();
        txtcodigoprocesoescuelaE = $('#txtcodigoprocesoescuelaE').val();
        txtcodigoprocesoE = $('#txtcodigoprocesoE').val();
        txtcodigosemestreE = $('#txtcodigosemestreE').val();
        txtcodigoescuelaE = $('#txtcodigoescuelaE').val();
        urlbase = $("body").attr('urlbase');
        url = urlbase + "/configuracion/eliminarProcesoEscuela";
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: {
                _token: _token,
                txtcodigoprocesoescuelaE: txtcodigoprocesoescuelaE,
                txtcodigoprocesoE: txtcodigoprocesoE,
                txtcodigosemestreE: txtcodigosemestreE,
                txtcodigoescuelaE: txtcodigoescuelaE
            },
            complete: function(response) {}
        }).then(function(data) {
            if (data.success == true) {
                $('#myModalEliminar').modal('hide');
                swal(data.message, "Hacer click!", "success");
                limpiar();
                dataTable.ajax.reload();
                var forms = document.getElementById('user_form');
                forms.classList.remove('was-validated');
            }
        });
    });
    $(document).on('submit', '#user_form', function(event) {
        event.preventDefault();
        _token = $('#_token').val();
        txtcodigo = $('#txtcodigoprocesoescuela').val();
        txtnombre = $('#txtnombre').val();
        var a = 0;
        var b = 0;
        var c = 0;
        var d = 0;
        var e = 0;
        var txtodigoproceso = $('#txtodigoproceso').val();
        var txtcodigoescuela = $('#txtcodigoescuela').val();
        var txtfechainicio = $('#txtfechainicio').val();
        var txtfechafin = $('#txtfechafin').val();
        var txtestado = $('#txtestado').val();
        if (txtodigoproceso == '') {
            a = 1;
        }
        if (txtcodigoescuela == '') {
            b = 1;
        }
        if (txtfechainicio == '') {
            c = 1;
        } else {
            if (txtfechainicio > txtfechafin) {
                c = 1;
            }
        }
        if (txtfechafin == '') {
            d = 1;
        } else {
            if (txtfechafin < txtfechainicio) {
                d = 1;
            }
        }
        if (txtestado == '') {
            e = 1;
        } else {
            if (txtestado == 3) {
                e = 1;
            }
        }
        var total = a + b + c + d + e;
        if (total == 0) {
            urlbase = $("body").attr('urlbase');
            if (txtcodigo == '') {
                url = urlbase + "/configuracion/insertarProcesoEscuela";
            } else {
                url = urlbase + "/configuracion/actualizarProcesoEscuela";
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
                    dataTable.ajax.reload();
                    var forms = document.getElementById('user_form');
                    forms.classList.remove('was-validated');
                } else {
                    var select2 = document.getElementById("txtcodigoescuela");
                    select2.options.length = 0;
                    select2.options[select2.options.length] = new Option('Buscar', '');
                    $('#txtcodigoescuela').val('');
                    swal("Error", data.message, "warning");
                    dataTable.ajax.reload();
                }
            });
        } else {
            return false;
        }
    });
}

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

function listarProcesos() {
    var dataTable = $('#res-config2').DataTable({
        responsive: true,
        "pageLength": 5,
        "destroy": true,
        "order": [
            [0, "desc"]
        ],
        "ajax": {
            url: "listarProcesos",
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
            "data": "CODIGOPROCESO",
            "width": 1
        }, {
            "title": "CODIGOSEMESTRE",
            "data": "CODIGOSEMESTRE",
            "width": 1,
            "visible": false
        }, {
            "title": "DESCRIPCION",
            "data": "DESCRIPCIONSEMESTRE",
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
    obtener_data_proceso("#res-config2 tbody", dataTable);
}

function listarEscuelas() {
    var dataTable = $('#res-config3').DataTable({
        responsive: true,
        "pageLength": 5,
        "destroy": true,
        "order": [
            [0, "desc"]
        ],
        "ajax": {
            url: "listarEscuelas",
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
            "data": "CODIGOESCUELA",
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
    obtener_data_escuela("#res-config3 tbody", dataTable);
}
var ModalEffects = (function() {
    function init() {
        var overlay = document.querySelector('.md-overlay');
        [].slice.call(document.querySelectorAll('.md-trigger')).forEach(function(el, i) {
            var el2 = document.getElementById("modaldataproceso");
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
            var el2 = document.getElementById("modaldataescuela");
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
                var txtcodigoproceso = $('#txtcodigoproceso').val();
                var txtcodigoescuela = $('#txtcodigoescuela').val();
                var txtpuntuacion = $('#txtpuntuacion').val();
                var txtfechainicio = $('#txtfechainicio').val();
                var txtfechafin = $('#txtfechafin').val();
                var txtestado = $('#txtestado').val();
                if (txtcodigoproceso == '') {
                    new PNotify({
                        title: 'Error PROCESO: ',
                        text: 'Seleccione el Proceso',
                        type: 'error'
                    });
                    a = 1;
                }
                if (txtcodigoescuela == '') {
                    new PNotify({
                        title: 'Error ESCUELA: ',
                        text: 'Seleccione la Escuela',
                        type: 'error'
                    });
                    b = 1;
                }
                if (txtfechainicio == '') {
                    new PNotify({
                        title: 'Error FECHA INICIO: ',
                        text: 'Seleccione la fecha inicio.',
                        type: 'error'
                    });
                    c = 1;
                } else {
                    if (txtfechainicio > txtfechafin) {
                        new PNotify({
                            title: 'Error FECHA INICIO: ',
                            text: 'La fecha inicio no debe ser mayor a la fecha fin.',
                            type: 'error'
                        });
                        c = 1;
                    }
                }
                if (txtfechafin == '') {
                    new PNotify({
                        title: 'Error FECHA INICIO: ',
                        text: 'Seleccione la fecha inicio.',
                        type: 'error'
                    });
                    d = 1;
                } else {
                    if (txtfechafin < txtfechainicio) {
                        new PNotify({
                            title: 'Error FECHA FIN: ',
                            text: 'La fecha fin no debe ser menor a la fecha inicio.',
                            type: 'error'
                        });
                        d = 1;
                    }
                }
                if (txtestado == '') {
                    new PNotify({
                        title: 'Error ESTADO: ',
                        text: 'Seleccione el estado.',
                        type: 'error'
                    });
                    e = 1;
                } else {
                    if (txtestado == 3) {
                        new PNotify({
                            title: 'Error ESTADO: ',
                            text: 'No puede seleccionar este estado.',
                            type: 'error'
                        });
                        e = 1;
                        $('#txtestado').val('');
                    }
                }
                var total = a + b + c + d + e;
                if (total == 0) {} else {
                    swal("Error", "Falta algunos campos completar", "warning");
                }
            }, false);
        });
    }, false);
})();