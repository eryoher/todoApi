# CakePHP Application Skeleton

[![Build Status](https://img.shields.io/travis/cakephp/app/master.svg?style=flat-square)](https://travis-ci.org/cakephp/app)
[![License](https://img.shields.io/packagist/l/cakephp/app.svg?style=flat-square)](https://packagist.org/packages/cakephp/app)

A skeleton for creating applications with [CakePHP](https://cakephp.org) 3.x.

The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

## Installation API
```
> Download [Composer](https://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
> git clone https://github.com/eryoher/todoApi.git
> cd todoApi
> composer install
```

## Installation BD
```
> Create database
> execute struct_data.sql
```

## Configuration
```
> Read and edit `config/app.php` and setup the `'Datasources'` and any other configuration relevant for your application.
> the services created in the api generate json type response, To check the installation you must use
the following service http://localhost/todoApi/lists.json
```
