<?php
    $temp = __('Equipments');
    if(isset($_COOKIE['equip']))
        $temp = $_COOKIE['equip'];
    if(substr($temp, -1) === 's')
        $temp = substr($temp, 0, -1);
    if($temp === "Groupes Electronique")
        $temp = "Groupe Electronique";

?>

@extends('layouts.base')
@section('title', __('Edit')." ".$temp)
@section('content')
    <!-- Edit Equipment -->

    <br>
    <section id="edit-equipment">

        <div class="content-box-md">

            <div class="container">


                <div class="row" style="display:{!! $errors->hasBag('components') ? 'inline;' : 'none;' !!}">
                    <div class="alert alert-danger" role = "alert">
                        {{__('component not added, make sure that the reference is unique.')}}
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-6 col-md-12 mrgn-bottom">

                        <div class="contact-right">
                            {!! Form::model($equipment, ['method'=>'PUT', 'action'=> ['EquipmentController@update', $equipment->id]]) !!}
                            @csrf
                            <h4>{{ __('Edit')." ".$temp }}</h4>
                            <br><br>


                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        {!! Form::label('code', 'Code:',['class'=>'label_padding']) !!}
                                        {!! Form::text('code', old('code'), ['class'=> $errors->get('code') ? 'form-control is-invalid' : 'form-control']) !!}
                                        @error('code')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        {!! Form::label('type', 'Type:',['class'=>'label_padding']) !!}
                                        {!! Form::text('type', old('type'), ['class'=> $errors->get('type') ? 'form-control is-invalid' : 'form-control']) !!}
                                        @error('type')
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
                                        {!! Form::label('mark', ucfirst(__('mark')).":",['class'=>'label_padding']) !!}
                                        {!! Form::text('mark', old('mark'), ['class'=> $errors->get('mark') ? 'form-control is-invalid' : 'form-control']) !!}
                                        @error('mark')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        {!! Form::label('model', ucfirst(__('model')).":",['class'=>'label_padding']) !!}
                                        {!! Form::text('model', old('model'), ['class'=> $errors->get('model') ? 'form-control is-invalid' : 'form-control']) !!}
                                        @error('model')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @if($temp != 'Generator' && $temp != 'Groupe Electronique')
                                @if($temp == 'Pump' || $temp == 'Loading Arm' || $temp == 'Pompe' || $temp == 'Bras de Chargement')
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                {!! Form::label('product', ucfirst(__('product')).":",['class'=>'label_padding']) !!}
                                                {!! Form::text(($temp == 'Pump' || $temp == 'Pompe') ? 'pump[product]' : 'loading_arm[product]',
                                                               ($temp == 'Pump' || $temp == 'Pompe') ? old('pump[product]') : old('loading_arm[product]'),
                                                               ['class'=> (($temp == 'Pump' || $temp == 'Pompe') && $errors->get('pump[product]')) ||
                                                                (($temp == 'Loading Arm' || $temp == 'Bras de Chargement') && $errors->get('loading_arm[product]'))
                                                               ? 'form-control is-invalid' : 'form-control']) !!}
                                                @error('pump[product]' || 'loading_arm[product]')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                {!! Form::label('rate', ucfirst(__('rate')).":",['class'=>'label_padding']) !!}
                                                {!! Form::number(($temp == 'Pump' || $temp == 'Pompe') ? 'pump[rate]' : 'loading_arm[rate]',
                                                                ($temp == 'Pump' || $temp == 'Pompe') ? old('pump[rate]') : old('loading_arm[rate]'),
                                                                ['class'=> (($temp == 'Pump' || $temp == 'Pompe') && $errors->get('pump[rate]')) ||
                                                                (($temp == 'Loading Arm' || $temp == 'Bras de Chargement') && $errors->get('loading_arm[rate]'))
                                                               ? 'form-control is-invalid' : 'form-control']) !!}
                                                @error('pump[rate]' || 'loading_arm[rate]')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                @elseif($temp == 'Tank' || $temp == 'Bac')
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                {!! Form::label('product', ucfirst(__('product')).":",['class'=>'label_padding']) !!}
                                                {!! Form::text('tank[product]', old('tank[product]'), ['class'=> $errors->get('tank[product]') ? 'form-control is-invalid' : 'form-control']) !!}
                                                @error('tank[product]')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                {!! Form::label('capacity', ucfirst(__('capacity')).":",['class'=>'label_padding']) !!}
                                                {!! Form::number('tank[capacity]', old('tank[capacity]'), ['class'=> $errors->get('tank[capacity]') ? 'form-control is-invalid' : 'form-control']) !!}
                                                @error('tank[capacity]')
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
                                                {!! Form::label('height', ucfirst(__('height')).":",['class'=>'label_padding']) !!}
                                                {!! Form::number('tank[height]', old('tank[height]'), ['class'=> $errors->get('tank[height]') ? 'form-control is-invalid' : 'form-control']) !!}
                                                @error('tank[height]')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                {!! Form::label('diameter', ucfirst(__('diameter')).":",['class'=>'label_padding']) !!}
                                                {!! Form::number('tank[diameter]', old('tank[diameter]'), ['class'=> $errors->get('tank[diameter]') ? 'form-control is-invalid' : 'form-control']) !!}
                                                @error('tank[diameter]')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                {!! Form::label('category', ucfirst(__('category')).":",['class'=>'label_padding']) !!}
                                                {!! Form::text('fuel_meter[category]', old('fuel_meter[category]'), ['class'=> $errors->get('fuel_meter[category]') ? 'form-control is-invalid' : 'form-control']) !!}
                                                @error('fuel_meter[category]')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												{!! Form::label('state', ucfirst(__('state')).":",['class'=>'label_padding']) !!}
												{!! Form::select('state',  ['ON' => 'Active', 'OFF' => 'Not Active'], null, ['class'=>'form-control'])!!}
												@error('state')
												<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                        </div>
                                    </div>
                                @endif
                            @endif
							@if($temp != 'Fuel Meter' && $temp != 'Compteur')
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        {!! Form::label('state', ucfirst(__('state')).":",['class'=>'label_padding']) !!}
                                        {!! Form::select('state',  ['ON' => 'Active', 'OFF' => 'Not Active'], null, ['class'=>'form-control'])!!}
                                        @error('state')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                </div>
                            </div>
							@endif
                            <div class="row">
                                <div id="submit-btn" class="ml-auto edit-act">
                                    <button class="btn btn-danger btn-general" data-toggle="modal" data-target="#DeleteEquipModal" role="button" onclick="return false;">{{__('Delete')." ".$temp}}</button>
                                    <button class="btn btn-yellow btn-general" type="submit"  title="Submit" role="button">{{__('Edit')." ".$temp}}</button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                        <!--                        </form>-->

                            <div class="row">
                                <div id="submit-btn" class="ml-auto" style="margin-top:5px;">

                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="contact-right">
                            <h4>{{__('Components').":"}}</h4>
                            <hr>
							<div class="component-list">
                            @foreach($components as $component)
                                    <div class="card mb-3 component-item">
                                        <div class="card-header yellow-bg">
                                            <em>{{$component->designation}}</em>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">
                                                <b>{{__('reference').":"}}</b> {{$component->reference}}<br>
                                                <b>{{__('mark').":"}}</b> {{$component->mark}}
                                            </p>
                                            <div class="comp-actions">
                                                {!! Form::open(['method'=>'GET', 'action'=> ['ComponentController@edit', $component->id]]) !!}
                                                    <button class="component-edit" type="submit" role="button">{{__('Edit')}}</button>
                                                {!! Form::close() !!}
                                                <button class="component-del" data-toggle="modal" data-target="#DeleteCompModal" data-comp-id="{{$component->id}}" role="button">{{__('Delete')}}</button>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
							</div>
							<div style="text-align: right;">
								<button class="btn btn-yellow btn-general" data-toggle="modal" data-target="#ComponentModal" role="button">{{__('Add')." ".ucfirst(__('component'))}}</button>
							</div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div class="modal fade" id="ComponentModal" tabindex="-1" role="dialog" aria-labelledby="addComponent" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addComponent">{{__('Add')." ".__('new')." ".__('component')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {!! Form::open(['method'=>'POST', 'action'=> 'ComponentController@store']) !!}
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="hidden" name="equipment" value="{{$equipment->id}}"/>
                                    {!! Form::label('designation', ucfirst(__('designation')).":",['class'=>'label_padding']) !!}
                                    <input id="designation" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ old('designation') }}" required autocomplete="designation" placeholder="Designation">
                                    @error('designation')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('mark', ucfirst(__('mark')).":",['class'=>'label_padding']) !!}
                                    <input id="mark" type="text" class="form-control @error('mark') is-invalid @enderror" name="mark" required autocomplete="mark" placeholder="{{ucfirst(__('mark'))}}">
                                    @error('mark')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('reference', ucfirst(__('reference')).":",['class'=>'label_padding']) !!}
                                    <input id="reference" type="text" class="form-control @error('reference') is-invalid @enderror" name="reference" value="{{ old('reference') }}" required autocomplete="reference" placeholder="{{ucfirst(__('reference'))}}">
                                    @error('reference')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('commissioned_on', ucfirst(__('commissioned on')).":",['class'=>'label_padding']) !!}
                                    <input id="commissioned_on" type="date" class="form-control" name="commissioned_on" required autocomplete="commissioned_on">
                                    @error('commissioned_on')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-general" data-dismiss="modal">{{__('Close')}}</button>
                        <button type="submit" class="btn btn-yellow btn-general">{{__('Add')." ".__('component')}}</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>


        <div class="modal fade" id="DeleteEquipModal" tabindex="-1" role="dialog" aria-labelledby="DeleteEquipment" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="DeleteEquipment">{{__('Are you sure you want to delete this equipment?')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {!! Form::open(['method'=>'DELETE', 'action'=> ['EquipmentController@destroy', $equipment->id]]) !!}
                    @csrf
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-general" data-dismiss="modal">{{__('Close')}}</button>
                        <button type="submit" class="btn btn-danger btn-general">{{__('Delete')." ".__('equipment')}}</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>


        <div class="modal fade" id="DeleteCompModal" tabindex="-1" role="dialog" aria-labelledby="DeleteComponent" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content component-del-2">
                    <div class="modal-header">
                        <h5 class="modal-title" id="DeleteComponent">{{__('Are you sure you want to delete this component?')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE"/>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-general" data-dismiss="modal">{{__("Close")}}</button>
                            <button type="submit" class="btn btn-danger btn-general">{{__('Delete')." ".__('component')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function($) {
            $(document).on("click", ".component-del", function () {
                let Id = $(this).data('comp-id');
                $(".component-del-2 form").attr('action', '/en/components/' + Id);
            });
        });
    </script>
    <!-- Edit Equipment Ends -->
@endsection
