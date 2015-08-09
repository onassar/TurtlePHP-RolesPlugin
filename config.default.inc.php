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
    $role = $_SERVER['ROLE'];
    $config = array(
        'role' => $role
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
