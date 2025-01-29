<?php
namespace Terms\Conditions\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Customer\Api\CustomerRepositoryInterface;

class AcceptedTerms extends Column
{
    protected $customerRepository;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        CustomerRepositoryInterface $customerRepository,
        array $components = [],
        array $data = []
    ) {
        $this->customerRepository = $customerRepository;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $customerId = $item['entity_id'];
                $customer = $this->customerRepository->getById($customerId);
                $acceptedTerms = $customer->getCustomAttribute('accepted_terms');
                $item['accepted_terms'] = $acceptedTerms ? $acceptedTerms->getValue() : 'No';
            }
        }

        return $dataSource;
    }
}
