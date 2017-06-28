<?php

$string[ 'benchmark' ]        = 'Benchmark';
$string[ 'adminreport' ]      = 'System Benchmark';
$string[ 'info' ]             = 'This benchmark has to last no more than 1 minute; it stops at 2 minutes. Please wait until results show up.';
$string[ 'infoaverage' ]      = 'We invite you to take this test several times to have the average.';
$string[ 'infodisclamer' ]    = 'It isn\'t advisable to run this benchmark on a platform in production.';
$string[ 'start' ]            = 'Iniciar o teste';
$string[ 'redo' ]             = 'Fazer um novo teste';
$string[ 'scoremsg' ]         = 'Tempo para executar este teste: ';
$string[ 'description' ]      = 'Descrição';
$string[ 'during' ]           = 'Tempo, em segundos';
$string[ 'limit' ]            = 'Limite aceitável';
$string[ 'over' ]             = 'Limite crítico';
$string[ 'total' ]            = 'Tempo total';

/*
 * Add your test below
 */


$string[ 'processorname' ]       = 'Uma função chamada muitas vezes';
$string[ 'processormoreinfo' ]   = 'Uma função é chamada em um loop para testar a velocidade do processador';
$string[ 'filereadname' ]        = 'Leitura de arquivos';
$string[ 'filereadmoreinfo' ]    = 'Testar a velocidade de leitura no servidor';
$string[ 'filewritename' ]       = 'Criação de arquivos';
$string[ 'filewritemoreinfo' ]   = 'Testar a velocidade de gravação no servidor';

/*
 * Add your solution here
 */

$string[ 'slowserverlabel' ]    = 'Your web server is too slow.';
$string[ 'slowserversolution' ] = '<ul><li>Set your Apache in <a href="https://httpd.apache.org/docs/2.4/en/mpm.html" target="_blank">multi-processing</a> mode or switch on <a href="https://nginx.org/" target="_blank">NGinx</a>.</li><li>If your Moodle is installed on your computer, you can try to deactivate your antivirus where Moodle is located. Do it with precaution.</li></ul>';

$string[ 'slowprocessorlabel' ]    = 'Your processor is too slow.';
$string[ 'slowprocessorsolution' ] = '<ul><li>Check that the equipment is enough to run Moodle.</li></ul>';

$string[ 'slowharddrivelabel' ]    = 'The harddrive is too slow.';
$string[ 'slowharddrivesolution' ] = '<ul><li>Check the harddrive state / temp folder</li><li>Change your harddrive or the temporary folder</li></ul>';