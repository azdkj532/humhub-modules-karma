<?php
class KarmaModule extends HWebModule{
    
    /**
     * Inits the Module
     */
    public function init()
    {

        $this->setImport(array(
            'karma.models.*',
        ));
    }
}