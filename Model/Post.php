<?php

namespace Thienphucvx\Sample\Model;

class Post extends \Magento\Framework\Model\AbstractModel{

    const ENTITY = 'thienphucvx_sample';
    const CACHE_TAG ='thienphucvx_sample_cache';
    /**
     * Initialize post model
     *
     * @return void
     */
    public function _construct(){
        $this->_init('Thienphucvx\Sample\Model\ResourceModel\Post');
    }
}
