<?
include("../config/include.php");
include("../config/authentication.php");

/* NO SACAR ESTA LINEA POR NINGUN MOTIVO.
 * ESTA LINEA HACE QUE SE VEAN LOS GRAFICOS EN IE8 */
header("Pragma: public");

$sitio_id = $_REQUEST["sitio_id"];
$menu_id = $_REQUEST["menu_id"];
echo $menu_id;
$objeto_id = $_REQUEST["objeto_id"];
//$subobjeto_id = $_REQUEST["subobjeto_id"];
//$objeto_tipo = $_REQUEST["objeto_tipo"];
$accion = $_REQUEST["accion"];
$ejecutar_accion = $_REQUEST["ejecutar_accion"];
$popup = $_REQUEST["popup"];
$solo_action = $_REQUEST["solo_action"];


/*echo("<pre>");
print_r($_REQUEST);
echo("</pre>");*/
if (!$sitio_id) {
	$sitio_id = 0;
}

if (!$menu_id) {
	$menu_id = $sitio_id;
}

if (!$objeto_id) {
	$objeto_id = 0;
}

/*if (!$subobjeto_id) {
	$subobjeto_id = 0;
}*/



$sactual = Seccion::getSeccionPorDefecto($menu_id);
//TODO: quitar objetivo_id de seccion
$sactual->objeto_id = $objeto_id;
//$sactual->subobjeto_id = $subobjeto_id;

/* LA ACCION SE EJECUTA DENTRO DE UN TRY-CATCH POR SI SE PRODUCE UN ERROR */

$error_accion_estado = 0;
$error_accion_mensaje = "";




if (isset($ejecutar_accion) and $ejecutar_accion == 1) {
	try {
//        if($sactual->tipo == 'ES_INFORME_PRECIO' || $sactual->tipo == 'ES_LISTA_OBJETIVOS_PRECIO') {
//            include(REP_PATH_CONTROLLER."actionPrecios.php");
//        }
//        else  {
            include(REP_PATH_CONTROLLER.$cod_pagina_action[$sitio_id]);
//        }
	}
	catch (Exception $e) {
		unset($accion);
		$error_accion_estado = 1;
		$error_accion_mensaje = $e->getMessage();
	}
}




