TurtlePHP Roles Plugin
===


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

    // store in core for automated propagating
    \Plugin\Roles::store($roles);


### Example Role Retrieval
    /**
     * Roles
     */
    require_once APP . '/plugins/Roles.class.php';
    require_once APP . '/includes/setup/roles.inc.php';
    $role = \Plugin\Roles::retrieve();
