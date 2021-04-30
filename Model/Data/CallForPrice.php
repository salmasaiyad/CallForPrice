<?php
/**
 * Copyright © FZ. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace FZ\CallForPrice\Model\Data;

use FZ\CallForPrice\Api\Data\CallForPriceInterface;

class CallForPrice extends \Magento\Framework\Api\AbstractExtensibleObject implements CallForPriceInterface
{

    /**
     * Get callforprice_id
     * @return string|null
     */
    public function getCallforpriceId()
    {
        return $this->_get(self::CALLFORPRICE_ID);
    }

    /**
     * Set callforprice_id
     * @param string $callforpriceId
     * @return \FZ\CallForPrice\Api\Data\CallForPriceInterface
     */
    public function setCallforpriceId($callforpriceId)
    {
        return $this->setData(self::CALLFORPRICE_ID, $callforpriceId);
    }

    /**
     * Get id
     * @return string|null
     */
    public function getId()
    {
        return $this->_get(self::ID);
    }

    /**
     * Set id
     * @param string $id
     * @return \FZ\CallForPrice\Api\Data\CallForPriceInterface
     */
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \FZ\CallForPrice\Api\Data\CallForPriceExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \FZ\CallForPrice\Api\Data\CallForPriceExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \FZ\CallForPrice\Api\Data\CallForPriceExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get customer_name
     * @return string|null
     */
    public function getCustomerName()
    {
        return $this->_get(self::CUSTOMER_NAME);
    }

    /**
     * Set customer_name
     * @param string $customerName
     * @return \FZ\CallForPrice\Api\Data\CallForPriceInterface
     */
    public function setCustomerName($customerName)
    {
        return $this->setData(self::CUSTOMER_NAME, $customerName);
    }

    /**
     * Get customer_email
     * @return string|null
     */
    public function getCustomerEmail()
    {
        return $this->_get(self::CUSTOMER_EMAIL);
    }

    /**
     * Set customer_email
     * @param string $customerEmail
     * @return \FZ\CallForPrice\Api\Data\CallForPriceInterface
     */
    public function setCustomerEmail($customerEmail)
    {
        return $this->setData(self::CUSTOMER_EMAIL, $customerEmail);
    }

    /**
     * Get customer_id
     * @return string|null
     */
    public function getCustomerId()
    {
        return $this->_get(self::CUSTOMER_ID);
    }

    /**
     * Set customer_id
     * @param string $customerId
     * @return \FZ\CallForPrice\Api\Data\CallForPriceInterface
     */
    public function setCustomerId($customerId)
    {
        return $this->setData(self::CUSTOMER_ID, $customerId);
    }

    /**
     * Get customer_telephone
     * @return string|null
     */
    public function getCustomerTelephone()
    {
        return $this->_get(self::CUSTOMER_TELEPHONE);
    }

    /**
     * Set customer_telephone
     * @param string $customerTelephone
     * @return \FZ\CallForPrice\Api\Data\CallForPriceInterface
     */
    public function setCustomerTelephone($customerTelephone)
    {
        return $this->setData(self::CUSTOMER_TELEPHONE, $customerTelephone);
    }

    /**
     * Get product_id
     * @return string|null
     */
    public function getProductId()
    {
        return $this->_get(self::PRODUCT_ID);
    }

    /**
     * Set product_id
     * @param string $productId
     * @return \FZ\CallForPrice\Api\Data\CallForPriceInterface
     */
    public function setProductId($productId)
    {
        return $this->setData(self::PRODUCT_ID, $productId);
    }

    /**
     * Get product_name
     * @return string|null
     */
    public function getProductName()
    {
        return $this->_get(self::PRODUCT_NAME);
    }

    /**
     * Set product_name
     * @param string $productName
     * @return \FZ\CallForPrice\Api\Data\CallForPriceInterface
     */
    public function setProductName($productName)
    {
        return $this->setData(self::PRODUCT_NAME, $productName);
    }

    /**
     * Get status
     * @return string|null
     */
    public function getStatus()
    {
        return $this->_get(self::STATUS);
    }

    /**
     * Set status
     * @param string $status
     * @return \FZ\CallForPrice\Api\Data\CallForPriceInterface
     */
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }

    /**
     * Get qty
     * @return string|null
     */
    public function getQty()
    {
        return $this->_get(self::QTY);
    }

    /**
     * Set qty
     * @param string $qty
     * @return \FZ\CallForPrice\Api\Data\CallForPriceInterface
     */
    public function setQty($qty)
    {
        return $this->setData(self::QTY, $qty);
    }
}

