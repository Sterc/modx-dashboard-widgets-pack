<?php

/**
 * @package modx
 * @subpackage dashboard
 */
class ModxDashboardWidgetPackWidgetShortcuts extends modDashboardWidgetInterface
{
    /**
     * An array containing all possible shortcuts.
     *
     * @var array
     */
    public $shortcuts = [
        'clear_cache' => [
            'shortcuts' =>  [
                'mac' => 'CMD + SHIFT + U',
                'win' => 'CTRL + SHIFT + U'
            ],
            'permission' => 'empty_cache'
        ],
        'toggle_panel' => [
            'shortcuts' => [
                'mac' => 'CMD + SHIFT + H',
                'win' => 'CTRL + SHIFT + H'
            ]
        ],
        'preview_resource' => [
            'shortcuts' => [
                'mac' => 'CMD + OPTION + P',
                'win' => 'CTRL + ALT + P'
            ]
        ],
        'save_resource' => [
            'shortcuts' => [
                'mac' => 'CMD + S',
                'win' => 'CTRL + ALT + S'
            ]
        ]
    ];

    /**
     * ModxDashboardWidgetPackWidgetWelcome constructor.
     * @param \xPDO\xPDO $modx
     * @param modDashboardWidget $widget
     * @param modManagerController $controller
     */
    public function __construct(\xPDO\xPDO &$modx, modDashboardWidget &$widget, modManagerController &$controller)
    {
        parent::__construct($modx, $widget, $controller);
    }

    /**
     * @return string
     * @throws Exception
     */
    public function render()
    {
        $this->modx->lexicon->load('modxdashboardwidgetpack:default');
        $this->modx->controller->setPlaceholder('_lang', $this->modx->lexicon->fetch());

        $operatingSystem = strpos(getenv('HTTP_USER_AGENT'), 'Mac') !== false ? 'mac' : 'win';
        $data['shortcuts'] = [];
        foreach ($this->shortcuts as $key => $shortcut) {
            if (isset($shortcut['permission'])) {
                if (!$this->modx->hasPermission($shortcut['permission'])) {
                    continue;
                }
            }
            $data['shortcuts'][] = [
                'description' => $this->modx->lexicon('mdwp.shortcuts.' . $key),
                'shortcut'    => $shortcut['shortcuts'][$operatingSystem]
            ];
        }

        $this->modx->getService('smarty', 'smarty.modSmarty');
        foreach ($data as $key => $value) {
            $this->modx->smarty->assign($key, $value);
        }

        return $this->modx->smarty->fetch(dirname(__DIR__) . '/dashboard/shortcuts.tpl');
    }

    /**
     * @return string
     */
    public function process()
    {
        $this->cssBlockClass = 'widget--shortcuts';

        return parent::process();
    }
}

return 'ModxDashboardWidgetPackWidgetShortcuts';
