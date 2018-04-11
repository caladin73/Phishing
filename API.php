<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 11-04-2018
 * Time: 07:43
 */

require 'vendor/autoload.php';

//set this to false to use in production
$sandbox = true;

$oauth_handler = new \Evernote\Auth\OauthHandler($sandbox);

$key      = '%key%';
$secret   = '%secret%';
$callback = 'http://host/pathto/evernote-cloud-sdk-php/sample/oauth/index.php';

$oauth_data  = $oauth_handler->authorize($key, $secret, $callback);

echo "\nOauth Token : " . $oauth_data['oauth_token'];