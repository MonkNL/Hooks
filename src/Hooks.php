<?php
namespace Hooks;
/**
 * Class Hooks
 *
 * Manages hooks and actions within the application.
 */
class Hooks {
    private static $instance = null;
    private $hooks = []; // Array to store registered hooks
    private $calledHooks = []; // Array to track called hooks
    private $allowSameCallback = false; // Same callback can be called multiple times within one hook.

    private function __construct() {
        // Private constructor to prevent direct instantiation
    }

    /**
     * Get the singleton instance of the Hooks class.
     *
     * @return Hooks
     */
    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    public static function calledHooks(){
        return self::$instance->calledHooks;
    }
    public static function uncalledHooks(){

    }
    /**
     * Execute hooks for a specific action.
     *
     * @param string $hook The hook name.
     * @param mixed ...$args Additional arguments to pass to the hooks.
     */
    private function doHook($hook, ...$args): void {
        // Execute hooks and keep track of called hooks
        if (empty($this->calledHooks[$hook])) {
            $this->calledHooks[$hook] = ['times' => 0, 'arguments' => $args];
        }
        $this->calledHooks[$hook]['times']++;

        if (empty($this->hooks[$hook])) {
            return;
        }
        usort($this->hooks[$hook], function ($a, $b) {
            return $a['priority'] <=> $b['priority'];
        });
        foreach ($this->hooks[$hook] as $currentAction) {
            call_user_func_array($currentAction['callback'], $args);
        }
    }

    /**
     * Add a new action hook.
     *
     * @param string $hook The hook name.
     * @param callable $callback The callback function to execute.
     * @param int $priority The priority of the hook.
     * @param array $args Additional arguments for the hook.
     */
    private function addAction(string $hook, callable $callback, $priority = 10, int $acceptedArguments = 0): void {
        // Add a new hook
        if (!empty($this->hooks[$hook]) && !$this->allowSameCallback) {
            $key = array_search($callback, array_column($this->hooks[$hook], 'callback'));
            if ($key !== false) {
                returen;
            }
        }
        $this->hooks[$hook][] = ['callback' => $callback, 'priority' => $priority, 'acceptedArguments' => $acceptedArguments];
    }

    /**
     * Remove an action hook.
     *
     * @param string $hook The hook name.
     * @param callable $callback The callback function to remove.
     */
    private function removeAction(string $hook, callable $callback): void {
        // Remove a hook based on the callback function
        if (!empty($this->hooks[$hook])) {
            $key = array_search($callback, array_column($this->hooks[$hook], 'callback'));
            if ($key !== false) {
                unset($this->hooks[$hook][$key]);
            }
        }
    }
    private function enqueueScript(
        string $handle, 
		string $src = "", 
		array $deps = [], 
		string|bool|null $ver = false, 
		array|bool $args = []
    ){
        $this->registerScript($handle,$src,$deps,$ver,$args);
        
    }
    private function registerScript(
        string $handle, 
		string $src = "", 
		array $deps = [], 
		string|bool|null $ver = false, 
		array|bool $args = []
    ){
    
    }
    private function enqueueStyle(
        string $handle, 
		string $src = "", 
		array $deps = [], 
		string|bool|null $ver = false, 
		array|bool $args = []
    ){
    
    }
    private function dequeueScript(){

    }
    private function dequeueStyle(){

    }
    /**
     * Execute hooks for a specific action.
     *
     * @param string $hook The hook name.
     * @param mixed ...$args Additional arguments to pass to the hooks.
     * @return void
     */
    static function do_hook(string $hook, ...$args) {
        return call_user_func_array([self::getInstance(), 'doHook'], func_get_args());
    }

    /**
     * Add a new action hook.
     *
     * @param string $hook The hook name.
     * @param callable $callback The callback function to execute.
     * @param int $priority The priority of the hook.
     * @param int $acceptedArguments Number of accepted arguments for the hook.
     * @return void
     */
    static function add_action(
        string $hook,
        callable $callback,
        int $priority = 10,
        int $acceptedArguments = 0
    ) {
        return call_user_func_array([self::getInstance(), 'addAction'], func_get_args());
    }

    /**
     * Remove an action hook.
     *
     * @param string $hook The hook name.
     * @param callable $callback The callback function to remove.
     * @return void
     */
    static function remove_action(
        string $hook,
        callable $callback
    ) {
        return call_user_func_array([self::getInstance(), 'removeAction'], func_get_args());
    }
    /** 
    * Enqueue a script
    *
    * @param string $handle Name of the script. Should be unique.
    * @param string $src Full URL of the script, or path of the script relative to the root directory.
    * @param array $deps An array of registered script handles this script depends on. 
    * @param string|bool|null $ver String specifying script version number, if it has one, which is added to the URL as a query string for cache busting purposes.
    * @param array|bool $args An array of additional script loading strategies.
    * @return void
    */
    static function enqueue_script(
        string $handle, 
		string $src = "", 
		array $deps = [], 
		string|bool|null $ver = false, 
		array|bool $args = []
    ){
        return call_user_func_array([self::getInstance(), 'enqueueScript'], func_get_args());
    }
    /** 
    * Register a script
    *
    * @param string $handle Name of the script. Should be unique.
    * @param string $src Full URL of the script, or path of the script relative to the root directory.
    * @param array $deps An array of registered script handles this script depends on. 
    * @param string|bool|null $ver String specifying script version number, if it has one, which is added to the URL as a query string for cache busting purposes.
    * @param array|bool $args An array of additional script loading strategies.
    * @return void
    */
    static function register_script(
        string $handle, 
		string $src = "", 
		array $deps = [], 
		string|bool|null $ver = false, 
		array|bool $args = []
    ){ 
        return call_user_func_array([self::getInstance(), 'registerScript'], func_get_args());
    }
    /** 
    * Enqueue a style
    *
    * @param string $handle Name of the style. Should be unique.
    * @param string $src Full URL of the script, or path of the script relative to the root directory.
    * @param array $deps An array of registered script handles this script depends on. 
    * @param string|bool|null $ver String specifying script version number, if it has one, which is added to the URL as a query string for cache busting purposes.
    * @param array|bool $args An array of additional script loading strategies.
    * @return void
    */
    static function enqueue_style(
        string $handle, 
		string $src = "", 
		array $deps = [], 
		string|bool|null $ver = false, 
		array|bool $args = []
    ){
        return call_user_func_array([self::getInstance(), 'enqueueStyle'], func_get_args());
    }
    static function dequeue_script(){
        return call_user_func_array([self::getInstance(), 'dequeueScript'], func_get_args());
    }
    static function dequeue_style(){
        return call_user_func_array([self::getInstance(), 'dequeueStyle'], func_get_args());
    }
}


?>
