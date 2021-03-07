<?php

namespace Damin\Controller;

use Damin\DB;

class PageController extends MasterController {
    public function guide()
    {
        if(isset($_SESSION['user'])){
			$user = $_SESSION['user'];
        }else {
			$user = null;
		}

        $this->render("guid", ["user" => $user]);
    }

    public function faq() 
    {
        if(isset($_SESSION['user'])){
			$user = $_SESSION['user'];
        }else {
			$user = null;
		}

        $this->render("main", ["faq" => $user]);
    }

    public function notice()
    {
        if(isset($_SESSION['user'])){
			$user = $_SESSION['user'];
        }else {
			$user = null;
		}

        $this->render("notice", ["user" => $user]);
    }

    public function terms()
    {
        if(isset($_SESSION['user'])){
			$user = $_SESSION['user'];
        }else {
			$user = null;
		}

        $this->render("terms", ["user" => $user]);
    }

    public function privacy()
    {
        if(isset($_SESSION['user'])){
			$user = $_SESSION['user'];
        }else {
			$user = null;
		}

        $this->render("privacy", ["user" => $user]);
    }
}
