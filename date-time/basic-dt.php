<?php

date_default_timezone_set( 'America/Sao_Paulo' );


// Current date and time, format and display.
$dt = new DateTime( 'now', new DateTimeZone( 'Europe/Berlin' ) );
echo $dt->format( 'd/m/Y h:i:s' ) . PHP_EOL;

// Or simply
$dt = new DateTime(); // Assumes timzone is set in php.ini or at runtime.
echo $dt->format( 'd/m/Y h:i:s' ) . PHP_EOL;

