<?php
// for subscribers
interface Observer {
    public function onJobPosted(JobPost $job);
}

abstract class Observable {
    protected abstract function notify(JobPost $jobPosting);
    abstract function attach(Observer $observer);
    abstract function addJob(JobPost $jobPosting);
}

class JobPost
{
    protected $title;

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }
}

class JobSeeker implements Observer
{
    protected $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param JobPost $job
     */
    public function onJobPosted(JobPost $job)
    {
        // Do something with vacancy's publication
        echo 'Hi ' . $this->name . '! There are new vacancy: '. $job->getTitle() . '</br>';
    }
}

class JobPostings extends Observable
{
    /**
     * array with subscribers
     */
    protected $observers = [];

    /**
     * for all subscribers call onJobPosted() method
     * @param JobPost $jobPosting
     */
    protected function notify(JobPost $jobPosting)
    {
        foreach ($this->observers as $observer) {
            $observer->onJobPosted($jobPosting);
        }
    }

    /**
     * add subscriber to array
     * @param Observer $observer
     */
    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    /**
     * delete subscriber from array
     * @param Observer $observer
     */
    public function detach(Observer $observer)
    {
        foreach($this->observers as $key => $val) {
            if ($val == $observer) {
                unset($this->observers[$key]);
            }
        }
    }

    /**
     *
     * @param JobPost $jobPosting
     */
    public function addJob(JobPost $jobPosting)
    {
        $this->notify($jobPosting);
    }
}

// Create subscribers
$johnDoe = new JobSeeker('John Doe');
$janeDoe = new JobSeeker('Jane Doe');

// Create publication
$jobPostings = new JobPostings();
$jobPostings->attach($johnDoe);
$jobPostings->attach($janeDoe);

$firstPost = new JobPost('Junior Software Engineer');

$SecondPost = new JobPost('Middle Software Engineer');

// add new publication and look into notification
$jobPostings->addJob($firstPost);

$jobPostings->detach($janeDoe);

$jobPostings->addJob($SecondPost);
