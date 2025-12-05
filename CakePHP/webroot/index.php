<?php
/**
 * The Front Controller for handling every request
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.2.9
 * @license       MIT License (https://opensource.org/licenses/mit-license.php)
 */

/*
 * Read the configuration file
 */
require __DIR__ . '/../config/bootstrap.php';

/*
 * Create the application
 */
$app = new \App\Application(CONFIG);

/*
 * Create the HTTP server to handle the request
 */
$server = new \Cake\Http\Server($app);

/*
 * Run the request/response through the application and emit the response.
 */
$server->emit($server->run());

