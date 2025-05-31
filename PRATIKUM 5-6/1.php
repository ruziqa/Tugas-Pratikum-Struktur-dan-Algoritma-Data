<?php
// declare(strict_types=1);
class Stack
{
    private array $stack;
    private int   $limit;

    public function __construct(int $limit = 10)
    {
        $this->stack = [];
        $this->limit = $limit;
    }

    public function push(mixed $item): void
    {
        if (count($this->stack) < $this->limit) {
            $this->stack[] = $item;
        } else {
            echo "Stack penuh, tidak bisa menambah perubahan.\n";
        }
    }

    public function pop(): mixed
    {
        return $this->isEmpty()
            ? "Tidak ada yang bisa di-undo."
            : array_pop($this->stack);
    }

    public function peek(): mixed
    {
        return end($this->stack);
    }

    public function isEmpty(): bool
    {
        return empty($this->stack);
    }
}

/* -------------------------
   SETUP UNDO & REDO STACK
   ------------------------- */
$undoStack = new Stack(10);
$redoStack = new Stack(10);

/* Helpers */
function addEditAction(Stack $stack, array $action): void
{
    $stack->push($action);
}

function undoAction(Stack $undoStack, Stack $redoStack): void
{
    $last = $undoStack->pop();

    if (is_array($last)) {
        echo "Undo action: {$last['action']} at {$last['time']}\n";
        $redoStack->push($last);
    } else {
        echo $last . "\n";
    }
}

function redoAction(Stack $redoStack, Stack $undoStack): void
{
    $last = $redoStack->pop();

    if (is_array($last)) {
        echo "Redo action: {$last['action']} at {$last['time']}\n";
        $undoStack->push($last);
    } else {
        echo $last . "\n";
    }
}

/* -------------------------
   SIMULASI EDIT • UNDO/REDO
   ------------------------- */
addEditAction($undoStack, ['action' => 'filter', 'time' => '2024-10-26 10:00:00']);
addEditAction($undoStack, ['action' => 'crop',   'time' => '2024-10-26 10:05:00']);
addEditAction($undoStack, ['action' => 'rotate', 'time' => '2024-10-26 10:10:00']);

undoAction($undoStack, $redoStack); // Undo rotate
undoAction($undoStack, $redoStack); // Undo crop
redoAction($redoStack, $undoStack); // Redo crop