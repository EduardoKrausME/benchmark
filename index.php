<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Benchmark</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="http://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php
error_reporting ( E_ALL );
ini_set ( 'display_errors', 'On' );

global $string;
require 'libs.php';
require 'lang/report_benchmark.php';
require 'report_benchmark_renderer.php';
require 'report_benchmark.php';
require 'report_benchmark_test.php';


set_time_limit ( 120 );


$report_benchmark_renderer = new report_benchmark_renderer();

if ( isset( $_GET[ 'step' ] ) )
    echo $report_benchmark_renderer->display ();
else
    echo $report_benchmark_renderer->launcher ();



?>
</body>
</html>
