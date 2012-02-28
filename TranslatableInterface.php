<?php
/**
 * TranslatableInterface.php
 *
 * @package TranslationBundle
 */
namespace Finday\TranslationBundle;

/**
 * Interface wich defines the methods of a Translatable object.
 *
 * @author Roger Llopart Pla <roger@finday.com>
 *
 * @version v.2.0.0
 */
use Finday\TranslationBundle\Exception\LanguageNotFoundException;

/**
 * Interface for Translatable.
 */
interface TranslatableInterface
{
	/**
	 * Sets the culture wich we want to work with.
	 *
	 * @param mixed $culture
	 */
	public function setCulture($culture);

	/**
	 * Gets the current culture.
	 *
	 * @return mixed $culture
	 */
	public function getCulture();

	/**
	 * Gets the translation object.
	 *
	 * @param mixed $culture Optional parameter to retrieve an specified culture
	 * 	instead of the set one.
	 *
	 * @throws CultureNotDefinedException Thrown when it's called without the
	 * 	culture parameter and TranslatableInterface::setCulture() hasn't been used
	 * 	to set a default culture.
	 * @throws LanguageNotFoundException Thrown if there isn't a translation for
	 * 	the given language.
	 *
	 * @return mixed The translation object.
	 */
	public function getTranslation($culture = null);
}