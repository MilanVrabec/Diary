<?php

/**
 * Make file
 * 
 * Create new file
 */
function mk_file( $filename ){

    // If files doesn't exist, create the file and close it
    if ( ! is_file( $filename ) ){
        
        fclose( fopen( $filename, 'x' ) );
        return true;
    }

    // File already exists
    return false;

}

/**
 * Parity
 */
function get_parity( $row ){

    if( $row % 2 == 0 ){
        return 'even';
    }

    return 'odd';

}

/**
 * Login
 */
function can_edit(){

    if ( ! strpos( $_SERVER['REQUEST_URI'], 'index.php' ) ) return false;

    $what = isset( $_GET['what'] ) ? $_GET['what'] : false;
    $add = isset( $_GET['add'] ) ? $_GET['add'] : false;

    return $what === 'admin' && $add == 1;
}


/**
 * No tags
 */
function plain( $str ){
    
    return htmlspecialchars( $str, ENT_QUOTES );

}