<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 *
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace WellCommerce\Bundle\SalesBundle\DataSet\Front;

use WellCommerce\Bundle\DataSetBundle\Column\ColumnCollection;
use WellCommerce\Bundle\DataSetBundle\QueryBuilder\AbstractDataSetQueryBuilder;
use WellCommerce\Bundle\DataSetBundle\QueryBuilder\DataSetQueryBuilderInterface;
use WellCommerce\Bundle\DataSetBundle\Request\DataSetRequestInterface;
use WellCommerce\Bundle\SalesBundle\Context\Front\CartContextInterface;
use WellCommerce\Bundle\SalesBundle\Repository\CartProductRepositoryInterface;

/**
 * Class CartProductDataSetQueryBuilder
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class CartProductDataSetQueryBuilder extends AbstractDataSetQueryBuilder implements DataSetQueryBuilderInterface
{
    /**
     * @var CartContextInterface
     */
    protected $cartContext;

    /**
     * Constructor
     *
     * @param CartProductRepositoryInterface $cartProductRepository
     * @param CartContextInterface           $cartContext
     */
    public function __construct(CartProductRepositoryInterface $cartProductRepository, CartContextInterface $cartContext)
    {
        parent::__construct($cartProductRepository);
        $this->cartContext = $cartContext;
    }

    /**
     * {@inheritdoc}
     */
    public function getQueryBuilder(ColumnCollection $columns, DataSetRequestInterface $request)
    {
        $queryBuilder = parent::getQueryBuilder($columns, $request);
        $expression   = $queryBuilder->expr()->eq('cart_product.cart', ':cart');
        $queryBuilder->andWhere($expression);
        $queryBuilder->setParameter('cart', $this->cartContext->getCurrentCartIdentifier());
        $queryBuilder->setParameter('date', new \DateTime());

        return $queryBuilder;
    }
}
