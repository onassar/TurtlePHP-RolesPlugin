<?php

    // namespace
    namespace Plugin;

    // dependency check
    if (class_exists('\\Plugin\\Config') === false) {
        throw new \Exception(
            '*Config* class required. Please see ' .
            'https://github.com/onassar/TurtlePHP-ConfigPlugin'
        );
    }

    /**
     * Roles
     * 
     * TurtlePHP Roles Plugin provides a standardized way to differentiate
     * between different codebase environments (eg. local, development, staging,
     * production).
     * 
     * @author   Oliver Nassar <onassar@gmail.com>
     * @abstract
     */
    abstract class Roles
    {
        /**
         * _configPath
         *
         * @var    string
         * @access protected
         * @static
         */
        protected static $_configPath = 'config.default.inc.php';

        /**
         * _initiated
         *
         * @var    boolean
         * @access protected
         * @static
         */
        protected static $_initiated = false;

        /**
         * _role
         * 
         * @var    string
         * @access private
         * @static
         */
        protected static $_role;

        /**
         * init
         * 
         * @access public
         * @static
         * @return void
         */
        public static function init()
        {
            if (is_null(self::$_initiated) === false) {
                self::$_initiated = true;
                require_once self::$_configPath;
                $config = \Plugin\Config::retrieve('TurtlePHP-RolesPlugin');
                self::$_role = $config['role'];
            }
        }

        /**
         * retrieve
         * 
         * @access public
         * @static
         * @return string
         */
        public static function retrieve()
        {
            return self::$_role;
        }

        /**
         * setConfigPath
         * 
         * @access public
         * @param  string $path
         * @return void
         */
        public static function setConfigPath($path)
        {
            self::$_configPath = $path;
        }
    }

    // Config
    $info = pathinfo(__DIR__);
    $parent = ($info['dirname']) . '/' . ($info['basename']);
    $configPath = ($parent) . '/config.inc.php';
    if (is_file($configPath)) {
        Redirect::setConfigPath($configPath);
    }

    // Load global functions
    require_once 'global.inc.php';
