<?php


namespace Bluecollar\Jobs;


class JobPublishedCommand
{
    public $title;
    public $phoneNumber;
    public $contactName;
    public $positions;
    public $location;
    public $description;
    public $deadline;
    public $categoryId;

    /**
     * JobPublishedCommand constructor.
     * @param $title
     * @param $phoneNumber
     * @param $contactName
     * @param $positions
     * @param $location
     * @param $description
     * @param $deadline
     * @param $categoryId
     */
    public function __construct($title, $phoneNumber, $contactName, $positions, $location, $description, $deadline, $categoryId)
    {
        $this->title = $title;
        $this->phoneNumber = $phoneNumber;
        $this->contactName = $contactName;
        $this->positions = $positions;
        $this->location = $location;
        $this->description = $description;
        $this->deadline = $deadline;
        $this->categoryId = $categoryId;
    }
}