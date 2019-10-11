<form action="{{route('register.post')}}" id="registerForm" method="POST">
    {{csrf_field()}}
    <div class="form-group">
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter username" required>
    </div>
    <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder="Enter email" required>
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" required>
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="password_confirmation" placeholder="Retype Password" required>
    </div>
    <div class="form-group">
        <select name="role" id="role" class="form-control"  required placeholder="Connect as..">
             @foreach(config('samk.roles') as $role)
                @if($loop->first)
                    <option value="{{$role}}" selected>{{$role}}</option>
                @else
                     <option value="{{$role}}" >{{$role}}</option>
                @endif
            @endforeach
       </select>
  </div>                            
    <button class="btn btn-login btn-full">Register</button>
</form>