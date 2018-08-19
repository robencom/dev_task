    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">

      <a class="navbar-brand" href="#">Dev-Task</a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">

        <ul class="navbar-nav">

          <li class="nav-item active">
            <a class="nav-link" href="{{ url('/') }}/home">Home <span class="sr-only">(current)</span></a>
          </li>               

          <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}/show">Images</a>
          </li>          

          @if (!Auth::check())  
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}/login">Login</a>
              </li>
          @endif  

          @if (Auth::check())   
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}/upload">Upload Image</a>
              </li>    

              <li class="nav-item"><a class="nav-link ml-auto" href="{{ url('/') }}/change_password">Change Password</a></li>

              <li class="nav-item"><a class="nav-link ml-auto" href="#">{{ auth()->user()->username }}</a></li>

 
              <li class="nav-item"><a class="nav-link ml-auto" href="{{ action('SessionsController@destroy') }}">Logout</a></li>
          @endif  

        </ul>

      </div>

    </nav>