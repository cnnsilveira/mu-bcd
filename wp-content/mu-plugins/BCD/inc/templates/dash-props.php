<?php
/**
 * This file generates the markup for the property lists page.
 *
 * @package BCD
 */

// Require helper and markup functions.
bcd__require_functions();

// Creates the main structure and opens the content tag.
bcd__open( 'Imóveis' );

// Page main content.
bcd__prop_table();

// Creates the main structure and closes the content tag.
bcd__close();
