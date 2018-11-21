<?php

namespace Sportic\Omniresult\Common\Parsers\Traits;

use Symfony\Component\BrowserKit\Response;

/**
 * Trait HasResponseTrait
 * @package Sportic\Omniresult\Common\Parsers\Traits
 *
 * @method getParameter($key, $default = null)
 * @method setParameter($key, $value)
 */
trait HasResponseTrait
{
    /**
     * @return Response
     */
    public function getResponse(): Response
    {
        return $this->getParameter('response');
    }

    /**
     * @param Response $response
     */
    public function setResponse(Response $response)
    {
        $this->setParameter('response', $response);
    }
}
