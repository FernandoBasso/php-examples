<?php

echo 'Current timezone: ' .  date_default_timezone_get() . PHP_EOL;
date_default_timezone_set( 'Europe/Berlin' );
echo 'Europe/Berlin: ',  date( 'd/m/Y, h:i:s', time() ) . PHP_EOL;

date_default_timezone_set( 'America/Sao_Paulo' );
echo 'America/Sao_Paulo: ', date( 'd/m/Y, h:i:s', time() ) . PHP_EOL;
