<?php

namespace Portrino\Typo3Connector\Components;

/**
 * Copyright (C) portrino GmbH - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by André Wuttig <wuttig@portrino.de>, portrino GmbH
 */

/**
 * Class ApiTokenDecorator
 *
 * @package Portrino\Typo3Connector\Components
 */
class ApiTokenDecorator {

    /**
     * @var \Enlight_Controller_Action
     */
    protected $controller = NULL;

    /**
     * ApiTokenDecorator constructor.
     *
     * @param \Enlight_Controller_Action $controller
     */
    public function __construct(\Enlight_Controller_Action $controller) {
        $this->controller = $controller;
    }

    /**
     * appends the "pxShopwareTypo3Token" to the API-Response which will be verified by TYPO3-Extension "px_shopware"
     */
    public function addPxShopwareApiToken() {
        $request = $this->controller->Request();
        $pxShopware = ($request->getParam('px_shopware') != NULL) ? (bool)$request->getParam('px_shopware') : FALSE;
        if($pxShopware) {
            $this->controller->View()->assign('pxShopwareTypo3Token', 1);
        }
    }

}