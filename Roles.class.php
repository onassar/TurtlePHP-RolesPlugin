<?php

    // namespace
    namespace Plugin;

    /**
     * Roles
     * 
     * TurtlePHP Roles Plugin provides a standardized way to differentiate
     * between different codebase environments (eg. local, development, staging,
     * production).
     * 
     * Matches a role by comparing the defined <_SERVER> key (first position in
     * array) to the defined value (second position in array). When found, the
     * role (third position in array) is set, and returned through the
     * <retrieve> method.
     * 
     * If no role could be found matching, an <Exception> is thrown.
     * 
     * @author   Oliver Nassar <onassar@gmail.com>
     * @abstract
     */
    abstract class Roles
    {
        /**
         * _role
         * 
         * @var    string
         * @access private
         * @static
         */
        protected static $_role;

        /**
         * _roles
         * 
         * @var    array
         * @access protected
         * @static
         */
        protected static $_roles;

        /**
         * getRole
         * 
         * @access public
         * @static
         * @return string
         */
        public static function retrieve()
        {
            // role check
            if (isset(self::$_role)) {
                return self::$_role;
            }

            // grab/store role
            foreach (self::$_roles as $details) {
                list($key, $value, $type) = $details;
                if (isset($_SERVER[$key]) && $_SERVER[$key] === $value) {
                    $role = $type;
                    break;
                }
            }

            // role found
            if (isset($role)) {
                self::$_role = $role;
                return $role;
            }

            // valid role couldn't be found
            throw new \Exception(
                'Application role couldn\'t be found.'
            );
        }

        /**
         * store
         * 
         * Sets the possible roles for the application environments.
         * 
         * @access public
         * @static
         * @param  array $roles
         * @return void
         */
        public static function store(array $roles)
        {
            self::$_roles = $roles;
        }
    }

