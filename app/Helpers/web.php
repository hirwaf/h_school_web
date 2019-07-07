<?php

if (!function_exists('getGender')) {
    function getGender($key = null)
    {
        $gender = ['Male' => 'Male', 'Female' => 'Female', 'Others' => 'Others'];

        if (!is_null($key) && isset($gender[$key]))
            return $gender[$key];
        else
            return null;

        return $gender;
    }
}

if (!function_exists('getMaritalStatus')) {
    function getMaritalStatus($key = null)
    {
        $status = ['Single' => 'Single', 'Married' => 'Married', 'Separated' => 'Separated', 'Divorced' => 'Divorced', 'Widowed' => 'Widowed'];
        if (!is_null($key) && isset($status[$key]))
            return $status[$key];
        else
            return null;

        return $status;
    }
}

if (!function_exists('getStudentStageStatus')) {
    function getStudentStageStatus($key = null)
    {
        $stages = ['applicant' => 'applicant', 'student' => 'student', 'alumni' => 'alumni'];
        if (!is_null($key) && isset($stages[$key]))
            return $stages[$key];
        else
            return null;

        return $stages;
    }
}
