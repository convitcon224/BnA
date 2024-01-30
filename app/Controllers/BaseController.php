<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }

    public function loadMasterLayout($data, $header = '', $cssjs = '', $leftMenu =''){
        $data['header'] = view($header);
        $data['cssJS'] = $cssjs;
        if ($leftMenu != ''){
            $data['leftMenu'] = view($leftMenu);
        }
        $data['footer'] = view('guest\layout\Footer');
        return $data;
    }

    public function loadListBooksLayout($data){
        $data['rating'] = view('guest\layout\html\rating-star.html');
        $data['index'] = view('guest\layout\html\index.html');
        return $data;
    }

    public function loadAdminLayout($data, $topNav = '', $cssjs = '', $sideNav =''){
        $data['cssJS'] = $cssjs;
        if ($topNav != ''){
            $data['topNav'] = view($topNav);
        }
        if ($sideNav != ''){
            $data['sideNav'] = view($sideNav);
        }
        return $data;
    }
}
