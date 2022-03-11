<?php

/*
 * Copyright (C) 2022 Manuel Pasti <mapa@max-it.de>
 * All rights reserved.
 */
namespace OPNsense\Nmap\Api;

use OPNsense\Base\ApiMutableServiceControllerBase;
use OPNsense\Core\Backend;
use OPNsense\Nmap\General;

/**
 * Class ServiceController
 * @package OPNsense\Nmap
 */
class ServiceController extends \OPNsense\Proxy\Api\ServiceController /*ApiMutableServiceControllerBase*/
{
    protected static $internalServiceClass = '\OPNsense\Nmap\General';
    protected static $internalServiceTemplate = 'OPNsense/Nmap';
    protected static $internalServiceEnabled = 'enabled';
    protected static $internalServiceName = 'nmap';

    public function ipAction()
    {
      if ($this->request->isPost()) {
        $backend = new Backend();
        $mdlGeneral = new General();

        
        $ipadi = escapeshellarg($this->request->getPost("ipadd")); 
        $ipturns = ($this->request->getPost("ipcount"));
        $ipreverse = $mdlGeneral->drl;

        $response = $backend->configdRun("nmap ip $ipadi");
        return array("response" => $response);
        }
    }
}
?>
