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

namespace Phalcon\Tests\Integration\Cache\Adapter\Memory;

use Phalcon\Support\Exception as HelperException;
use Phalcon\Cache\Adapter\Memory;
use Phalcon\Storage\SerializerFactory;
use Phalcon\Support\HelperFactory;
use IntegrationTester;

class IncrementCest
{
    /**
     * Tests Phalcon\Cache\Adapter\Memory :: increment()
     *
     * @param IntegrationTester $I
     *
     * @throws HelperException
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2020-09-09
     */
    public function storageAdapterMemoryIncrement(IntegrationTester $I)
    {
        $I->wantToTest('Cache\Adapter\Memory - increment()');

        $helper     = new HelperFactory();
        $serializer = new SerializerFactory();
        $adapter    = new Memory($helper, $serializer);

        $key    = 'cache-data';
        $result = $adapter->set($key, 1);
        $I->assertTrue($result);

        $expected = 2;
        $actual   = $adapter->increment($key);
        $I->assertEquals($expected, $actual);

        $actual = $adapter->get($key);
        $I->assertEquals($expected, $actual);

        $expected = 10;
        $actual   = $adapter->increment($key, 8);
        $I->assertEquals($expected, $actual);

        $actual = $adapter->get($key);
        $I->assertEquals($expected, $actual);
    }
}
