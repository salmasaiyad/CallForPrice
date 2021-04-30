<?php

namespace FZ\CallForPrice\Controller\Post;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;

/**
 * Class Post
 * @package FZ\CallForPrice\Controller\Post
 */
class Submit extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \FZ\CallForPrice\Model\CallForPriceFactory
     */
    protected $_callforprice;
    /**
     * @var \Magento\Framework\Escaper
     */
    protected $_escaper;
    /**
     * @var \Magento\Framework\Mail\Template\TransportBuilder
     */
    protected $_transportBuilder;
    /**
     * @var \Magento\Framework\Translate\Inline\StateInterface
     */
    protected $inlineTranslation;
    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;
    /**
     * @var \FZ\CallForPrice\Helper\Data
     */
    protected $data;

    /**
     * Index constructor.
     * @param Context $context
     * @param \FZ\CallForPrice\Model\CallForPriceFactory $callforprice
     * @param \Magento\Framework\Mail\Template\TransportBuilder $transportBuilder
     * @param \Magento\Framework\Translate\Inline\StateInterface $inlineTranslation
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \FZ\CallForPrice\Helper\Data $data
     * @param \Magento\Framework\Escaper $escaper
     */
    public function __construct(Context $context,
                                \FZ\CallForPrice\Model\CallForPriceFactory $callforprice,
                                \Magento\Framework\Mail\Template\TransportBuilder $transportBuilder,
                                \Magento\Framework\Translate\Inline\StateInterface $inlineTranslation,
                                \Magento\Store\Model\StoreManagerInterface $storeManager,
                                \FZ\CallForPrice\Helper\Data $data,
                                \Magento\Framework\Escaper $escaper)
    {
        parent::__construct($context);
        $this->_callforprice = $callforprice;
        $this->_transportBuilder = $transportBuilder;
        $this->inlineTranslation = $inlineTranslation;
        $this->storeManager = $storeManager;
        $this->data =$data;
        $this->_escaper = $escaper;
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     * @throws \Exception
     */
    public function execute()
    {
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        if($post = $this->getRequest()->getParams()) {
            if( !empty($post['customer']) &&
                !empty($post['customer']['name']) &&
                !empty($post['customer']['email']) &&
                !empty($post['customer']['telephone']) &&
                !empty($post['customer']['product_qty'])

            ) {
                $model = $this->_callforprice->create();
                $model->setCustomerName($post['customer']['name']);
                $model->setCustomerId($post['customer_id']);
                $model->setCustomerEmail($post['customer']['email']);
                $model->setCustomerTelephone($post['customer']['telephone']);
                $model->setQty($post['customer']['product_qty']);
                $model->setProductId($post['product_id']);
                $model->setProductName($post['customer']['product_name']);
                $model->setDetails($post['customer']['request_details']);
                $model->setStatus('1');
                $model->save();
                try{
                    $postObject = new \Magento\Framework\DataObject();
                    $postObject->setData($post);
                    $templateOptions = array('area' => \Magento\Framework\App\Area::AREA_FRONTEND, 'store' => $this->storeManager->getStore()->getId());
                    $templateVars = array(
                        'store' => $this->storeManager->getStore(),
                        'customer_name' => $post['customer']['name'],
                        'customer_email' => $post['customer']['email'],
                        'product_name' => $post['customer']['product_name'],
                        'request_details' => $post['customer']['request_details'],
                        'qty_needed' => $post['customer']['product_qty'],
                        'telephone' => $post['customer']['telephone']
                    );
                    $to = $this->data->getEmailSender();
                    $this->inlineTranslation->suspend();
                    $cc = $this->data->senderEmailto();
                    $transport = $this->_transportBuilder->setTemplateIdentifier('callforprice_request')
                        ->setTemplateOptions($templateOptions)
                        ->setTemplateVars($templateVars)
                        ->setFrom(array('email' => $post['customer']['email'], 'name' => $post['customer']['name']))
                        ->addTo($to)
                        ->addCc($cc)
                        ->getTransport();
                    $transport->sendMessage();
                    $this->inlineTranslation->resume();
                }catch(\Exception $e){
                    $this->messageManager->addNotice($e->getMessage());
                    $this->_redirect($this->_redirect->getRefererUrl());
                }
                $this->messageManager->addSuccess('Request has Been Submitted SuccessFully');
            } else {
                $this->messageManager->addError('Can’t Send Request');
            }

        } else {
            $this->messageManager->addError('Can’t Send Request');
        }
        $this->_redirect($this->_redirect->getRefererUrl());;
    }

}
