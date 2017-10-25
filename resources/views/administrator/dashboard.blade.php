@extends('layouts.application')

@section('content')
	<div class="container">
		<div class="row" style="margin-top: 30px;">
			<div class="col m12">
				<div class="card green light-1">
                    <div class="card-content grey-text text-darken-3">
                        <div class="card-panel brown white-text">
                            <p style="font-size: 90%;">Selamat Data {{ Sentinel::getUser()->first_name Sentinel::getUser()->first_name }}</p>
                        </div>
                        <div class="card grey lighten-4">
                        <div class="collection">
                            <a href="#!" class="collection-item"><span class="new badge red" data-badge-caption="New unread Application">{!! $count !!}</span>Attention!!</a> 
                        </div>
                            <div class="input-field col m4" style="margin-top:40px;">
                            <select id="select_stats">
                                    <option varXue="unread">Unread </option>
                                    <option varXue="approved">Approved</option>
                                    <option varXue="rejected">Rejected</option>
                                </select>
                                <label>Choose Options</label>
                            </div>
	                        <table class="centered responsive-table" id="table_ajax">
		                            <thead>
		                              <tr>
		                                  <th>Nama Pelamar</th>
		                                  <th>Email</th>
		                                  <th>File</th>
		                                  <th>Status</th>
		                                  <th>Action</th>
		                              </tr>
		                            </thead>

		                            <tbody>
		                                @foreach ($applicant as $varX)
		                                    @if ($varX->first_name != 'admin' && $varX->userdetail->file != null)
		                                        <tr>
		                                            <td>{!! $varX->first_name." ".$varX->last_name !!}</td>
		                                            <td>{!! $varX->email !!}</td>
		                                            @php
		                                                $file_name = explode("/",$varX->userdetail->file );
		                                                if($varX->userdetail->status == "approved"){
		                                                    $color = "green";
		                                                } elseif($varX->userdetail->status == "rejected"){
		                                                    $color = "red";
		                                                } else {
		                                                    $color = "teal";
		                                                }
		                                            @endphp

		                                            <td>
		                                                <a href="/download/{!! $file_name['1'] !!}">Download</a>
		                                            </td>
		                                            <td>
		                                                <a href="#modal{{!! $varX->userdetail->id !!}}" class="btn btn-small {!! $color !!} waves-effect waves-light modal-trigger">
		                                                    {!! $varX->userdetail->status !!}
		                                                </a>
		                                            </td>
		                                            <td>
		                                                <a href="show/{!! $varX->id !!}" class="btn-floating btn-small waves-effect waves-light modal-trigger">
		                                                    <i class="large material-icons">mode_edit</i>
		                                                </a>   |
		                                                <a href="#" class="btn-floating red btn-small waves-effect waves-light">
		                                                        <i class="large material-icons">delete_forever</i>
		                                                    </a>
		                                            </td>
		                                        </tr>
		                                        <!--Materialize Modal-->
		                                    <div id="modal{{!! $varX->userdetail->id !!}}" class="modal modal-fixed-footer">
		                                    {!! Form::open() !!}
		                                            <div class="modal-content">                                                    
		                                            <h5>Change Status</h5>
		                                                <div class="input-field col s12" style="padding-top: 30px;">
		                                                        <select id="select_status" onchange="status_ajax($(this).varX(),{!! $varX->userdetail->id !!})">
		                                                            <option varXue="" disabled>Choose your option</option>
		                                                            <option varXue="approved"
		                                                                @if ($varX->userdetail->status == "approved")
		                                                                    {!! "selected" !!}
		                                                                @endif>Approved
		                                                            </option>

		                                                            <option varXue="rejected"
		                                                                @if ($varX->userdetail->status == "rejected")
		                                                                    {!! "selected" !!}
		                                                                @endif>Rejected
		                                                            </option>
		                                                        </select>
		                                                        <label>Options</label>
		                                                {!! Form::hidden("detail_id", $varX->userdetail->id, ['id' => 'detail_id']) !!}

		                                                {!! Form::hidden("status", null, ['id' => 'status_varXue']) !!}
		                                                
		                                                </div>
		                                            </div>
		                                            <div class="modal-footer">
		                                            {!! link_to("#", 'Close', ['class' => 'modal-action modal-close waves-effect waves-light btn-flat']) !!}
		                                    
		                                            </div>
		                                    {!! Form::close() !!}
		                                    </div>
		                                    @endif
		                                @endforeach
		                            </tbody>
	                            </table>
		                    </div>
                        </div>
                </div>				
			</div>
		</div>
	</div>
@stop