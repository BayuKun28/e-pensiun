<?php
/**
 * This file is part of PHPPresentation - A pure PHP library for reading and writing
 * presentations documents.
 *
 * PHPPresentation is free software distributed under the terms of the GNU Lesser
 * General Public License version 3 as published by the Free Software Foundation.
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/PHPOffice/PHPPresentation/contributors.
 *
 * @see        https://github.com/PHPOffice/PHPPresentation
 *
 * @copyright   2009-2015 PHPPresentation contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 */

declare(strict_types=1);

namespace PhpOffice\PhpPresentation\Tests\Shape;

use PhpOffice\PhpPresentation\Shape\Line;
use PhpOffice\PhpPresentation\Style\Border;
use PHPUnit\Framework\TestCase;

/**
 * Test class for memory drawing element.
 *
 * @coversDefaultClass \PhpOffice\PhpPresentation\Shape\Line
 */
class LineTest extends TestCase
{
    /**
     * Test can read.
     */
    public function testConstruct(): void
    {
        $value = mt_rand(1, 100);
        $object = new Line($value, $value, $value, $value);

        $this->assertEquals(Border::LINE_SINGLE, $object->getBorder()->getLineStyle());
        $this->assertEquals($value, $object->getOffsetX());
        $this->assertEquals($value, $object->getOffsetY());
        $this->assertEquals(0, $object->getWidth());
        $this->assertEquals(0, $object->getHeight());
        $this->assertIsString($object->getHashCode());
    }
}
