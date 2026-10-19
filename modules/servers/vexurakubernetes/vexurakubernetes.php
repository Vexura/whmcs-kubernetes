<?php
declare(strict_types=1);
if (!defined('WHMCS')) { exit('Direct access is not permitted.'); }
require_once __DIR__.'/bootstrap.php';
use Vexura\Whmcs\Kubernetes\Module;
use Vexura\Whmcs\Kubernetes\Registrar;
use Vexura\Whmcs\Kubernetes\Automation;

/** Kubernetes: WHMCS MetaData callback. */
function vexurakubernetes_MetaData(): array
{
    return ['DisplayName' => 'Vexura · Kubernetes', 'APIVersion' => '1.1', 'RequiresServer' => true, 'DefaultSSLPort' => 443];
}

/** Kubernetes: WHMCS ConfigOptions callback. */
function vexurakubernetes_ConfigOptions(): array
{
    return Module::config('kubernetes');
}

/** Kubernetes: WHMCS TestConnection callback. */
function vexurakubernetes_TestConnection(array $params): array
{
    return Module::connection($params);
}

/** Kubernetes: WHMCS ClientArea callback. */
function vexurakubernetes_ClientArea(array $params): array
{
    return Module::clientArea('kubernetes', $params);
}

/** Kubernetes: WHMCS AdminCustomButtonArray callback. */
function vexurakubernetes_AdminCustomButtonArray(): array
{
    return ['Bereitstellung prüfen' => 'RefreshStatus', 'Bezahlte Rechnungen abgleichen' => 'SyncPaidInvoices'];
}

/** Kubernetes: WHMCS CreateAccount callback. */
function vexurakubernetes_CreateAccount(array $params): string
{
    return Module::run('kubernetes', 'create', $params);
}

/** Kubernetes: WHMCS RefreshStatus callback. */
function vexurakubernetes_RefreshStatus(array $params): string
{
    return Module::run('kubernetes', 'create', $params);
}

/** Kubernetes: WHMCS SyncPaidInvoices callback. */
function vexurakubernetes_SyncPaidInvoices(array $params): string
{
    return Module::run('kubernetes', 'sync', $params);
}

/** Kubernetes: WHMCS TerminateAccount callback. */
function vexurakubernetes_TerminateAccount(array $params): string
{
    return Module::run('kubernetes', 'terminate', $params);
}

/** Kubernetes: WHMCS SuspendAccount callback. */
function vexurakubernetes_SuspendAccount(array $params): string
{
    return Module::run('kubernetes', 'suspend', $params);
}

/** Kubernetes: WHMCS UnsuspendAccount callback. */
function vexurakubernetes_UnsuspendAccount(array $params): string
{
    return Module::run('kubernetes', 'unsuspend', $params);
}