if ($popup) {
	if ($sactual->tipo == 'ES_LISTA_ESPECIALES') {
		include(REP_PATH_CONTROLLER."showEspeciales.php");
	}
	else {
		include(REP_PATH_CONTROLLER."showReportesPopup.php");
	}
}
else {

if($solo_action != 't') {
	
	$T =& new Template_PHPLIB(REP_PATH_TEMPLATES);
	$T->setFile('tpl_sitio', 'layout.tpl');
	$T->setVar('calendario', SUB_SECCION_MANTENIMIENTO);
	$T->setVar('historial', SUB_SECCION_MANTENIMIENTO_HISTORIAL);
	$T->setVar('agregar', SUB_SECCION_MANTENIMIENTO_AGREGAR_EVENTO);
	$T->setVar('seccion', SECCION_MANTENIMIENTO);
      if($menu_id!=167 && $menu_id!=52 && $menu_id!=8  && $menu_id!=1 ){

     ?>
         <script type="text/javascript" src="tools/dojo/dojo/dojo.js" djConfig="parseOnLoad:true"></script>
		<?php
	}

	
   
	if ($menu_id==0 || $menu_id==1 ||  $menu_id==8 || $menu_id==52 ) {
		$T->setVar('__seccion', 'tools/dojo/nueva_capa/capa_general.js');
	}
	else if ($menu_id==39 || $menu_id==2  ) {
		$T->setVar('__seccion', 'tools/dojo/nueva_capa/capa_alertas.js');
	}
	else if ($menu_id==71) {
		$T->setVar('__seccion', 'tools/dojo/nueva_capa/capa_semaforo.js');
	}
	
	
	else if ($menu_id==36 || $menu_id==6) {
		$T->setVar('__seccion', 'tools/dojo/nueva_capa/capa_objetivo_misobjetivos.js');
	}
	else if ($menu_id==72) {
		$T->setVar('__seccion', 'tools/dojo/nueva_capa/capa_vista_rapida.js');
	}

	else if ($menu_id==99) {
		$T->setVar('__seccion', 'tools/dojo/nueva_capa/capa_rendimiento_rango.js');
	}
    else if ($menu_id==43) {
		$T->setVar('__seccion', 'tools/dojo/nueva_capa/capa_alertas_contactos.js');
	}

    else if ($menu_id==41) {
		$T->setVar('__seccion', 'tools/dojo/nueva_capa/capa_alerta_horarios.js');
	}

    else if ($menu_id==88) {
		$T->setVar('__seccion', 'tools/dojo/nueva_capa/capa_objetivos_descripcion.js');
	}

    else if ($menu_id==38) {
		$T->setVar('__seccion', 'tools/dojo/nueva_capa/capa_objetivos_horarios_habiles.js');
	}
    else if ($menu_id==94) {
		$T->setVar('__seccion', 'tools/dojo/nueva_capa/capa_ponderacion_horaria.js');
	}
    else if ($menu_id==31 || $menu_id==4 ) {
		$T->setVar('__seccion', 'tools/dojo/nueva_capa/capa_opcionesusuario_usuario.js');
	}

    else if ($menu_id==32) {
		$T->setVar('__seccion', 'tools/dojo/nueva_capa/capa_opcionesusuario_grupos.js');
	}
    else if ($menu_id==53) {
		$T->setVar('__seccion', 'tools/dojo/nueva_capa/capa_opcionesusuario_perfil.js');
	}
  	else if ($menu_id==77 || $menu_id==9 ) {
		$T->setVar('__seccion', 'tools/dojo/nueva_capa/capa_reporteonline.js');
	}
    else if ($menu_id==17) {
		$T->setVar('__seccion', 'tools/dojo/nueva_capa/capa_reon_disponibilidad.js');
	}
    else if ($menu_id==18) {
		$T->setVar('__seccion', 'tools/dojo/nueva_capa/capa_reon_tr.js');
	}
    else if ($menu_id==67) {
		$T->setVar('__seccion', 'tools/dojo/nueva_capa/capa_reon_estadisticas.js');
	}
    else if ($menu_id==90) {
		$T->setVar('__seccion', 'tools/dojo/nueva_capa/capa_reon_registrosplus.js');
	}
    else if ($menu_id==91) {
		$T->setVar('__seccion', 'tools/dojo/nueva_capa/capa_reon_elementosplus.js');
	}

     
    else if ($menu_id==92) {
		$T->setVar('__seccion', 'tools/dojo/nueva_capa/capa_reon_screenshot.js');
	}

    else if ($menu_id==95) {
		$T->setVar('__seccion', 'tools/dojo/nueva_capa/capa_reon_ponderados.js');
	}
    else if ($menu_id==68) {
		$T->setVar('__seccion', 'tools/dojo/nueva_capa/capa_reon_datos.js');
	}

    else if ($menu_id==68) {
		$T->setVar('__seccion', 'tools/dojo/nueva_capa/capa_reon_datos.js');
	}

    else if ($menu_id==132) {
		$T->setVar('__seccion', 'tools/dojo/nueva_capa/capa_reon_consolidacion.js');
	}

    else if ($menu_id==134) {
		$T->setVar('__seccion', 'tools/dojo/nueva_capa/capa_reon_eventoespecial.js');
	}

    else if ($menu_id==167) {
		$T->setVar('__seccion', 'tools/dojo/nueva_capa/capa_reon_tronline.js');

		
	}


    
    else if ($menu_id==78 || $menu_id==58 ) {
		$T->setVar('__seccion', 'tools/dojo/nueva_capa/capa_reperiodico.js');
	}



  
    else if ($menu_id==79) {
		$T->setVar('__seccion', 'tools/dojo/nueva_capa/capa_periodico_disponibilidad.js');
	}


   
    
    else if ($menu_id==81) {
		$T->setVar('__seccion', 'tools/dojo/nueva_capa/capa_periodico_tr.js');
	}
    else if ($menu_id==82) {
		$T->setVar('__seccion', 'tools/dojo/nueva_capa/capa_periodico_estadistica.js');
	}


    else if ($menu_id==89) {
		$T->setVar('__seccion', 'tools/dojo/nueva_capa/capa_urlexcluidas.js');
	}

    else if ($menu_id==34) {
		$T->setVar('__seccion', 'tools/dojo/nueva_capa/capa_reporte_especial.js');
	}

    else if ($menu_id==35) {
		$T->setVar('__seccion', 'tools/dojo/nueva_capa/capa_reporte_stress.js');
	}


    else if ($menu_id==103 || $menu_id==102) {
		$T->setVar('__seccion', 'tools/dojo/nueva_capa/capa_reporte_apm.js');
	}

    else if ($menu_id==110 || $menu_id==109) {
		$T->setVar('__seccion', 'tools/dojo/nueva_capa/capa_reporte_rum.js');
	}

    
    else if ($menu_id==118 || $menu_id==117) {
		$T->setVar('__seccion', 'tools/dojo/nueva_capa/capa_reporte_audex.js');
	}
     
    else if ($menu_id==120 || $menu_id==119) {
		$T->setVar('__seccion', 'tools/dojo/nueva_capa/capa_reporte_mobile.js');
	}
     
    else if ($menu_id==126 || $menu_id==125) {
		$T->setVar('__seccion', 'tools/dojo/nueva_capa/capa_reporte_atdex.js');
	}

   
   

	/*

    



*/
   include(REP_PATH_CONTROLLER."showSecciones.php");
	
//	if ($sactual->tipo == 'ES_INFORME_PRECIO' || $sactual->tipo == 'ES_LISTA_OBJETIVOS_PRECIO') {
//		include(REP_PATH_CONTROLLER . 'showPrecios.php');
//	}
	if ($sactual->tipo == 'ES_LISTA_ESPECIALES') {
		include(REP_PATH_CONTROLLER."showEspeciales.php");
	}
	else {
		include(REP_PATH_CONTROLLER.$cod_pagina_show[$sitio_id]);
	}

	$T->pparse('out', 'tpl_sitio');
}

}
$mdb2->disconnect();




?>
