<?php

class KarmaAdminGrid extends HWidget
{

    public $reportedContent;


    /**
     * Executes the widget.
     */
    public function run()
    {
        $this->render('karmaAdminGrid', array('reportedContent' => $this->reportedContent));
    }
    
    protected function gridContentColumn($data,$row)
    {  
        return $this->render('contentGrid');
    }
    
    protected function gridReporterColumn($data, $row)
    {
        return $this->render('reporterGrid');
    }
}