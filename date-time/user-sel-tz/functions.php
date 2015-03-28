<?php

/**
 * Helper function to add a `selected` html attribute to the
 * <option> element when it is the case.
 *
 * @param string a timezone like 'America/Sao_Paulo' or 'Europe/Berlin'.
 */
function sel( $tz ) {
    if ( isset( $_POST['timezone'] ) ) {
        if ( $tz == $_POST['timezone'] ) {
            echo 'selected';
        }
    }
}

/**
 * Builds the <option>s tags.
 * @param array
 * @return string Contains the available list of timezones.
 */
function get_select_options( $timezones ) {
    $opts = "<option value='0'>Select...</option>";
    foreach ( $timezones AS $key => $val ) {
        if ( $key == $_GET['timezone'] ) {
            $opts .= "<option value='{$key}' selected>{$val}</option>";
        }
        else {
            $opts .= "<option value='{$key}'>{$val}</option>";
        }
    }
    return $opts;
}
