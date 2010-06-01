FirePHP package for MODx

Provides most of the functionality offered by FirePHP
Interoperates with FirePHP extension for firefox
Prepared for using as MODx service

For more information see: http://www.firephp.org/

PHP 5 only, see: http://svn.modxcms.com/docs/display/revolution/Server+Requirements

Requirements:
Firefox - http://www.mozilla.com/en-US/products/firefox/
Firebug - https://addons.mozilla.org/en-US/firefox/addon/1843
FirePHP - https://addons.mozilla.org/en-US/firefox/addon/6149

Usage:
$modx->getService('fire', 'modFire', $modx->getOption('core_path').'components/modfire/');
//or with options
$modx->getService('fire', 'modFire', $modx->getOption('core_path').'components/modfire/', array(
    'maxObjectDepth' => 10,
    'maxArrayDepth' => 20,
    'useNativeJsonEncode' => true,
    'includeLineNumbers' => true)
);

$modx->fire->log('Plain Message');
$modx->fire->log('Plain message with label', 'Label');
$modx->fire->info('Info Message');
$modx->fire->warn('Warn Message');
$modx->fire->error('Error Message');

$modx->fire->group('Collapsed and Colored Group',
    array(
        'Collapsed' => true,
        'Color' => '#BB0000')
    );
$modx->fire->log('First item');
$modx->fire->log('Second item');
$modx->fire->log('Third item');
$modx->fire->groupEnd();

$modx->fire->trace('Trace Label');

$table   = array();
$table[] = array('Col 1 Heading','Col 2 Heading');
$table[] = array('Row 1 Col 1','Row 1 Col 2');
$table[] = array('Row 2 Col 1','Row 2 Col 2');
$table[] = array('Row 3 Col 1','Row 3 Col 2');
$modx->fire->table('Table Label', $table);

Can be temporarily disabled from System Settings (key modfire.enabled)
