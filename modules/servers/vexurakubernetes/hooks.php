<?php
declare(strict_types=1);
if (!defined('WHMCS')) { exit('Direct access is not permitted.'); }
require_once __DIR__.'/bootstrap.php';
use Vexura\Whmcs\Kubernetes\Module;
use Vexura\Whmcs\Kubernetes\Registrar;
use Vexura\Whmcs\Kubernetes\Automation;

add_hook('InvoiceCreated', 1, static function (array $vars): void { Automation::snapshot('kubernetes', (int) $vars['invoiceid']); });
add_hook('InvoicePaid', 1, static function (array $vars): void { Automation::paid('kubernetes', (int) $vars['invoiceid']); });
add_hook('AfterCronJob', 1, static function (array $vars): void { Automation::cron('kubernetes'); });
