<?php
/*
 * @author      Oleh Burkhay <atma@atmaworks.com>
 * @license     http://www.gnu.org/licenses/gpl-3.0.html
 * @package     modfire
 */

class modFire {

    /*
     * Constructs a new instance of the modFire class.
     */
    final public function __construct(modX &$modx, array $options = array()) {
        require_once $modx->getOption('core_path') . 'components/modfire/firephp.class.php';
        $enabled = $modx->getOption('modfire.enabled');
        $this->setEnabled($enabled);
        $this->setOptions($options);
    }

    /**
    * Enable and disable logging to Firebug
    *
    * @param boolean $enabled TRUE to enable, FALSE to disable
    * @return void
    */
    public static function setEnabled($enabled) {
        $instance = FirePHP::getInstance(true);
        $instance->setEnabled($enabled);
    }

    /**
    * Check if logging is enabled
    *
    * @see FirePHP::getEnabled()
    * @return boolean TRUE if enabled
    */
    public static function getEnabled() {
        $instance = FirePHP::getInstance(true);
        return $instance->getEnabled();
    }

    /**
    * Specify a filter to be used when encoding an object
    *
    * Filters are used to exclude object members.
    *
    * @see FirePHP::setObjectFilter()
    * @param string $class The class name of the object
    * @param array $filter An array or members to exclude
    * @return void
    */
    public static function setObjectFilter($class, $filter) {
        $instance = FirePHP::getInstance(true);
        $instance->setObjectFilter($class, $filter);
    }

   /**
    * Set some options for the library
    *
    * @see FirePHP::setOptions()
    * @param array $options The options to be set
    * @return void
    */
    public static function setOptions($options) {
        $instance = FirePHP::getInstance(true);
        $instance->setOptions($options);
    }

    /**
    * Get options for the library
    *
    * @see FirePHP::getOptions()
    * @return array The options
    */
    public static function getOptions() {
        $instance = FirePHP::getInstance(true);
        return $instance->getOptions();
    }

    /**
    * Log object to firebug
    *
    * @see http://www.firephp.org/HQ/Use.htm
    * @param mixed $Object
    * @return true
    * @throws Exception
    */
    public static function send() {
        $instance = FirePHP::getInstance(true);
        $args = func_get_args();
        return call_user_func_array(array($instance, 'fb'), $args);
    }

    /**
    * Start a group for following messages
    *
    * Options:
    *   Collapsed: [true|false]
    *   Color:     [#RRGGBB|ColorName]
    *
    * @param string $name
    * @param array $options OPTIONAL Instructions on how to log the group
    * @return true
    */
    public static function group($name, $options=null) {
        $instance = FirePHP::getInstance(true);
        return $instance->group($name, $options);
    }

    /**
    * Ends a group you have started before
    *
    * @return true
    * @throws Exception
    */
    public static function groupEnd() {
        return self::send(null, null, FirePHP::GROUP_END);
    }

    /**
    * Log object with label to firebug console
    *
    * @see FirePHP::LOG
    * @param mixes $object
    * @param string $label
    * @return true
    * @throws Exception
    */
    public static function log($object, $label=null) {
    return self::send($object, $label, FirePHP::LOG);
  }

    /**
    * Log object with label to firebug console
    *
    * @see FirePHP::INFO
    * @param mixes $object
    * @param string $label
    * @return true
    * @throws Exception
    */
    public static function info($object, $label=null) {
        return self::send($object, $label, FirePHP::INFO);
    }

    /**
    * Log object with label to firebug console
    *
    * @see FirePHP::WARN
    * @param mixes $object
    * @param string $label
    * @return true
    * @throws Exception
    */
    public static function warn($object, $label=null) {
        return self::send($object, $label, FirePHP::WARN);
    }

    /**
    * Log object with label to firebug console
    *
    * @see FirePHP::ERROR
    * @param mixes $object
    * @param string $label
    * @return true
    * @throws Exception
    */
    public static function error($object, $label=null) {
        return self::send($object, $label, FirePHP::ERROR);
    }

    /**
    * Dumps key and variable to firebug server panel
    *
    * @see FirePHP::DUMP
    * @param string $key
    * @param mixed $variable
    * @return true
    * @throws Exception
    */
    public static function dump($key, $variable) {
        return self::send($variable, $key, FirePHP::DUMP);
    }

    /**
    * Log a trace in the firebug console
    *
    * @see FirePHP::TRACE
    * @param string $label
    * @return true
    * @throws Exception
    */
    public static function trace($label) {
        return self::send($label, FirePHP::TRACE);
    }

    /**
    * Log a table in the firebug console
    *
    * @see FirePHP::TABLE
    * @param string $label
    * @param string $table
    * @return true
    * @throws Exception
    */
    public static function table($label, $table) {
        return self::send($table, $label, FirePHP::TABLE);
    }
}

