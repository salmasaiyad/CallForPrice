<?php
/**
 * Copyright © FZ. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace FZ\CallForPrice\Api\Data;

interface CallForPriceSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get CallForPrice list.
     * @return \FZ\CallForPrice\Api\Data\CallForPriceInterface[]
     */
    public function getItems();

    /**
     * Set id list.
     * @param \FZ\CallForPrice\Api\Data\CallForPriceInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

