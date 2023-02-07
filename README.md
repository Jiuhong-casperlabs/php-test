## [transfer](./transfer.php)

Referred to [SendingTransfer.md](https://github.com/make-software/casper-php-sdk/blob/master/docs/Example/SendingTransfer.md)
but it gave this error
```
Fatal error: Uncaught Casper\Rpc\RpcError: invalid deploy: the provided hash does not match the actual hash of the deploy in C:\xampp\htdocs\myproject1\composer_1\vendor\make-software\casper-php-sdk\src\Rpc\RpcClient.php:380 Stack trace: #0 C:\xampp\htdocs\myproject1\composer_1\vendor\make-software\casper-php-sdk\src\Rpc\RpcClient.php(78): Casper\Rpc\RpcClient->rpcCallMethod('account_put_dep...', Array) #1 C:\xampp\htdocs\myproject1\composer_1\05_transfer.php(29): Casper\Rpc\RpcClient->putDeploy(Object(Casper\Entity\Deploy)) #2 {main} thrown in C:\xampp\htdocs\myproject1\composer_1\vendor\make-software\casper-php-sdk\src\Rpc\RpcClient.php on line 380
```


## [StoredContractByHash](./StoredContractByHash.php)
It gave similar error
```
Fatal error: Uncaught Casper\Rpc\RpcError: invalid deploy: the provided hash does not match the actual hash of the deploy in C:\xampp\htdocs\myproject1\composer_1\vendor\make-software\casper-php-sdk\src\Rpc\RpcClient.php:380 Stack trace: #0 C:\xampp\htdocs\myproject1\composer_1\vendor\make-software\casper-php-sdk\src\Rpc\RpcClient.php(78): Casper\Rpc\RpcClient->rpcCallMethod('account_put_dep...', Array) #1 C:\xampp\htdocs\myproject1\composer_1\06_contracthash.php(36): Casper\Rpc\RpcClient->putDeploy(Object(Casper\Entity\Deploy)) #2 {main} thrown in C:\xampp\htdocs\myproject1\composer_1\vendor\make-software\casper-php-sdk\src\Rpc\RpcClient.php on line 380
```