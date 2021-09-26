<?php
declare(strict_types=1);

namespace HTCode\Weather\Ui\DataProvider\Weather;

use Magento\Ui\DataProvider\AbstractDataProvider;
use HTCode\Weather\Model\ResourceModel\Weather\WeatherCollectionFactory;

class WeatherDataProvider extends AbstractDataProvider
{
    /**
     * @var WeatherCollectionFactory
     */
    protected $collectionFactory;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        WeatherCollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
    }
}
