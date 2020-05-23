<?php

namespace Cocur\Chain\Chunk;

/**
 * EveryTest.
 *
 * @author    Nicolas Reynis
 * @group     unit
 */
class ChunkTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     * @covers \Cocur\Chain\Link\Chunk::chunk()
     */
    public function everyReturnTrueWhenConditionPass(): void
    {
        /** @var Every $mock */
        $mock        = $this->getMockForTrait(Chunk::class);
        $mock->array = [1, 2, 3, 4];
        $mock->chunk(2);

        $this->assertEquals([1, 2], $mock->array[0]->array);
        $this->assertEquals([3, 4], $mock->array[1]->array);
    }
}
