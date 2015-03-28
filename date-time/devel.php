<?php
header( 'Content-Type: text/html; Charset=UTF-8' );

function sel( $tz ) {
    if ( isset( $_POST['timezone'] ) )
        if ( $tz == $_POST['timezone'] ) echo 'selected';
}

//
// http://php.net/manual/en/timezones.php
//

// This must be valid or an exception is thrown. To keep the example
// short, we'll not handle this one.
date_default_timezone_set( 'America/Sao_Paulo' );

$action = filter_input( INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS );
$timezone = NULL;
$str_date_time = NULL;

if ( $action == NULL ) {
    $timezone = date_default_timezone_get();
    $msg = "Default, system timezone is currently set: “{$timezone}”.";
}
else {
    $timezone = filter_input( INPUT_POST, 'timezone', FILTER_SANITIZE_SPECIAL_CHARS );
    $msg = "User-defined timezone: {$timezone}";
}

try {
    $DateTime = new DateTime( 'now', new DateTimeZone( $timezone ) );
    $str_date_time = $DateTime->format( 'd/m/Y H:i:s' );
}
catch ( Exception $err ) {
    // log error.
    $default_timezone = date_default_timezone_get();
    $msg = "{$timezone} is invalid. Using system default
        timezone “{$default_timezone}” instead.";
    $DateTime = new DateTime( 'now', new DateTimeZone( $default_timezone ) );
    $str_date_time = $DateTime->format( 'd/m/Y H:i:s' );
}
?>
<!DOCTYPE html>

<html>
<head>
  <meta charset='utf-8'>
  <title>User Choose TimeZone</title>
  <style type='text/css'>
    html { background-color: #fff; }
    body {
        width: 900px;
        margin: 0 auto;
        background-color: #f9f9f9;
        font-family: 'PT Mono', 'Dejavu Serif', Verdana, Helvetica, Arial;
        padding: 30px;
    }
  </style>
</head>
<body>

<form action='<?= $_SERVER['PHP_SELF']; ?>?action=settz' method='post'>
    <select name='timezone'>
        <option value='none' <?php sel( 'none' ); ?>>Select one...</option>
        <option value='America/Sao_Paulo'
            <?php sel( 'America/Sao_Paulo' ); ?>>America/Sao_Paulo
        </option>
        <option value='Europe/Berlin'
            <?php sel( 'Europe/Berlin' ); ?>>Europe/Berlin
        </option>
        <option value='Japan' <?php sel( 'Japan' ); ?>>Japan</option>
        <option value='Lybia' <?php sel( 'Lybia' ); ?>>Lybia</option>
        <option value='Jamaica' <?php sel( 'Jamaica' ); ?>>Jamaica</option>
    </select>
    <input type='submit' value='OK'>
</form>

<p><?= $msg; ?></p>

<?php if ( $str_date_time != NULL ): ?>
<p>The current date and time in the specified timezone is <?= $str_date_time; ?>.</p>
<?php endif; ?>

<p><a href='<?= $_SERVER['PHP_SELF']; ?>'>Back to default.</a></p>
</body>
</html>
