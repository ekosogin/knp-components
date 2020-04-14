<?php
declare(strict_types=1);

namespace Knp\Component\Pager\Pagination\PaginationItems;

/**
 * Interface AdapterFactoryInterface
 */
interface AdapterFactoryInterface
{
    /**
     * @param mixed $items
     *
     * @return AdapterInterface
     */
    public function factory($items): AdapterInterface;
}
