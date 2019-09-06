# MODXDashboardWidgetPack #
![MODXDashboardWidgetPack](https://img.shields.io/badge/version-1.0.0-brightgreen.svg) ![MODX Extra by Sterc](https://img.shields.io/badge/extra%20by-sterc-ff69b4.svg)

*Note:* This extra currently only works with the Sterc MODX 3 version which can be found here: https://github.com/Sterc/revolution.

This extra provides additional dashboard widgets for you to use in your MODX Dashboard to improve the MODX user experience.  

## Welcome widget ##
To override the default background image you can set the `background_image_path` property when editing the welcome widget.

The following placeholders are supported to use in your image path:

* base_path
* core_path
* manager_path
* assets_path
* manager_theme

### Building assets ###
The assets are manually generated before a new release using `php _build/build.assets.php`.