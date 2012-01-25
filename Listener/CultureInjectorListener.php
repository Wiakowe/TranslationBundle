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
	 * Returns the culture from the session object.
	 *
	 * @return string
	 */
	protected function getCulture()
	{
		return $this->session->getLocale();
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
