<?php
/*
 * magic_methods.php
 * 20150523 kgoe
 * contains a demonstration of core php magic methods
 */

namespace A {
class testing
{
	function __construct() {}
	function func()
	{
		echo htmlp("LINE : ".__LINE__);
		echo htmlp("FILE : ".__FILE__);
		echo htmlp("DIR : ".__DIR__);
		echo htmlp("FUNCTION : ".__FUNCTION__);
		echo htmlp("CLASS : ".__CLASS__);
		echo htmlp("TRAIT : ".__TRAIT__);
		echo htmlp("METHOD : ".__METHOD__);
		echo htmlp("NAMESPACE : ".__NAMESPACE__);
	}
}

echo htmlp("LINE : ".__LINE__);
echo htmlp("FILE : ".__FILE__);
echo htmlp("DIR : ".__DIR__);
echo htmlp("FUNCTION : ".__FUNCTION__);
echo htmlp("CLASS : ".__CLASS__);
echo htmlp("TRAIT : ".__TRAIT__);
echo htmlp("METHOD : ".__METHOD__);
echo htmlp("NAMESPACE : ".__NAMESPACE__);
echo htmlp("");
echo htmlp("TESTING CLASS");

$obj = new testing();
$obj->func();

//get_class()
//get_object_vars()
//file_exists()
//function_exists()

function htmlp($str) { return "<p>".$str."</p>"; }
}
?>