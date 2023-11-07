<div class="mx-5">
        <div class="form-group mx-5">
          <label for="exampleInputTask">Enter task</label>
          <input type="text" class="form-control"  wire:model='task'  id="exampleInputEmail1" aria-describedby="emailHelp" name="task" placeholder="Enter task">
          <button wire:click='addTodo' class="btn btn-primary mt-2">Save</button>
        </div>
        @if($todos->count())
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Task</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>

            @foreach($todos as $index=>$todo)
          <tr>
            <th scope="row">{{$index+1}}</th>
            @if($todo->status=='done')
            <td style="text-decoration:line-through">{{$todo->task}}</td>
            @else
            <td style="">{{$todo->task}}</td>
            @endif
            <td>{{$todo->status}}</td>
            @if($todo->status=='open')
            <td><button class="btn btn-success btn-sm" wire:click='markAsDone({{$todo->id}})'>done</button></td>
            @endif
            @if($todo->status=='done')
            <td><button class="btn btn-success btn-sm" wire:click='markAsDone({{$todo->id}})' disabled>done</button></td>
            @endif
            <td><button class="btn btn-danger btn-sm" wire:click='deleteTask({{$todo->id}})'>X</button></td>
          </tr>
          @endforeach
        </tbody>
         @else
          <p>no data yet</p>
         @endif
      </table>


</div>
