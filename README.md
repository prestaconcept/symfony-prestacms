Prestaconcept's Symfony PrestaCMS
===================================

[![Build Status](https://secure.travis-ci.org/prestaconcept/symfony-prestacms.png?branch=master)](http://travis-ci.org/prestaconcept/symfony-prestacms)
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/prestaconcept/symfony-prestacms/badges/quality-score.png?s=56ad73060b1c1834854c6142d4e9bfcb3c46b13d)](https://scrutinizer-ci.com/g/prestaconcept/symfony-prestacms/)
[![Latest Stable Version](https://poser.pugx.org/presta/symfony-prestacms/v/stable.png)](https://packagist.org/packages/presta/symfony-prestacms)
[![Total Downloads](https://poser.pugx.org/presta/symfony-prestacms/downloads.png)](https://packagist.org/packages/presta/symfony-prestacms)

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/47af6af1-4d02-4155-8c14-11e7d5620523/big.png)](https://insight.sensiolabs.com/projects/47af6af1-4d02-4155-8c14-11e7d5620523)

## Overview ##

This is Prestaconcept's Symfony distribution packaged with everything you need to build website with PrestaCMS.

-> based on Symfony 2.3

## Online Demonstration ##

Sandbox is also deployed for a live demonstration :

-   [Frontend site][5]
-   [Administration Site][6]

## Documentation ##

:book: Documentation is available on [prestaconcept.github.io][4]

## Issue tracker ##

:clipboard: Issues are managed in [prestaconcept/open-source-management](https://github.com/prestaconcept/open-source-management) to centralize our open source activity.

## Getting Started ##

### Installation with composer ###

1.   [install composer globally](http://getcomposer.org/doc/00-intro.md#globally) 
     or do a : `curl -sS https://getcomposer.org/installer | php`

2.   create database and a database user (optional if you use root db user in step 4)

3.   go to your working directory : `cd path/to/site`

4.   run : `composer create-project presta/symfony-prestacms . --dev --stability=dev`
     This will give you the last development version.

5.   answer database questions

6.   answer remove versioning info = yes if you want to version your project

7.   create a virtual host with 
     `ServerName www.symfony-prestacms.com.dev` and
     `ServerAlias www.symfony-prestacms.fr.dev`
     or other names if you want, but change config in **app/config/bundles/presta_cms_core.yml**

8.   run : `make configure`

9.   do a : `app/console doctrine:database:drop --force` if you created a database in step 2

10.   run : `make install`

11.  set proper permissions on **app/cache, app/logs and web/uploads**. 
See [Symfony documentation](http://symfony.com/doc/current/book/installation.html#configuration-and-setup)

12.  point to [english version of your site](http://www.dev-symfony-prestacms.com/app_dev.php) 
or [the french one](http://www.dev-symfony-prestacms.fr/app_dev.php)



### Set-up your data ###

  * Website
  * page structure
  * page factory
  * run : `make refresh` to refresh our content


### Develop your PrestaCMS bundles ###

:book: Documentation is available on [prestaconcept.github.io][4]

## Ask for help ##

:speech_balloon: If you need help about this project you can [post a message on our google group][3]

## Contributing

Pull requests are welcome.


Thanks to
[everyone who has contributed](https://github.com/prestaconcept/symfony-prestacms/graphs/contributors) already.

---

*This project is supported by [PrestaConcept](http://www.prestaconcept.net)*

**Lead Developer** : [@nicolas-bastien](https://github.com/nicolas-bastien)

Released under the MIT License


[3]: https://groups.google.com/forum/?hl=fr&fromgroups#!forum/prestacms-devs
[4]: http://prestaconcept.github.io
[5]: http://sandbox.prestacms.com/
[6]: http://sandbox.prestacms.com/admin
