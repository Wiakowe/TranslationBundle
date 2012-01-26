<?php

/**
 * Translatable.php
 *
 * @package TranslationBundle
 */
namespace Finday\TranslationBundle;

use Finday\TranslationBundle\TranslatableInterface;

/**
 * Class wich defines some methods required to make an object translatable.
 *
 * @author  Roger Llopart <roger@finday.com>
 *
 * @version Release:v.2.0.0
 */
abstract class Translatable implements TranslatableInterface
{
	/**
	 * The translations, with the key set as the culture.
	 *
	 * @var array
	 */
	private $translationsByCulture = null;

	/**
	 * The culture to use by default.
	 *
	 * @var string
	 */
	protected $culture = null;

	/**
	 * Set the culture
	 * @param String $culture
	 */
	public function setCulture($culture)
	{
		$this->culture = $culture;
	}

	/**
	 * Get the culture
	 * @return String
	 */
	public function getCulture()
	{
		return $this->culture;
	}

	/**
	 * Get the translation of the object
	 * @param String $culture
	 *
	 * @return TranslatableObject
	 * @throws Exception\CultureNotDefinedException
	 * @throws Exception\LanguageNotFoundException
	 */
	public function getTranslation($culture = null)
	{
		$translation_identifier = $this->getTranslationIdentifier();

		if (is_null($this->translationsByCulture)) {
			$this->translationsByCulture = array();

			foreach ($this->getTranslations() as $translation) {
				$method = 'get' . ucfirst($translation_identifier);
				$this->translationsByCulture[$translation->$method()] = $translation;
			}
		}

		$culture = $culture ? $culture : $this->getCulture();

		if (is_null($culture)) {
			throw new Exception\CultureNotDefinedException();
		}

		if (!array_key_exists($culture, $this->translationsByCulture)) {
			throw new Exception\LanguageNotFoundException();
		}

		return $this->translationsByCulture[$culture];
	}

	/**
	 * Returns all the translations.
	 *
	 * @return Travesable
	 */
	protected abstract function getTranslations();

	/**
	 * Returns the field wich is the translation identifier.
	 *
	 * @return string
	 */
	protected abstract function getTranslationIdentifier();
}
