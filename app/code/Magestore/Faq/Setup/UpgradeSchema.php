<?php
namespace Magestore\Faq\Setup;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\UpgradeSchemaInterface;

/**
 * Class InstallSchema
 * @package Magestore\Multivendor\Setup
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @throws \Zend_Db_Exception
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        if(version_compare($context->getVersion(), '1.0.1', '<')){
            $setup->getConnection()->dropColumn($setup->getTable('faq_category'), 'ordering');
            $setup->getConnection()->dropColumn($setup->getTable('faq'), 'ordering');
        } else if(version_compare($context->getVersion(), '1.0.2', '<')){
            $setup->getConnection()->addColumn(
                $setup->getTable('faq_category'),
                'sort_order', Table::TYPE_INTEGER, null,
                ['nullable' => true, 'default' => '1'],
                'Sort Order'
            );
            $setup->getConnection()->addColumn(
                $setup->getTable('faq'),
                'sort_order', Table::TYPE_INTEGER, null,
                ['nullable' => true, 'default' => '1'],
                'Sort Order'
            );
        }
        $installer->endSetup();
    }
}