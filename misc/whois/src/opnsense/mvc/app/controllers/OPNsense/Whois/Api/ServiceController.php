<?php

/*
 * Copyright (C) 2022 Manuel Pasti <mapa@max-it.de>
 * All rights reserved.
 */
namespace OPNsense\Whois\Api;

use OPNsense\Base\ApiMutableServiceControllerBase;
use OPNsense\Core\Backend;
use OPNsense\Whois\General;

/**
 * Class ServiceController
 * @package OPNsense\Whois
 */
class ServiceController extends \OPNsense\Proxy\Api\ServiceController /*ApiMutableServiceControllerBase*/
{
    protected static $internalServiceClass = '\OPNsense\Whois\General';
    protected static $internalServiceTemplate = 'OPNsense/Whois';
    protected static $internalServiceEnabled = 'enabled';
    protected static $internalServiceName = 'whois';

    public function ipAction()
    {
        if ($this->request->isPost()) {
            $backend = new Backend();
            $mdlGeneral = new General();
            
            $ipenabled = ($this->request->getPost("ipadd"));
            $ipaddress = $mdlGeneral->ip;

            if (bool($ipenabled) == true) {
                $response = $backend->configdRun("whois ip $ipaddress");
                return array("response" => $response);
            }
        }
    }
}
