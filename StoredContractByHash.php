<?php
// NG
require __DIR__ . '/vendor/autoload.php';

$nodeAddress = 'http://65.21.237.160:7777';
$rpcClient = new Casper\Rpc\RpcClient($nodeAddress);

// Replace '/path/to/secp256k1_secret_key.pem' by real path to secret key
$senderKeyPair = Casper\Util\Crypto\Secp256K1Key::createFromPrivateKeyFile('./key/secret_key_2.pem');
$senderPublicKey = Casper\Serializer\CLPublicKeySerializer::fromAsymmetricKey($senderKeyPair);

// executableInternalInstance
$contract_hash = "a79fe6d7bcc86704c6b4e4ed36a393c3228ae5b85f2745943eeb4f4e48ac2c81";
$executableInternalInstance = new Casper\Entity\DeployExecutableStoredContractByHash($contract_hash, "approve",1);
;
$amount = 2500000000;
$executableInternalInstance->setArg(new Casper\Entity\DeployNamedArg('amount', new Casper\CLType\CLU512($amount)));

// deployExecutable
$deployExecutable = new Casper\Entity\DeployExecutable();
$deployExecutable->setStoredContractByHash($executableInternalInstance);

// payment
$paymentAmount = 100000000;
$payment = Casper\Entity\DeployExecutable::newStandardPayment($paymentAmount);

// deployParams
$networkName = 'casper-test';
$deployParams = new Casper\Entity\DeployParams($senderPublicKey, $networkName);

$deployService = new Casper\Service\DeployService();
$deploy = $deployService->makeDeploy($deployParams, $deployExecutable, $payment);

$signedDeploy = $deployService->signDeploy($deploy, $senderKeyPair);

$deployHash = $rpcClient->putDeploy($signedDeploy);
?>