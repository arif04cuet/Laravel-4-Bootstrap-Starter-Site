<?php

class AdminDashboardController extends AdminController
{

    /**
     * Admin dashboard
     *
     */
    public function getIndex()
    {
        $title = 'Welcome to Aflac Dashboard';
        return View::make('admin/dashboard', compact('title'));
    }

}