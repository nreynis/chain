<?php

namespace Cocur\Chain\Link;

/**
 * Chunk.
 *
 * @author    Nicolas Reynis
 */
trait Chunk
{
    /**
     * @param int $size
     * @param array $options options, including `preserveKeys` to prevent reindexing
     *
     * @return self
     */
    public function chunk(int $size, array $options = []): self
    {
        if (!empty($options['preserveKeys'])) {
            $this->array = array_chunk($this->array, $size, $options['preserveKeys']);
        } else {
            $this->array = array_chunk($this->array, $size);
        }

        return $this;
    }
}
