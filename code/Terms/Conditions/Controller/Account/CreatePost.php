<?php
namespace Terms\Conditions\Controller\Account;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Customer\Model\Session;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Framework\Controller\Result\RedirectFactory;

class LoginPost extends Action
{
    protected $session;
    protected $customerRepository;
    protected $resultRedirectFactory;

    public function __construct(
        Context $context,
        Session $customerSession,
        CustomerRepositoryInterface $customerRepository,
        RedirectFactory $resultRedirectFactory
    ) {
        $this->session = $customerSession;
        $this->customerRepository = $customerRepository;
        $this->resultRedirectFactory = $resultRedirectFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        // Verifica se o login foi bem-sucedido
        if ($this->session->isLoggedIn()) {
            $customerId = $this->session->getCustomerId();
            $customer = $this->customerRepository->getById($customerId);

            // Verifica se o usuário já aceitou os termos
            $acceptedTerms = $customer->getCustomAttribute('accepted_terms');
            if (!$acceptedTerms || $acceptedTerms->getValue() == 0) {
                // Redireciona para a página de termos
                return $this->resultRedirectFactory->create()->setPath('seusmodulo/terms/index');
            }
        }

        // Redireciona para a página inicial
        return $this->resultRedirectFactory->create()->setPath('customer/account');
    }
}
