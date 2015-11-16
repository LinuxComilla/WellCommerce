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

namespace WellCommerce\Bundle\SalesBundle\Factory;

use WellCommerce\Bundle\CoreBundle\Factory\FactoryInterface;
use WellCommerce\Bundle\SalesBundle\Entity\CartProductInterface;
use WellCommerce\Bundle\SalesBundle\Entity\OrderInterface;

/**
 * Interface OrderProductFactoryInterface
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
interface OrderProductFactoryInterface extends FactoryInterface
{
    /**
     * @return \WellCommerce\Bundle\SalesBundle\Entity\OrderProductInterface
     */
    public function create();

    /**
     * Creates an order product from given cart product
     *
     * @param CartProductInterface $cartProduct
     * @param OrderInterface       $order
     *
     * @return \WellCommerce\Bundle\SalesBundle\Entity\OrderProductInterface
     */
    public function createFromCartProduct(CartProductInterface $cartProduct, OrderInterface $order);
}
