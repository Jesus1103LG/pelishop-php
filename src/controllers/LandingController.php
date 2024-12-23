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
}
