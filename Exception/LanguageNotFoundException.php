<?php
/**
 * LanguangeNotFoundException.php
 * 
 * @package TranslationBundle 
 */
namespace Finday\TranslationBundle\Exception;
use Finday\TranslationBundle\Exception\TranslationException;

/**
 * Exception launched when a culture is not found in the object
 * 
 * @author  Roger Llopart <roger@finday.com>
 *
 * @version Release:v.2.0.0
 */
class LanguageNotFoundException extends TranslationException
{
	/** 
	 * Constructor of the exception
	 * 
	 * @param String $message  message
	 * @param String $code     code
	 * @param String $previous previous
	 */
	public function __construct($message = null, $code = null, $previous = null)
	{
		parent::__construct($message, $code, $previous);

		$this->message = 'The object doens\'t have a translation for the given
		language';
	}
}
