<?php
/**
 * Short description for file
 *
 * @FileName		Page.php
 * @Created On		9 February 2014
 * @author			Hemant Upadhyay <hemant.upadhyay@srmtechsol.com > 
 * @copyright		2015-2016 The PHP Group
 * @license			http://www.php.net
 * @Description		Page Model
 */
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
   protected $table = 'pages'; 	
   protected $fillable = ['title', 'slug', 'page_content'];
}
