<?php

namespace Thienphucvx\Sample\Setup;
#use Thienphucvx\Sample\Model\Post;
use  Thienphucvx\Sample\Model\PostFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    private $postFactory;

    public function __construct(
        \Thienphucvx\Sample\Model\PostFactory $postFactory
    )
    {
        $this->postFactory = $postFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $dataPosts = [

            ['title'=>'Blog Post 1','content'=>'Content of Blog Post 1'],
            ['title'=>'Blog Post 2','content'=>'Content of Blog Post 2'],
            ['title'=>'Blog Post 3','content'=>'Content of Blog Post 3'],
            ['title'=>'Blog Post 4','content'=>'Content of Blog Post 4'],
            ['title'=>'Blog Post 5','content'=>'Content of Blog Post 5'],
            ['title'=>'Blog Post 6','content'=>'Content of Blog Post 6'],
            ['title'=>'Blog Post 7','content'=>'Content of Blog Post 7'],
            ['title'=>'Blog Post 8','content'=>'Content of Blog Post 8'],
            ['title'=>'Blog Post 9','content'=>'Content of Blog Post 9'],
            ['title'=>'Blog Post 10','content'=>'Content of Blog Post 10']

        ];

        foreach($dataPosts as $data){

            $this->postFactory->create()->setData($data)->save();
        }

        $setup->endSetup();
    }
}
