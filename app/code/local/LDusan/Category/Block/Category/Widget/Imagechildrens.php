<?php
/**
 * LDusan Category Widget Block
 *
 * @category	LDusan
 * @package    LDusan_Category
 * @author     Dusan Lukic <ldusan84@gmail.com>
 */
class LDusan_Category_Block_Category_Widget_Imagechildrens
    extends Mage_Core_Block_Template
    implements Mage_Widget_Block_Interface
{

    /**
     * Internal constructor
     */
    protected function _construct()
    {
        $this->setTemplate('ldusan/category/imagechildrens.phtml');
        parent::_construct();
    }

    public function getCollection(){
        if ($this->getData('id_path')) {
            // Gets all sub categories of parent category 'Brands'
            $categoryId = Mage::helper('ldusan_category')->getCategoryIdByIdPath($this->getData('id_path'));
            $parent = Mage::getModel('catalog/category')->load($categoryId);

            // Create category collection for children
            $childrenCollection = $parent->getCollection();
            // Only get child categories of parent cat
            $childrenCollection->addIdFilter($parent->getChildren());
            // Only get active categories
            $childrenCollection->addAttributeToFilter('is_active', 1);

            // Add base attributes
            $childrenCollection->addAttributeToSelect('url_key')
                    ->addAttributeToSelect('name')
                    ->addAttributeToSelect('all_children')
                    ->addAttributeToSelect('is_anchor')
                    ->setOrder('position', Varien_Db_Select::SQL_ASC)
                    ->joinUrlRewrite();

            // ADD IMAGE ATTRIBUTE
            $childrenCollection->addAttributeToSelect('image');
            return $childrenCollection;
        }
    }
}
