<?php

namespace Ups\Entity;

use DOMDocument;
use DOMElement;
use Ups\Entity\SoldTo;
use Ups\NodeInterface;

/**
 * Class Contact.
 */
class Contact implements NodeInterface
{
    /**
     * @var SoldTo
     */
    private $soldTo;

    /**
     * @param null|object $attributes
     */
    public function __construct($attributes = null)
    {
        if (null !== $attributes) {
            if (isset($attributes->SoldTo)) {
                $this->setSoldTo(new SoldTo($attributes->SoldTo));
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

        $node = $document->createElement('Contact');
        if ($this->getSoldTo() !== null) {
            $node->appendChild($this->getSoldTo()->toNode($document));
        }

        return $node;
    }

    /**
     * @param SoldTo $soldTo
     * @return $this
     * @throws \Exception
     */
    public function setSoldTo($soldTo)
    {
        $this->soldTo = $soldTo;

        return $this;
    }

    /**
     * @return \Ups\Entity\SoldTo
     */
    public function getSoldTo()
    {
        return $this->soldTo;
    }
}
