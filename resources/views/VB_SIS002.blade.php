<script src="{{ asset('plugins/sweetalert/js/sweetalert.min.js') }}"></script>
<script>
  @if(Session::has('success'))
        swal("LO SENTIMOS!", "Se encuentra fuera del periodo indicado para realizar la ficha socioeconomica. Sirvase apersonarse a la Unidad de Bienestar Universitario.", "info");
     @php
       Session::forget('success');
     @endphp
  @endif
  @if(Session::has('success2'))
        swal("LO SENTIMOS!", "Usted nose encuentra habilitado para realizar su ficha socioeconomica. Sirvase apersonarse a la Unidad de Bienestar Universitario.", "info");
     @php
       Session::forget('success2');
     @endphp
  @endif
  @if(Session::has('success3'))
        swal("LO SENTIMOS!", "Todavia nose apertura la ficha socioeconomica en este proceso. Sirvase apersonarse a la Unidad de Bienestar Universitario.", "info");
     @php
       Session::forget('success3');
     @endphp
  @endif
  @if(Session::has('success4'))
        swal("LO SENTIMOS!", "Usted no tiene acceso al sistema. Por favor comunicarse con la Unidad de Tecnologia de Informacion y Comunicaciones de la UNAB.", "info");
     @php
       Session::forget('success4');
     @endphp
  @endif
  @if(Session::has('success5'))
        swal("LO SENTIMOS!", "Estas credenciales no coinciden con nuestros registros. Vuelva a Intentar.", "error");
     @php
       Session::forget('success5');
     @endphp
  @endif
</script>