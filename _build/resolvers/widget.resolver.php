<?php
/**
 * MODXDashboardWidgetPack widget resolver
 *
 * @package MODXDashboardWidgetPack
 * @subpackage build
 */

/** @var $widgets */
$widgets = [
    [
        'name'        => 'modxdashboardwidgetpack.widget.welcome',
        'description' => 'modxdashboardwidgetpack.widget.welcome_desc',
        'type'        => 'file',
        'content'     => '[[++core_path]]components/modxdashboardwidgetpack/elements/widgets/welcome.php',
        'namespace'   => 'modxdashboardwidgetpack',
        'lexicon'     => 'modxdashboardwidgetpack:default',
        'size'        => 'half',
        'properties'  => '{"background_image_path":""}'
    ], [
        'name'        => 'modxdashboardwidgetpack.widget.shortcuts',
        'description' => 'modxdashboardwidgetpack.widget.shortcuts_desc',
        'type'        => 'file',
        'content'     => '[[++core_path]]components/modxdashboardwidgetpack/elements/widgets/shortcuts.php',
        'namespace'   => 'modxdashboardwidgetpack',
        'lexicon'     => 'modxdashboardwidgetpack:default',
        'size'        => 'half'
    ]
];

$success = false;
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
    case xPDOTransport::ACTION_UPGRADE:
        foreach ($widgets as $widget) {
            $widgetObject = $object->xpdo->getObject('modDashboardWidget', ['name' => $widget['name']]);
            if (!$widgetObject) {
                $widgetObject = $object->xpdo->newObject('modDashboardWidget');
                $widgetObject->fromArray($widget);
                $widgetObject->save();
                $object->xpdo->log(modX::LOG_LEVEL_INFO, 'Installed widget: ' . $widget['name']);
            }
        }

        $success = true;
        break;
    case xPDOTransport::ACTION_UNINSTALL:

        $success = true;
        break;
}

return $success;