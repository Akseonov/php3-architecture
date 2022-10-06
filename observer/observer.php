<?php

interface IObserver
{
    public function handle(Job $job);
}

class ApplicantObserver implements IObserver
{
    public function __construct(
        private string $name,
        private string $email,
        private string $experience
    )
    {
    }

    public function handle(Job $job)
    {
        echo "пользователь $this->name c почтой $this->email и опытом $this->experience может рассмотреть вакансию {$job->getTitle()}";
    }
}

interface IObservable
{
    public function addObserver(IObserver $observer);
    public function removeObserver(IObserver $observer);
    public function notify(Job $job);
}

class Jobs implements IObservable
{

    public function __construct(
        private array $observers,
        private array $jobs,
    )
    {
    }

    public function addJob(Job $job)
    {
        $this->jobs[] = $job;
        $this->notify($job);
    }

    /**
     * @return array
     */
    public function getJobs(): array
    {
        return $this->jobs;
    }

    public function addObserver(IObserver $observer)
    {
        $this->observers[] = $observer;
    }

    public function removeObserver(IObserver $observer)
    {
        foreach ($this->observers as $obsrv) {
            if ($obsrv === $observer) {
                unset($obsrv);
            }
        }
    }
    public function notify($job)
    {
        foreach ($this->observers as $observer) {
            $observer->handle($job);
        }
    }

}

class Job
{
    public function __construct(
        private readonly string $title
    )
    {
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
}


