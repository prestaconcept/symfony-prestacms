Remove PrestaCMS
===================================

If you want to enjoy presta admin bundle without CMS, follow the next instructions:

 * **composer.json**: remove CMS, CMF and PHPCR dependencies in both require and require-dev
 * **app/AppKernel**: unset registerPrestaCMSBundles method call
 * **Makefile** (install/refresh command): remove phpcr command
 * **app/autoload.php**: remove PHPCR DoctrineAnnotations registred file

 * **app/config/config.yml**:
    * unset *doctrine:orm:entity_managers:default:mappings* CMS bundles list
 * **app/config/includes/application.yml**:
    * unset imports for presta_cms file
 * **app/config/routing.yml**: unset CMS bundles routing import
 * **app/config_test.yml**: unset cms website configuration
 * **app/config/parameters.yml.dist**: unset cms social bundle parameters

 * **app/config/bundles/presta_sonata_admin_extended.yml**: remove all CMS configuration in assetic.bundles

 * **behat**:
    * remove cms features
    * remove src/Context except AdminContext and FeatureContext

 * **src/Application/PrestaCMSCoreBundle**: remove this bundle
 * **src/Application/Sonata/AdminBundle/Resources/views/layout.html.twig**:
    * stylesheets: remove pretacmscore.less
    * javascripts: remove CMSCKEditorBundle inclusion
 * **src/Application/Sonata/MediaBundle/ApplicationSonataMediaBundle.php**:
    replace 'CoopTilleulsCKEditorSonataMediaBundle' by 'SonataMediaBundle'
