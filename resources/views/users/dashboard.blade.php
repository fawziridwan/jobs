@extends('layouts.application')
@section('content')

@if ($detail->file == null)
    {!! Form::open(['route' => ['app_execute',$detail->id], 'method' => 'put', 'role' => 'form', 'enctype' => 'multipart/form-data']) !!}
    <div class="container">
    	<div class="row" style="margin-top: 30px;">
    		<div class="col m12">
    			<div class="card white darken-1">
                    <div class="card-content grey-text text-darken-3">
                    <span class="card-title">
                        <h5>Application</h5>
                    </span>
                    <p>You havent sent your job application, sent your application including your <i>Curicullum Vitae</i> to us</p>
                    <p>Note : </p>
                    <ul class="browser-default">
                        <li>Must be a type of file .pdf</li>
                        <li>Maximum size of 1000kb</li>
                    </ul>
                    <p>Once it's submitted, you cant undo your CV, so make sure you have everything's okay before submit it to us</p>
                    </div>
                    {!! Form::hidden('user_id', Sentinel::getUser()->id) !!}
                    {!! Form::hidden('user_name', Sentinel::getUser()->first_name) !!}
                    <div class="card-action">
                            <div class="file-field input-field">
                                <div class="btn brown waves-effect waves-light">
                                    <span>Browse</span>
                                    <input type="file" name="app_file">
                                </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                                <p class="red-text">{!! $errors->first('app_file') !!}</p>
                            </div>
                            </div>
                    </div>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="action">Submit <i class="material-icons right">send</i> </button>

            </div>
        </div>
    </div>
    {!! Form::open() !!}
@elseif ($detail->status == "unread")
    <div class="container">
        <div class="row" style="margin-top:30px;">
            <div class="col m12">
                <div class="card white darken-1">
                    <div class="card-content grey-text text-darken-3">
                        <div class="card-panel brown white-text">
                            <p style="font-size: 150%;">Waiting for approval..</p>
                        </div>
                        <div class="icon-block">
                            <h2 class="center brown-text"><i class="large material-icons">hourglass_empty</i></h2>
                                <h5 class="center">Anda sudah mengirim lamaran</h5>
                    
                                <p class="light">By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.</p>
                              </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>

@elseif($detail->status == "disaprove")
    <div class="container">
        <div class="row" style="margin-top:30px;">
            <div class="col m12">
                <div class="card white darken-1">
                    <div class="card-content grey-text text-darken-3">
                        <div class="card-panel red white-text">
                            <p style="font-size: 150%;">Maaf, lamaran anda kami tolak!!..</p>
                        </div>
                        <div class="icon-block">
                            <h2 class="center red-text"><i class="large material-icons">highlight_off</i></h2>
                                <h5 class="center">Kami mohon maaf, Silahkan mencoba kembali lain waktu ^^</h5>
                    
                                <p class="light">By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.</p>
                              </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@stop