<?php
/**
 * Copyright © FZ. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace FZ\CallForPrice\Controller\Adminhtml\CallForPrice;

class Delete extends \FZ\CallForPrice\Controller\Adminhtml\CallForPrice
{

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('callforprice_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create(\FZ\CallForPrice\Model\CallForPrice::class);
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the Callforprice.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['callforprice_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a Callforprice to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}

