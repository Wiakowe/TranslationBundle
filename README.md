TranslationBundle
=================

This Bundle adds the capability to the Doctrine ORM to easily translate entities
using a different table.

Installation
------------

1) Add deps.

    [TranslationBundle]
        git=https://github.com/Finday/TranslationBundle.git
        target=/bundles/Finday/TranslationBundle

2) Install the library.

    php bin/vendors install

Usage
-----

To use this bundle, you need to set the Entities that you want to be able to
translate to extend the `Finday\TranslationBundle\Translatable\Translatable`
class.

This class requires the following methods to be defined in the Entity.

    getTranslations()

This method has to return an iterable object (such as an array or a Doctrine 
Collection) with all the translations.

    getTranslationIndentifier()
    
This method has to return the identifier of the field wich serves as language
discriminator in the translations objects. This will be used to do a call to a
method of "get{Identifier}()" in the translations list.

Once this has been done, the entity will have a `getTranslation()` method, wich
will return the translation for the current language. The language is obtained
through the locale of the session service.

Configuration
-------------

As an additional configuration, you can set a method from a service to transform
(or obtain) the `culture`. To do so, in the config.yml, you have to add the
following configuration:

    translation:
        culture_converter:
            service: SERVICE_IDENTIFIER
            method:  METHOD

This method will be called when injecting the culture to the object, and it's
return is what will be used as key for searching if the culture exists.