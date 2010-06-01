<?php
/**
 * Loads system settings
 *
 * @package modfire
 * @subpackage build
 */
$settings = array();

$settings['modfire.enabled'] = $modx->newObject('modSystemSetting');
$settings['modfire.enabled']->fromArray(array(
    'key' => 'modfire.enabled',
    'value' => true,
    'xtype' => 'combo-boolean',
    'description' => 'Enable or disable logging to Firebug.',
    'area' => 'System and Server',
),'',true,true);

return $settings;