Remove PrestaCMS
===================================

If you want to enjoy presta admin bundle without CMS, follow the next instructions:

 * **composer.json**: remove CMS dependancies
 * **app/AppKernel**: remove CMS bundles registration
 * **Makefile** (install/refresh command): remove phpcr command
 * **app/autoload.php**: remove PHPCR DoctrineAnnotations registred file

 * **app/config/config.yml**:
    * remove imports for CMS file
    * remove *doctrine:orm:entity_managers:default:mappings* CMS bundles list
 * **app/config/routing.yml**: remove CMS bundles routing import
 * **app/config/bundles/presta_sonata_admin_extended.yml**: remove CMS imports and parameters
 * **app/config/bundles/presta_sonata_navigation.yml**: remove CMS menu entries
 * **app/config/bundles/sonata_block.yml**: remove cms block
 * **app/config_test.yml**: remove cms website configuration
 * **app/config/parameters.yml.dist**: remove cms social bundle parameters

 * behat:
    * remove cms features
    * remove src/Context except AdminContext and FeatureContext

 * **src/Application/PrestaCMSCoreBundle**: remove this bundle
 * **src/Application/Sonata/AdminBundle/Resources/views/layout.html.twig**:
    * stylesheets: remove pretacmscore.less
    * javascripts: remove CMSCKEditorBundle inclusion
 * **src/Application/Sonata/MediaBundle/ApplicationSonataMediaBundle.php**:
    replace 'CoopTilleulsCKEditorSonataMediaBundle' by 'SonataMediaBundle'
