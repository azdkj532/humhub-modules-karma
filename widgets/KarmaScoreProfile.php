<?php
/**
 * KarmaScoreProfile. 
 * Displays karma score on profile
 * 
 * @package humhub.modules_core.user.widgets
 * @since 0.5
 * @author Luke
 */
class KarmaScoreProfile extends HWidget
{

    /**
     * The user object
     *
     * @var User
     */
    public $user;


    /**
     * Executes the widget.
     */
    public function run()
    {
        $this->render('karmaScoreProfile', array('user' => $this->user));
    }
    
}


