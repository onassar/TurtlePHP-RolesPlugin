<?php

    /**
     * Namespace
     * 
     */
    namespace Plugin\Roles;

    /**
     * Config settings
     * 
     */
    $config = array(
        'role' => 'local'
    );

    /**
     * Config storage
     * 
     */

    // Store
    \Plugin\Config::add(
        'TurtlePHP-RolesPlugin',
        $config
    );
