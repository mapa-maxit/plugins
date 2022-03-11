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
<<<<<<< HEAD
  


        if($ipturns == "1"){
            if($ipreverse == "1"){
                $response = $backend->configdRun("nmap ip1n $ipadi");
                return array("response" => $response);
            }else{
                $response = $backend->configdRun("nmap ip1 $ipadi");
                return array("response" => $response);
            }
            
        }elseif($ipturns == "2"){
            if($ipreverse == "1" && $ipreverse == "1"){
                $response = $backend->configdRun("nmap ip1n $ipadi");
                return array("response" => $response);
            }else{
                $response = $backend->configdRun("nmap ip2 $ipadi");
                return array("response" => $response);
            }
            
        }elseif($ipturns == "3"){
            if($ipreverse == "1" && $ipreverse == "1"){
                $response = $backend->configdRun("nmap ip1n $ipadi");
                return array("response" => $response);
            }else{
                $response = $backend->configdRun("nmap ip3 $ipadi");
                return array("response" => $response);
            }
            
        }elseif($ipturns == "4"){
            if($ipreverse == "1" && $ipreverse == "1"){
                $response = $backend->configdRun("nmap ip1n $ipadi");
                return array("response" => $response);
            }else{
                $response = $backend->configdRun("nmap ip4 $ipadi");
                return array("response" => $response);
            }
            
        }elseif($ipturns == "5"){
            if($ipreverse == "1" && $ipreverse == "1"){
                $response = $backend->configdRun("nmap ip1n $ipadi");
                return array("response" => $response);
            }else{
                $response = $backend->configdRun("nmap ip5 $ipadi");
                return array("response" => $response);
            }
            
        }else{
            if($ipreverse == "1" && $ipreverse == "1"){
                $response = $backend->configdRun("nmap ip1n $ipadi");
                return array("response" => $response);
            }else{
                $response = $backend->configdRun("nmap ip1 $ipadi");
                return array("response" => $response);
            }
        }
=======
          
        $response = $backend->configdRun("nmap ip $ipadi");
        return array("response" => $response);
>>>>>>> 7946c9663e14e026d7e28301e2b16325a726f005
      }
    }
}
?>
