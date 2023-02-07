<?php
// NG
require __DIR__ . '/vendor/autoload.php';

$nodeAddress = 'http://65.21.237.160:7777';
$rpcClient = new Casper\Rpc\RpcClient($nodeAddress);

// Replace '/path/to/secp256k1_secret_key.pem' by real path to secret key
$senderKeyPair = Casper\Util\Crypto\Secp256K1Key::createFromPrivateKeyFile('./key/secret_key_2.pem');
$senderPublicKey = Casper\Serializer\CLPublicKeySerializer::fromAsymmetricKey($senderKeyPair);

// Replace 'recipient_hex_public_key_here' by real public key
$recipientPublicKey = Casper\Serializer\CLPublicKeySerializer::fromHex('02032f2eac2b4b5d5a4129612be91aca6a0adaf8e5785719519d8c7bcf6d0617a997');

$transferId = 1;
$transferAmount = 2500000000;
$transfer = Casper\Entity\DeployExecutable::newTransfer($transferId, $transferAmount, $recipientPublicKey);

$paymentAmount = 100000000;
$payment = Casper\Entity\DeployExecutable::newStandardPayment($paymentAmount);

$networkName = 'casper-test';
$deployParams = new Casper\Entity\DeployParams($senderPublicKey, $networkName);

$deployService = new Casper\Service\DeployService();
$deploy = $deployService->makeDeploy($deployParams, $transfer, $payment);

$signedDeploy = $deployService->signDeploy($deploy, $senderKeyPair);
$deployHash = $rpcClient->putDeploy($signedDeploy);
?>