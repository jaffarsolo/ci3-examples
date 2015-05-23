<?php
/*
 * magic_methods.php
 * 20150523 kgoe
 * contains a demonstration of core php magic methods
 */

echo htmlp(__LINE__);
echo htmlp(__FILE__);
echo htmlp(__DIR__);
echo htmlp(__FUNCTION__);
echo htmlp(__CLASS__);
echo htmlp(__TRAIT__);
echo htmlp(__METHOD__);
echo htmlp(__NAMESPACE__);

//get_class()
//get_object_vars()
//file_exists()
//function_exists()

function htmlp($str) { return "<p>".$str."</p>"; }
?>