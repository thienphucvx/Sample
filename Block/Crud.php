<?php

namespace Thienphucvx\Sample\Block;

use Thienphucvx\Sample\Model\ResourceModel\Post\Collection as PostCollection;
class Crud extends \Magento\Framework\View\Element\Template implements
    \Magento\Framework\DataObject\IdentityInterface
{
    protected $_postCollectionFactory;
    protected function _prepareLayout()
    {
        $this->setMessage('Hello Again World');
    }
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Thienphucvx\Sample\Model\ResourceModel\Post\CollectionFactory $postCollectionFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_postCollectionFactory = $postCollectionFactory;
    }

    public function getHelloMessage(){
        return $this->getRequest()->getParam('title')." ".$this->getRequest()->getParam('content');
    }
    public function getPosts(){


        if (!$this->hasData('posts')) {
            $posts = $this->_postCollectionFactory->create();
            $this->setData('posts', $posts);
        }

        return $this->getData('posts');

    }
    /**
     * Return identifiers for produced content
     *
     * @return array
     */
    public function getIdentities()
    {
        return [\Thienphucvx\Sample\Model\Post::CACHE_TAG . '_' . 'list'];
    }

    public function getFormAction()
    {
        return $this->getUrl('sample/test/crud', ['_secure' => true]);
    }


}