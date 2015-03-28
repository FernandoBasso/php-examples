<?php

date_default_timezone_set( 'America/Sao_Paulo' );
$fmt = 'd/m/Y h:i:s';

$dt = new DateTime( 'now', new DateTimeZone( 'America/Sao_Paulo' ) );
$dt->add( new DateInterval( 'P1DT2H' ) );
echo $dt->format( $fmt ) . PHP_EOL;

$dt = new DateTime( 'now', new DateTimeZone( 'America/Sao_Paulo' ) );
$dt->sub( new DateInterval( 'P1Y3M5DT1H20M35S' ) );
echo $dt->format( $fmt ) . PHP_EOL;
