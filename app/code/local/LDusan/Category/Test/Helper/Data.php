<?php
/**
 * LDusan Category Test Helper
 *
 * @category	LDusan
 * @package    LDusan_Category
 * @author     Dusan Lukic <ldusan84@gmail.com>
 */
class LDusan_Category_Test_Helper_Data extends EcomDev_PHPUnit_Test_Case
{

    /**
     * Test for getCategoryIdByIdPath helper method
     *
     * @test
     * @loadFixture
     */
    public function testGetCategoryIdByIdPath()
    {
        $categoryId = Mage::helper('ldusan_category')->getCategoryIdByIdPath('category/3');
        $this->assertEquals($categoryId, 3);
    }
}
