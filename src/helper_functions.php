<?php 
function do_hook(string $hook,... $args):void{
	Hooks\Hooks::do_hook($hook,$args);
}
function add_action(string $hook,callable $callback,int $priority = 10,int $acceptedArguments  = 0):void{
	Hooks\Hooks::add_action($hook,$callback,$priority,$acceptedArguments);
}
function register_script(string $handle, 
string $src = "", 
array $deps = [], 
string|bool|null $ver = false, 
array|bool $args = []){
	Hooks\Hooks::register_script($handle,$src,$deps,$ver,$args);

}
function enqueue_script(
			string $handle, 
			string $src = "", 
			array $deps = [], 
			string|bool|null $ver = false, 
			array|bool $args = []
		):void{
	Hooks\Hooks::enqueue_script($handle,$src,$deps,$ver,$args);
}
function enqueue_style(
			string $handle, 
			string $src = "", 
			array $deps = [], 
			string|bool|null $ver = false, 
			array|bool $args = []
		):void{
	Hooks\Hooks::enqueue_style($handle,$src,$deps,$ver,$args);
}
function dequeue_script(){
	Hooks\Hooks::dequeue_script();
}
function dequeue_style(){
	Hooks\Hooks::dequeue_style();
}

register_script("CesiumJS","https://ajax.googleapis.com/ajax/libs/cesiumjs/1.78/Build/Cesium/Cesium.js",[],"1.78");
register_script("D3.js","https://ajax.googleapis.com/ajax/libs/d3js/7.9.0/d3.min.js",[],"7.9.0");
register_script("Dojo","https://ajax.googleapis.com/ajax/libs/dojo/1.13.0/dojo/dojo.js",[],"1.13.0");
register_script("Ext Core","https://ajax.googleapis.com/ajax/libs/ext-core/3.1.0/ext-core.js",[],"3.1.0");
register_script("Hammer.JS","https://ajax.googleapis.com/ajax/libs/hammerjs/2.0.8/hammer.min.js",[],"2.0.8");
//register_script("Indefinite Observable","<script type='module'>   import { IndefiniteObservable } from 'https://ajax.googleapis.com/ajax/libs/indefinite-observable/2.0.1/indefinite-observable.bundle.js'; </script>",[],"2.0.1");
register_script("jQuery","https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js",[],"3.7.1");
register_script("jQuery Mobile"," https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js",[],"1.4.5");
register_script("jQuery UI","https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.3/jquery-ui.min.js",[],"1.13.3");
register_script("List.js","https://ajax.googleapis.com/ajax/libs/listjs/2.3.1/list.min.js",[],"2.3.1");
//register_script("Material Motion","<script type='module'>   import {Draggable,Point2DSpring,Tossable,combineStyleStreams, getPointerEventStreamsFromElement,} from 'https://ajax.googleapis.com/ajax/libs/material-motion/0.1.0/material-motion.bundle.js'; </script>",[],"0.1.0");
register_script("Model-Viewer","https://ajax.googleapis.com/ajax/libs/model-viewer/3.0.0/model-viewer.min.js",[],"3.0.0");
register_script("MooTools","https://ajax.googleapis.com/ajax/libs/mootools/1.6.0/mootools.min.js",[],"1.6.0");
register_script("Myanmar Tools","https://ajax.googleapis.com/ajax/libs/myanmar-tools/1.2.1/zawgyi_detector.min.js",[],"1.2.1");
register_script("Prototype","https://ajax.googleapis.com/ajax/libs/prototype/1.7.3.0/prototype.js",[],"1.7.3.0");
register_script("script.aculo.us","https://ajax.googleapis.com/ajax/libs/scriptaculous/1.9.0/scriptaculous.js",[],"1.9.0");
register_script("Shaka Player"," https://ajax.googleapis.com/ajax/libs/shaka-player/4.9.2/shaka-player.compiled.js ",[],"4.9.2");
register_script("SPF","https://ajax.googleapis.com/ajax/libs/spf/2.4.0/spf.js",[],"2.4.0");
register_script("SWFObject","https://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js",[],"2.2");
register_script("three.js","https://ajax.googleapis.com/ajax/libs/threejs/r84/three.min.js",[],"r84");
register_script("Web Font Loader","https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js",[],"1.6.26");
?>
