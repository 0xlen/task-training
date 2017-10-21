<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Task;
use App\TaskManager;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TaskManagerTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        $this->TaskManager = new TaskManager();
    }

    /**
     * Test all() method
     *
     * @return void
     */
    public function testAll()
    {
        $tasks = factory(\App\Task::class, 2)->create();

        $result = $this->TaskManager->all();

        $this->assertEquals(2, count($result));

        $this->assertEquals($result, $tasks->toArray());
    }

    /**
     * Test get() method
     *
     * @return void
     */
    public function testGet()
    {
        $task = factory(\App\Task::class)->create();

        $result = $this->TaskManager->get($task->id);

        $this->assertEquals($task->toArray(), $result);
    }

    /**
     * Test get() method with wrong data
     *
     * @return void
     */
    public function testGetWrongData()
    {
        $result = $this->TaskManager->get(999);

        $this->assertEquals([], $result);
    }

    /**
     * Test delete() method
     *
     * @return void
     */
    public function testDelete()
    {
        $task = factory(\App\Task::class)->create();

        $this->assertEquals(1, Task::count());

        $result = $this->TaskManager->delete($task->id);

        $this->assertTrue($result);

        $this->assertEquals(0, Task::count());
    }

    /**
     * Test Create() method
     *
     * @return void
     */
    public function testCreate()
    {
        $data = [
            'task' => 'Hello this is the new task',
        ];
        $result = $this->TaskManager->create($data);

        $this->assertTrue($result);

        $this->assertEquals(1, Task::count());

        $task = Task::first()->toArray();

        foreach ($data as $key => $value) {
            $this->assertEquals($data[$key], $task[$key]);
        }
    }
}
