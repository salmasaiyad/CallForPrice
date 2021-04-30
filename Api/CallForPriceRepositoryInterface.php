<?php
/**
 * Copyright © FZ. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace FZ\CallForPrice\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface CallForPriceRepositoryInterface
{

    /**
     * Save CallForPrice
     * @param \FZ\CallForPrice\Api\Data\CallForPriceInterface $callForPrice
     * @return \FZ\CallForPrice\Api\Data\CallForPriceInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \FZ\CallForPrice\Api\Data\CallForPriceInterface $callForPrice
    );

    /**
     * Retrieve CallForPrice
     * @param string $callforpriceId
     * @return \FZ\CallForPrice\Api\Data\CallForPriceInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($callforpriceId);

    /**
     * Retrieve CallForPrice matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \FZ\CallForPrice\Api\Data\CallForPriceSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete CallForPrice
     * @param \FZ\CallForPrice\Api\Data\CallForPriceInterface $callForPrice
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \FZ\CallForPrice\Api\Data\CallForPriceInterface $callForPrice
    );

    /**
     * Delete CallForPrice by ID
     * @param string $callforpriceId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($callforpriceId);
}

