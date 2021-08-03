<?php

/**
 * Every page loads from view folder
 * in order to load a view inside a folder of the view folder
 * the folder/filename must be parsed
 */
class Site extends Controller
{
    public function index()
    {
        $data = [
            "title" => "My PHP tiny MVC Framework",
        ];

        $this->view("home", $data);
    }
}
