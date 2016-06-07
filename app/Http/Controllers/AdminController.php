<?php 
/**
 * Short description for file
 *
 * @FileName		AdminController.php
 * @Created On		9 February 2014
 * @author			Hemant Upadhyay <hemant.upadhyay@srmtechsol.com > 
 * @copyright		2015-2016 The PHP Group
 * @license			http://www.php.net
 * @Description		Admin section
 */
namespace App\Http\Controllers;

class AdminController extends Controller {

    /**
     * Initializer.
     *
     * @return \AdminController
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

}
