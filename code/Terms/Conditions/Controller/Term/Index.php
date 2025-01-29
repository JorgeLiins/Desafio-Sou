<?php
namespace Terms\Conditions\Controller\Term;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Customer\Model\Session;

class Index extends Action
{
    protected $resultPageFactory;
    protected $session;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        Session $customerSession
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->session = $customerSession;
        parent::__construct($context);
    }

    public function execute()
    {
        // Verifica se o cliente está logado
        if (!$this->session->isLoggedIn()) {
            return $this->_redirect('customer/account/login');
        }

        // Exibe a página com o modal
        return $this->resultPageFactory->create();
    }
}
