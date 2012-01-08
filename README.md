TurtlePHP Roles Plugin
===
TurtlePHP Roles Plugin provides a standardized way to differentiate between
different codebase environments (eg. local, development, staging, production).

Matches a role by comparing the defined <_SERVER> key (first position in
array) to the defined value (second position in array). When found, the
role (third position in array) is set, and returned through the
<retrieve> method.

If no role could be found matching, an <Exception> is thrown.  
Plugin is often useful when used with the TurtlePHP
[Config](https://github.com/onassar/TurtlePHP-ConfigPlugin) plugin.

### Example Role Storage
``` php
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

```

### Example Role Retrieval
``` php
<?php

    /**
     * Roles
     */
    require_once APP . '/plugins/Roles.class.php';
    require_once APP . '/includes/setup/roles.inc.php';
    $role = \Plugin\Roles::retrieve();

```

### Example Config and Role Usage
``` php
<?php

    /**
     * Config
     */
    require_once APP . '/plugins/Config.class.php';
    require_once APP . '/includes/setup/config.inc.php';
    $config = \Plugin\Config::retrieve();

    /**
     * Roles
     */
    require_once APP . '/plugins/Roles.class.php';
    require_once APP . '/includes/setup/roles.inc.php';
    $role = \Plugin\Roles::retrieve();

    /**
     * Runtime INI Settings
     */
    $runtime = $config['runtime'][$role];
    foreach ($runtime as $key => $value) {
        ini_set($key, $value);
    }

```
