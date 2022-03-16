<?php
/**
 * Born Techies Pvt. Ltd. 
 *
 * Born Techies Pvt. Ltd. serves customers all at one place who searches
 * for different types of extensions for Magento 2.
 * 
 * DISCLAIMER
 * 
 * 
 * Do not edit or add to this file if you wish to upgrade this
 * extension to newer 
 * version in the future.
 *
 * 
 * @category Born Techies Pvt. Ltd. 
 *
 * @package Borntechies_CategoryAttribute
 * 
 * @copyright Copyright (c) Born Techies Pvt. Ltd. 
 * (https://borntechies.com/)
 * See COPYING.txt for license details.
 * 
 */
namespace Borntechies\CategoryAttribute\Setup;

use Magento\Framework\Module\Setup\Migration;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Catalog\Setup\CategorySetupFactory;

class InstallData implements InstallDataInterface
{
    public function __construct(CategorySetupFactory $categorySetupFactory)
    {
        $this->categorySetupFactory = $categorySetupFactory;
    }
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        $categorySetup = $this->categorySetupFactory->create(['setup' => $setup]);
        $entityTypeId = $categorySetup->getEntityTypeId(\Magento\Catalog\Model\Category::ENTITY);
        $attributeSetId = $categorySetup->getDefaultAttributeSetId($entityTypeId);
        $categorySetup->removeAttribute(
            \Magento\Catalog\Model\Category::ENTITY, 'thumbnail' );
        $categorySetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY, 'thumbnail', [
                'type' => 'varchar',
                'label' => 'Header Image',
                'input' => 'image',
                'backend' => 'Magento\Catalog\Model\Category\Attribute\Backend\Image',
                'required' => false,
                'sort_order' => 5,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'group' => 'General Information',
            ]
        );
        $categorySetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY, 'shopnow', [
                'type' => 'varchar',
                'label' => 'Header Image',
                'input' => 'image',
                'backend' => 'Magento\Catalog\Model\Category\Attribute\Backend\Image',
                'required' => false,
                'sort_order' => 5,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'group' => 'General Information',
            ]
        );
        $categorySetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY, 'shopnowtext', [
                'type'         => 'text',
                'label'        => 'Shopnow Text',
                'input'        => 'textarea',
                'sort_order'   => 100,
                'source'       => '',
                'wysiwyg_enabled' => true,
                'is_html_allowed_on_front' => true,
                'global'       => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible'      => true,
                'required'     => false,
                'user_defined' => false,
                'default'      => null,
                'group'        => '',
                'backend'      => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend'
            ]
        );
        $categorySetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY, 'shopnowlinklabel', [
                'type'         => 'varchar',
                'label'        => 'Shopnow Link label',
                'input'        => 'text',
                'sort_order'   => 100,
                'source'       => '',
                'global'       => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible'      => true,
                'required'     => false,
                'user_defined' => false,
                'default'      => null,
                'group'        => '',
                'backend'      => ''
            ]
        );
        $categorySetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY, 'shopnowlink', [
                'type'         => 'varchar',
                'label'        => 'Shopnow Link',
                'input'        => 'text',
                'sort_order'   => 100,
                'source'       => '',
                'global'       => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible'      => true,
                'required'     => false,
                'user_defined' => false,
                'default'      => null,
                'group'        => '',
                'backend'      => ''
            ]
        );
        $categorySetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY, 'shopnowsecond', [
                'type' => 'varchar',
                'label' => 'Header Image',
                'input' => 'image',
                'backend' => 'Magento\Catalog\Model\Category\Attribute\Backend\Image',
                'required' => false,
                'sort_order' => 5,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'group' => 'General Information',
            ]
        );
        $categorySetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY, 'shopnowsecondtext', [
                'type'         => 'text',
                'label'        => 'Shopnowsecond Text',
                'input'        => 'textarea',
                'sort_order'   => 100,
                'source'       => '',
                'wysiwyg_enabled' => true,
                'is_html_allowed_on_front' => true,
                'global'       => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible'      => true,
                'required'     => false,
                'user_defined' => false,
                'default'      => null,
                'group'        => '',
                'backend'      => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend'
            ]
        );
        $categorySetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY, 'shopnowsecondlinklabel', [
                'type'         => 'varchar',
                'label'        => 'Shopnowsecond Text label',
                'input'        => 'text',
                'sort_order'   => 100,
                'source'       => '',
                'global'       => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible'      => true,
                'required'     => false,
                'user_defined' => false,
                'default'      => null,
                'group'        => '',
                'backend'      => ''
            ]
        );
        $categorySetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY, 'shopnowsecondlink', [
                'type'         => 'varchar',
                'label'        => 'Shopnowsecond Link',
                'input'        => 'text',
                'sort_order'   => 100,
                'source'       => '',
                'global'       => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible'      => true,
                'required'     => false,
                'user_defined' => false,
                'default'      => null,
                'group'        => '',
                'backend'      => ''
            ]
        );
        $categorySetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY, 'offertext', [
                'type'         => 'text',
                'label'        => 'Offer Text ',
                'input'        => 'textarea',
                'sort_order'   => 100,
                'source'       => '',
                'wysiwyg_enabled' => true,
                'is_html_allowed_on_front' => true,
                'global'       => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible'      => true,
                'required'     => false,
                'user_defined' => false,
                'default'      => null,
                'group'        => '',
                'backend'      => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend'
            ]
        );
        $categorySetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY, 'topheadertitle', [
                'type'         => 'varchar',
                'label'        => 'Top Header Title',
                'input'        => 'text',
                'sort_order'   => 100,
                'source'       => '',
                'global'       => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible'      => true,
                'required'     => false,
                'user_defined' => false,
                'default'      => null,
                'group'        => '',
                'backend'      => ''
            ]
        );
        $categorySetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY, 'headerlinkonelabel', [
                'type'         => 'varchar',
                'label'        => 'Header Link 1 Label',
                'input'        => 'text',
                'sort_order'   => 100,
                'source'       => '',
                'global'       => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible'      => true,
                'required'     => false,
                'user_defined' => false,
                'default'      => null,
                'group'        => '',
                'backend'      => ''
            ]
        );
        $categorySetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY, 'headerlinkonelink', [
                'type'         => 'varchar',
                'label'        => 'Header Link 1 Link',
                'input'        => 'text',
                'sort_order'   => 100,
                'source'       => '',
                'global'       => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible'      => true,
                'required'     => false,
                'user_defined' => false,
                'default'      => null,
                'group'        => '',
                'backend'      => ''
            ]
        );
        $categorySetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY, 'headerlinktwolabel', [
                'type'         => 'varchar',
                'label'        => 'Header Link 2 Label',
                'input'        => 'text',
                'sort_order'   => 100,
                'source'       => '',
                'global'       => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible'      => true,
                'required'     => false,
                'user_defined' => false,
                'default'      => null,
                'group'        => '',
                'backend'      => ''
            ]
        );
        $categorySetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY, 'headerlinktwolink', [
                'type'         => 'varchar',
                'label'        => 'Header Link 2 Link',
                'input'        => 'text',
                'sort_order'   => 100,
                'source'       => '',
                'global'       => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible'      => true,
                'required'     => false,
                'user_defined' => false,
                'default'      => null,
                'group'        => '',
                'backend'      => ''
            ]
        );
        $categorySetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY, 'headerlinkthreelabel', [
                'type'         => 'varchar',
                'label'        => 'Header Link 3 Label',
                'input'        => 'text',
                'sort_order'   => 100,
                'source'       => '',
                'global'       => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible'      => true,
                'required'     => false,
                'user_defined' => false,
                'default'      => null,
                'group'        => '',
                'backend'      => ''
            ]
        );
        $categorySetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY, 'headerlinkthreelink', [
                'type'         => 'varchar',
                'label'        => 'Header Link 3 Link',
                'input'        => 'text',
                'sort_order'   => 100,
                'source'       => '',
                'global'       => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'visible'      => true,
                'required'     => false,
                'user_defined' => false,
                'default'      => null,
                'group'        => '',
                'backend'      => ''
            ]
        );
        $installer->endSetup();
    }
}