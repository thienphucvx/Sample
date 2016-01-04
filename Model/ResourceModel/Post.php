<?php

namespace Thienphucvx\Sample\Model\ResourceModel;

class Post
    //extends \Magento\Eav\Model\Entity\VersionControl\AbstractEntity
    extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    protected function _construct()
    {
        $this->_init('thienphucvx_sample', 'post_id');
    }
}
