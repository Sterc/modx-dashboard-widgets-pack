<?php
/**
 * Run this PHP script to generate CSS file based on the SCSS files.
 * Example: php build.assets.php
 */
require_once __DIR__ . '/vendor/autoload.php';

use ScssPhp\ScssPhp\Compiler;

$source = __DIR__ . '/scss/style.scss';

$scss = new Compiler();
if (!is_readable($source)) {
    echo sprintf('Failed to find %s', $source);
    exit;
}

$pathInfo = pathinfo($source);
$scss->addImportPath($pathInfo['dirname'] . '/');

$compiled = $scss->compile(file_get_contents($source), $source);

$cssPath = dirname(__DIR__) . '/assets/components/modxdashboardwidgetpack/css/';
if (!is_dir($cssPath)) {
    mkdir($cssPath, 0777);
}

$result = file_put_contents($cssPath . 'style.css', $compiled);
if (!$result) {
    echo 'Failed to generate css file.';
    exit;
}

echo 'Succesfully generated css file.';
exit;
