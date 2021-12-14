@extends('master')

@section('conent')
    <div class = "container">
        <h1 class ="page-title">Signup</h1>
        <div class ="" style="margin-bottom:10px;margin-top;15px;">
        </div>
            <div class = "col-md-12">
                <div class = "card">

                    <div class = "card-header">Signup</div>
                    <div class = "card-body">
                        @if(session('status'))
                            <div class = "alert alert-succes" role = "alert">
                                <button type = "button" class = "close" data-dismiss = "alert">&times;</buttonn>
                                {{Session('status')}}
                            </div>
                        @elseif(session('failed'))
                            <div class = "alert alert-danger" role="alert">
                                <button type = "button" class="close" data-dismiss="alert">&times;</button>
                                {{session('failed')}}
                            </div>                   
                        @endif
                        <form method="POST" action="{{url('signup')}}" class = "needs-validation" novalidate>
                            @csrf 

                            <div class="form-group">
                                <label>Name</label>
                                <input type = "text" name = "name" class = "form-control col-sm-6">
                                @error('name')
                                <div class = "invalid-feedback">{{ $meesage }}</div>
                                @enderror
                            </div>

                            <div class = "form-group">
                                <label>Email</label>
                                <input type = "email" name = "email" class = "form-control col-sm-6">    
                                @error('email')
                                <div class = "invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class = "form-group">
                                <label>Password</label>
                                <input type = "password" name = "password" class = "form-control col-sm-6">
                                @error('password')
                                <div class = "invalid-feedback">
                                    {{$message}}
                                </div>
                            </div>

                            <div class = "form-group">
                                <label>Confirm Password</label>
                                <input type = "password" name = "password_conformation" id = "password_conformtion" class = "form-control col-sm-6">
                                @error('password')
                                <div class = "invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <button type = "submit" class = "btn btn-primary">Signup</button>
                    </form>'
                    </div>               
                </div>
            </div>
        </div>
    </div>
@endsection


