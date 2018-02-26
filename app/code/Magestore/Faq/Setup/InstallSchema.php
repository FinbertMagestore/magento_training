<?php
namespace Magestore\Faq\Setup;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;
/**
 * Class InstallSchema
 * @package Magestore\Multivendor\Setup
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @throws \Zend_Db_Exception
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        /*
         * Drop tables if exists
         */
        $installer->getConnection()->dropTable($installer->getTable('faq_category'));
        $installer->getConnection()->dropTable($installer->getTable('faq'));
        $installer->getConnection()->dropTable($installer->getTable('faq_category_value'));
        $installer->getConnection()->dropTable($installer->getTable('faq_value'));
        $installer->getConnection()->dropTable($installer->getTable('faq_film'));

        $table = $installer->getConnection()->newTable(
            $installer->getTable('faq_category')
        )->addColumn(
            'category_id', Table::TYPE_INTEGER, null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'category_id ID'
        )->addColumn(
            'name', Table::TYPE_TEXT, 255,
            ['nullable' => false, 'default' => ''],
            'Name'
        )->addColumn(
            'ordering', Table::TYPE_INTEGER, null,
            ['nullable' => true, 'default' => '1'],
            'Ordering'
        )->addColumn(
            'status', Table::TYPE_SMALLINT, null,
            ['nullable' => false, 'default' => '0'],
            'Status'
        );
        $installer->getConnection()->createTable($table);

        $table = $installer->getConnection()->newTable(
            $installer->getTable('faq')
        )->addColumn(
            'faq_id', Table::TYPE_INTEGER, null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'ID'
        )->addColumn(
            'title', Table::TYPE_TEXT, 255,
            ['nullable' => false, 'default' => ''],
            'Title'
        )->addColumn(
            'category_id', Table::TYPE_INTEGER, null,
            ['nullable' => false, 'unsigned' => true],
            'Category Id'
        )->addColumn(
            'description', Table::TYPE_TEXT, null,
            ['nullable' => true],
            'Description'
        )->addColumn(
            'status', Table::TYPE_SMALLINT, null,
            ['nullable' => false, 'default' => '1'],
            'Status'
        )->addColumn(
            'created_time', Table::TYPE_DATETIME, null,
            ['nullable' => true],
            'Created Time'
        )->addColumn(
            'updated_time', Table::TYPE_DATETIME, null,
            ['nullable' => true],
            'Update Time'
        )->addColumn(
            'url_key', Table::TYPE_TEXT, 255,
            ['nullable' => true],
            'Url Key'
        )->addColumn(
            'ordering', Table::TYPE_INTEGER, null,
            ['nullable' => true, 'default' => '1'],
            'Ordering'
        )->addColumn(
            'most_frequently', Table::TYPE_SMALLINT, null,
            ['nullable' => false, 'default' => '1'],
            'Status'
        )->addColumn(
            'tag', Table::TYPE_TEXT, 255,
            ['nullable' => true],
            'Tag'
        )->addColumn(
            'metakeyword', Table::TYPE_TEXT, null,
            ['nullable' => true],
            'Meta Keyword'
        )->addColumn(
            'metadescription', Table::TYPE_TEXT, null,
            ['nullable' => true],
            'Meta Description'
        )->addForeignKey(
            $installer->getFkName(
                'faq',
                'category_id',
                'faq_category',
                'category_id'
            ),
            'category_id',
            $installer->getTable('faq_category'),
            'category_id',
            Table::ACTION_CASCADE
        );
        $installer->getConnection()->createTable($table);

        $table = $installer->getConnection()->newTable(
            $installer->getTable('faq_category_value')
        )->addColumn(
            'category_value_id', Table::TYPE_INTEGER, null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'category_value_id ID'
        )->addColumn(
            'category_id', Table::TYPE_INTEGER, null,
            ['nullable' => false, 'unsigned' => true],
            'Category Id'
        )->addColumn(
            'store_id', Table::TYPE_SMALLINT, null,
            ['nullable' => false, 'unsigned' => true],
            'Store Id'
        )->addColumn(
            'attribute_code', Table::TYPE_TEXT, 255,
            ['nullable' => false, 'default' => ''],
            'Attribute Code'
        )->addColumn(
            'value', Table::TYPE_TEXT, null,
            ['nullable' => false, 'default' => ''],
            'Value'
        )->addForeignKey(
            $installer->getFkName(
                'faq_category_value',
                'category_id',
                'faq_category',
                'category_id'
            ),
            'category_id',
            $installer->getTable('faq_category'),
            'category_id',
            Table::ACTION_CASCADE
        )->addForeignKey(
            $installer->getFkName(
                'faq_category_value',
                'store_id',
                'store',
                'store_id'
            ),
            'store_id',
            $installer->getTable('store'),
            'store_id',
            Table::ACTION_CASCADE
        );
        $installer->getConnection()->createTable($table);

        $table = $installer->getConnection()->newTable(
            $installer->getTable('faq_value')
        )->addColumn(
            'faq_value_id', Table::TYPE_INTEGER, null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'category_value_id ID'
        )->addColumn(
            'faq_id', Table::TYPE_INTEGER, null,
            ['nullable' => false, 'unsigned' => true],
            'Faq Id'
        )->addColumn(
            'store_id', Table::TYPE_SMALLINT, null,
            ['nullable' => false, 'unsigned' => true],
            'Store Id'
        )->addColumn(
            'attribute_code', Table::TYPE_TEXT, 255,
            ['nullable' => false, 'default' => ''],
            'Attribute Code'
        )->addColumn(
            'value', Table::TYPE_TEXT, null,
            ['nullable' => false, 'default' => ''],
            'Value'
        )->addForeignKey(
            $installer->getFkName(
                'faq_value',
                'faq_id',
                'faq',
                'faq_id'
            ),
            'faq_id',
            $installer->getTable('faq'),
            'faq_id',
            Table::ACTION_CASCADE
        )->addForeignKey(
            $installer->getFkName(
                'faq_value',
                'store_id',
                'store',
                'store_id'
            ),
            'store_id',
            $installer->getTable('store'),
            'store_id',
            Table::ACTION_CASCADE
        );
        $installer->getConnection()->createTable($table);

        $table = $installer->getConnection()->newTable(
            $installer->getTable('faq_film')
        )->addColumn(
            'film_id', Table::TYPE_INTEGER, null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'film_id ID'
        )->addColumn(
            'category_name', Table::TYPE_TEXT, null,
            ['nullable' => false, 'default' => ''],
            'Category Name'
        )->addColumn(
            'num_actor', Table::TYPE_INTEGER, null,
            ['nullable' => true, 'default' => '0'],
            'Number Actor'
        )->addColumn(
            'actor_name', Table::TYPE_TEXT, null,
            ['nullable' => false, 'default' => ''],
            'Actor Name'
        );
        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }
}