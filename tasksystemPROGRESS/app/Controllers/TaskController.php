<?php

class TaskController extends Controller
{
    public function index()
    {
        $this->view('tasks/index');
    }
}