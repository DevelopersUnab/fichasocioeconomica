<!DOCTYPE html>
<html>
<head>
    <title>FICHA</title>
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
        font-size: 12px;
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
    .cuadrado {
      width:25vh;
      max-width:100px;
      height:25vh;
      max-height:100px;
      position:relative;
      background:red;
    }
    .polig{
      width:200px;
      height:200px;
      background:#444444;
      font-family:arial;
      font-weight:bold;
      color:#EEEEEE;
    }
</style>
</head>
<body>
    <div>
        <table width="100%" style="text-align: center;">
          <tr>
            <td style="border: 1px solid black;font-weight: bold;background: #1e2a50;font-size: 17px;color: white;">INFORMACIÓN DE LA FICHA</td>
          </tr>
        </table>
        <br>
        <table width="100%" style="text-align: left;">
            @foreach($constancia as $constanciaS)
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%; font-size: 12px;" >ESTUDIANTE</td>
            <td style="border: 1px solid black; font-size: 12px">{{$constanciaS->NOMBRESCOMPLETOS}}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >CODIGO MATRICULA N°</td>
            <td style="border: 1px solid black; font-size: 12px">{{$constanciaS->CODIGOMATRICULA}}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%; font-size: 12px;" >FACULTAD</td>
            <td style="border: 1px solid black; font-size: 12px">{{$constanciaS->DESCRIPCIONFACULTAD}}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%; font-size: 12px;" >ESCUELA PROFESIONAL</td>
            <td style="border: 1px solid black; font-size: 12px">{{$constanciaS->DESCRIPCIONESCUELA}}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%; font-size: 12px;" >SEMESTRE</td>
            <td style="border: 1px solid black; font-size: 12px">{{$n_semestre}}</td>
          </tr>
           @endforeach
        </table>
        <br>
        <table width="100%" style="text-align: center;">
          <tr>
            <td style="border: 1px solid black;font-weight: bold;background: #1e2a50;font-size: 17px;color: white;">I. DATOS GENERALES</td>
          </tr>
        </table>
        <br>
        <table width="100%" style="text-align: left;">
          @foreach($capitulo_i as $capitulo_is)
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >EDAD</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_is->EDAD}}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >CICLO</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_is->CICLO}}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >AÑO DE INGRESO</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_is->ANIOINGRESO}}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >DNI</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_is->NRODOCUMENTO}}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >CORREO ELECTRONICO</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_is->CORREOELECTRONICO}}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >NÚMERO DE CELULAR O FIJO</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_is->NROCELULAR}} / {{$capitulo_is->NROTELEFONO}}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >FECHA DE NACIMIENTO</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_is->FECHANACIMIENTO}}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >PROCEDENCIA</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_is->UBIGEOPROCEDENCIA}}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >LUGAR DE NACIMIENTO</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_is->LUGARNACIMIENTO}} </td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >TELEFONOS DE EMERGENCIA</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_is->TELEFONOSEMERGENCIA}}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >TUTOR RESPONSABLE (familiar)</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_is->TUTORRESPONSABLE}} </td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >SEXO</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_is->SEXO}} </td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >ESTADO CIVIL</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_is->ESTADOCIVIL}}  </td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >IDIOMA O LENGUA MATERNA CON EL QUE APRENDIÓ A HABLAR EN SU NIÑEZ</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_is->IDIOMA}}  </td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >ESPECIFICAR</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_is->IDIOMAESPECIFICAR}} </td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >INSTITUCIÓN EDUCATIVA SECUNDARIA</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_is->INSTITUCIONEDUCATIVA}} </td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >COLEGIO DE PROCEDENCIA</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_is->TIPOCOLEGIO}} </td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >ESPECIFICAR</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_is->TIPOCOLEGIOESPECIFICAR}} </td>
          </tr>
          @endforeach
        </table>
        <br>
        <br>
        <br>
        <br>
        <br>
        <table width="100%" style="text-align: center;">
          <tr>
            <td style="border: 1px solid black;font-weight: bold;background: #1e2a50;font-size: 17px;color: white;">II. ASPECTO FAMILIAR</td>
          </tr>
        </table>
        <table width="100%" style="text-align: left;">
          <tr>
            <td style=";">De los miembros de mi familia (incluirse) :</td>
          </tr>
        </table>
        <table width="100%" style="text-align: left;">
          <tr>
            <td style="border: 1px solid black;font-weight: bold;font-size: 12px" >N°</td>
            <td style="border: 1px solid black;font-weight: bold;font-size: 12px">APELLIDOS Y NOMBRES </td>
            <td style="border: 1px solid black;font-weight: bold;font-size: 12px">PARENTESCO </td>
            <td style="border: 1px solid black;font-weight: bold;font-size: 12px">SEXO </td>
            <td style="border: 1px solid black;font-weight: bold;font-size: 12px">EDAD </td>
            <td style="border: 1px solid black;font-weight: bold;font-size: 12px">ESTADO CIVIL </td>
            <td style="border: 1px solid black;font-weight: bold;font-size: 12px">GRADO DE INST. </td>
            <td style="border: 1px solid black;font-weight: bold;font-size: 12px">OCUPACION </td>
            <td style="border: 1px solid black;font-weight: bold;font-size: 12px">CONDICION DE TRABAJO </td>
          </tr>
          @foreach($capitulo_ii as $capitulo_iis)
          <tr>
            <td style="border: 1px solid black;font-weight: bold;font-size: 12px" >{{$capitulo_iis->ITEM}}</td>
            <td style="border: 1px solid black;font-size: 12px">{{$capitulo_iis->APELLIDOSNOMBRES}} </td>
            <td style="border: 1px solid black;font-size: 12px">{{$capitulo_iis->PARESTENSCO}} </td>
            <td style="border: 1px solid black;font-size: 12px">{{$capitulo_iis->SEXO}} </td>
            <td style="border: 1px solid black;font-size: 12px">{{$capitulo_iis->EDAD}} </td>
            <td style="border: 1px solid black;font-size: 12px">{{$capitulo_iis->ESTADOCIVIL}} </td>
            <td style="border: 1px solid black;font-size: 12px">{{$capitulo_iis->GRADOINSTRUCION}} </td>
            <td style="border: 1px solid black;font-size: 12px">{{$capitulo_iis->OCUPACION}}</td>
            <td style="border: 1px solid black;font-size: 12px">{{$capitulo_iis->CONDICIONTRABAJO}} </td>
          </tr>
           @endforeach
      </table>
        <br>
        <table width="100%" style="text-align: center;">
          <tr>
            <td style="border: 1px solid black;font-weight: bold;background: #1e2a50;font-size: 17px;color: white;">III. VIVIENDA - SERVICIOS BÁSICOS</td>
          </tr>
        </table>
        <br>
        <table width="100%" style="text-align: left;">
          @foreach($capitulo_iii as $capitulo_iiis)
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >DIRECCIÓN ACTUAL</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_iiis->DIRECCIONACTUAL}}  </td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >REFERENCIA DEL DOMICILIO</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_iiis->REFERENCIADOMICILIO}} </td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >TELÉFONO</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_iiis->TELEFONO}} </td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >LOCALIZACIÓN (ZONA DE UBICACIÓN DE VIVIENDA ACTUAL)</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_iiis->LOCALIZACION}} </td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >ESPECIFICAR</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_iiis->ESPECIFICARLOCALIZACION}} </td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >SU VIVIENDA ES</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_iiis->VIVIENDA}} </td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >ESPECIFICAR</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_iiis->ESPECIFICARVIVIENDA}} </td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;background: #7D7776;" colspan="2">CARACTERISTICA DE LA VIVIENDA</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >MATERIAL QUE PREDOMINA EN LAS PAREDES</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_iiis->PAREDES}} </td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >MATERIAL QUE PREDOMINA EN LOS TECHOS</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_iiis->TECHOS}} </td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >MATERIAL QUE PREDOMINA EN LOS PISO</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_iiis->PISO}} </td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;background: #7D7776;" colspan="2">SERVICIOS BÁSICOS</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >LUZ</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_iiis->LUZ}} </td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >AGUA</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_iiis->AGUA}}  </td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >DESAGUE</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_iiis->DESAGUE}}  </td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >N° DE PERSONAS QUE HABITAN EN SU DOMICILIO</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_iiis->NROPERSONASDOMICILIO}}  </td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >TOTAL, DE AMBIENTES CON LO QUE CUENTA SU VIVIENDA</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_iiis->TOTALAMBIENTESVIVIENDA}}  </td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >TOTAL, DE DORMITORIOS EN SU VIVIENDA</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_iiis->TOTALDORMITORIOSVIVIENDA}}  </td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >TOTAL, DE PERSONAS POR DORMITORIO</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_iiis->TOTALPERSONASDORMITORIO}}  </td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;height: 70px;" >SU HOGAR TIENE</td>
            <td style="border: 1px solid black;font-size: 12px;">@if($capitulo_iiis->CODIGOHOGARNINGUNO==12)
            {{$capitulo_iiis->HOGARNINGUNO}}
            @else
            @if($capitulo_iiis->HOGAREQUIPOSONIDO=='')
            {{$capitulo_iiis->HOGAREQUIPOSONIDO }}
            @else
            - {{$capitulo_iiis->HOGAREQUIPOSONIDO }}
            @endif
            @if($capitulo_iiis->HOGARTELEVISOR=='')
            {{$capitulo_iiis->HOGARTELEVISOR }}
            @else
            - {{$capitulo_iiis->HOGARTELEVISOR }}
            @endif
            @if($capitulo_iiis->HOGARDVD=='')
            {{$capitulo_iiis->HOGARDVD }}
            @else
            - {{$capitulo_iiis->HOGARDVD }}
            @endif
            @if($capitulo_iiis->HOGARLICUADORA=='')
            {{$capitulo_iiis->HOGARLICUADORA }}
            @else
            - {{$capitulo_iiis->HOGARLICUADORA }}
            @endif
            @if($capitulo_iiis->HOGARREFRIGERADORA=='')
            {{$capitulo_iiis->HOGARREFRIGERADORA }}
            @else
            - {{$capitulo_iiis->HOGARREFRIGERADORA }}
            @endif
            @if($capitulo_iiis->HOGARCOCINA=='')
            {{$capitulo_iiis->HOGARCOCINA }}
            @else
            -{{$capitulo_iiis->HOGARCOCINA }}
            @endif
            @if($capitulo_iiis->HOGARLAVADORA=='')
            {{$capitulo_iiis->HOGARLAVADORA }}
            @else
            - {{$capitulo_iiis->HOGARLAVADORA }}
            @endif
            @if($capitulo_iiis->HOGARPLANCHAELECTRICA=='')
            {{$capitulo_iiis->HOGARPLANCHAELECTRICA }}
            @else
            - {{$capitulo_iiis->HOGARPLANCHAELECTRICA }}
            @endif
            @if($capitulo_iiis->HOGARHORNOMICROONDAS=='')
            {{$capitulo_iiis->HOGARHORNOMICROONDAS }}
            @else
            - {{$capitulo_iiis->HOGARHORNOMICROONDAS }}
            @endif
            @if($capitulo_iiis->HOGARCOMPUTADORA=='')
            {{$capitulo_iiis->HOGARCOMPUTADORA }}
            @else
            - {{$capitulo_iiis->HOGARCOMPUTADORA }}
            @endif
            @if($capitulo_iiis->HOGARIMPRESORA=='')
            {{$capitulo_iiis->HOGARIMPRESORA }}
            @else
            - {{$capitulo_iiis->HOGARIMPRESORA }}
            @endif
            @endif </td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >SERVICIOS COMPLEMENTARIOS</td>
            <td style="border: 1px solid black;font-size: 12px;">
            @if($capitulo_iiis->SERVICIOSTELEFONO=='')
            {{$capitulo_iiis->SERVICIOSTELEFONO }}
            @else
            - {{$capitulo_iiis->SERVICIOSTELEFONO }}
            @endif
            @if($capitulo_iiis->SERVICIOSINTERNET=='')
            {{$capitulo_iiis->SERVICIOSINTERNET }}
            @else
            - {{$capitulo_iiis->SERVICIOSINTERNET }}
            @endif
            @if($capitulo_iiis->SERVICIOSCABLE=='')
            {{$capitulo_iiis->SERVICIOSCABLE }}
            @else
            - {{$capitulo_iiis->SERVICIOSCABLE }}
            @endif</td>
          </tr>
             @endforeach
        </table>
        <br>
        <table width="100%" style="text-align: center;">
          <tr>
            <td style="border: 1px solid black;font-weight: bold;background: #1e2a50;font-size: 17px;color: white;">IV. ASPECTO ECONÓMICA</td>
          </tr>
        </table>
        <br>
        <table width="100%" style="text-align: left;">

          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;background: #7D7776;" colspan="2">INGRESO MENSUAL FAMILIAR</td>
          </tr>
          @foreach($capitulo_iv_detalle_ingreso as $capitulo_iv_detalle_ingresos)
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >{{ mb_strtoupper ( $capitulo_iv_detalle_ingresos->CODIGOPARAMETRODETALLE )}}</td>
            <td style="border: 1px solid black;font-size: 12px;">S/. {{$capitulo_iv_detalle_ingresos->MONTO }}</td>
          </tr>
          @endforeach
          {{$suma=0}}
          @foreach($capitulo_iv_detalle_ingreso as $capitulo_iv_detalle_ingresos)
          {{$suma=$suma+$capitulo_iv_detalle_ingresos->MONTO}}
          @endforeach
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >TOTAL</td>
            <td style="border: 1px solid black;font-size: 12px;">S/. {{ $suma }}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;background: #7D7776;" colspan="2">EGRESO MENSUAL FAMILIAR</td>
          </tr>
          @foreach($capitulo_iv_detalle_egreso as $capitulo_iv_detalle_egresoS)
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >{{mb_strtoupper ( $capitulo_iv_detalle_egresoS->CODIGOPARAMETRODETALLE) }}</td>
            <td style="border: 1px solid black;font-size: 12px;">S/. {{$capitulo_iv_detalle_egresoS->MONTO }}</td>
          </tr>
          @endforeach
          @foreach($capitulo_iv as $capitulo_ivs)
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >TOTAL</td>
            <td style="border: 1px solid black;font-size: 12px;">S/. {{$capitulo_ivs->TOTALEGRESOMENSUAL }}</td>
          </tr>
           @endforeach
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;background: #7D7776;" colspan="2">SITUACIÓN ECONÓMICA DEL ESTUDIANTE</td>
          </tr>
          @foreach($capitulo_iv as $capitulo_ivs)
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >UD. TRABAJA</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_ivs->TRABAJA }}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >CONDICIÓN LABORAL</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_ivs->CONDICIONLABORAL }}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >ESPECIFIQUE</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_ivs->ESPECIFIQUECONDICIONLABORAL }}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >CÓMO FINANCIA SUS ESTUDIOS</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_ivs->FINANCIAESTUDIOS }}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >ESPECIFIQUE</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_ivs->ESPECIFIQUEFINANCIAESTUDIOS }}</td>
          </tr>
          @endforeach
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;background: #7D7776;" colspan="2">GASTOS DIARIOS EN SUS ESTUDIOS UNIVERSITARIOS</td>
          </tr>
          @foreach($capitulo_iv_detalle_gastos as $capitulo_iv_detalle_gastoss)
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >{{ mb_strtoupper($capitulo_iv_detalle_gastoss->CODIGOPARAMETRODETALLE) }}</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_iv_detalle_gastoss->MONTO }}</td>
          </tr>
          @endforeach
           @foreach($capitulo_iv as $capitulo_ivs)
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >TOTAL</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_ivs->TOTALGASTOSDIARIOS }}</td>
          </tr>
          @endforeach
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;background: #7D7776;" colspan="2">OTROS GASTOS EN EDUCACION</td>
          </tr>
          <tr>
            @foreach($capitulo_iv as $capitulo_ivs)
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >EDUCACION DE CADA MIEMBRO</td>
            <td style="border: 1px solid black;font-size: 12px;">{{$capitulo_ivs->OTROSGASTOSEDUCACIONMIEMBRO }}</td>            
           @endforeach
          </tr>
        </table>
        <br>
        <table width="100%" style="text-align: center;">
          <tr>
            <td style="border: 1px solid black;font-weight: bold;background: #1e2a50;font-size: 17px;color: white;">V. SALUD</td>
          </tr>
        </table>
        <br>
        <table width="100%" style="text-align: left;">
             @foreach($capitulo_v as $capitulo_vs)
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >CON QUE SEGURO CUENTA</td>
            <td style="border: 1px solid black;" colspan="3">{{$capitulo_vs->SEGURO }}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >HA PADECIDO UD. ALGUNA ENFERMEDAD</td>
            <td style="border: 1px solid black;width: 8%;">{{$capitulo_vs->PADECEENFERMEDAD }}</td>
            <td style="border: 1px solid black;font-weight: bold;width: 15%;font-size: 12px;" >INDIQUE CUAL</td>
            <td style="border: 1px solid black;">{{$capitulo_vs->TIPOENFERMEDAD }}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >ESPECIFIQUE</td>
            <td style="border: 1px solid black;" colspan="3">{{$capitulo_vs->ESPECIFIQUETIPOENFERMEDAD }}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >UD. PADECE ACTUALMENTE ALGUNA ENFERMEDAD CRÓNICA</td>
            <td style="border: 1px solid black;width: 8%;">{{$capitulo_vs->PADECEENFERMEDADCRONICA }}</td>
            <td style="border: 1px solid black;font-weight: bold;width: 15%;font-size: 12px;" >INDIQUE CUAL</td>
            <td style="border: 1px solid black;">{{$capitulo_vs->TIPOENFERMEDADCRONICA }}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >ESPECIFIQUE</td>
            <td style="border: 1px solid black;" colspan="3">{{$capitulo_vs->ESPECIFIQUEENFERMEDADCRONICA }}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >UD. PADECE ACTUALMENTE ALGUNA ENFERMEDAD INFECCIOSA</td>
            <td style="border: 1px solid black;width: 8%;">{{$capitulo_vs->PADECEENFERMEDADINFECCIOSA }}</td>
            <td style="border: 1px solid black;font-weight: bold;width: 15%;font-size: 12px;" >INDIQUE CUAL</td>
            <td style="border: 1px solid black;">{{$capitulo_vs->TIPOENFERMEDADINFECCIOSA }}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >ESPECIFIQUE</td>
            <td style="border: 1px solid black;" colspan="3">{{$capitulo_vs->ESPECIFIQUEENFERMEDADINFECCIOSA }}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >UD. ES ALÉRGICO A ALGÚN MEDICAMENTO</td>
            <td style="border: 1px solid black;width: 8%;">{{$capitulo_vs->ALERGICOMEDICAMENTO }}</td>
            <td style="border: 1px solid black;font-weight: bold;width: 15%;font-size: 12px;" >INDIQUE CUAL</td>
            <td style="border: 1px solid black;">{{$capitulo_vs->TIPOMEDICAMENTO }}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >ESPECIFIQUE</td>
            <td style="border: 1px solid black;" colspan="3">{{$capitulo_vs->ESPECIFIQUEMEDICAMENTO }}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >UD. TIENE ANTECEDENTES QUIRÚRGICO</td>
            <td style="border: 1px solid black;width: 8%;">{{$capitulo_vs->ANTECEDENTESQUIRURGICO }}</td>
            <td style="border: 1px solid black;font-weight: bold;width: 15%;font-size: 12px;" >INDIQUE CUAL</td>
            <td style="border: 1px solid black;">{{$capitulo_vs->TIPOANTECEDENTESQUIRURGICO }}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >ESPECIFIQUE</td>
            <td style="border: 1px solid black;" colspan="3">{{$capitulo_vs->ESPECIFIQUETIPOANTECEDENTESQUIRURGICOS }}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >UD. TIENE ALGÚN FAMILIAR QUE PADECE ENFERMEDAD / DISCAPACIDAD</td>
            <td style="border: 1px solid black;width: 8%;">{{$capitulo_vs->PADECEENFERMEDADFAMILIAR }}</td>
            <td style="border: 1px solid black;font-weight: bold;width: 15%;font-size: 12px;" >INDIQUE CUAL</td>
            <td style="border: 1px solid black;">{{$capitulo_vs->TIPOENFERMEDADFAMILIAR }}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >ESPECIFIQUE</td>
            <td style="border: 1px solid black;" colspan="3">{{$capitulo_vs->ESPECIFIQUETIPOENFERMEDADFAMILIAR }}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >PADECE ALGÚN TIPO DE DISCAPACIDAD</td>
            <td style="border: 1px solid black;width: 8%;">{{$capitulo_vs->PADECETIPODISCAPACIDAD }}</td>
            <td style="border: 1px solid black;font-weight: bold;width: 17%;font-size: 12px;" >ESPECIFIQUE</td>
            <td style="border: 1px solid black;">{{$capitulo_vs->ESPECIFIQUETIPODISCAPACIDAD }}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >SI ES MUJER, EN LA ACTUALIDAD SE ENCUENTRA UD. GESTANDO</td>
            <td style="border: 1px solid black;width: 8%;">{{$capitulo_vs->ACTUALIDADGESTANDO }}</td>
            <td style="border: 1px solid black;font-weight: bold;width: 17%;font-size: 12px;" >ESPECIFIQUE</td>
            <td style="border: 1px solid black;">{{$capitulo_vs->ESPECIFIQUEACTUALIDADGESTANDO }}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >SI SE ENCUENTRA UD. GESTANDO</td>
            <td style="border: 1px solid black;" colspan="3">{{$capitulo_vs->ESPECIFIQUEGESTANDO }}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >PROBLEMAS SOCIALES QUE SE PRESENTAN EN SUS FAMILIA</td>
            <td style="border: 1px solid black;" colspan="3">
              @if($capitulo_vs->CODIGOOTRO==12)
                {{$capitulo_vs->OTROS}}
                @else
                @if($capitulo_vs->ALCOHOLISMO=='')
                {{$capitulo_vs->ALCOHOLISMO }}
                @else
                - {{$capitulo_vs->ALCOHOLISMO }}
                @endif
                @if($capitulo_vs->VIOLENCIAFAMILIAR=='')
                {{$capitulo_vs->VIOLENCIAFAMILIAR }}
                @else
                - {{$capitulo_vs->VIOLENCIAFAMILIAR }}
                @endif
                @if($capitulo_vs->EMBARAZONODESEADO=='')
                {{$capitulo_vs->EMBARAZONODESEADO }}
                @else
                - {{$capitulo_vs->EMBARAZONODESEADO }}
                @endif
                @if($capitulo_vs->ABANDONOPARCIAL=='')
                {{$capitulo_vs->ABANDONOPARCIAL }}
                @else
                - {{$capitulo_vs->ABANDONOPARCIAL }}
                @endif
                @if($capitulo_vs->ABANDONOTOTAL=='')
                {{$capitulo_vs->ABANDONOTOTAL }}
                @else
                - {{$capitulo_vs->ABANDONOTOTAL }}
                @endif
                @if($capitulo_vs->VIOLENCIAPSICOLOGICA=='')
                {{$capitulo_vs->VIOLENCIAPSICOLOGICA }}
                @else
                - {{$capitulo_vs->VIOLENCIAPSICOLOGICA }}
                @endif
                @if($capitulo_vs->VIOLENCIASEXUAL=='')
                {{$capitulo_vs->VIOLENCIASEXUAL }}
                @else
                - {{$capitulo_vs->VIOLENCIASEXUAL }}
                @endif
                @if($capitulo_vs->PROSTITUCION=='')
                {{$capitulo_vs->PROSTITUCION }}
                @else
                - {{$capitulo_vs->PROSTITUCION }}
                @endif
                @if($capitulo_vs->ABUSODROGAS=='')
                {{$capitulo_vs->ABUSODROGAS }}
                @else
                - {{$capitulo_vs->ABUSODROGAS }}
                @endif
                @if($capitulo_vs->RELACIONESFAMILIARESONFLICTIVAS=='')
                {{$capitulo_vs->RELACIONESFAMILIARESONFLICTIVAS }}
                @else
                - {{$capitulo_vs->RELACIONESFAMILIARESONFLICTIVAS }}
                @endif
                @if($capitulo_vs->HIJOSNORECONOCIDOS=='')
                {{$capitulo_vs->HIJOSNORECONOCIDOS }}
                @else
                - {{$capitulo_vs->HIJOSNORECONOCIDOS }}
                @endif
              @endif
              @if($capitulo_vs->CODIGONINGUNO==13)
                {{$capitulo_vs->NINGUNO}}
              @endif
            </td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >ESPECIFIQUE</td>
            <td style="border: 1px solid black;" colspan="3">{{$capitulo_vs->ESPECIFIQUEPROBLEMASFAMILIA }}</td>
          </tr>
           @endforeach
        </table>
        <br>
        <table width="100%" style="text-align: center;">
          <tr>
            <td style="border: 1px solid black;font-weight: bold;background: #1e2a50;font-size: 17px;color: white;">VI. ALIMENTACIÓN</td>
          </tr>
        </table>
        <br>
        <table width="100%" style="text-align: left;">
            @foreach($capitulo_vi as $capitulo_vis)
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >DONDE INGIERE SUS ALIMENTOS</td>
            <td style="border: 1px solid black;">{{$capitulo_vis->INGIEREALIMENTOS }}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >ESPECIFIQUE</td>
            <td style="border: 1px solid black;">{{$capitulo_vis->ESPECIFICARINGIEREALIMENTOS }}</td>
          </tr>
          @endforeach
        </table>
        <br>
        <table width="100%" style="text-align: center;">
          <tr>
            <td style="border: 1px solid black;font-weight: bold;background: #1e2a50;font-size: 17px;color: white;">VII. SOCIOCULTURAL - DEPORTIVO</td>
          </tr>
        </table>
        <br>
        <table width="100%" style="text-align: left;">
            @foreach($capitulo_vii as $capitulo_viis)
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >A QUE RELIGIÓN PERTENECE</td>
            <td style="border: 1px solid black;">{{$capitulo_viis->RELIGION }}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >ESPECIFIQUE</td>
            <td style="border: 1px solid black;">{{$capitulo_viis->ESPECIFIQUERELIGION }}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >PRACTICA ALGUNA DISCIPLINA DEPORTIVA</td>
            <td style="border: 1px solid black;">{{$capitulo_viis->PRACTICADISCIPLINADEPORTIVA }}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >PRACTICA ALGUNA DISCIPLINA ARTÍSTICA</td>
            <td style="border: 1px solid black;">{{$capitulo_viis->PRACTICADISCIPLINAARTISTICA }}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >A QUÉ SE DEDICA EN SUS RATOS LIBRES</td>
            <td style="border: 1px solid black;">{{$capitulo_viis->RATOSLIBRES }}</td>
          </tr>
          @endforeach
        </table>
        <br>
        <table width="100%" style="text-align: center;">
          <tr>
            <td style="border: 1px solid black;font-weight: bold;background: #1e2a50;font-size: 17px;color: white;">VIII. OTROS ASPECTOS RELEVANTES</td>
          </tr>
        </table>
        <br>
        <table width="100%" style="text-align: left;">
            @foreach($capitulo_viii as $capitulo_viiis)
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >MEDIO DE TRANSPORTE QUE UTILIZA PARA ASISTIR A LA UNIVERSIDAD</td>
            <td style="border: 1px solid black;">{{$capitulo_viiis->MEDIOTRANSPORTE }}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >ESPECIFQUE</td>
            <td style="border: 1px solid black;">{{$capitulo_viiis->ESPECIFIQUEMEDIOTRANSPORTE }}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >QUE TIEMPO DEMORA, LLEGAR A LA UNIVERSIDAD DESDE SU DOMICILIO</td>
            <td style="border: 1px solid black;">{{$capitulo_viiis->TIEMPODEMORA }}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >CUENTA CON CELULAR</td>
            <td style="border: 1px solid black;">{{$capitulo_viiis->CUENTACONCELULAR }}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >PAGO POR EL SERVICIO</td>
            <td style="border: 1px solid black;">{{$capitulo_viiis->PAGOSERVICIO }}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >ES BENEFICIARIO DE ALGÚN PROGRAMA DEL ESTADO</td>
            <td style="border: 1px solid black;">{{$capitulo_viiis->BENEFICIARIOPROGRAMAESTADO }}</td>
          </tr>
          <tr>
            <td style="border: 1px solid black;font-weight: bold;width: 34%;font-size: 12px;" >ESPECIFIQUE</td>
            <td style="border: 1px solid black;">{{$capitulo_viiis->ESPECIFIQUEBENEFICIARIOPROGRAMA }}</td>
          </tr>
          @endforeach
        </table>
         <br>
        <table width="100%" style="text-align: center;">
            <tr>
            <td style="border: 1px solid black;font-weight: bold;background: #1e2a50;font-size: 17px;color: white;">OBSERVACIONES DE LA ENTREVISTA</td>
            </tr>
        </table>
        <table width="100%" style="text-align: left;">
          <tr>
            <td style="font-weight: bold;width: 30%;font-size: 12px;" >A) SITUACION FAMILIAR: </td>
            <td ></td>
          </tr>
          <tr>
            <td style="font-weight: bold;width: 34%;font-size: 12px;" >- TIPO DE FAMILIA :</td>
            <td>□NUCLEAR &nbsp;&nbsp; □MONOPARENTAL &nbsp;&nbsp; □COMPUESTA &nbsp;&nbsp; □SIN HIJOS</td>
          </tr>
          <tr>
            <td style="font-weight: bold;width: 34%;font-size: 12px;" >- CARGA FAMILIAR :</td>
            <td>□SI &nbsp;&nbsp; □NO</td>
          </tr>
          <tr>
            <td colspan="2">___________________________________________________________________________________________________</td>
          </tr>
          <tr>
            <td colspan="2">___________________________________________________________________________________________________</td>
          </tr>
          <tr>
            <td colspan="2">___________________________________________________________________________________________________</td>
          </tr>
          <tr>
            <td style="font-weight: bold;width: 30%;font-size: 12px;" >B) SITUACION DE SALUD: </td>
            <td ></td>
          </tr>
          <tr>
            <td style="font-weight: bold;width: 34%;font-size: 12px;" >- FAMILIAR :</td>
            <td>_________________________________________________________________</td>
          </tr>
          <tr>
            <td style="font-weight: bold;width: 34%;font-size: 12px;" >- ESTUDIANTE :</td>
            <td>_________________________________________________________________</td>
          </tr>
          <tr>
            <td colspan="2">___________________________________________________________________________________________________</td>
          </tr>
          <tr>
            <td colspan="2">___________________________________________________________________________________________________</td>
          </tr>
          <tr>
            <td colspan="2">___________________________________________________________________________________________________</td>
          </tr>
          <tr>
            <td style="font-weight: bold;width: 30%;font-size: 12px;" colspan="2">C) SITUACION DE ECONOMICA DEL ESTUDIANTE: </td>
          </tr>
          @foreach($categorizacion as $categorizacionz)
          <tr>
            <td style="font-weight: bold;width: 34%;font-size: 12px;" >- CALIFICACION </td>
            <td style="">{{$categorizacionz->DESCRIPCIONCATEGORIZACION }}</td>
          </tr>
          @endforeach
        </table>
    </div>
</body>
</html>
