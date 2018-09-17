<?php

namespace Ups\Entity;

use DOMDocument;
use DOMElement;
use Ups\NodeInterface;

/**
 * Class ProductWeight.
 */
class ProductWeight implements NodeInterface
{
    /**
     * @var string
     */
    private $weight ;

    /**
     * @var \Ups\Entity\UnitOfMeasurement
     */
    private $unitOfMeasurement;

    /**
     * @param null|object $attributes
     */
    public function __construct($attributes = null)
    {
        if (null !== $attributes) {
            if (isset($attributes->Weight)) {
                $this->setWeight($attributes->Weight);
            }
            if (isset($attributes->UnitOfMeasurement)) {
                $this->setUnitOfMeasurement(new \Ups\Entity\UnitOfMeasurement($attributes->UnitOfMeasurement));
            }
        }
    }

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

        $node = $document->createElement('ProductWeight');
        $node->appendChild($document->createElement('Weight', $this->getWeight()));
        if ($this->getUnitOfMeasurement() !== null) {
            $node->appendChild($this->getUnitOfMeasurement()->toNode($document));
        }

        return $node;
    }

    /**
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param string $weight
     * @return $this
     * @throws \Exception
     */
    public function setWeight($weight)
    {
        $this->weight = number_format($weight, 6, '.', '');

        if (strlen((string)$this->weight) > 19) {
            throw new \Exception('Value too long');
        }

        return $this;
    }

    /**
     * @param \Ups\Entity\UnitOfMeasurement $unit
     *
     * @return $this
     */
    public function setUnitOfMeasurement(\Ups\Entity\UnitOfMeasurement $unit)
    {
        $this->unitOfMeasurement = $unit;

        return $this;
    }

    /**
     * @return \Ups\Entity\UnitOfMeasurement
     */
    public function getUnitOfMeasurement()
    {
        return $this->unitOfMeasurement;
    }
}
