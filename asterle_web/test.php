<?php

$podaci = simplexml_load_file("test_podaci.xml") or die("Cant load xml file!");

print_r($podaci);

?>