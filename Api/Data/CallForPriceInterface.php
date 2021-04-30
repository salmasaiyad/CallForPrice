<?php
/**
 * Copyright © FZ. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace FZ\CallForPrice\Api\Data;

interface CallForPriceInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const ID = 'id';
    const CUSTOMER_EMAIL = 'customer_email';
    const CUSTOMER_ID = 'customer_id';
    const CUSTOMER_TELEPHONE = 'customer_telephone';
    const CALLFORPRICE_ID = 'callforprice_id';
    const CUSTOMER_NAME = 'customer_name';
    const PRODUCT_ID = 'product_id';
    const PRODUCT_NAME = 'product_name';
    const STATUS = 'status';
    const QTY = 'qty';

    /**
     * Get callforprice_id
     * @return string|null
     */
    public function getCallforpriceId();

    /**
     * Set callforprice_id
     * @param string $callforpriceId
     * @return \FZ\CallForPrice\Api\Data\CallForPriceInterface
     */
    public function setCallforpriceId($callforpriceId);

    /**
     * Get id
     * @return string|null
     */
    public function getId();

    /**
     * Set id
     * @param string $id
     * @return \FZ\CallForPrice\Api\Data\CallForPriceInterface
     */
    public function setId($id);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \FZ\CallForPrice\Api\Data\CallForPriceExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \FZ\CallForPrice\Api\Data\CallForPriceExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \FZ\CallForPrice\Api\Data\CallForPriceExtensionInterface $extensionAttributes
    );

    /**
     * Get customer_name
     * @return string|null
     */
    public function getCustomerName();

    /**
     * Set customer_name
     * @param string $customerName
     * @return \FZ\CallForPrice\Api\Data\CallForPriceInterface
     */
    public function setCustomerName($customerName);

    /**
     * Get customer_email
     * @return string|null
     */
    public function getCustomerEmail();

    /**
     * Set customer_email
     * @param string $customerEmail
     * @return \FZ\CallForPrice\Api\Data\CallForPriceInterface
     */
    public function setCustomerEmail($customerEmail);

    /**
     * Get customer_id
     * @return string|null
     */
    public function getCustomerId();

    /**
     * Set customer_id
     * @param string $customerId
     * @return \FZ\CallForPrice\Api\Data\CallForPriceInterface
     */
    public function setCustomerId($customerId);

    /**
     * Get customer_telephone
     * @return string|null
     */
    public function getCustomerTelephone();

    /**
     * Set customer_telephone
     * @param string $customerTelephone
     * @return \FZ\CallForPrice\Api\Data\CallForPriceInterface
     */
    public function setCustomerTelephone($customerTelephone);

    /**
     * Get product_id
     * @return string|null
     */
    public function getProductId();

    /**
     * Set product_id
     * @param string $productId
     * @return \FZ\CallForPrice\Api\Data\CallForPriceInterface
     */
    public function setProductId($productId);

    /**
     * Get product_name
     * @return string|null
     */
    public function getProductName();

    /**
     * Set product_name
     * @param string $productName
     * @return \FZ\CallForPrice\Api\Data\CallForPriceInterface
     */
    public function setProductName($productName);

    /**
     * Get status
     * @return string|null
     */
    public function getStatus();

    /**
     * Set status
     * @param string $status
     * @return \FZ\CallForPrice\Api\Data\CallForPriceInterface
     */
    public function setStatus($status);

    /**
     * Get qty
     * @return string|null
     */
    public function getQty();

    /**
     * Set qty
     * @param string $qty
     * @return \FZ\CallForPrice\Api\Data\CallForPriceInterface
     */
    public function setQty($qty);
}

