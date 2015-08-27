<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash');
    }

    /**
     * BeforeFilter method
     *
     * @param Event $event event
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->autoRender = false;
        $loginId = 'admin';
        $password = 'pass';

        if (isset($_SERVER['PHP_AUTH_USER'])) {
            if (! ($_SERVER['PHP_AUTH_USER'] === $loginId && $_SERVER['PHP_AUTH_PW'] === $password)) {
                $this->_basicUnauthorized();
            }
        } else {
            $this->_basicUnauthorized();
        }
        $this->autoRender = true;
    }

    /**
     * basic authentication error method
     *
     * @return void
     */
    protected function _basicUnauthorized()
    {
        header('WWW-Authenticate: Basic realm="Please enter your ID and password"');
        header('HTTP/1.0 401 Unauthorized');
        die("Authorization Required");
    }
}
