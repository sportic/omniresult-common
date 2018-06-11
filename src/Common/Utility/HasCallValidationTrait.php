<?php

namespace Sportic\Omniresult\Common\Utility;

/**
 * Trait HasValidationTrait
 * @package Sportic\Omniresult\Common\Utility
 */
trait HasCallValidationTrait
{

    /**
     * @var null|boolean
     */
    protected $isValidCall = null;

    /**
     * @return bool|null
     */
    public function isValidCall()
    {
        if ($this->isValidCall == null) {
            $this->doCallValidation();
            $this->isValidCall = true;
        }

        return $this->isValidCall;
    }

    /**
     * @return void
     */
    protected function doCallValidation()
    {
    }
}
