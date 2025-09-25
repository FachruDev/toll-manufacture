<?php
/**
 * phpMyAdmin configuration for Docker container
 */

declare(strict_types=1);

/* Servers configuration */
$i = 0;

/* Server: localhost */
$i++;
$cfg['Servers'][$i]['verbose'] = 'Local MySQL';
$cfg['Servers'][$i]['host'] = 'localhost';
$cfg['Servers'][$i]['port'] = '';
$cfg['Servers'][$i]['socket'] = '';
$cfg['Servers'][$i]['auth_type'] = 'cookie';
$cfg['Servers'][$i]['user'] = '';
$cfg['Servers'][$i]['password'] = '';
$cfg['Servers'][$i]['only_db'] = '';

/* End of servers configuration */

$cfg['blowfish_secret'] = 'toll-manufacture-secret-key-for-phpmyadmin-2024';
$cfg['DefaultLang'] = 'en';
$cfg['ServerDefault'] = 1;
$cfg['UploadDir'] = '';
$cfg['SaveDir'] = '';

/* Theme settings */
$cfg['ThemeDefault'] = 'pmahomme';

/* Security settings */
$cfg['CheckConfigurationPermissions'] = false;
$cfg['ShowPhpInfo'] = false;
$cfg['ShowServerInfo'] = false;
$cfg['ShowStats'] = false;
$cfg['ShowChgPassword'] = true;
$cfg['ShowCreateDb'] = true;

/* Navigation settings */
$cfg['FirstLevelNavigationItems'] = 100;
$cfg['MaxNavigationItems'] = 50;
$cfg['NavigationTreeEnableGrouping'] = true;
$cfg['NavigationTreeDbSeparator'] = '_';
$cfg['NavigationTreeTableSeparator'] = '__';

/* MySQL settings */
$cfg['MySQLManualBase'] = 'https://dev.mysql.com/doc/refman/8.0/en';
$cfg['MySQLManualType'] = 'searchable';

/* Export/Import settings */
$cfg['ExecTimeLimit'] = 300;
$cfg['MemoryLimit'] = '512M';
$cfg['SkipLockedTables'] = false;

/* Console settings */
$cfg['Console']['StartHistory'] = false;
$cfg['Console']['AlwaysExpand'] = false;
$cfg['Console']['CurrentQuery'] = true;

/* Designer settings */
$cfg['ShowFunctionFields'] = true;
$cfg['ShowFieldTypesInDataEditView'] = true;

/* SQL settings */
$cfg['SQLQuery']['Edit'] = true;
$cfg['SQLQuery']['Explain'] = true;
$cfg['SQLQuery']['ShowAsPHP'] = true;
$cfg['SQLQuery']['Validate'] = false;
$cfg['SQLQuery']['Refresh'] = true;

?>
