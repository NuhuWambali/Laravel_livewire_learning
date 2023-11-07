<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Todo;

class Todos extends Component
{
    public $todos;
    public $task;


    public function render()
    {
        return view('livewire.todos');
    }

    function mount(){
        $this->fetchTodos();
    }

    function fetchTodos(){
        $this->todos=Todo::all();
    }

    function addTodo(){
        if($this->task!=''){
            $todo=new Todo;
            $todo->task=$this->task;

            $todo->save();
            $this->task='';
            $this->mount();

        }
    }

    function markAsDone(Todo $todo){

        $todo->status='done';
        $todo->save();
        $todo->status='';
        $this->fetchTodos();

    }

    function deleteTask(Todo $todo){
          $todo->delete();
          $this->fetchTodos();
    }
}
