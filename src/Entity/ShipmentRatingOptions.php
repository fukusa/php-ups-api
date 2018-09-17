<?php

namespace Ups\Entity;

use DOMDocument;
use DOMElement;
use Ups\Entity\RateInformation;
use Ups\NodeInterface;

/**
 * Class ShipmentRatingOptions.
 */
class ShipmentRatingOptions extends RateInformation
{

    /** @var boolean */
    private $userLevelDiscountIndicator;

    /**
     * @param null|DOMDocument $document
     *
     * @return DOMElement
     */
    public function toNode(DOMDocument $document = null)
    {
        if (null === $document) {
            $document = new DOMDocument();
        }

        $node = $document->createElement('ShipmentRatingOptions');

        if ($this->getNegotiatedRatesIndicator()) {
            $node->appendChild($document->createElement('NegotiatedRatesIndicator'));
        }

        if ($this->getRateChartIndicator()) {
            $node->appendChild($document->createElement('RateChartIndicator'));
        }

        if ($this->getRateChartIndicator()) {
            $node->appendChild($document->createElement('RateChartIndicator'));
        }

        if ($this->getUserLevelDiscountIndicator()) {
            $node->appendChild($document->createElement('UserLevelDiscountIndicator'));
        }

        return $node;
    }

    /**
     * @return bool
     */
    public function getUserLevelDiscountIndicator()
    {
        return $this->userLevelDiscountIndicator;
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setUserLevelDiscountIndicator($value)
    {
        $this->userLevelDiscountIndicator = $value;

        return $this;
    }
}
