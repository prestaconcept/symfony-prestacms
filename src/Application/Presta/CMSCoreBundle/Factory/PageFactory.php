<?php
/**
 * This file is part of prestaconcept/symfony-prestacms
 *
 * (c) PrestaConcept <http://www.prestaconcept.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Application\Presta\CMSCoreBundle\Factory;

use Presta\CMSCoreBundle\Factory\ModelFactoryInterface;
use Presta\CMSCoreBundle\Factory\PageFactory as BasePageFactory;

/**
 * For a working example, please check the prestacms-sandbox
 * github.com/prestaconcept/prestacms-sandbox/blob/master/src/Application/Presta/CMSCoreBundle/Factory/PageFactory.php
 *
 * @author Nicolas Bastien <nbastien@prestaconcept.net>
 */
class PageFactory extends BasePageFactory implements ModelFactoryInterface
{
    /**
     * {@inherit}
     */
    protected function configureZones(array $page)
    {
        return $page;
    }

    /**
     * {@inherit}
     */
    protected function configureBlock(array $block)
    {
        $block = parent::configureBlock($block);

        return $block;
    }
}
