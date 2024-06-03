<?php 
use Hooks;
function do_hook(string $hook,... $args):void{
	Hooks::do_hook($hook,$args);
}
function add_action(string $hook,callable $callback,int $priority = 10,int $acceptedArguments  = 0):void{
	Hooks::add_action($hook,$callback,$priority,$acceptedArguments);
}

?>
