@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    <input type="text" name="msg" id="msg">

                    <button id="send" onclick="sendmsg();">Send</button>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')

<script type="text/javascript">
  var sock = new WebSocket("ws://127.0.0.1:1215");
  sock.onopen = function(){
    console.log("connected");
  }

</script>

@endsection
