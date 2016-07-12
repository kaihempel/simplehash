# simplehash

Simple PHP hash bundle

[![Build Status](https://travis-ci.org/kaihempel/simplehash.svg?branch=master)](https://travis-ci.org/kaihempel/simplehash)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/kaihempel/simplehash/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/kaihempel/simplehash/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/kaihempel/simplehash/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/kaihempel/simplehash/?branch=master)

This is a basic hash generation bundle. The generation of the hash strings is encapsulated behind a facade for easy usage. Actually only string hashes are supported!

Installing *SimpleHash* via Composer:

```json
  "require": {
    "kaihempel/simplehash": "1.0.*"
  }
```

Usage in your sourcecode:

```php
  // 7a9eec69d1a8669857169fd357abece5
  $hashMd5 = Hash::Md5('TEST_MD5');

  // 3176e209d14330f16662eb9986d64062648b68f2
  $hashSHA1 = Hash::Sha1('TEST_SHA1');

  // $2y$10$Af13GgKoL503sCvf42dJ1uRdAbA9eaFajPkCIQ0mvpi.LAYCAILs.
  $hashBcrypt = Hash::Bcrypt('TEST_BCRYPT', 10, 'AbCdEfGhJkLmNoPQrStUv');
```

The hash facade returns the container object "HashContainer". This container can be used by the implementend interface. Tow methods are available:
* getHashString()
* setHashString($hashString)

The container all so implements "__toSrting()" so the container can be used directly for comparison.

```php
  if ($hashMd5 == "7a9eec69d1a8669857169fd357abece5") // true
```