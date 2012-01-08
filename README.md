TurtlePHP Roles Plugin
===
TurtlePHP Roles Plugin provides a standardized way to differentiate between
different codebase environments (eg. local, development, staging, production).

### Example Role Storage
    <?php
    
        /**
         * Defines a unique property used to distinguish the running environment.
         * Accesses the <$_SERVER> array to define role, and as a result, the order
         * here matters.
         */
        $roles = array(
            array(
                'HTTP_HOST',
                'local.turtlephp.com',
                'onassar'
            ),
            array(
                'HTTP_HOST',
                'turtlephp.com',
                'production'
            )
        );
    
        // store in singleton
        \Plugin\Roles::store($roles);

### Example Role Retrieval
    /**
     * Roles
     */
    require_once APP . '/plugins/Roles.class.php';
    require_once APP . '/includes/setup/roles.inc.php';
    $role = \Plugin\Roles::retrieve();

