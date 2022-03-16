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
namespace Borntechies\CategoryAttribute\Block\Html;
 
use Magento\Framework\Data\Tree\NodeFactory;
use Magento\Framework\Data\TreeFactory;
use Magento\Framework\DataObject;
use Magento\Framework\View\Element\Template;
 

class Topmenu extends \Magento\Theme\Block\Html\Topmenu
{

    /**
     * @var \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory
     */
    private $categoryFactory;
    /**
     * @var \Magento\Catalog\Model\Category
     */
    private $category;
    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;

    /**
     * @var \Magento\Catalog\Model\CategoryRepository
     */
    protected $categoryRepository;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Catalog\Model\CategoryRepository $categoryRepository,
        \Magento\Catalog\Model\Category $category,
        NodeFactory $nodeFactory,
        TreeFactory $treeFactory
    ) {
        parent::__construct($context, $nodeFactory, $treeFactory);
        $this->categoryFactory = $categoryFactory;
        $this->category = $category;
        $this->storeManager = $storeManager;
        $this->categoryRepository = $categoryRepository;
        
    }
    public function getCategorieslist()
    {
        $categories = $this->categoryFactory->create();   
        $categories->addAttributeToSelect('*');     
        $categories->addAttributeToFilter('level' , 2); 
        $categories->addAttributeToFilter('is_active' , 1);
        $categories->addAttributeToFilter('include_in_menu', 1);
        $categories->setOrder('position', 'asc');

        return $categories;
    }
    public function getSubCategorieslist($id)
    {
        $subcategory = $this->category->load($id);

        return $subcategory;
    }
    public  function getCategoryURl($categoryId)
    {
        $category = $this->categoryRepository->get($categoryId, $this->_storeManager->getStore()->getId());

        return $category->getUrl();
    }
}