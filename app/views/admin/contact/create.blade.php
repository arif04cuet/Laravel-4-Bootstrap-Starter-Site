@extends('admin.layouts.default')

{{-- Content --}}
@section('content')
<div class="page-header">
    <h3>
        {{{ $title }}}
    </h3>
</div>
{{ HTML::ul($errors->all()) }}
<div id="create_contact" class="container  ">
<div class="col-md-12">
{{ Form::open(array('url' => 'admin/contacts/store','class'=>'form-horizontal','method'=>'POST')) }}
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <!--<label for="company" class="col-md-4 control-label">Company</label>-->
            {{ Form::label('Company', 'Company',array('class'=>'col-md-4 control-label')) }}
            <div class="col-md-8">
                {{ Form::text('company', Input::old('company'), array('class' => 'form-control','required')) }}
            </div>
        </div>
    </div>


    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('First Name', 'First Name',array('class'=>'col-md-4 control-label')) }}
            <div class="col-sm-8">
                {{ Form::text('contact_first', Input::old('contact_first'), array('class' =>
                'form-control','required')) }}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('Last Name', 'Last Name',array('class'=>'col-md-4 control-label')) }}
            <div class="col-sm-8">
                {{ Form::text('contact_last', Input::old('contact_last'), array('class' =>
                'form-control','required'))}}
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('City', 'City',array('class'=>'col-md-4 control-label')) }}
            <div class="col-sm-8">
                {{ Form::text('city', Input::old('city'), array('class' => 'form-control','required'))}}
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('Zip Code', 'Zip Code',array('class'=>'col-md-4 control-label')) }}
            <div class="col-sm-8">
                {{ Form::text('zip_code', Input::old('zip_code'), array('class' => 'form-control','required'))}}
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('Country', 'Country',array('class'=>'col-md-4 control-label')) }}
            <div class="col-sm-8">
                {{ Form::text('county', Input::old('county'), array('class' => 'form-control'))}}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('Email', 'Email',array('class'=>'col-md-4 control-label')) }}
            <div class="col-sm-8">
                {{ Form::email('email', Input::old('email'), array('class' => 'form-control','required'))}}
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('Skype Username', 'Skype Username',array('class'=>'col-md-4 control-label')) }}
            <div class="col-sm-8">
                {{ Form::text('voip_username', Input::old('voip_username'), array('class' => 'form-control'))}}
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('Website', 'Website',array('class'=>'col-md-4 control-label')) }}
            <div class="col-sm-8">
                {{ Form::url('website', Input::old('website'), array('class' => 'form-control'))}}
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('Writing Number', 'Writing Number',array('class'=>'col-md-4 control-label')) }}
            <div class="col-sm-8">
                {{ Form::text('writing', Input::old('writing'), array('class' => 'form-control','required'))}}
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('Title', 'Title',array('class'=>'col-md-4 control-label')) }}
            <div class="col-sm-8">
                {{ Form::text('title', Input::old('title'), array('class' => 'form-control','required'))}}
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('Department', 'Department',array('class'=>'col-md-4 control-label')) }}
            <div class="col-sm-8">
                {{ Form::text('department', Input::old('department'), array('class' => 'form-control'))}}
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('Toll Free Phone #', 'Tool Free Phone #',array('class'=>'col-md-4 control-label')) }}
            <div class="col-sm-8">
                {{ Form::text('toll_free_phone', Input::old('toll_free_phone'), array('class' => 'form-control'))}}
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('Mobile Phone #', 'Mobile Phone #',array('class'=>'col-md-4 control-label')) }}
            <div class="col-sm-8">
                {{ Form::text('mobile_phone', Input::old('mobile_phone'), array('class' => 'form-control'))}}
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('Fax #', 'Fax #',array('class'=>'col-md-4 control-label')) }}
            <div class="col-sm-8">
                {{ Form::text('fax', Input::old('fax'), array('class' => 'form-control','required'))}}
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('Phone #', 'Phone #',array('class'=>'col-md-4 control-label')) }}
            <div class="col-sm-8">
                {{ Form::text('phone', Input::old('phone'), array('class' => 'form-control','required'))}}
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('State', 'State',array('class'=>'col-md-4 control-label')) }}
            <div class="col-sm-8">
                {{ Form::select('state', $states , Input::old('state'),array('class' => 'form-control','required')) }}
            </div>
        </div>
    </div>


    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('Toll Free Fax #', 'Tool Free Fax #',array('class'=>'col-md-4 control-label')) }}
            <div class="col-sm-8">
                {{ Form::text('toll_free_fax', Input::old('toll_free_fax'), array('class' => 'form-control'))}}
            </div>
        </div>
    </div>
</div>

<div class="row">


    <!--    <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('Account #', 'Account #',array('class'=>'col-md-4 control-label','required')) }}
                <div class="col-sm-8">
                    {{ Form::text('account', Input::old('account'), array('class' => 'form-control'))}}
                </div>
            </div>
        </div>-->

    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('Birthday', 'Birthday',array('class'=>'col-md-4 control-label')) }}
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-md-6">
                        {{ Form::select('birth_day',$day,Input::old('birth_day'), array('class' => 'form-control
                        col-md-4')) }}
                    </div>
                    <div class="col-md-6">{{ Form::select('birth_month', $month, Input::old('birth_month'),
                        array('class'
                        => 'form-control col-md-4')) }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('Type', 'Type',array('class'=>'col-md-4 control-label')) }}
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-md-4">
                        {{ Form::select('start_day',$day,Input::old('start_day'), array('class' => 'form-control
                        col-md-4')) }}
                    </div>
                    <div class="col-md-4">{{ Form::select('start_month', $month, Input::old('start_month'),
                        array('class'
                        => 'form-control col-md-4')) }}
                    </div>
                    <div class="col-md-4">{{ Form::select('start_year', $years, Input::old('start_year'),
                        array('class'
                        => 'form-control col-md-4')) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $type = $contact->getTypes(); ?>
    <div class="col-md-4">
        <div class="form-group">
            {{ Form::label('Type', 'Type',array('class'=>'col-md-4 control-label')) }}
            <div class="col-sm-8">
                {{ Form::select('type', $type, Input::old('type'),
                array('class' => 'form-control col-md-4')) }}
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        {{ Form::submit('Create Contact', array('class' => 'btn btn-info col-md-2 pull-right')) }}
    </div>

</div>
{{ Form::close() }}
</div>

</div>
@stop
