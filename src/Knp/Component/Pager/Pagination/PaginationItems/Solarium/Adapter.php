<?php
declare(strict_types=1);

namespace Knp\Component\Pager\Pagination\PaginationItems\Solarium;

use ArrayIterator;
use Knp\Component\Pager\Pagination\PaginationItems\AdapterInterface;

/**
 * Class Adapter
 */
class Adapter implements AdapterInterface
{
    /**
     * @var ArrayIterator
     */
    private $items;

    /**
     * Adapter constructor.
     * @param ArrayIterator $items
     */
    public function __construct(ArrayIterator $items)
    {
        $this->items = $items;
    }

    /**
     * {@inheritDoc}
     */
    public function current()
    {
        return $this->items->current();
    }

    /**
     * {@inheritDoc}
     */
    public function next(): void
    {
        $this->items->next();
    }

    /**
     * {@inheritDoc}
     */
    public function key()
    {
        return $this->items->key();
    }

    /**
     * {@inheritDoc}
     */
    public function valid(): bool
    {
        return $this->items->valid();
    }

    /**
     * {@inheritDoc}
     */
    public function rewind(): void
    {
        $this->items->rewind();
    }

    /**
     * {@inheritDoc}
     */
    public function offsetExists($offset): bool
    {
        return $this->items->offsetExists($offset);
    }

    /**
     * {@inheritDoc}
     */
    public function offsetGet($offset)
    {
        return $this->items->offsetGet($offset);
    }

    /**
     * {@inheritDoc}
     */
    public function offsetSet($offset, $value): void
    {
        $this->items->offsetSet($offset, $value);
    }

    /**
     * {@inheritDoc}
     */
    public function offsetUnset($offset): void
    {
        $this->items->offsetUnset($offset);
    }

    /**
     * {@inheritDoc}
     */
    public function count(): int
    {
        return $this->items->count();
    }
}
