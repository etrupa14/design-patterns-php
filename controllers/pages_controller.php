<?php

class PagesController {

    private $sortMethods;

    public function __construct()
    {
        $this->sortMethods = \lib\SortLib::get_sort_methods();
    }

    /**
     * Display form
     *
     */
    public function home()
    {
        $sortMethods = $this->sortMethods;

        require_once('views/pages/home.php');
    }

    /**
     * handles invalid action and controller
     *
     */
    public function error()
    {
        require_once('views/pages/error.php');
    }

    /**
     *
     * handle sorting of string
     *
     */
    public function sort()
    {
        $sortMethods = $this->sortMethods;

        // get post data
        $data = $_POST;

        // initialize errors
        $errors = [];

        $sortedString = '';

        $validationResult = $this->_validate($data);
        if(is_array($validationResult)) {
            $errors = $validationResult;
        } else {
            // no errors do sorting
            $sorting = new \lib\SortLib($data['sort_method']);
            $sortedString = $sorting->get_sorted_string($data['sort_string']);
        }

        require_once('views/pages/home.php');
    }

    /**
     * Validates user data
     *
     * @param $data
     * @return array|bool
     */
    private function _validate($data)
    {
        $errors = [];

        $sort_string = $data['sort_string'];
        $sort_method = $data['sort_method'];

        // checks if null
        if (is_null($sort_string) || $sort_string == '') {
            $errors['sort_string'][] = 'This field is required';
        }

        // checks if null
        if (is_null($sort_method) || $sort_method == '') {
            $errors['sort_method'][] = 'This field is required';
        }

        // checks if there are special characters
        if (preg_match('/[^A-Za-z]/', $sort_string)) {
            $errors['sort_string'][] = 'Must contain alphabets only';
        }

        return (count($errors) > 0) ? $errors : true;
    }
}