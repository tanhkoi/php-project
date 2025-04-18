<?php
/**
 * Smarty Internal Plugin Compile Continue
 * Compiles the {continue} tag
 *
 *    Smarty
 * @subpackage Compiler
 * @author     Uwe Tews
 */

/**
 * Smarty Internal Plugin Compile Continue Class
 *
 *    Smarty
 * @subpackage Compiler
 */
class Smarty_Internal_Compile_Continue extends Smarty_Internal_Compile_Break
{
    /**
     * Tag name
     *
     * @var string
     */
    public $tag = 'continue';
}
