<?php

namespace HTCode\Weather\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\Encryption\EncryptorInterface;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManagerInterface;

class Configuration extends AbstractHelper
{
    public const API_KEY_PATH = 'weatherSection/weatherData/weatherApiKey';
    public const TOWN_PATH = 'weatherSection/weatherData/town';
    /**
     * @var EncryptorInterface
     */
    protected $encryptor;

    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;

    public function __construct(Context $context, EncryptorInterface $encryptor, StoreManagerInterface $storeManager)
    {
        parent::__construct($context);
        $this->encryptor = $encryptor;
        $this->storeManager = $storeManager;
    }

    public function getApiKey()
    {
        return $this->encryptor->decrypt(
            $this->scopeConfig->getValue(
            self::API_KEY_PATH,
            ScopeInterface::SCOPE_STORE,
            $this->storeManager->getStore())
        );
    }

    public function getTown()
    {
        return $this->scopeConfig->getValue(
            self::TOWN_PATH,
            ScopeInterface::SCOPE_STORE,
            $this->storeManager->getStore()
        );
    }
}
