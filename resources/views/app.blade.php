<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Ionicons -->
    <link href="{{ asset('css/ionicons.min.css') }}" rel="stylesheet">
    <!-- Sweet Alert -->
    <link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet">
    <!-- Multiselect -->
    <link href="{{ asset('css/multiselect.min.css') }}" rel="stylesheet">
    <!-- Select2 -->
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    <!-- Custom -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <!-- Select2 -->
    <link href="{{ asset('css/SimpleSwitch.css') }}" rel="stylesheet">
    <!-- Theme style -->
    <link href="{{ asset('css/AdminLTE.min.css') }}" rel="stylesheet">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link href="{{ asset('css/_all-skins.min.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="hold-transition skin-purple sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
    @include('partials.header')
    <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
    @include('partials.sidebar')
    <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    @yield('title')
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">@yield('navigation')</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-left">
                                    <h2>@lang('question.list')</h2>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-success" href="">@lang('question.create')</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>@lang('answerScript.course')</strong>
                                <select class="form-control" id="ddlCompany" name="exam_type_id">
                            </div>
                        </div>

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>@lang('question.index')</th>
                                    <th>@lang('question.question_title')</th>
                                    <th>@lang('question.status')</th>
                                    <th width="200px">@lang('question.action')</th>
                                </tr>
                            </thead>
                            <tbody id="tblQuestions">
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('partials.footer')
    </div>
    <!-- ./wrapper -->
</body>

@section('script')
    <!-- jQuery 2.2.3 -->
    <script src="{{ asset('/js/jquery-2.2.3.min.js') }}"></script>
    <!-- jQuery UI -->
    <script src="{{ asset('/js/jquery-1.12.4.js') }}"></script>
    <script src="{{ asset('/js/jquery-ui.js') }}"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('/js/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('/js/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/js/app.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('/js/demo.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <!-- Datepicker -->
    <script src="{{ asset('/js/bootstrap-datepicker.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('/js/select2.full.min.js') }}"></script>
    <!-- Multiselect -->
    <script src="{{ asset('/js/multiselect.min.js') }}"></script>
    <!-- Sweet Alert -->
    <script src="{{ asset('/js/sweetalert-dev.js') }}"></script>
    <!-- Custom -->
    <script src="{{ asset('/js/custom.js') }}"></script>

    <script>

    window.onload = function () {
        var token = {!! json_encode(['csrfToken' => csrf_token(),]) !!}
        console.log(token)
        $.ajax({
            url: "{{ route('loadCompanies') }}",
            method: 'GET',
            data: {_token: token },
            success: function (data) {
                $('#ddlCompany').empty();
                $.each(data.companies, function(key, value) {
                    $('#ddlCompany').append('<option value="'+ key +'">'+ value +'</option>');
                });
            }
        });
    };
    </script>
@show
</html>

<?php 
  function makeSelected($uri = "/") { 
    return strstr(request()->path(), $uri); 
  } 
?>


