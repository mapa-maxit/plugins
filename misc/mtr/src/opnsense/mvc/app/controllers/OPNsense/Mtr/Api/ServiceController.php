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

        
        $ipadi = escapeshellarg($this->request->getPost("ipadd")); 
        $ipturns = ($this->request->getPost("ipcount"));
        $ipreverse = ($this->request->getPost("iprev"));
        $ipj = boolean($this->request->getPost("ipjson"));
        if($ipturns == "1"){
            if($ipj == FALSE){
                $response = $backend->configdRun("mtr ip1j $ipadi");
                return array("response" => $response);
            }else{
            $response = $backend->configdRun("mtr ip1 $ipadi");
            return array("response" => $response);
            }
        }elseif($ipturns == "2"){
            $response = $backend->configdRun("mtr ip2 $ipadi");
            return array("response" => $response);
        }elseif($ipturns == "3"){
            $response = $backend->configdRun("mtr ip3 $ipadi");
            return array("response" => $response);
        }elseif($ipturns == "4"){
            $response = $backend->configdRun("mtr ip4 $ipadi");
            return array("response" => $response);
        }elseif($ipturns == "5"){
            $response = $backend->configdRun("mtr ip5 $ipadi");
            return array("response" => $response);
        }else{
            $response = $backend->configdRun("mtr ip1 $ipadi");
            return array("response" => $response);
        }
      }
    }
    public function ipJson(){
        
    }
}
?>
