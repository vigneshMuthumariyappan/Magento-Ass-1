<?php

declare(strict_types = 1);

namespace CustomCommand\ImportCustomerData\Model;

class SaveCustomerData
{
    /**
     * @var CustomerFactory
     */
    private $modelFactory;
    
    /**
     * @var Customer
     */
    private $resourceModel;

    /**
     * @param CustomerFactory $modelFactory
     * @param Customer $resourceModel
     */
    public function __construct(
        \Magento\Customer\Model\CustomerFactory $modelFactory,
        \Magento\Customer\Model\ResourceModel\Customer $resourceModel,
    ) {
        $this->modelFactory = $modelFactory;
        $this->resourceModel = $resourceModel;
    }

    /**
     * Save customer data
     *
     * @param array $data
     */
    public function save(array $data) :void
    {
        $model = $this->modelFactory->create();
        foreach ($data as $value) {
            if (is_array($value)) {
                $model->setData($this->prepare($value));
                $this->resourceModel->save($model);
            }
        }
    }
    /**
     * Prepare insert data
     *
     * @param array $data
     */
    private function prepare(array $data):array
    {
        return [
            'email'         => $data['email'],
            '_website'      => 'base',
            '_store'        => 'default',
            'confirmation'  => null,
            'dob'           => null,
            'firstname'     => $data['firstname'],
            'gender'        => null,
            'group_id'      => 1,
            'lastname'      => $data['lastname'],
            'middlename'    => null,
            'password_hash' => null,
            'prefix'        => null,
            'store_id'      => 1,
            'website_id'    => 1,
            'password'      => null
        ];
    }
}
