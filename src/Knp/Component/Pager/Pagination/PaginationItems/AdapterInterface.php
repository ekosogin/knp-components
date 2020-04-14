<?php
declare(strict_types=1);

namespace Knp\Component\Pager\Pagination\PaginationItems;

use ArrayAccess;
use Countable;
use Iterator;

/**
 * Interface AdapterInterface
 */
interface AdapterInterface extends Iterator, Countable, ArrayAccess
{

}
