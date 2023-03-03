<?php

namespace Najmul\Ecom\classes;

class HomeController
{
    public function __construct()
    {

    }

    public function page()
    {
        include('src/view/error/404.php');
    }

}