<?php

namespace App\Http\Controllers;

use App\Models\Cgy;
use App\Models\Task;
use Illuminate\Http\Request;

class CgyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return '多筆的分類';
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
        // $newCgy = new Cgy;
        // $newCgy->title = '分類1';
        // $newCgy->sort = 1;
        // $newCgy->enabled = true;
        // $newCgy->save();
        // $newCgy = new Cgy(['title' => '分類2','sort' => 2, 'enabled' => true]);
        // $newCgy->save();

        $newCgy = Cgy::create(['title' => '分類3','sort' => 3, 'enabled' => true]);

        return redirect('/cgies');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cgy  $cgy
     * @return \Illuminate\Http\Response
     */             
    public function show(Cgy $cgy)
    {
        //$cgy = Cgy::find($id);
        //$cgy = Cgy::where('sort','>=',2)->orderBy('created_at','desc')->get();
        //return $cgy->tasks()->orderBy('salary','desc')->get();
        // $sum = Cgy::sum('sort');
        // return $sum;
        $task1 = \App\Models\Task::find(1);
        $cgy->tasks()->save($task1);
        return $cgy->tasks()->orderBy('id','asc')->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cgy  $cgy
     * @return \Illuminate\Http\Response
     */
    public function edit(Cgy $cgy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cgy  $cgy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cgy $cgy)
    {
        $cgy->sort = 99;
        $cgy->save();
        return redirect('/cgies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cgy  $cgy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cgy $cgy)
    {
        // $cgy->delete();
        Cgy::destroy($cgy->id);
        return redirect('/cgies');
    }

    public function addTask()
    {
        $newTask = Task::create(['title' => '上課', 'salary' => 100 , 'enabled' => true , 'desc' => 
        '學英文', 'cgy_id' => 3]);
        $cgy1 = Cgy::find(1);
        $cgy1->tasks()->save($newTask);
        
    }
}
