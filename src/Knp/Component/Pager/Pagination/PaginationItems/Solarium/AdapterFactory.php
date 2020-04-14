<?php
declare(strict_types=1);

namespace Knp\Component\Pager\Pagination\PaginationItems\Solarium;

use Knp\Component\Pager\Pagination\PaginationItems\AdapterFactoryInterface;
use Knp\Component\Pager\Pagination\PaginationItems\AdapterInterface;

/**
 * Class AdapterFactory
 */
class AdapterFactory implements AdapterFactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function factory($items): AdapterInterface
    {
        return new Adapter($items);
    }
}
