<!DOCTYPE html>
<?php
error_reporting(0);
$dbh = new PDO('mysql:host=localhost;dbname=leshi', "leshi", "vidagdi");

$query = <<<QUERY
select l.user_id, l.bonus_no, l.create_time, l.is_exchanged, u.user_name, u.mobile from fanwe_scratch_bonus l join fanwe_user u on u.id = l.user_id
QUERY;
$statement = $dbh->prepare($query);
$statement->execute();
$list = $statement->fetchAll();
?>
<html lang="en">

<head>
    <meta name="renderer" content="webkit">
    <!-- Force latest IE rendering engine or ChromeFrame if installed -->
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" charset="utf-8"><![endif]-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>M平台商家管理系统</title>

    <!-- Bootstrap Core CSS -->
    <link href="http://m.m-ebuy.com/assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="http://m.m-ebuy.com/assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="http://m.m-ebuy.com/assets/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="http://m.m-ebuy.com/assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="http://m.m-ebuy.com/assets/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://m.m-ebuy.com/assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://m.m-ebuy.com/assets/js/html5shiv.js"></script>
    <script src="http://m.m-ebuy.com/assets/js/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="http://m.m-ebuy.com/assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="http://apps.bdimg.com/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="http://apps.bdimg.com/libs/jqueryui/1.9.2/themes/vader/jquery-ui.css">
    <script src="http://m.m-ebuy.com/assets/js/validator.js"></script>
    <script src="http://m.m-ebuy.com/assets/js/jquery.dataTables.min.js"></script>
    <link href="http://m.m-ebuy.com/assets/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="http://m.m-ebuy.com/assets/js/jquery.browser.js"></script>
    <script src="http://m.m-ebuy.com/assets/js/jquery.fancybox.js"></script>
    <link href="http://m.m-ebuy.com/assets/css/jquery.fancybox.css" rel="stylesheet">
    <script src="http://m.m-ebuy.com/assets/js/jquery-birthday-picker.js"></script>
    <script>
        function getCookie(c_name) {
            if (document.cookie.length > 0) {
                c_start = document.cookie.indexOf(c_name + "=");
                if (c_start != -1) {
                    c_start = c_start + c_name.length + 1;
                    c_end = document.cookie.indexOf(";", c_start);
                    if (c_end == -1) {
                        c_end = document.cookie.length;
                    }
                    return unescape(document.cookie.substring(c_start, c_end));
                }
            }
            return "";
        }

    </script>
    <script>
        $(document).ready(function() {
            $('.dataTable').DataTable( {
                "language": {
                    "lengthMenu": "每页显示 _MENU_ 条纪录",
                    "zeroRecords": "没有数据",
                    "info": "当前 第 _PAGE_ 页，共 _PAGES_ 页",
                    "infoEmpty": "没有数据",
                    "infoFiltered": "(过滤总数为 _MAX_ 纪录)",
                    "paginate": {
                        "first":      "首页",
                        "last":       "尾页",
                        "next":       "下一页",
                        "previous":   "上一页"
                    },
                    "search": "搜索："
                }
            } );
        } );
        $(".fancybox").fancybox({
            'width': '75%',
            'height'	: '75%',
            'autoScale'  : false,
            'transitionIn'  : 'none',
            'transitionOut'  : 'none',
            'type'  : 'iframe'
        });
        //$("#birthdayPicker").birthdayPicker();
        //$("input[name=bdate]").keydown(false);
    </script>
</head>

<body>
<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">刮刮卡活动获奖列表</a>
        </div>
        <!-- /.navbar-header -->


    </nav>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">获奖列表</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row" style="display: block;">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-edit fa-fw"></i>
                        <div class="pull-right" style="display: ;">
                            <div class="btn-group" style="display: none;">
                                <a href="http://m.m-ebuy.com/index.php/report/member_action">查看更多</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <script>
                        var exchange = function (uid) {
                            $.ajax({
                                type:'post',
                                data: {
                                    'uid': uid,
                                    'type': 'exchange'
                                },
                                url: 'http://m-ebuy.com/scratch_ajax.php',
                                success: function (response) {
                                    if (response === 'success') {
                                        $('#exchange'+uid).hide();
                                        $('#unexchange'+uid).show();
                                    }
                                }
                            });
                        }
                        var unexchange = function (uid) {
                            $.ajax({
                                type:'post',
                                data: {
                                    'uid': uid,
                                    'type': 'unexchange'
                                },
                                url: 'http://m-ebuy.com/scratch_ajax.php',
                                success: function (response) {
                                    if (response === 'success') {
                                        $('#exchange'+uid).hide();
                                        $('#unexchange'+uid).show();
                                    }
                                }
                            });
                        }
                    </script>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-hover no-footer" >
                            <thead>
                            <tr>
                                <th>用户名</th>
                                <th>用户手机号</th>
                                <th>中奖时间</th>
                                <th>中奖礼品</th>
                                <th>兑换操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($list as $item) { ?>
                                <tr>
                                <td><?=$item['user_name']?></td>
                                <td><?=$item['mobile']?></td>
                                <td><?=$item['create_time']?></td>
                                <td><?=$item['bonus_no']?></td>
                                <td>
                                    <a <?if($item['is_exchanged']=='1') echo "style=\"display:none;\""?>)?> id='exchange<?=$item['user_id']?>' href="javascript:void(0);" onclick="exchange(<?=$item['user_id']?>)">兑换</a>
                                    <a <?if($item['is_exchanged']=='0') echo "style=\"display:none;\""?>)?> id='unexchange<?=$item['user_id']?>' href="javascript:void(0);" onclick="unexchange(<?=$item['user_id']?>)">取消兑换</a>
                                </td>
                            </tr>
                            <?}?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
                <!-- /.panel -->
            </div>
        </div>
    </div>
    <!-- /.row -->
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Bootstrap Core JavaScript -->
<script src="http://m.m-ebuy.com/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="http://m.m-ebuy.com/assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="http://m.m-ebuy.com/assets/bower_components/raphael/raphael-min.js"></script>
<script src="http://m.m-ebuy.com/assets/bower_components/morrisjs/morris.min.js"></script>
<!--<script src="/assets/js/morris-data.js"></script>-->

<!-- Custom Theme JavaScript -->
<script src="http://m.m-ebuy.com/assets/dist/js/sb-admin-2.js"></script>

</body>

</html>
