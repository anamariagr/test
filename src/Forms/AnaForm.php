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

namespace Invo\Forms;

use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Form;
use Phalcon\Validation\Validator\PresenceOf;

class AnaForm extends Form
{
    /**
     * Initialize the companies form
     *
     * @param null $entity
     * @param array $options
     */
    public function initialize($entity = null, array $options = [])
    {
        if (!isset($options['edit'])) {
            $this->add((new Text('id'))->setLabel('Id'));
        } else {
            $this->add(new Hidden('id'));
        }

        $commonFilters = [
            'striptags',
            'string',
        ];

        
        
     
        /**
         * Name text field
         */
        $name = new Text('description');
        $name->setLabel('Descripcion');
        $name->setFilters($commonFilters);
        $name->addValidators([
            new PresenceOf(['message' => 'Debes agregar una Descripcion']),
        ]);

        $this->add($name);

         
        /**
         * Name text field
         */
        
        /**
         * Name text field
         */
        $name = new Text('price');
        $name->setLabel('Price');
        $name->setFilters($commonFilters);
        $name->addValidators([
            new PresenceOf(['message' => 'Debes agregar un Precio']),
        ]);

        $this->add($name);

         
        /**
         * Name text field
         */
        
        
     
      
    }
}
