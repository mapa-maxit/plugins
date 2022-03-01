<?php

/*
 * Copyright (C) 2022 Manuel Pasti <mapa@max-it.de>
 * All rights reserved.
 */
namespace OPNsense\Mtr\Api;

use OPNsense\Base\ApiMutableServiceControllerBase;
use OPNsense\Core\Backend;
use OPNsense\Mtr\General;

/**
 * Class ServiceController
 * @package OPNsense\Mtr
 */
class ServiceController extends \OPNsense\Proxy\Api\ServiceController /*ApiMutableServiceControllerBase*/
{
    protected static $internalServiceClass = '\OPNsense\Mtr\General';
    protected static $internalServiceTemplate = 'OPNsense/Mtr';
    protected static $internalServiceEnabled = 'enabled';
    protected static $internalServiceName = 'mtr';

    public function ipAction()
    {
      if ($this->request->isPost()) {
        $backend = new Backend();
        $mdlGeneral = new General();
        $ipaddress = $mdlGeneral->ip;
        
        $ipadi = escapeshellarg($this->request->getPost("ipadd"));
        $ipturns = escapeshellarg($this->request->getPost("ipcount"));
        
        $response = $backend->configdRun("mtr %d $ipadi", 'ip');
        return array("response" => $response);
      }
    }
}
