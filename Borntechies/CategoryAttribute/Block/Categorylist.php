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
namespace Borntechies\CategoryAttribute\Block;

class Categorylist extends \Magento\Framework\View\Element\Template
{    

    /**
     * @var \Magento\Catalog\Helper\Category
     */
    protected $_categoryHelper;
    /**
     * @var \Magento\Catalog\Model\CategoryRepository
     */
    protected $_categoryRepository;
    /**
     * @var \Magento\Catalog\Model\Category
     */
    protected $_category;
    /**
     * @var \Magento\Catalog\Helper\Output
     */
    protected $_helpercategory;
    /**
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;


    public function __construct(
        \Magento\Catalog\Block\Product\Context $context,     
        \Magento\Catalog\Helper\Category $categoryHelper,        
        \Magento\Catalog\Model\CategoryRepository $categoryRepository, 
        \Magento\Catalog\Model\Category $category,
        \Magento\Catalog\Helper\Output $helpercategory,
        \Magento\Framework\Registry $registry,

        array $data = []
    ) {


        $this->_categoryHelper = $categoryHelper;   
        $this->_categoryRepository = $categoryRepository;
        $this->_category = $category;
        $this->_helpercategory = $helpercategory;
        $this->_coreRegistry = $registry;
        parent::__construct(
            $context,          
            $data
        );


    }

    public function getStoreCategories($sorted = false, $asCollection = false, $toLoad = true)
    {
        return $this->_categoryHelper->getStoreCategories($sorted , $asCollection, $toLoad);
    }

    public function getCategoryById($categoryId) 
    {
        return $this->_categoryRepository->get($categoryId);

    }

    public function getCategoryImg($categoryId)
    {
        $category = $this->_category->load($categoryId);
        if($category->getImageUrl()){
            $_imgHtml   = '';
            if ($_imgUrl = $category->getImageUrl()) {
                $_imgHtml = '<img src="' . $_imgUrl . '" />';
                $_imgHtml = $this->_helpercategory->categoryAttribute($category, $_imgHtml, 'image');
                if($category->getImageUrl()) {
                    return $_imgHtml;
                } 
            }
        }

    }

    public function getCurrentCategory()
    {
        if (!$this->hasData('current_category')) {
            $this->setData('current_category', $this->_coreRegistry->registry('current_category'));
        }
        return $this->getData('current_category');
    }

}
