# Magento2 Module FZ CallForPrice

    ``fz/module-callforprice``

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)
 - [Configuration](#markdown-header-configuration)
 - [Specifications](#markdown-header-specifications)
 - [Attributes](#markdown-header-attributes)


## Main Functionalities
Call for Price module

## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/FZ`
 - Enable the module by running `php bin/magento module:enable FZ_CallForPrice`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require fz/module-callforprice`
 - enable the module by running `php bin/magento module:enable FZ_CallForPrice`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`


## Configuration

 - Enable/Disable (fz/general/enable_frontend)

 - Call For Price Button Text (fz/general/button_text)

 - Send Email cc (fz/general/send_email_cc)

 - Send Email To (fz/general/email_sender)

 - customer_group (fz/general/customer_group)


## Specifications




## Attributes

 - Product - Call For Price (call_for_price_active)

