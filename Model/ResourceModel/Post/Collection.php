<?php

namespace Thienphucvx\Sample\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            'Thienphucvx\Sample\Model\Post',
            'Thienphucvx\Sample\Model\ResourceModel\Post'
        );
    }
}
