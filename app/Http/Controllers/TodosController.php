<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodosController extends Controller
{
    //agregar tareas
    public function store(Request $request){
        $request->validate([
            'title' => 'required|min:3'
        ]);
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->save();

        return redirect()->route('todos')->with('sucess','tarea agregada con exito');
    }

    //visualizar tareas
    public function index(){
        $todos = Todo::all();
        return view('todos.index',['todos' => $todos]);
    }

    public function show($id){
        $todo = Todo::find($id);
        return view('todos.show', ['todo' => $todo]);
    }

    public function update(Request $request,$id){
        $todo = Todo::find($id);
        $todo->title = $request->title;
        // dd($todos);
        // dd($request);
        $todo->save();
        return redirect()->route('todos')->with('success','Tarea Actualizada');
    }

    public function destroy($id){
        $todo = Todo::find($id);
        $todo->delete();

        return redirect()->route('todos')->with('success','Tarea Eliminada');
    }


}
