<?php
use App\User;
use Illuminate\Support\Facades\Auth;


Auth::routes();

Route::group(['middleware' => 'auth'], function () {

	Route::get('/', 'HomeController@index');
   Route::get('/principal', function(){
         return redirect('/');
   }); 
   Route::post('/listarEscuelaCronograma', 'HomeController@listarEscuelaCronograma');
   Route::post('cambiarContrasena', 'HomeController@cambiarContrasena');

}); 

Route::group(['middleware' => 'administrador'], function () {
   //Configuracion
	Route::get('/configuracion/parametros','CT_FSE001@index'); 		
   Route::post('/configuracion/listarParametros', 'CT_FSE001@listarParametros');
   Route::post('/configuracion/insertarParametros', 'CT_FSE001@insertarParametros');
   Route::post('/configuracion/actualizarParametros', 'CT_FSE001@actualizarParametros');
   Route::post('/configuracion/eliminarParametros', 'CT_FSE001@eliminarParametros');

   Route::get('/configuracion/parametrosDetalle','CT_FSE002@index');     
   Route::post('/configuracion/listarParametrosDetalle', 'CT_FSE002@listarParametrosDetalle');
   Route::post('/configuracion/listarParametros', 'CT_FSE002@listarParametros');
   Route::post('/configuracion/insertarParametrosDetalle', 'CT_FSE002@insertarParametrosDetalle');
   Route::post('/configuracion/actualizarParametrosDetalle', 'CT_FSE002@actualizarParametrosDetalle');
   Route::post('/configuracion/eliminarParametrosDetalle', 'CT_FSE002@eliminarParametrosDetalle');

   Route::get('/configuracion/proceso','CT_FSE003@index');  
   Route::post('/configuracion/listarProcesos', 'CT_FSE003@listarProcesos');
   Route::post('/configuracion/insertarProceso', 'CT_FSE003@insertarProceso');
   Route::post('/configuracion/actualizarProceso', 'CT_FSE003@actualizarProceso');
   Route::post('/configuracion/eliminarProceso', 'CT_FSE003@eliminarProceso');
   Route::post('/configuracion/finalizarProceso', 'CT_FSE003@finalizarProceso');

   Route::get('/configuracion/procesos-escuela','CT_FSE004@index');  
   Route::post('/configuracion/listarProcesosEscuelas', 'CT_FSE004@listarProcesosEscuelas');
   Route::post('/configuracion/listarProcesos', 'CT_FSE004@listarProcesos');
   Route::post('/configuracion/listarEscuelas', 'CT_FSE004@listarEscuelas');
   Route::post('/configuracion/insertarProcesoEscuela', 'CT_FSE004@insertarProcesoEscuela');
   Route::post('/configuracion/actualizarProcesoEscuela', 'CT_FSE004@actualizarProcesoEscuela');
   Route::post('/configuracion/eliminarProcesoEscuela', 'CT_FSE004@eliminarProcesoEscuela');

   //Reportes
   Route::get('/reportes/fichaalumno','CT_FSE702@index');  
   Route::post('/reportes/listarfichas','CT_FSE702@listarfichas');

   Route::get('/reportes/fichascalificadas','CT_FSE704@index');  
   Route::post('/reportes/listarfichasCalificadas','CT_FSE704@listarfichasCalificadas');
   Route::get('/reportes/obtenerTotalFichasCalificadas','CT_FSE704@obtenerTotalFichasCalificadas');

   Route::get('/reportes/fichadatos','CT_FSE705@index');
   Route::post('/reportes/listarfichasCalificadasDatos','CT_FSE705@listarfichasCalificadasDatos');
});	

Route::group(['middleware' => 'alumno'], function () {
   //Ubigeo
   Route::get('/provincias/{iddepartamento}', 'CT_ADM001@getProvincias');
   Route::get('/distritos/{idprovincia}', 'CT_ADM001@getDistritos');
   //Procesos
   Route::get('/procesos/ficha','CT_FSE300@index');     
   Route::post('/procesos/ficha','CT_FSE300@index');     
   Route::post('/procesos/ficha/paso1', 'CT_FSE300@paso1');
   Route::post('/procesos/ficha/paso2', 'CT_FSE300@paso2');
   Route::post('/procesos/ficha/paso2/listarFamiliares', 'CT_FSE300@listarFamiliares');
   Route::post('/procesos/ficha/paso2/nuevoFamiliar', 'CT_FSE300@nuevoFamiliar');
   Route::post('/procesos/ficha/paso2/actualizarFamiliar', 'CT_FSE300@actualizarFamiliar');
   Route::post('/procesos/ficha/paso2/eliminarFamiliar', 'CT_FSE300@eliminarFamiliar');
   Route::post('/procesos/ficha/paso3', 'CT_FSE300@paso3');
   Route::post('/procesos/ficha/paso4', 'CT_FSE300@paso4');
   Route::post('/procesos/ficha/paso5', 'CT_FSE300@paso5');
   Route::post('/procesos/ficha/paso6', 'CT_FSE300@paso6');
   Route::post('/procesos/ficha/paso7', 'CT_FSE300@paso7');
   Route::post('/procesos/ficha/paso8', 'CT_FSE300@paso8');
   Route::post('/procesos/ficha/paso9', 'CT_FSE300@paso9');
   Route::post('/procesos/ficha/validarLlenado', 'CT_FSE300@validarLlenado');
   Route::post('/configuracion/insertarParametros', 'CT_FSE001@insertarParametros');
   Route::post('/configuracion/actualizarParametros', 'CT_FSE001@actualizarParametros');
   Route::post('/configuracion/eliminarParametros', 'CT_FSE001@eliminarParametros');
   //Reportes
   Route::get('/reportes/constancia', 'CT_FSE700@generarConstancia');
   Route::get('/reportes/ficha/{codigoproceso}/{carnetuniversitario}', 'CT_FSE703@generarFicha');
   //Route::get('/reportes/ficha/{carnetuniversitario}', 'CT_FSE703@generarFicha');
});   

Route::get('/reportes/constancia/{carnetuniversitario}', 'CT_FSE701@generarConstanciaUrl');		
Route::get('/api/ficharealizada/{semestre}/{carnetuniversitario}', 'CT_FSE701@getFichaRealizada');  

	
