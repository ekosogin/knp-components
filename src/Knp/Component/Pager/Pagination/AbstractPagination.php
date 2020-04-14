<?php

namespace Knp\Component\Pager\Pagination;

use Iterator;
use Knp\Component\Pager\Pagination\PaginationItems\AdapterInterface;

abstract class AbstractPagination implements Iterator, PaginationInterface
{
    protected $currentPageNumber;
    protected $numItemsPerPage;
    protected $totalCount;
    protected $paginatorOptions;
    protected $customParameters;

    /**
     * @var AdapterInterface
     */
    private $items;

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
    public function current()
    {
        return $this->items->current();
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
    public function next(): void
    {
        $this->items->next();
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
    public function count(): int
    {
        return $this->items->count();
    }

    /**
     * {@inheritDoc}
     */
    public function setCustomParameters(array $parameters): void
    {
        $this->customParameters = $parameters;
    }

    /**
     * {@inheritDoc}
     */
    public function getCustomParameter(string $name)
    {
        return $this->customParameters[$name] ?? null;
    }

    /**
     * {@inheritDoc}
     */
    public function setCurrentPageNumber(int $pageNumber): void
    {
        $this->currentPageNumber = $pageNumber;
    }

    /**
     * {@inheritDoc}
     */
    public function getCurrentPageNumber(): int
    {
        return $this->currentPageNumber;
    }

    /**
     * {@inheritDoc}
     */
    public function setItemNumberPerPage(int $numItemsPerPage): void
    {
        $this->numItemsPerPage = $numItemsPerPage;
    }

    /**
     * {@inheritDoc}
     */
    public function getItemNumberPerPage(): int
    {
        return $this->numItemsPerPage;
    }

    /**
     * {@inheritDoc}
     */
    public function setTotalItemCount(int $numTotal): void
    {
        $this->totalCount = $numTotal;
    }

    /**
     * {@inheritDoc}
     */
    public function getTotalItemCount(): int
    {
        return $this->totalCount;
    }

    /**
     * {@inheritDoc}
     */
    public function setPaginatorOptions(array $options): void
    {
        $this->paginatorOptions = $options;
    }

    /**
     * {@inheritDoc}
     */
    public function getPaginatorOption($name)
    {
        return $this->paginatorOptions[$name] ?? null;
    }

    /**
     * {@inheritDoc}
     */
    public function setItems(AdapterInterface $items): void
    {
        $this->items = $items;
    }

    /**
     * {@inheritDoc}
     */
    public function getItems(): AdapterInterface
    {
        return $this->items;
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
}
