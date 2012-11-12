<?php

/**
 * This file is part of the twitter-oauth proyect.
 * 
 * Copyright (c)
 * 
 * This source file is subject to the MIT license that is bundled
 * with this package in the file LICENSE.
 *
 * @author : Daniel González <daniel.gonzalez@freelancemadrid.es> 
 * @file : index.php , UTF-8
 * @date : Nov 12, 2012 , 9:05:51 PM

 */
require_once __DIR__ . '/vendor/autoload.php';
$oauth = new Desarrolla2\Twitter\Oauth\OAuth('FC2eVuz94jLottw79UVmg', 'fbROJIEkJ4A35CJq2lCJLqzIpcIrUWHbINBwIFLC28k');
$request_token_info = $oauth->getRequestToken();
var_dump($request_token_info);