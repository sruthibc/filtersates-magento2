<?php

namespace Sruthibc\FilterStates\Helper;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

/**
 * Class for calling State Filter module configuartion
 */
class Config extends AbstractHelper
{
    /**
     * Configuration path for State Filter Config status
     */
    const XML_PATH_STATE_FILTER_STATUS='statefilter_form/general/enablefilterstates';

    /**
     * Configuration path for State/Terrotory list
     */
    const XML_PATH_STATE_TERRITORY_LIST='statefilter_form/general/filterstates_list';

    /**
     * Get State Filter status
     *
     * @return bool
     */
    public function getStateFilterStatus()
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_STATE_FILTER_STATUS,
            ScopeInterface::SCOPE_STORE
        );
    }    

    /**
    * Retrive State/Terrotory list
     *
    * @return string
    */
    public function getStateTerrotorylist()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_STATE_TERRITORY_LIST,
            ScopeInterface::SCOPE_STORE
        );
    }    
 
}

