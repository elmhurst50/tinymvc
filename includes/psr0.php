<?php
/**
 * returns a list of thee registered namespaces for auto loading
 * @return array
 */

function psr0values() {
    $dir = __SITE_PATH . '/model';

    return array(
        'samjoyce\\montageFromFolder' => $dir,
        'samjoyce\\montagePlayer' => $dir
    );
}