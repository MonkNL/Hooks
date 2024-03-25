<?php 

function do_hook(string $hook,... $args):void{
	Hooks\Hooks::do_hook($hook,$args);
}
function add_action(string $hook,callable $callback,int $priority = 10,int $acceptedArguments  = 0):void{
	Hooks\Hooks::add_action($hook,$callback,$priority,$acceptedArguments);
}

?>
