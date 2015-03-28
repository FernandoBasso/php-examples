# PHP - Working Date and Time #

This is the first stop on this matter:
http://php.net/manual/en/book.datetime.php


This takes leap years and daylight saving time into consideration:

    $date = strtotime( '+ 7 days', time() );

But this does NOT:

    $date = time() + 7 * 24 * 60 * 60;



