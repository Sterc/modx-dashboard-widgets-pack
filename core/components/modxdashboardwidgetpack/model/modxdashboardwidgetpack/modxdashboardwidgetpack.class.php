<?php

/**
 * Class MODXDashboardWidgetPack.
 */
class MODXDashboardWidgetPack
{
    /**
     * The modX object.
     *
     * @since    1.0.0
     * @access   public
     * @var      modX      The modX object.
     */
    public $modx;

    /**
     * The namespace for this package.
     *
     * @since    1.0.0
     * @access   public
     * @var      string         The package namespace.
     */
    public $namespace = 'modxdashboardwidgetpack';

    /**
     * Holds all configs values.
     *
     * @since    1.0.0
     * @access   public
     * @var      array          Config value holder.
     */
    public $config = [];

    /**
     * Initialize the class.
     *
     * @since    1.0.0
     * @param    modX    $modx    The modX object.
     * @param    array   $config  Array with config values.
     */
    public function __construct(modX $modx, array $config = [])
    {
        $this->modx      =& $modx;
        $this->namespace = $this->modx->getOption('namespace', $config, 'modxdashboardwidgetpack');

        $corePath = $this->modx->getOption(
            'modxdashboardwidgetpack.core_path',
            $config,
            $this->modx->getOption('core_path') . 'components/modxdashboardwidgetpack/'
        );

        $assetsUrl = $this->modx->getOption(
            'modxdashboardwidgetpack.assets_url',
            $config,
            $this->modx->getOption('assets_url') . 'components/modxdashboardwidgetpack/'
        );

        $assetsPath = $this->modx->getOption(
            'modxdashboardwidgetpack.assets_path',
            $config,
            $this->modx->getOption('assets_path') . 'components/modxdashboardwidgetpack/'
        );

        $this->config = array_merge([
            'namespace'       => $this->namespace,
            'core_path'       => $corePath,
            'model_path'      => $corePath . 'model/',
            'chunks_path'     => $corePath . 'elements/chunks/',
            'snippets_path'   => $corePath . 'elements/snippets/',
            'templates_path'  => $corePath . 'templates/',
            'processors_path' => $corePath . 'processors/',
            'assets_path'     => $assetsPath,
            'assets_url'      => $assetsUrl,
            'lexicons'        => ['modxdashboardwidgetpack:default'],
            'js_url'          => $assetsUrl . 'js/',
            'css_url'         => $assetsUrl . 'css/',
            'connector_url'   => $assetsUrl . 'connector.php'
        ], $config);

        $this->modx->lexicon->load('modxdashboardwidgetpack:default');

        $this->modx->addPackage('modxdashboardwidgetpack', $this->config['model_path']);
    }
}
