<?php
class DataLogStream {
    private $queue = [];

    public function stream($log) {
        $this->queue[] = $log;
        if (count($this->queue) > 5) {
            array_shift($this->queue);
        }
    }

    public function getLogs() {
        return $this->queue;
    }
}

$stream = new DataLogStream();
foreach (range(1, 10) as $i) {
    $stream->stream("Log ke-$i");
}

print_r($stream->getLogs());S