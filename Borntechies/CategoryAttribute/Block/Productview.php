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

class Productview extends \Magento\Framework\View\Element\Template
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
    /**
     * @var \Magento\Catalog\Helper\Data
     */
    protected $_catalogData;


    public function __construct(
        \Magento\Catalog\Block\Product\Context $context,     
        \Magento\Catalog\Helper\Category $categoryHelper,        
        \Magento\Catalog\Model\CategoryRepository $categoryRepository, 
        \Magento\Catalog\Model\Category $category,
        \Magento\Catalog\Helper\Output $helpercategory,
        \Magento\Catalog\Helper\Data $catalogData,
        \Magento\Framework\Registry $registry,
        array $data = []
    ) {


        $this->_categoryHelper = $categoryHelper;   
        $this->_categoryRepository = $categoryRepository;
        $this->_category = $category;
        $this->_helpercategory = $helpercategory;
        $this->_coreRegistry = $registry;
        $this->_catalogData = $catalogData;
        parent::__construct(
            $context,          
            $data
        );


    }
    public function getCategoryById($categoryId) 
    {
        return $this->_categoryRepository->get($categoryId);
    }
    public function getBreadcrumbPath() 
    {

        $currentProduct = $this->_coreRegistry->registry('current_product');
        $categorydata = $currentProduct->getCategoryIds();
        foreach ($categorydata as $categorycheker) {
            $categoryinfo = $this->_categoryRepository->get($categorycheker);
            if($categoryinfo->getIsActive() == '1')
            {
                if($categoryinfo->getParentId() !== '2')
                {
                    $categoryid = $categoryinfo->getParentId();
                    break;
                }
                else
                {
                    $categoryid = $categoryinfo->getEntityId();
                    break;
                }
                
            }
            
        }
        $categorydata = $this->getCategoryById($categoryid);
        return $categorydata;

    }
    public function getCurrentCategory()
    {
        $categorydata = $this->getBreadcrumbPath();
        return $categorydata;
    }

}
