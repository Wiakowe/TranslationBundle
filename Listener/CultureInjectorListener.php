<?php
/**
 * Class wich injects the culture as the locale.
 *
 * @package TranslationBundle
 */
namespace Finday\TranslationBundle\Listener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Finday\TranslationBundle\TranslatableInterface;
use Symfony\Component\HttpFoundation\Session;

/**
 * Listener wich will inject the culture as the locale.
 *
 * @author  Roger Llopart Pla <roger@finday.com>
 *
 * @version Release: v2.0.0
 */
class CultureInjectorListener
{
	/**
	 * Symfony session object.
	 *
	 * @var Session
	 */
	protected $session;

	/**
	 * The callback to call to convert the culture into the format expected by
	 * the entity.
	 *
	 * @var callable
	 */
	protected $callback = null;

	/**
	 * Returns the culture from the session object.
	 *
	 * @return mixed If there is no callback supplied, it'll default to an
	 * ISO3166 string.
	 */
	protected function getCulture()
	{
		$culture = $this->session->getLocale();

		if($this->callback) {
			$culture = call_user_func($this->callback, $culture);
		}

		return $culture;
	}

	/**
	 * Sets the session object inside the class.
	 *
	 * @param Session $session
	 */
	public function setSession(Session $session)
	{
		$this->session = $session;
	}

	/**
	 * Sets the culture converter to the given callable.
	 *
	 * @param callable $callable A callable wich receives as it's only parameter a
	 * locale in the the ISO3166 format.
	 */
	public function setCultureConverter($callable)
	{
		$this->callback = $callable;
	}

	/**
	 * Event wich will be called every time an object is loaded. If the object is
	 * an instance of TranslatableInterface, it'll inject it the current culture.
	 *
	 * @param LifecycleEventArgs $args
	 */
	public function postLoad(LifecycleEventArgs $args)
	{
		$entity = $args->getEntity();

		if ($entity instanceof TranslatableInterface) {
			$entity->setCulture($this->getCulture());
		}
	}
}
