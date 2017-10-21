<?php

namespace App;

use App\Task;

class TaskManager
{
    /**
     * Get the all task
     *
     * @return array
     */
    public function all()
    {
        $tasks = Task::all();
        if ($tasks) {
            return $tasks->toArray();
        }

        return [];
    }

    /**
     * Get the task by id
     *
     * @param  integer $id
     * @return array
     */
    public function get($id)
    {
        $task = Task::find($id);
        if (! $task) {
            return [];
        }

        return $task->toArray();
    }

    /**
     * Delete the task by id
     *
     * @param  integer $id
     * @return bool
     */
    public function delete($id)
    {
        $task = Task::find($id);
        if ($task) {
            $task->delete();

            return true;
        }

        return false;
    }

    /**
     * Create a new task
     *
     * @param  array $data
     * @return bool
     */
    public function create($data)
    {
        $task = Task::create($data);

        if ($task == null) {
            return false;
        } else {
            return true;
        }
    }
}
