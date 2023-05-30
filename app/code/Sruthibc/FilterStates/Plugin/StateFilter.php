<?php

namespace Sruthibc\FilterStates\Plugin;
use Sruthibc\FilterStates\Helper\Config as Helper;

class StateFilter
{
    /**
     * Helper
     *
     * @var Helper
     */
    protected $helper;

    protected $disallowed;

    /**
     * Undocumented function
     *
     * @param Helper $helper
     */
    public function __construct(
        Helper $helper
    )
    {
        $this->helper = $helper;
    }

    /**
     * Filter some US state/territories
     * 
     * @param string|array $subject
     * @param array $options
     * @return array
     */
    public function afterToOptionArray($subject, $options)
    {
        if($this->helper->getStateFilterStatus()){

            $stateTerritoryList = $this->helper->getStateTerrotorylist();            
            $disallowed         = explode(',', $stateTerritoryList);
            $this->disallowed   = array_map('trim', $disallowed);

            $result = array_filter($options, function ($option) {
                if (isset($option['label']))
                    return !in_array($option['label'], $this->disallowed);
                return true;
            });

            return $result;
        }else{            
            return $options;
        }
    }
}