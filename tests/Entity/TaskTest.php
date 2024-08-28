<?php

namespace App\Tests\Entity;

use App\Entity\Task;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validation;

class TaskTest extends TestCase
{
    public function testCreateValidTask()
    {
        // Create a new Task object with valid data
        $task = new Task();
        $title = 'Test Task';
        $task->setTitle($title);

        // Assertions to ensure the task is created correctly
        $this->assertInstanceOf(Task::class, $task);
        $this->assertEquals($title, $task->getTitle());
//        $this->assertFalse($task->isCompleted());
    }

    public function testSettersAndGetters()
    {
        // Create a new Task object with valid data
        $task = new Task('Initial Task');

        // Set new values
        $task->setTitle('Updated Task');

        // Assertions to ensure the setters work correctly
        $this->assertEquals('Updated Task', $task->getTitle());

    }

    public function testValidationConstraints()
    {
        $taskConstraint = new Task();
        $this->assertInstanceOf(Task::class, $taskConstraint);
        $taskConstraint->setTitle('');
        $validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping()
            ->getValidator();
        $errors = $validator->validate($taskConstraint);
        $this->assertGreaterThan(0, count($errors));
    }
}
