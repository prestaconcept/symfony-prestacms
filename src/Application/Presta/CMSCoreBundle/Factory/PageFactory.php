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
        if (!isset($page['zones']['content'])) {
            $page['zones']['content'] = array(
                'name' => 'content',
                'blocks' => array(
                    10 => array('name' => 'info', 'type' => 'presta_cms.block.simple')
                )
            );
        }
        if (!isset($page['zones']['left']) && $page['template'] == 'left-sidebar') {
            $page['zones']['left'] = array(
                'name' => 'left',
                'blocks' => array(
                    10 => array('name' => 'info', 'type' => 'presta_cms.block.simple')
                )
            );
        }
        if (!isset($page['zones']['right']) && $page['template'] == 'right-sidebar') {
            $page['zones']['right'] = array(
                'name' => 'right',
                'blocks' => array(
                    10 => array('name' => 'info', 'type' => 'presta_cms.block.simple')
                )
            );
        }

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
