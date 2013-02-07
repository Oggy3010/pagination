<?php

class Pagination_Namespace_Block_Block extends Mage_Catalog_Block_Product_Abstract
{
    protected function _construct()
    {
        parent::_construct();
        $collection = Mage::getResourceModel('catalog/product_collection');// I hope I you have already own collection
        $this->setCollection($collection);
        $this->setTemplate('namespace/pagination.phtml'); // here we include template to project
    }

    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        $pager = $this->getLayout()->createBlock('page/html_pager', 'custom.pager'); // getting core block "pager"
        $pager->setAvailableLimit(array(1=>1,2=>2,3=>3,'all'=>'all')); // set numbering for our pagination
        $pager->setCollection($this->getCollection());
        $this->setChild('pager', $pager);
        $this->getCollection()->load();
        return $this;
    }

    public function getPagerHtml()
    {
        return $this->getChildHtml('pager'); // we will call this method from template
    }

}