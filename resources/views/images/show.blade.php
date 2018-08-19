@extends ('layouts.master')

@section ('content')

<main role="main">

      <div class="container">

        @php
          {{-- $i = 0; --}}
        @endphp

        @foreach ($images as $key => $image)

          @php
            {{-- if ($i == 0) echo "<div class='row'>"; $i++; --}}
          @endphp

              <div class="col-md-4">

                <h2>Image {{ $key }}</h2>

                <img src="{{ url('storage/' . $image) }}" height="120px" width="220px" alt="test" title="test" />

              </div>

          @php
            {{-- if ($i == 3) $i = 0; 
                 if ($i == 0) echo "</div>"; 
            --}}
          @endphp

        @endforeach

        <hr>

      </div>

    </main>

@endsection