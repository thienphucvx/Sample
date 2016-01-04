<?php

namespace Thienphucvx\Sample\Controller\Test;

class Crud extends \Magento\Framework\App\Action\Action
{
    protected $employeeFactory;

    protected $sessionConfig;
    protected $sessionManager;
    protected $cookieMetadataFactory;
    protected $cookieManager;
    protected $logger;
    protected $cache;
    protected $resultPageFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Thienphucvx\Sample\Model\PostFactory $postFactory,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Session\Config\ConfigInterface $sessionConfig,
        \Magento\Framework\Session\SessionManagerInterface $sessionManager,
        \Magento\Framework\Stdlib\Cookie\CookieMetadataFactory $cookieMetadataFactory,
        \Magento\Framework\Stdlib\CookieManagerInterface $cookieManager,
        \Psr\Log\LoggerInterface $logger
    )
    {
        $this->postFactory = $postFactory;

        $this->resultPageFactory = $resultPageFactory;
        $this->sessionConfig = $sessionConfig;
        $this->sessionManager = $sessionManager;
        $this->cookieMetadataFactory = $cookieMetadataFactory;
        $this->cookieManager = $cookieManager;
        $this->logger = $logger;
        return parent::__construct($context);
    }

    /**
 * Url like http://magento2.ce/sample/test/create/
 */
    public function execute()
    {

        $post = $this->getRequest()->getPostValue();
        if (!$post) {
            $this->_redirect('*/*/index');
            return;
        }else{

            $this->postFactory->create()->setData($post)->save();
            $this->messageManager->addSuccess(
                __('Succeed.')
            );
        }
        $this->_redirect('*/*/index');
        return;
        /*$collection = $this->postFactory->create()->getCollection();
        foreach($collection as $post){
            \Zend_Debug::dump($post->toArray());
        };*/
       /* $dataPosts = [

            ['title'=>'Blog Post 11','content'=>'Content of Blog Post 11'],


        ];

        foreach($dataPosts as $data){

            $this->postFactory->create()->setData($data)->save();
        }*/
        #$this->postFactory->create()->setData($data)->save();

//
//        $model = $this->_objectManager->create('Magento\Customer\Model\Address');
//        $model->load(21);
//        $model->setCity('Update London');
//        $model->save();
//
//
//
//
//
//
//        exit('7');



//        $cookieValue = 'Just some value';
//        $cookieMetadata = $this->cookieMetadataFactory
//            ->createPublicCookieMetadata()
//            ->setDuration(3600)
//            ->setPath($this->sessionConfig->getCookiePath())
//            ->setDomain($this->sessionConfig->getCookieDomain())
//            ->setSecure($this->sessionConfig->getCookieSecure())
//            ->setHttpOnly($this->sessionConfig->getCookieHttpOnly());
//
//        $this->cookieManager
//            ->setPublicCookie('cookie_name_1', $cookieValue, $cookieMetadata);


//        $this->messageManager->addSuccess('Success-1');
//        $this->messageManager->addSuccess('Success-2');
//        $this->messageManager->addNotice('Notice-1');
//        $this->messageManager->addNotice('Notice-2');
//        $this->messageManager->addWarning('Warning-1');
//        $this->messageManager->addWarning('Warning-2');
//        $this->messageManager->addError('Error-1');
//        $this->messageManager->addError('Error-2');


    }
}
