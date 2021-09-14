<!DOCTYPE html>
<html>
<head>
    <title>CONSTANCIA</title>
    <style type="text/css">
    body{
        font-size: 16px;
        font-family: "Arial";
    }
    table{
        border-collapse: collapse;
    }
    td{
        padding: 6px 5px;
        font-size: 15px;
    }
    .h1{
        font-size: 21px;
        font-weight: bold;
    }
    .h2{
        font-size: 18px;
        font-weight: bold;
    }
    .tabla1{
        margin-bottom: 20px;
    }
    .tabla2 {
        margin-bottom: 20px;
    }
    .tabla3{
        margin-top: 15px;
    }
    .tabla3 td{
        border: 1px solid #000;
    }
    .tabla3 .cancelado{
        border-left: 0;
        border-right: 0;
        border-bottom: 0;
        border-top: 1px dotted #000;
        width: 200px;
    }
    .emisor{
        color: red;
    }
    .linea{
        border-bottom: 1px dotted #000;
    }
    .border{
        border: 1px solid #000;
    }
    .fondo{
        background-color: #dfdfdf;
    }
    .fisico{
        color: #fff;
    }
    .fisico td{
        color: #fff;
    }
    .fisico .border{
        border: 1px solid #fff;
    }
    .fisico .tabla3 td{
        border: 1px solid #fff;
    }
    .fisico .linea{
        border-bottom: 1px dotted #fff;
    }
    .fisico .emisor{
        color: #fff;
    }
    .fisico .tabla3 .cancelado{
        border-top: 1px dotted #fff;
    }
    .fisico .text{
        color: #000;
    }
    .fisico .fondo{
        background-color: #fff;
    }
</style>
</head>
<body>
    <div>
        <table width="100%" style="text-align: center;">
            <tr>
                <td>
                    <img src="../../images/logoperu.png" width="75" height="75">
                </td>
                <td>
                    <u style="color: #000000; font-size: 20px;"><strong>UNIVERSIDAD NACIONAL DE BARRANCA</strong></u>
                    <p style="color: #000000; font-size: 18px; font-weight: bold;">UNIDAD BIENESTAR UNIVERSITARIO</p>
                    <p style="color: #000000; font-size: 18px; font-weight: bold;">SERVICIO SOCIAL</p>
                </td>
                <td>
                    <img src="../../images/logounabchico.jpeg" width="75" height="75">
                </td>
            </tr>
        </table>
        <hr>
        <p style="color: #000000; text-align: center;font-style: oblique;font-size: 14px;">"Año de la lucha contra la corrupción e impunidad"</p>
        <br>
        <p style="color: #000000; text-align: center;">La Unidad de Bienestar Universitario otorga la presente:</p>
        <h2 style="color: #000000; text-align: center;">CONSTANCIA</h2>
        <div style="text-align:center;">
            @foreach($constancia as $constanciaS)
            <table border="1" style="margin: 0 auto;">
                    <tr>
                        <td style="color: #000000;">ESTUDIANTE</td>
                        <td style="color: #000000;">{{ $constanciaS->NOMBRESCOMPLETOS }}</td>
                    </tr>
                    <tr>
                        <td style="color: #000000;">CODIGO UNIVERSITARIO</td>
                        <td style="color: #000000;">{{ $constanciaS->CODIGOMATRICULA }}</td>
                    </tr>
                    <tr>
                        <td style="color: #000000;">FACULTAD</td>
                        <td style="color: #000000;">{{ $constanciaS->DESCRIPCIONFACULTAD }}</td>
                    </tr>
                    <tr>
                        <td style="color: #000000;">ESCUELA PROFESIONAL</td>
                        <td style="color: #000000;">{{ $constanciaS->DESCRIPCIONESCUELA }}</td>
                    </tr>
            </table>
            @endforeach
        </div>
        <br>
        <p style="color: #000000; text-align: center;">Por haber culminado satisfactoriamente el registro de la FICHA SOCIOECONÓMICA a través de la plataforma Virtual para el proceso de Matrícula 2019-2.</p>
        <br>
        <p style="color: #000000; text-align: center;font-style: oblique;"><strong>GRACIAS POR SU IMPORTANTE PARTICIPACIÓN</strong></p>
        <div align="center">
                {!! str_replace('<?xml version="1.0" encoding="UTF-8"?>','',QrCode::size(150)->generate(Request::url().'/131.0101.001
')); !!}
        </div>
    </div>
</body>
</html>
