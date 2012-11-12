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

use \Oauth as SPLOauth;

/**
 * 
 * Description of Oauth
 *
 * @author : Daniel González <daniel.gonzalez@freelancemadrid.es> 
 * @file : Oauth.php , UTF-8
 * @date : Nov 12, 2012 , 1:01:24 AM
 */
class Oauth
{

    protected $apiUrl = 'http://twitter.com';
    protected $requestTokenUrl = 'https://twitter.com/oauth/request_token';
    protected $accessTokenUrl = 'https://twitter.com/oauth/access_token';
    protected $authorizeUrl = 'https://twitter.com/oauth/authorize';
    protected $consumer_key;
    protected $consumer_secret;
    protected $oauth_token;
    protected $oauth_token_secret;
    protected $SPLOauth;

    public function __construct($consumer_key, $consumer_secret)
    {
        $this->consumer_key = $consumer_key;
        $this->consumer_secret = $consumer_secret;
        $this->SPLOauth = new SPLOauth($this->consumer_key, $this->consumer_secret);
    }

    public function getRequestToken($requestTokenUrl = null)
    {
        if (!$requestTokenUrl) {
            $requestTokenUrl = $this->requestTokenUrl;
        }
        return $this->SPLOauth->getRequestToken($requestTokenUrl);
    }

    public function getAuthorizationUrl()
    {
        $token = $this->getRequestToken();
        return $this->authorizeUrl . '?oauth_token=' . $token['oauth_token'];
    }

    public function setOauthToken($oauth_token)
    {
        $this->oauth_token = $oauth_token;
        $this->SPLOauth->setToken($this->oauth_token, $this->oauth_token_secret);
    }

    public function setOauthTokenSecret($oauth_token_secret)
    {
        $this->oauth_token_secret = $oauth_token_secret;
        $this->SPLOauth->setToken($this->oauth_token, $this->oauth_token_secret);
    }

    public function getAccessToken($access_token_url = null)
    {
        if (!$access_token_url) {
            $access_token_url = $this->accessTokenUrl;
        }        
        return $this->SPLOauth->getAccessToken($access_token_url);
    }

    public function fetch($url)
    {
        $this->SPLOauth->fetch($url);
        return $this->SPLOauth->getLastResponse();
    }

}