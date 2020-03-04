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

namespace Invo\Controllers;

use Invo\Forms\AnaForm;
use Invo\Models\Ana;
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class AnaController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();

        $this->tag->setTitle('Ana');
    }

    /**
     * Shows the index action
     */
    public function indexAction(): void
    {
        
        $ana=new Ana();
        
        $getAllRecords=$ana->getAllRecords();
        
        
        
        $this->view->form = new AnaForm();
        $this->view->records=$getAllRecords->toArray();
        
        
        
    }

 

    /**
     * Shows the form to create a new company
     */
    public function newAction(): void
    {
        $this->view->form = new AnaForm(null, ['edit' => true]);
    }

    /**
     * Edits a company based on its id
     *
     * @param int $id
     */
    public function editAction($id): void
    {
        $record = Ana::findFirstById($id);
        if (!$record) {
            $this->flash->error('Ana no fue encontrada');

            $this->dispatcher->forward([
                'controller' => 'ana',
                'action'     => 'index',
            ]);

            return;
        }

        $this->view->form = new AnaForm($record, ['edit' => true]);
    }

    /**
     * Creates a new company
     */
    public function createAction(): void
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => 'ana',
                'action'     => 'index',
            ]);

            return;
        }

        $form = new AnaForm();
        
        
        
        $ana = new Ana();

        $data = $this->request->getPost();
        if (!$form->isValid($data, $ana)) {
            
            foreach ($form->getMessages() as $message) {
                
                $this->flash->error((string)$message);
            }

            $this->dispatcher->forward([
                'controller' => 'ana',
                'action'     => 'new',
            ]);

            return;
        }
            

        
        if (!$ana->save()) {
            foreach ($ana->getMessages() as $message) {
                $this->flash->error((string)$message);
            }

            $this->dispatcher->forward([
                'controller' => 'ana',
                'action'     => 'new',
            ]);

            return;
        }

        $form->clear();
        $this->flash->success('Su Información se guardó con éxito');

        $this->dispatcher->forward([
            'controller' => 'ana',
            'action'     => 'index',
        ]);
    }
    
    

    /**
     * Saves current company in screen
     */
    public function saveAction(): void
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => 'ana',
                'action'     => 'index',
            ]);

            return;
        }

        $id = $this->request->getPost('id', 'int');
        
        $record = Ana::findFirstById($id);
        
        
        if (!$record) {
            $this->flash->error('ana does not exist');

            $this->dispatcher->forward([
                'controller' => 'ana',
                'action'     => 'index',
            ]);

            return;
        }

        $data = $this->request->getPost();
        
        
        $form = new AnaForm();
        
        
        if (!$form->isValid($data, $record)) {
            foreach ($form->getMessages() as $message) {
                $this->flash->error((string)$message);
            }

            $this->dispatcher->forward([
                'controller' => 'ana',
                'action'     => 'new',
            ]);

            return;
        }

        
        
        
        if (!$record->save()) {
            foreach ($record->getMessages() as $message) {
                $this->flash->error((string)$message);
            }

            $this->dispatcher->forward([
                'controller' => 'ana',
                'action'     => 'new',
            ]);

            return;
        }

        $form->clear();
        $this->flash->success('Ana se guardo con èxito');

        $this->dispatcher->forward([
            'controller' => 'ana',
            'action'     => 'index',
        ]);
    }

    /**
     * Deletes a company
     *
     * @param string $id
     */
    public function deleteAction($id)
    {
        $record = Ana::findFirstById($id);
        
        
        if (!$record) {
            $this->flash->error('Ana was not found');

            $this->dispatcher->forward([
                'controller' => 'ana',
                'action'     => 'index',
            ]);

            return;
        }

        if (!$record->delete()) {
            foreach ($record->getMessages() as $message) {
                $this->flash->error((string)$message);
            }

            $this->dispatcher->forward([
                'controller' => 'ana',
                'action'     => 'index',
            ]);

            return;
        }

        $this->flash->success('Ana fue borrada');

        $this->dispatcher->forward([
            'controller' => 'ana',
            'action'     => 'index',
        ]);
    }
}

