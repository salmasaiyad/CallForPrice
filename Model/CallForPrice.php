<?php
/**
 * Copyright © FZ. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace FZ\CallForPrice\Model;

use FZ\CallForPrice\Api\Data\CallForPriceInterface;
use FZ\CallForPrice\Api\Data\CallForPriceInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;

class CallForPrice extends \Magento\Framework\Model\AbstractModel
{

    protected $_eventPrefix = 'fz_callforprice_callforprice';
    protected $dataObjectHelper;

    protected $callforpriceDataFactory;


    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param CallForPriceInterfaceFactory $callforpriceDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \FZ\CallForPrice\Model\ResourceModel\CallForPrice $resource
     * @param \FZ\CallForPrice\Model\ResourceModel\CallForPrice\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        CallForPriceInterfaceFactory $callforpriceDataFactory,
        DataObjectHelper $dataObjectHelper,
        \FZ\CallForPrice\Model\ResourceModel\CallForPrice $resource,
        \FZ\CallForPrice\Model\ResourceModel\CallForPrice\Collection $resourceCollection,
        array $data = []
    ) {
        $this->callforpriceDataFactory = $callforpriceDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve callforprice model with callforprice data
     * @return CallForPriceInterface
     */
    public function getDataModel()
    {
        $callforpriceData = $this->getData();
        
        $callforpriceDataObject = $this->callforpriceDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $callforpriceDataObject,
            $callforpriceData,
            CallForPriceInterface::class
        );
        
        return $callforpriceDataObject;
    }
}

