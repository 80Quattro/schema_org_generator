<?php

namespace GeorgRinger\SchemaOrgGenerator\ViewHelpers;

use Spatie\SchemaOrg\Schema;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class JsonLdViewHelper extends AbstractViewHelper
{
    /** @var bool */
    protected $escapeOutput = false;

    /**
     * Initialize arguments
     */
    public function initializeArguments(): void
    {
        parent::initializeArguments();
        $this->registerArgument('type', 'string', 'Schema org type', true);
        $this->registerArgument('data', 'array', 'Data', true);
    }

    public function render(): string
    {
        $schemaType = $this->arguments['type'];
        /** @var \Spatie\SchemaOrg\Type $schemaOrg */
        $schemaOrg = Schema::$schemaType();
        $schemaOrg->addProperties($this->arguments['data']);
        return $schemaOrg->toScript();
    }
}
