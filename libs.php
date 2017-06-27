<?php
/**
 * User: Eduardo Kraus
 * Date: 27/06/17
 * Time: 19:03
 */


$CFG          = new stdClass();
$CFG->tempdir = '.';

function get_string ( $key )
{
    global $string;

    return $string[ $key ];
}

class html_writer
{
    public static function tag ( $tag, $texto, $class = '' )
    {
        $out = self::start_tag ( $tag, $class );
        $out .= $texto;
        $out .= self::end_tag ( $tag );

        return $out;
    }

    public static function start_tag ( $tag, $class = '', $options = null )
    {
        return "<$tag class='$class'>";
    }

    public static function end_tag ( $tag )
    {
        return "</$tag>";
    }

    public static function start_div ( $class, $options = null )
    {
        return self::start_tag ( 'div', $class, $options );
    }

    public static function end_div ()
    {
        return self::end_tag ( 'div' );
    }
}

class coding_exception extends Exception
{

}
