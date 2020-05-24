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
     * @param int   $size
     * @param array $options options, including:
     *                       bool `preserveKeys` to prevent reindexing, default to false
     *                       bool `decorate` to generate chains instead of arrays, default tu true
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

        if (empty($options['decorate']) || $options['decorate'] === true) {
            foreach ($this->array as $index => $chunk) {
                $this->array[$index] = new static($chunk);
            }
        }

        return $this;
    }
}
