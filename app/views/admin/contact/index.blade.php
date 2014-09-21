@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')

<style type="text/css">
    #contact-lookup .control-label {
        text-align: left
    }
    .contact-types .btn:hover {
        background-position: 0px !important;
    }
    .table-responsive
    {
        overflow-x: auto;
    }
    @-moz-document url-prefix() {
        fieldset { display: table-cell; }
    }
</style>

<nav class="navbar navbar-inverse hidden-md hidden-lg" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Account Types</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav contact-types">
                <li><a href="{{{ URL::to('admin/contacts/?type=1') }}}" class=""><span
                            class="glyphicon glyphicon-search"></span> My RSC Accounts</a></li>
                <li><a href="{{{ URL::to('admin/contacts/?type=2') }}}" class=""><span
                            class="glyphicon glyphicon-search"></span> My DSC Accounts</a></li>
                <li><a href="{{{ URL::to('admin/contacts/?type=3') }}}" class=""><span
                            class="glyphicon glyphicon-search"></span> My Accounts</a></li>
                <li><a href="{{{ URL::to('admin/contacts/?type=4') }}}" class=""><span
                            class="glyphicon glyphicon-search"></span> My Leads</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<div class="page-header">
    <h3>
        {{{ $title }}}


        <div class="pull-right hidden-xs hidden-sm">
            <ul class="nav nav-pills contact-types">
                <li><a href="{{{ URL::to('admin/contacts/?type=1') }}}" class="btn btn-small btn-info "><span
                            class="glyphicon glyphicon-search"></span> My RSC Accounts</a></li>
                <li><a href="{{{ URL::to('admin/contacts/?type=2') }}}" class="btn btn-small btn-info "><span
                            class="glyphicon glyphicon-search"></span> My DSC Accounts</a></li>
                <li><a href="{{{ URL::to('admin/contacts/?type=3') }}}" class="btn btn-small btn-info "><span
                            class="glyphicon glyphicon-search"></span> My Accounts</a></li>
                <li><a href="{{{ URL::to('admin/contacts/?type=4') }}}" class="btn btn-small btn-info"><span
                            class="glyphicon glyphicon-search"></span> My Leads</a></li>
            </ul>


        </div>
    </h3>
