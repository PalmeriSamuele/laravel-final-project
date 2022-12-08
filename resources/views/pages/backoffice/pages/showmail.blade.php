@extends('pages.backoffice.layout.app')

@section('content-backoffice')
    
    <div class="card col-lg-5 bg-light p-2">
        <a class='' href="/backoffice/mails"><-</a>
        <h1>{{$mail->name}}</h1>
        <h2>{{$mail->email}}</h2>
        <p>{{$mail->message}}</p>
    </div>
@endsection