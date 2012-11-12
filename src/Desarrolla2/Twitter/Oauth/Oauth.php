<?php

/**
 * This file is part of the twitter-oauth proyect.
 * 
 * Copyright (c)
 * Daniel González <daniel.gonzalez@freelancemadrid.es> 
 * 
 * This source file is subject to the MIT license that is bundled
 * with this package in the file LICENSE.
 */

namespace Desarrolla2\Twitter\Oauth;

/**
 * 
 * Description of Oauth
 *
 * @author : Daniel González <daniel.gonzalez@freelancemadrid.es> 
 * @file : Oauth.php , UTF-8
 * @date : Nov 12, 2012 , 1:01:24 AM
 */
class Oauth extends Oauth
{

    protected $apiUrl = 'http://twitter.com';
    protected $requestTokenUrl = 'http://twitter.com/oauth/request_token';
    protected $accessTokenUrl = 'http://twitter.com/oauth/access_token';
    protected $authorizeUrl = 'http://twitter.com/oauth/authorize';

    public function getRequestToken()
    {
        return parent::getRequestToken($this->requestTokenUrl);
    }

    public function getAuthorizationUrl()
    {
        $token = $this->getRequestToken();
        return $this->authorizeUrl . '?oauth_token=' . $token['oauth_token'];
    }

}
