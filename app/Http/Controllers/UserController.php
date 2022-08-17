<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$user = User::find($id); //根據 $id 來取得使用者
        $user = User::with('tasks')->find($id); //根據 $id 來取得使用者，並帶出關聯工作資料
        //return $user->tasks()->orderBy('salary','desc')->get(); //取得該使用者的工作，並依工作的薪資由大到小進行排序
        //return $user->tasks()->first();
       // return $user->tasks[6]->pivot->desc;
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addTask()
    {
        $user1 = User::first();
        $user1->tasks()->attach(1,['desc' => 'demo']); //以主鍵方式將 id 為 1 的工作分配給 1 號使用者
        // $taskUser = new TaskUser;
        // $taskUser->task_id = 1;
        // $taskUser->user_id = 1;
        // $taskUser->save();

        // $task2 = Task::find(2);
        // $user1->tasks()->save($task2); //以參考方式將 id 為 2 的工作分配給 1 號使用者

        //$user1->tasks()->sync([1,3,5,7,9]); //以主鍵方式將 id 為 1.3.5.7.9 的工作分配給 1 號使用者，同時移除原有關聯
    }

    public function removeTask()
    {
        $user1 = User::first();
        $user1->tasks()->detach(1);//以主鍵方式將 id 為 1 的工作從 1 號使用者移除
    }
}
