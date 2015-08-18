<?php
/**
 * KarmaProfileLink. 
 * Displays link on the user profile page
 * 
 * @package humhub.modules_core.user.widgets
 * @since 0.5
 * @author Luke
 */
class KarmaProfileLink extends HWidget
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
        $this->render('karmaProfileLink', array('user' => $this->user));
    }
    
}


