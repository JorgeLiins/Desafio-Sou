<?php
namespace Terms\Conditions\Controller\Terms;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Customer\Model\Session;
use Magento\Customer\Api\CustomerRepositoryInterface;

class Accept extends Action
{
    protected $session;
    protected $customerRepository;

    public function __construct(
        Context $context,
        Session $customerSession,
        CustomerRepositoryInterface $customerRepository
    ) {
        $this->session = $customerSession;
        $this->customerRepository = $customerRepository;
        parent::__construct($context);
    }

    public function execute()
    {
        $accepted = $this->getRequest()->getParam('accepted');
        if ($this->session->isLoggedIn()) {
            $customer = $this->customerRepository->getById($this->session->getCustomerId());
            $customer->setCustomAttribute('accepted_terms', $accepted);
            $this->customerRepository->save($customer);
        }
    }
}
