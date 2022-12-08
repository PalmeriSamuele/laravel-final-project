@extends('pages.backoffice.layout.app')

@section('content-backoffice')
    <div class="col-lg-10 m-auto ">
        <h2>Boite mails</h2>
        <a class='btn btn-secondary rounded' href="/backoffice/archive">Archive</a>
        <div class="mt-3">
    
            @foreach ($mails as $mail )
            <?php 
                if ($mail->isOpen) {
                    $class = "d-flex border border-2 justify-content-between align-items-center rounded p-2 alert alert-light";
                }else{
                    $class = "d-flex  justify-content-between align-items-center rounded p-2 alert alert-dark";
                }
            ?>
        
                <div class='{{ $class }}'>
                
                    <a href="/mail/{{$mail->id}}" class="text-info">open</a>

       
                    <p class="m-0">{{$mail->name}}</p>
                    @if(!$mail->isOpen)
                        <p class="m-0 text-success">new message !</p>
                    @else
                        <p class="m-0 text-success">vu</p>
                    @endif
                    <div  class="d-flex gap-3">
                        <form action="/mail/archive/{{$mail->id}}" method="post">
                            @csrf
                            @method('PUT')
                            <button type="submit">archive</button>
                        </form>

                        <form action="/delete/mail/{{$mail->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class='btn btn-danger rounded border justify-self-end' type="submit">X</button>
    
                        </form>
                    </div>
                
                </div>
                
            @endforeach
        </div>

    </div>

@endsection