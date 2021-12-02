<?php

require_once '../config/Controller.php';
require_once '../model/Reporte.php';

class ReporteController extends Controller {

    public function report($mes) {
        $report = new Reporte();
        $resp = $report->getData("SELECT indicadores.nombre AS KPI, COUNT(*) AS TOTAL, MONTHNAME(indicador_equipo.fecha_inicio) AS MONTH FROM indicador_equipo INNER JOIN indicadores ON indicador_equipo.indicador_id = indicadores.id WHERE MONTH(indicador_equipo.fecha_inicio) = $mes GROUP BY indicador_equipo.indicador_id");
        $this->responseJson($resp);
    }

}