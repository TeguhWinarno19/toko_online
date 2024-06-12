<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('database', 'cart', 'email', 'session');

$autoload['drivers'] = array();

$autoload['helper'] = array('url', 'file', 'security','login');

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array('model_barang','model_invoice','model_kategori','model_user');
