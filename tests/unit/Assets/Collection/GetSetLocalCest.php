<?php

/**
 * This file is part of the Phalcon Framework.
 *
 * (c) Phalcon Team <team@phalcon.io>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Phalcon\Tests\Unit\Assets\Collection;

use Phalcon\Assets\Collection;
use UnitTester;

/**
 * Class GetSetLocalCest
 *
 * @package Phalcon\Tests\Unit\Assets\Collection
 */
class GetSetLocalCest
{
    /**
     * Tests Phalcon\Assets\Collection :: isLocal() / setLocal()
     *
     * @param UnitTester $I
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2020-09-09
     */
    public function assetsCollectionGetSetLocal(UnitTester $I)
    {
        $I->wantToTest('Assets\Collection - isLocal() / setLocal()');

        $collection = new Collection();
        $I->assertTrue($collection->isLocal());

        $collection->setLocal(false);
        $I->assertFalse($collection->isLocal());
    }
}
