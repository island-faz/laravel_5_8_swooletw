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

                    <ul class="list-group" id="msg-pan">
                        
                    </ul>



                    <div class="form-group mt-3">

                        <input type="email" class="form-control" name="msg" id="msg">

                        <button class="btn btn-block btn-primary mt-3" id="send" onclick="sendmsg();">Send</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"
        integrity="sha256-bQmrZe4yPnQrLTY+1gYylfNMBuGfnT/HKsCGX+9Xuqo="
        crossorigin="anonymous"></script>

<script type="text/javascript">
    var socket = io.connect('ws://127.0.0.1:1215', {transports:['websocket']});
    
    socket.on('connect', () => {
        console.log("Connected");
    });

    socket.on('message', function(data)
    {
        console.log("Message received from server: " + data);
        $('#msg-pan').append('<li class="list-group-item bg-dark text-success text-left">' + data + '</li>');
    });

    function sendmsg()
    {
        var message = document.getElementById('msg').value;
        $('#msg-pan').append('<li class="list-group-item bg-dark text-danger text-right">' + message + '</li>');
        socket.emit('message', message);
        document.getElementById('msg').value = "";
    }

    document.onkeydown = function(e)
    {
        if(e.keyCode == 13)
        {
            document.getElementById("send").click();
        }
    };
</script>

@endsection

@section('css')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
@endsection
