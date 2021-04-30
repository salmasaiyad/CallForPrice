<?php
/**
 * Copyright © FZ. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace FZ\CallForPrice\Model;

use FZ\CallForPrice\Api\CallForPriceRepositoryInterface;
use FZ\CallForPrice\Api\Data\CallForPriceInterfaceFactory;
use FZ\CallForPrice\Api\Data\CallForPriceSearchResultsInterfaceFactory;
use FZ\CallForPrice\Model\ResourceModel\CallForPrice as ResourceCallForPrice;
use FZ\CallForPrice\Model\ResourceModel\CallForPrice\CollectionFactory as CallForPriceCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;

class CallForPriceRepository implements CallForPriceRepositoryInterface
{

    protected $resource;

    protected $extensibleDataObjectConverter;
    protected $searchResultsFactory;

    protected $callForPriceFactory;

    protected $dataCallForPriceFactory;

    private $storeManager;

    protected $dataObjectHelper;

    protected $callForPriceCollectionFactory;

    protected $dataObjectProcessor;

    protected $extensionAttributesJoinProcessor;

    private $collectionProcessor;


    /**
     * @param ResourceCallForPrice $resource
     * @param CallForPriceFactory $callForPriceFactory
     * @param CallForPriceInterfaceFactory $dataCallForPriceFactory
     * @param CallForPriceCollectionFactory $callForPriceCollectionFactory
     * @param CallForPriceSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceCallForPrice $resource,
        CallForPriceFactory $callForPriceFactory,
        CallForPriceInterfaceFactory $dataCallForPriceFactory,
        CallForPriceCollectionFactory $callForPriceCollectionFactory,
        CallForPriceSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->callForPriceFactory = $callForPriceFactory;
        $this->callForPriceCollectionFactory = $callForPriceCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataCallForPriceFactory = $dataCallForPriceFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \FZ\CallForPrice\Api\Data\CallForPriceInterface $callForPrice
    ) {
        /* if (empty($callForPrice->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $callForPrice->setStoreId($storeId);
        } */
        
        $callForPriceData = $this->extensibleDataObjectConverter->toNestedArray(
            $callForPrice,
            [],
            \FZ\CallForPrice\Api\Data\CallForPriceInterface::class
        );
        
        $callForPriceModel = $this->callForPriceFactory->create()->setData($callForPriceData);
        
        try {
            $this->resource->save($callForPriceModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the callForPrice: %1',
                $exception->getMessage()
            ));
        }
        return $callForPriceModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function get($callForPriceId)
    {
        $callForPrice = $this->callForPriceFactory->create();
        $this->resource->load($callForPrice, $callForPriceId);
        if (!$callForPrice->getId()) {
            throw new NoSuchEntityException(__('CallForPrice with id "%1" does not exist.', $callForPriceId));
        }
        return $callForPrice->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->callForPriceCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \FZ\CallForPrice\Api\Data\CallForPriceInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \FZ\CallForPrice\Api\Data\CallForPriceInterface $callForPrice
    ) {
        try {
            $callForPriceModel = $this->callForPriceFactory->create();
            $this->resource->load($callForPriceModel, $callForPrice->getCallforpriceId());
            $this->resource->delete($callForPriceModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the CallForPrice: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($callForPriceId)
    {
        return $this->delete($this->get($callForPriceId));
    }
}

