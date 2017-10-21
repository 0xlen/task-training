<?php

namespace App\Http\Controllers;

use App\TaskManager;
use App\Http\Requests\StoreTask;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->TaskManager = new TaskManager();
    }

    /**
     * Create a new task
     *
     * @return Response
     */
    public function newTask(StoreTask $request)
    {
        $task = $request->all();

        $tasks = $this->TaskManager->create($task);

        return redirect('/task');
    }

    /**
     * Display all tasks
     *
     * @return Response
     */
    public function show()
    {
        $tasks = $this->TaskManager->all();
        $data['tasks'] = $tasks;

        return view('task', $data);
    }

    /**
     * Get the task by the task id
     *
     * @param  integer  $id
     * @return Response
     */
    public function getTask($id)
    {
        $task = $this->TaskManager->get($id);

        if ($task) {
            return response($task);
        }

        return redirect('/');
    }

    /**
     * Delete the task by the task id
     *
     * @param  integer  $id
     * @return Response
     */
    public function deleteTask($id)
    {
        $task = $this->TaskManager->delete($id);

        if ($task) {
            return redirect('/task');
        }

        return response('Delete Failed');
    }
}
