<?php
/**
 * Copyright © FZ. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace FZ\CallForPrice\Controller\Adminhtml\CallForPrice;

use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Backend\App\Action
{

    protected $dataPersistor;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
    ) {
        $this->dataPersistor = $dataPersistor;
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            $id = $this->getRequest()->getParam('callforprice_id');
        
            $model = $this->_objectManager->create(\FZ\CallForPrice\Model\CallForPrice::class)->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addErrorMessage(__('This Callforprice no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }
        
            $model->setData($data);
        
            try {
                $model->save();
                $this->messageManager->addSuccessMessage(__('You saved the Callforprice.'));
                $this->dataPersistor->clear('fz_callforprice_callforprice');
        
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['callforprice_id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the Callforprice.'));
            }
        
            $this->dataPersistor->set('fz_callforprice_callforprice', $data);
            return $resultRedirect->setPath('*/*/edit', ['callforprice_id' => $this->getRequest()->getParam('callforprice_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}

