<?php
declare(strict_types=1);

namespace Knp\Component\Pager\Event\Subscriber\Paginate;

use Knp\Component\Pager\Event\ItemsEvent;
use Knp\Component\Pager\Pagination\PaginationItems\AdapterFactoryInterface;
use Solarium\Client;
use Solarium\QueryType\Select\Query\Query;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Solarium query pagination.
 *
 * @author Paweł Jędrzejewski <pjedrzejewski@diweb.pl>
 */
class SolariumQuerySubscriber implements EventSubscriberInterface
{
    private const SUBSCRIBED_EVENTS = [
        'knp_pager.items' => ['items', 0] /* triggers before a standard array subscriber*/
    ];

    /**
     * @var AdapterFactoryInterface
     */
    private $adapterFactory;

    /**
     * SolariumQuerySubscriber constructor.
     * @param AdapterFactoryInterface $adapterFactory
     */
    public function __construct(AdapterFactoryInterface $adapterFactory)
    {
        $this->adapterFactory = $adapterFactory;
    }

    /**
     * @param ItemsEvent $event
     *
     * @return void
     */
    public function items(ItemsEvent $event): void
    {
        if (is_array($event->target) && 2 === count($event->target)) {
            $values = array_values($event->target);
            [$client, $query] = $values;

            if ($client instanceof Client && $query instanceof Query) {
                $query->setStart($event->getOffset())->setRows($event->getLimit());
                $solrResult = $client->select($query);

                $event->items  = $this->adapterFactory->factory($solrResult->getIterator());
                $event->count  = $solrResult->getNumFound();
                $event->setCustomPaginationParameter('result', $solrResult);
                $event->stopPropagation();
            }
        }
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents(): array
    {
        return self::SUBSCRIBED_EVENTS;
    }
}
