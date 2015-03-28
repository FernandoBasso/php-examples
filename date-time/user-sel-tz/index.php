<?php
$timezones = include 'timezones.php';
include 'functions.php';
include 'router.php';

//
// The timezone must be valid or an exception is thrown. To keep the example
// short, we'll not handle this one.
//
date_default_timezone_set( 'America/Sao_Paulo' );

header( 'Content-Type: text/html; Charset=UTF-8' );
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
    strong { font-weight: bold; }
  </style>
</head>
<body>

<form action='<?= $_SERVER['PHP_SELF']; ?>?action=settz' method='get'>
    <select name='timezone'>
        <?= get_select_options( $timezones ); ?>
    </select>
    <input type='submit' value='OK'>
</form>

<p><?= $msg; ?></p>

<?php if ( $str_date_time != NULL ): ?>
<p><strong><?= $str_date_time; ?></strong></p>
<?php endif; ?>

<p><a href='<?= $_SERVER['PHP_SELF']; ?>'>Back to default.</a></p>
</body>
</html>
