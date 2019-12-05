<?php
$type = isset($_GET['type'])?$_GET['type']:"";
file_put_contents("SS_".$type,json_encode($_GET));