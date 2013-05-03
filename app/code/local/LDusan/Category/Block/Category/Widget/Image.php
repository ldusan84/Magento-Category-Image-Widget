<?php
/**
 * LDusan Category Widget Block
 *
 * @category	LDusan
 * @package    LDusan_Category
 * @author     Dusan Lukic <ldusan84@gmail.com>
 */
class LDusan_Category_Block_Category_Widget_Image
    extends Mage_Core_Block_Template
    implements Mage_Widget_Block_Interface
{

    /**
     * Internal constructor
     */
    protected function _construct()
    {
        $this->setTemplate('ldusan/category/image.phtml');
        parent::_construct();
    }

    /**
     *
     * Retrieves image path from widget data
     *
     * @return string
     */
    public function getImagePath()
    {
        if ($this->getData('id_path')) {
            $categoryId = Mage::helper('ldusan_category')->getCategoryIdByIdPath($this->getData('id_path'));
            $category = Mage::getModel('catalog/category')->load($categoryId);

            return $category->getImageUrl();
        }
    }
}
