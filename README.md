# FreeGeolP for Laravel 4

## Badges

[![Build Status](https://img.shields.io/badge/Build-Pass-brightgreen)](https://example.com) ![Stable Version](https://img.shields.io/badge/Stable-v1.0.1-blue) ![Downloads](https://img.shields.io/badge/Downloads-227-orange) ![Unstable Version](https://img.shields.io/badge/Unstable-dev--master-yellow) ![License](https://img.shields.io/badge/License-MIT-lightgrey)

## Description

Laravel 4 Library for calling http://freegeoip.net/ API.
In contrast to all other packages wherein it requires that you have the geoip database in your filesystem, this library calls a free service. So you don't really have to worry about downloading and maintaining geoip data from Maxmind on your own server.
Just install the package, add the config, and it is ready to use!

## Requirements

- PHP >= 5.3.7
- CURL Extension

## Installation

```bash
composer require buonzz/laravel-4-freegeoip:dev-master

//Add the service provider and facade in your config/app.php //this is instruction in readme not for you to do

Service Provider
Buonzz\GeoIP\Laravel4\ServiceProviders\GeoIPServiceProvider::class

'GeoIP' => 'Buonzz\GeoIP\Laravel4\Facades\GeoIP',
Facade

Usage
Get country of the visitor

Credit
|-- public_html
|   |-- css
|   |   |-- **/*.css
|	|-- favicon.ico
|	|-- images
|   |   |-- **/*.png
|	|-- js
|   |   |-- **/*.js
|	|-- index.php
|-- resource
|   |-- config.php 
|   |-- library 
|   |-- template
|-- Gruntfile.js/gulpfile.js
|-- README.md
|-- package.json
|-- bower.json (if using bower)
|-- .gitignore