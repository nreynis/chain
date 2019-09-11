<?php

namespace Cocur\Chain\Link;

use Cocur\Chain\Chain;

/**
 * IntersectAssocTest.
 *
 * @author    Florian Eckerstorfer
 * @copyright 2015-2018 Florian Eckerstorfer
 * @group     unit
 */
class IntersectAssocTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     * @covers Cocur\Chain\Link\IntersectAssoc::intersectAssoc()
     */
    public function intersectAssocIntersectsWithArray()
    {
        /** @var \Cocur\Chain\Link\IntersectAssoc $mock */
        $mock        = $this->getMockForTrait('Cocur\Chain\Link\IntersectAssoc');
        $mock->array = [1, 2, 3];
        $mock->intersectAssoc([3, 2, 1]);

        $this->assertContains(2, $mock->array);
        $this->assertNotContains(1, $mock->array);
        $this->assertNotContains(3, $mock->array);
    }

    /**
     * @test
     * @covers Cocur\Chain\Link\IntersectAssoc::intersectAssoc()
     */
    public function intersectAssocIntersectsWithChain()
    {
        /** @var \Cocur\Chain\Link\IntersectAssoc $mock */
        $mock        = $this->getMockForTrait('Cocur\Chain\Link\IntersectAssoc');
        $mock->array = [1, 2, 3];
        $mock->intersectAssoc(Chain::create([3, 2, 1]));

        $this->assertContains(2, $mock->array);
        $this->assertNotContains(1, $mock->array);
        $this->assertNotContains(3, $mock->array);
    }
}
