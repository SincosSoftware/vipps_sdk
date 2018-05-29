VIPPS by DNB
=====================

Vipps is a Norwegian payment application designed for smartphones developed by DNB. Vipps was released May 30, 2015 and 
by reaching 1 million users November 5, 2015 - Vipps is Norways largest payment application. Although Vipps is developed
by DNB it is an application open for customers from any Norwegian bank and 40% of the users are non-dnb customers.

source: [Wikipedia]

## Prerequisites

After recent changes to Vipps architecture there is no longer need to authorize each request using cert files.
Authorization is now token-based and you can generate tokens yourself using Merchant Integration Environment. 
Please contact vippstech@dnb.no in order to access [Vipps Developer Portal].

## Quick start

Add VIPPS SDK to your project using [Composer].

```bash
$ composer require SincosSoftware/vipps:^2.0
```

Vipps SDK uses [PSR-7] compliant http-message plugin system, hence before you require `SincosSoftware/vipps` you must 
add http client adapter of your choice, ex. `php-http/guzzle6-adapter` [(read more)](https://github.com/php-http/guzzle6-adapter).

## References 
- [SDK documentation]
- [API documentation]
- [Read more about VIPPS on Wikipedia][Wikipedia]
- [Vipps Developer Portal]

## Author
- [Roger Lysberg](mailto:roger@24nettbutikk.no) - Developer and maintenance (V2)
- [Jakub Piasecki](mailto:jakub@piaseccy.pl) - Development and maintenance
- [Ny Media AS] - Initial development

[Wikipedia]: https://en.wikipedia.org/wiki/Vipps "Wikipedia"
[Documentation]: https://www.vipps.no/utvikler "Documentation"
[Ny Media AS]: https://nymedia.no "Ny Media AS"
[Vipps Developer Portal]: https://apitest-portal.vipps.no "Vipps Developer Portal"
[Composer]: https://getcomposer.org/ "Composer"
[PSR-7]: http://www.php-fig.org/psr/psr-7/ "PSR-7"
[API documentation]: https://apitest-portal.vipps.no/ "API Documentation (you must login first)"
[SDK documentation]: https://github.com/SincosSoftware/php-vipps/wiki
