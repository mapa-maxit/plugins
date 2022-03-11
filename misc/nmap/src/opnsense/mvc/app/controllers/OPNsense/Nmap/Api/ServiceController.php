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
class ServiceController extends \OPNsense\Proxy\Api\ServiceController
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
        $ipturns = $mdlGeneral->turn;
        $ipreverse = $mdlGeneral->drl;
          
          
        if($ipturns == "Pingscan" && $ipreverse == "1"){
        $response = $backend->configdRun("nmap ip1 $ipadi");
        return array("response" => $response);
        
        }elseif($ipturns == "SYNScan" && $ipreverse == "1"){
        $response = $backend->configdRun("nmap ip2 $ipadi");
        return array("response" => $response);

        }elseif($ipturns == "SYNScan"){
        $response = $backend->configdRun("nmap ip3 $ipadi");
        return array("response" => $response);

        }elseif($ipturns == "Pingscan"){
        $response = $backend->configdRun("nmap ip4 $ipadi");
        return array("response" => $response);
            	}
        }
    }
}
?>
