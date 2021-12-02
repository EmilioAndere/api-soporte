<?php

require_once '../config/Controller.php';
require_once '../model/Reporte.php';

class ReporteController extends Controller {

    public function total_serve() {
        $report = new Reporte();
        $report->table("report_total_services");
        $resp = $report->all();
        $this->responseJson($resp);
    }

    public function between_date() {
        $report = new Reporte();
        $start = $_POST['start'];
        $end = $_POST['end'];
        $resp = $report->getData("CALL proc_report_between_date('$start', '$end')");
        $this->responseJson($resp);
    }

}