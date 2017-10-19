<?php

/*
 * Stores the role in the session, and return to whatever page
 * we were on when role is switched.
 */
class Roles extends Application
{

        public function actor($role = ROLE_GUEST)
        {
            $this->session->set_userdata('userrole',$role);
            redirect($_SERVER['HTTP_REFERER']); // back where we came from
        }

}

