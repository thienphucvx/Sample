<?php

/*

SET foreign_key_checks = 0;
DELETE FROM setup_module WHERE module = "Foggyline_Office";
DELETE FROM eav_entity_type WHERE `entity_type_code` = "foggyline_office_employee";
DROP TABLE foggyline_office_department;
DROP TABLE foggyline_office_employee_entity;
DROP TABLE foggyline_office_employee_entity_decimal;
DROP TABLE foggyline_office_employee_entity_int;
DROP TABLE foggyline_office_employee_entity_text;
DROP TABLE foggyline_office_employee_entity_datetime;
DROP TABLE foggyline_office_employee_entity_varchar;
SET foreign_key_checks = 1;

*/

namespace Thienphucvx\Sample\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $table = $setup->getConnection()
            ->newTable($setup->getTable('thienphucvx_sample'))
            ->addColumn(
                'post_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Post ID'
            )
            ->addColumn(
                'title',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                64,
                [],
                'Title'
            )
            ->addColumn(
                'content',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                '2M',
                [],
                'Content of Post'
            )
            ->addColumn(
                'creation_time',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
                'Post Creation Time'
            )->addColumn(
                'update_time',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
                'Post Modification Time'
            )

            ->setComment('Sample Posts Table');
        $setup->getConnection()->createTable($table);

        $setup->endSetup();
    }
}
