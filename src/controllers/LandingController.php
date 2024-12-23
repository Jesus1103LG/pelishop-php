<?php
class LandingController
{
    public function home()
    {
        include("src/Views/Landing/home.php");
    }

    public function signup()
    {
        include("src/Views/Landing/register.php");
    }

    public function _404()
    {
        include("src/Views/Landing/404.php");
    }
}
