<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 11-04-2018
 * Time: 07:43
 */

require_once( 'vendor/autoload.php' );

Autodesk\Auth\Configuration::getDefaultConfiguration()
    ->setClientId( '<your-client-id>' )
    ->setClientSecret( '<your-client-secret>' );

$twoLeggedAuth = new Autodesk\Auth\OAuth2\TwoLeggedAuth();
$twoLeggedAuth->setScopes( [ 'bucket:read' ] );    //!<< This is dependent on what API you want to call.

$twoLeggedAuth->fetchToken();

$tokenInfo = [
    'accessToken' => $twoLeggedAuth->getAccessToken(),
    'expiry'           => time() + $twoLeggedAuth->getExpiresIn(),
];

print_r( $tokenInfo );