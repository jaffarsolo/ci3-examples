<?php
/*
 * magic_methods.php
 * 20150523 kgoe
 * contains a demonstration of core php magic methods
 */

class magic_methods
{

public function __construct() {
	
}

public function __sleep()
{
	 return array('dsn', 'username', 'password');
}

public function __wakeup()
{
	 $this->connect();
}

public function __toString()
{
	 return $this->foo;
}

public function __invoke($x)
{
	 var_dump($x);
}

public static function __set_state($an_array) // As of PHP 5.1.0
{
	 $obj = new A;
	 $obj->var1 = $an_array['var1'];
	 $obj->var2 = $an_array['var2'];
	 return $obj;
}

public function __debugInfo() {
	 return [
		  'propSquared' => $this->prop ** 2,
	 ];
}

}
?>