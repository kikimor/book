<?php
spl_autoload_register(function ($className) {
    if (strpos($className, 'app\\') === 0) {
        if (($pos = strrpos($className, '\\')) !== 3) {
            $classPath = substr($className, 4, $pos - 4);
            $classPath = __DIR__ . '/' . str_replace('\\', '/', $classPath);
        } else {
            $classPath = __DIR__;
        }

        $className = substr($className, strrpos($className, '\\') + 1);

        if (!file_exists($classPath . '/' . $className . '.php')) {
            throw new Exception($className . ' not found.');
        } else {
            require_once $classPath . '/' . $className . '.php';
        }
    }
});
