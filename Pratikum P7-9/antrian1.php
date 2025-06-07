<?php
class AIQueue {
    private $queue = [];

    public function enqueue($task) {
        array_push($this->queue, $task);
    }

    public function dequeue() {
        return array_shift($this->queue);
    }

    public function showQueue() {
        print_r($this->queue);
    }
}

$queue = new AIQueue();
$queue->enqueue("User 1 - Image Recognition");
$queue->enqueue("User 2 - NLP Translate");
$queue->showQueue();
echo "Diproses: " . $queue->dequeue() . "\n";