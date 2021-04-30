<?php

namespace FZ\CallForPrice\Model\Config\Source;

/**
 * Class Status
 * @package FZ\CallForPrice\Model\Config\Source
 */
class Status implements \Magento\Framework\Data\OptionSourceInterface
{
    /**
     * @var \FZ\CallForPrice\Model\CallForPrice
     */
    protected $_grid;

    /**
     * Status constructor.
     * @param \FZ\CallForPrice\Model\CallForPrice $callForPrice
     */
    public function __construct(\FZ\CallForPrice\Model\CallForPrice $callForPrice)
    {
        $this->_grid = $callForPrice;
    }
     /**
     * @return array
     */
     public function getAvailableStatuses()
     {
         return ['1' => __('New'), '2'=> __('Under Process'), '3'=> __('Completed')];
     }
    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options[] = ['label' => '', 'value' => ''];
        $availableOptions = $this->getAvailableStatuses();
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
}