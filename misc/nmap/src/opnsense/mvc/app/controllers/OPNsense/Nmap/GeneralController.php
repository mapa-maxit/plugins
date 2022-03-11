<?php


/*
 * Copyright (C) 2022 Manuel Pasti <mapa@max-it.de>
 * All rights reserved.
 */

namespace OPNsense\Mtr;

class GeneralController extends \OPNsense\Base\IndexController
{
    public function indexAction()
    {
        $this->view->generalForm = $this->getForm("general");
        $this->view->pick('OPNsense/Mtr/general');
    }
}
