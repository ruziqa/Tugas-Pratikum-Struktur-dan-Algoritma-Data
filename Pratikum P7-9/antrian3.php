<?php
class JobQueue {
    public $jobs = [];

    public function addJob($modelName) {
        $this->jobs[] = $modelName;
    }

    public function processJobs() {
        while (!empty($this->jobs)) {
            echo "Training model: " . array_shift($this->jobs) . "\n";
        }
    }
}

$q = new JobQueue();
$q->addJob("CNN_Model");
$q->addJob("LSTM_Model");
$q->addJob("BERT_Model");
$q->processJobs();