<?php

namespace GeorgRinger\SchemaOrgGenerator\ViewHelpers;

use GeorgRinger\SchemaOrgGenerator\Transformator\TransformatorFactory;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class ObjectToJsonLdViewHelper extends AbstractViewHelper
{
    /** @var bool */
    protected $escapeOutput = false;

    /**
     * Initialize arguments
     */
    public function initializeArguments(): void
    {
        parent::initializeArguments();
        $this->registerArgument('object', 'object', 'Object', true);
        $this->registerArgument('link', 'link', 'string', false, '');
        $this->registerArgument('extra', 'Extra information', 'array', false, []);
    }

    public function render(): string
    {
        $factory = GeneralUtility::makeInstance(TransformatorFactory::class);
        $transformator = $factory->getTransformatorForObject($this->arguments['object'], $this->arguments['link'], $this->arguments['extra']);
        if ($transformator) {
            $schemaType = $transformator->transform($this->arguments['object']);
            return $schemaType->toScript();
        }
        return '';
    }
}
