@extends('layouts.base')
@section('title', __('request-of-inter'))
@section('content')
    <!-- Add Request -->
    <br>
    <section id="req_inter">

        <div class="content-box-md">

            <div class="container">

                <div class="row">

                    <div class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-xs-8 offset-xs-1">

                        <div class="contact-right">

                            {!! Form::open(['method'=>'POST', 'action'=> ['Req_interController@store']]) !!}
                            @csrf
                            <h4>{{__('Create request of intervention')}}</h4>
                            <br>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        {!! Form::label('number', __('Request number').':',['class'=>'label_padding']) !!}
                                        <input id="number" type="text"
                                               class="form-control @error('number') is-invalid @enderror" name="number"
                                               value="{{ old('number') }}" required autocomplete="number"
                                               placeholder="{{__('Request number')}}">
                                        @error('number')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        {!! Form::label('degree_urgency', __('Degree of urgency').':',['class'=>'label_padding']) !!}
                                        {!! Form::select('degree_urgency', array('1'=>'1','2'=>'2','3'=>'3') , null,
                                        ['class'=>'form-control'])!!}
                                        @error('degree_urgency')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        {!! Form::label('error_code', __('Type of failure').':',['class'=>'label_padding']) !!}
                                        {!! Form::select('error_code', array('Electrique'=>'Electrique','Mecanique'=>'Mecanique',
                                        'Hydraulique'=>'Hydraulique','Electronique'=>'Electronique','Compression'=>'Compression') , null,
                                        ['class'=>'form-control'])!!}
                                        @error('error_code')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        {!! Form::label('created_at', __('Date of creation').':',['class'=>'label_padding']) !!}
                                        <input id="created_at" type="datetime-local"
                                               placeholder="yyyy-mm-dd hh:mm:ss"
                                               class="form-control @error('created_at')  is-invalid @enderror"
                                               name="created_at"
                                               value="{{ old('created_at') }}" required autocomplete="created_at">
                                        @error('created_at')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        {!! Form::label('equipment', __('Select an equipment').':',['class'=>'label_padding']) !!}
                                        {!! Form::select('equipment', $equips , null,
                                        ['class'=>'form-control','onchange="change_code()"','placeholder'=>__('Select an equipment')])!!}
                                        @error('equipment')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group" id="equipment_id_code" style="display: none">
                                        {!! Form::label('equipment_id', __('Select the equipment code').':',['class'=>'label_padding']) !!}
                                        {!! Form::select('equipment_id',[], null,
                                        ['class'=>'form-control', 'id'=>'equipment_id'])!!}
                                        @error('equipment_id')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('description', 'Description:',['class'=>'label_padding']) !!}
                                <textarea class="form-control" id="description" required name="description" autocomplete="description"
                                          placeholder="{{__('Enter a description')}}" ></textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row">
                                <div id="submit-btn" class="ml-auto">
                                    <button class="btn btn-general btn-yellow" type="submit" title="Submit"
                                            role="button">
                                        {{__('Create')}}
                                    </button>
                                </div>
                            </div>

                            {!! Form::close() !!}

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>
    <!--  Add Request Ends -->

    <script>


        $(window).on('load', function () { // makes sure that whole site is loaded
            if ($("select[name='equipment']").val()) {
                change_code();
            }
        });

        function change_code() {
            $.ajax({
                type: 'post',
                url: '/{{app()->getLocale()}}/getequipment',
                data: {name: $("select[name='equipment']").val(), _token: '{{csrf_token()}}'},
                success: function (data) {
                    $("#equipment_id_code").show();
                    $("#equipment_id").children().remove();
                    for (var i = 0; i < data.msg.length; i++) {
                        $("#equipment_id").append('<option value=' + data.msg[i].equipment_id + ' >' + data.msg[i].code + '</option>');//.val(data.msg[i].equipment_id);
                    }

                }
            })
        }


    </script>

@endsection
