<?php

declare(strict_types=1);

namespace GeorgRinger\SchemaOrgGenerator\Transformator;

/*
 * This file is part of the "schema_org_generator" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

use Spatie\SchemaOrg\Type;

interface TransformatorInterface
{
    /**
     * Check if the transformator can handle incoming argument
     */
    public function canHandle($in): bool;

    public function initialize(string $link = '', array $extraData = []): void;

    /**
     * Transform input to Schema type
     */
    public function transform($in): ?Type;
}
