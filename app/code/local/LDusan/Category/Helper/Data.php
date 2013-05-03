<?php
/**
 * LDusan Category Helper
 *
 * @category	LDusan
 * @package    LDusan_Category
 * @author     Dusan Lukic <ldusan84@gmail.com>
 */
class LDusan_Category_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * Retrieves category id for given id path
     *
     * @param string $idPath
     *
     * @return int
     */
    public function getCategoryIdByIdPath($idPath)
    {
        $storeId = Mage::app()
            ->getWebsite()
            ->getDefaultGroup()
            ->getDefaultStoreId();

        $rewrite = Mage::getResourceModel('catalog/url')->getRewriteByIdPath($idPath, $storeId);
        $categoryId = $rewrite->getCategoryId();

        return $categoryId;
    }
}
