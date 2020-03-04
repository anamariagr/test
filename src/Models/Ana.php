<?php
declare(strict_types=1);

/**
 * This file is part of the Invo.
 *
 * (c) Phalcon Team <team@phalcon.io>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Invo\Models;

use Phalcon\Db\RawValue;
use Phalcon\Mvc\Model;

class Ana extends Model
{
    public $id;

    public $description;

    public $price;

   
    public function getAllRecords(){
        
        //select * from ;
        $records = Ana::query()     
        ->execute();
        
        
        return $records;
    }

   
    
}

