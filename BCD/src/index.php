<?php
/**
 * Silence is golden.
 *
 * @package BCD Platform
 */

header( 'Location: ' . $_SERVER['HTTP_X_FORWARDED_PROTO'] . '://' . $_SERVER['HTTP_X_FORWARDED_HOST'] . '/' );
exit;