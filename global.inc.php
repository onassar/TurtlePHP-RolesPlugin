<?php

    /**
     * getRole
     * 
     * @access public
     * @return string
     */
    function getRole()
    {
        return \Plugin\Roles::retrieve();
    }
