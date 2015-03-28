<?php
$action = filter_input( INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS );
$timezone_key = filter_input( INPUT_GET, 'timezone', FILTER_SANITIZE_NUMBER_INT );
$default_timezone_str = date_default_timezone_get();
$timezone_str = NULL;
$str_date_time = NULL;

$redir = FALSE;

//
// Detect when there is an intention to select a timezone, and
// redirect, so the form is not submitted again in case
// the user refreshes the page.
//
if ( $action == 'settz' ) {
    $to = "timezone={$timezone_key}";
    $redir = TRUE;
}

//
// In our case, $timezone_key is not null after a redirect,
// otherwise it is.
//
if ( $timezone_key !== NULL ) {
    if ( $timezone_key > 0 ) {
        $timezone_str = $timezones[$timezone_key];
        $msg = "User-defined timezone “{$timezone_str}”.";
    }
    else {
        $msg = "Please select a timezone.";
    }
}

if ( $redir ) {
    header( "Location: /?{$to}" );
}
else {
    try {
        $DateTime = new DateTime( 'now', new DateTimeZone( $timezone_str ) );
    }
    catch ( Exception $err ) {
        $invalid_timezone_str = $timezone_str;
        $msg = "Timezone was not selected or is invalid.
            Using default “{$default_timezone_str}” one instead.";
        $DateTime = new DateTime( 'now', new DateTimeZone( $default_timezone_str ) );
    }
    $str_date_time = $DateTime->format( 'd/m/Y H:i:s' );
}
