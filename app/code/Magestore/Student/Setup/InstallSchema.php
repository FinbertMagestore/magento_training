<?php
namespace Magestore\Student\Setup;
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
        $installer->getConnection()->dropTable($installer->getTable('student_student'));
        $table = $installer->getConnection()->newTable(
            $installer->getTable('student_student')
        )->addColumn(
            'student_id', Table::TYPE_INTEGER, null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'student_id ID'
        )->addColumn(
            'name', Table::TYPE_TEXT, null,
            ['nullable' => false, 'default' => ''],
            'Name'
        )->addColumn(
            'class', Table::TYPE_TEXT, null,
            ['nullable' => true],
            'Class'
        )->addColumn(
            'university', Table::TYPE_TEXT, null,
            ['nullable' => true],
            'University'
        );
        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }
}