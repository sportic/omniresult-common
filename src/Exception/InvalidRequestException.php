<?php

namespace Sportic\Omniresult\Common\Exception;

/**
 * Invalid Request Exception
 *
 * Thrown when a request is invalid or missing required fields.
 */
class InvalidRequestException extends \Exception implements OmniresultExceptionInterface
{
}
