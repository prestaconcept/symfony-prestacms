<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
        );

        $this->registerAdminBundles($bundles);
        $this->registerPrestaCMSBundles($bundles);
        $this->registerApplicationBundles($bundles);

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }

    /**
     * Register current application bundle
     *
     * @param array $bundles
     */
    protected function registerApplicationBundles(array &$bundles)
    {
        // add your bundle here
    }

    /**
     * Register bundles used for prestaconcept administration
     *
     * @param array $bundles
     */
    protected function registerAdminBundles(array &$bundles)
    {
        // FOS
        $bundles[] = new FOS\UserBundle\FOSUserBundle();

        // Sonata
        $bundles[] = new Sonata\BlockBundle\SonataBlockBundle();
        $bundles[] = new Sonata\jQueryBundle\SonatajQueryBundle();
        $bundles[] = new Sonata\AdminBundle\SonataAdminBundle();
        $bundles[] = new Sonata\EasyExtendsBundle\SonataEasyExtendsBundle();
        $bundles[] = new Sonata\SeoBundle\SonataSeoBundle();
        $bundles[] = new Sonata\MediaBundle\SonataMediaBundle();
        $bundles[] = new Sonata\DoctrineORMAdminBundle\SonataDoctrineORMAdminBundle();
        $bundles[] = new Sonata\CoreBundle\SonataCoreBundle();
        $bundles[] = new Sonata\IntlBundle\SonataIntlBundle();
        $bundles[] = new Sonata\TranslationBundle\SonataTranslationBundle();
        $bundles[] = new Sonata\UserBundle\SonataUserBundle('FOSUserBundle');

        // Presta
        $bundles[] = new Presta\SonataAdminExtendedBundle\PrestaSonataAdminExtendedBundle();
        $bundles[] = new Presta\SonataNavigationBundle\PrestaSonataNavigationBundle();

        $bundles[] = new Application\Sonata\UserBundle\ApplicationSonataUserBundle();
        $bundles[] = new Application\Sonata\AdminBundle\ApplicationSonataAdminBundle();
        $bundles[] = new Application\Sonata\MediaBundle\ApplicationSonataMediaBundle();

        $bundles[] = new CoopTilleuls\Bundle\CKEditorSonataMediaBundle\CoopTilleulsCKEditorSonataMediaBundle();
        $bundles[] = new Presta\ComposerPublicBundle\PrestaComposerPublicBundle();

        // Utils
        $bundles[] = new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle();
        $bundles[] = new Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle();
        $bundles[] = new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle();
        $bundles[] = new FOS\JsRoutingBundle\FOSJsRoutingBundle();
        $bundles[] = new Knp\Bundle\MenuBundle\KnpMenuBundle();
    }

    /**
     * Register bundles required for the prestaCMS
     *
     * @param array $bundles
     */
    protected function registerPrestaCmsBundles(array &$bundles)
    {
        // PrestaCMS
        $bundles[] = new Presta\CMSCoreBundle\PrestaCMSCoreBundle();
        $bundles[] = new Presta\CMSMediaBundle\PrestaCMSMediaBundle();
        $bundles[] = new Presta\CMSThemeBasicBundle\PrestaCMSThemeBasicBundle();
        $bundles[] = new Presta\CMSContactBundle\PrestaCMSContactBundle();
        $bundles[] = new Presta\SitemapBundle\PrestaSitemapBundle();
        $bundles[] = new Presta\CMSSitemapBridgeBundle\PrestaCMSSitemapBridgeBundle();
        $bundles[] = new Presta\CMSCKEditorBundle\PrestaCMSCKEditorBundle();
        $bundles[] = new Presta\CMSFAQBundle\PrestaCMSFAQBundle();
        $bundles[] = new Presta\CMSSocialBundle\PrestaCMSSocialBundle();
        $bundles[] = new Presta\CMSUserBundle\PrestaCMSUserBundle('ApplicationSonataUserBundle');
        $bundles[] = new Presta\CMSSandboxBundle\PrestaCMSSandboxBundle();
        $bundles[] = new Application\Presta\CMSCoreBundle\ApplicationPrestaCMSCoreBundle();

        // Doctrine PHPCR
        $bundles[] = new Doctrine\Bundle\PHPCRBundle\DoctrinePHPCRBundle();
        $bundles[] = new Sonata\DoctrinePHPCRAdminBundle\SonataDoctrinePHPCRAdminBundle();

        // CMF bundles
        $bundles[] = new Symfony\Cmf\Bundle\RoutingBundle\CmfRoutingBundle();
        $bundles[] = new Symfony\Cmf\Bundle\CoreBundle\CmfCoreBundle();
        $bundles[] = new Symfony\Cmf\Bundle\MenuBundle\CmfMenuBundle();
        $bundles[] = new Symfony\Cmf\Bundle\ContentBundle\CmfContentBundle();
        $bundles[] = new Symfony\Cmf\Bundle\TreeBrowserBundle\CmfTreeBrowserBundle();
        $bundles[] = new Symfony\Cmf\Bundle\BlockBundle\CmfBlockBundle();
    }

    /**
     * Vagrant optimisation: set cache directory in the vm
     *
     * @return string
     */
    public function getCacheDir()
    {
        $envParameters = $this->getEnvParameters();

        if (isset($envParameters['vagrant']) && $envParameters['vagrant'] === "1") {
            return '/dev/shm/vagrant/cache/' .  $this->environment;
        }

        return parent::getCacheDir();
    }

    /**
     *  Vagrant optimisation: set log directory in the vm
     *
     * @return string
     */
    public function getLogDir()
    {
        $envParameters = $this->getEnvParameters();

        if (isset($envParameters['vagrant']) && $envParameters['vagrant'] === "1") {
            return '/dev/shm/vagrant/logs';
        }

        return parent::getLogDir();
    }
}