</div>
<a href="" class="filter">Advanced Filter</a>
<div id="contact_filter" class="container  ">
    <div class="col-md-12">
        <form class="form-horizontal" role="form" id="contact-lookup">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="company" class="col-md-4 control-label">Company</label>

                        <div class="col-md-8">
                            <input type="text" class="form-control" id="company" placeholder="Company" name="company">
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label for="contact_first" class="col-sm-4 control-label">First Name</label>

                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="contact_first" placeholder="First Name"
                                   name="contact_first">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="contact_last" class="col-sm-4 control-label">Last Name</label>

                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="contact_last" placeholder="Last Name"
                                   name="contact_last">
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="city" class="col-sm-4 control-label">City</label>

                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="city" placeholder="City" name="city">
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="zip_code" class="col-sm-4 control-label">Zip Code</label>

                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="zip_code" placeholder="Zip Code"
                                   name="zip_code">
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="county" class="col-sm-4 control-label">Country</label>

                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="county" placeholder="Country" name="county">
                        </div>
                    </div>
                </div>


            </div>
            <div class="row">


                <div class="col-md-4">
                    <div class="form-group">
                        <label for="account" class="col-sm-4 control-label"> Account #</label>

                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="account" placeholder="Account #" name="account">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="phone" class="col-sm-4 control-label">Phone #</label>

                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="phone" placeholder="Phone #" name="phone">
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="state" class="col-sm-4 control-label">State</label>

                        <div class="col-sm-8">
                            <!-- <select name="state" id="state" class="form-control">
                                 <option>Select</option>
                             </select>-->
                            {{ Form::select('state', $states , Input::old('state')) }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <div class="col-md-1">
                        <label for="account" class="control-label">Type</label>
                    </div>
                    <div class="col-md-1 ">
                        <label class="checkbox-inline">
                            <input type="checkbox" id="inlineCheckbox1" value="1" name="type"> Accounts
                        </label>
                    </div>

                    <div class="col-md-2">
                        <label class="checkbox-inline">
                            <input type="checkbox" id="inlineCheckbox1" value="1" name="type"> Account Leads
                        </label>
                    </div>

                    <div class="col-md-2">
                        <label class="checkbox-inline">
                            <input type="checkbox" id="inlineCheckbox1" value="1" name="type"> Recruit Leads
                        </label>
                    </div>

                    <div class="col-md-1">
                        <label class="checkbox-inline">
                            <input type="checkbox" id="inlineCheckbox1" value="1" name="type"> Public
                        </label>
                    </div>

                    <div class="col-md-1 ">
                        <label class="checkbox-inline">
                            <input type="checkbox" id="inlineCheckbox1" value="1" name="type"> Private
                        </label>
                    </div>

                    <div class="col-md-1 ">
                        <label class="checkbox-inline">
                            <input type="checkbox" id="inlineCheckbox1" value="1" name="type"> MLA
                        </label>
                    </div>
                    <div class="col-md-2 ">
                        <label class="checkbox-inline">
                            <input type="checkbox" id="inlineCheckbox1" value="1" name="type"> Out of Accounts
                        </label>
                    </div>
                    <div class="col-md-1 ">
                        <label class="checkbox-inline">
                            <input type="checkbox" id="inlineCheckbox1" value="1" name="type"> Inactive
                        </label>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <button type="submit" class="btn btn-info col-md-2 pull-right">Lookup</button>

                </div>

            </div>
        </form>
    </div>

</div>
<hr/>
<div class="table-responsive">
    <table id="contacts" class="table table-striped table-hover table-condensed">
        <thead>
        <tr>
            <th class="col-md-2">Company</th>
            <th class="col-md-2">Contact Name</th>
            <th class="col-md-2">Account #</th>
            <th class="col-md-2">Address</th>
            <th class="col-md-2">City</th>
            <th class="col-md-2">State</th>
            <th class="col-md-2">Country</th>
            <th class="col-md-2">Type</th>
            <th class="col-md-2">Actions</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
@stop

{{-- Scripts --}}
@section('scripts')
<script type="text/javascript">
    var oTable;
    $(document).ready(function () {
        $("#contact_filter").hide();
        $("a.filter").click(function (e) {
            e.preventDefault();
            $("#contact_filter").toggle(300);
        });

        //datatable
        oTable = $('#contacts').dataTable({
            "sDom": "<'row'r>t<'row'<'col-md-3'i><'col-md-3 dataTables_info'l><'col-md-6'p>>",
            "sPaginationType": "bootstrap",
            "bAutoWidth": false,
            aoColumns: [
                { "sWidth": "17%"},
                { "sWidth": "12%"},
                { "sWidth": "7%"},
                { "sWidth": "20%"},
                { "sWidth": "10%"},
                { "sWidth": "5%"},
                { "sWidth": "10%"},
                { "sWidth": "10%"},
                { "sWidth": "9%"}
            ],
            "oLanguage": {
                "sLengthMenu": "_MENU_ records per page"
            },
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "{{ URL::to('admin/contacts/data') }}",
            "fnServerParams": function (aoData) {
                var query = window.location.search.substring(1);
                var vars = query.split("&");
                for (var i = 0; i < vars.length; i++) {
                    var pair = vars[i].split("=");
                    aoData.push({ "name": pair[0], "value": pair[1]});
                }

            },
            "fnDrawCallback": function (oSettings) {
                $(".iframe").colorbox({iframe: true, width: "80%", height: "80%"});
            }
        })
        ;
    })
    ;
</script>
@stop