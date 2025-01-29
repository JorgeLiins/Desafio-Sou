<?php
namespace Terms\Conditions\Block\Customer;

class Register extends \Magento\Customer\Block\Form\Register
{
    public function getTermsAndConditionsUrl()
    {
        return $this->getUrl('terms-and-conditions');
    }
}
