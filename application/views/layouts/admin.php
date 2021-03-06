<!DOCTYPE html>
<html lang="en">
<?php  
	$this->load->view('meta/head');
    $this->load->module('user');
?>
<head>
    <style type="text/css">
        .modal img{
            position: fixed;
            top: 50%;
            left: 50%;
        }
        .modal{
            background: rgba(54,65,80,.5);
        }
        .active ul{
            background: #003646;
        }
        .side-nav li a:focus, .side-nav ul .active{
            background: #003646 !important;
        } 
    </style>
</head>
<body>
    <div id="wrapper" class="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <span class="navbar-brand">
                    <a href="javascript:;" class="menu"><i class="fa fa-list"></i></a>
                    <span style="color:#fff">Bimb</span><span style="color:#046380;font-weight:bold">OL</span></span>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <!-- <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope-o"></i></span> <span class="badge">1</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell-o"></i></span><span class="badge">2</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li> -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->session->userdata('u_nicename'); ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#" class='profile' data-uid="<?php echo $this->session->userdata('uid'); ?>"><i class="fa fa-user"></i>&nbsp Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url() ?>user/log_out"><i class="fa fa-power-off"></i>&nbsp Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li data-module="statistic" data-title="Dashboard" class="link">
                        <a href="javascript:;"><i class="fa fa-dashboard"></i>&nbsp <span>Dashboard</span></a>
                    </li>
                    <?php  
                    if ($this->session->userdata('u_level') == 1) {
                        ?>
                        <li data-module="user" data-title="User" class="link">
                            <a href="javascript:;"><i class="fa fa-user"></i>&nbsp <span>User</span></a>
                        </li>
                        <li  data-module="dosen" data-title="Dosen" class="link">
                            <a href="javascript:;"><i class="fa fa-users"></i>&nbsp <span>Dosen</span></a>
                        </li>
                        <?php
                    }
                    ?>
                        <li data-module="mahasiswa" data-title="Mahasiswa" class="link">
                            <a href="javascript:;" ><i class="fa fa-graduation-cap"></i>&nbsp <span>Mahasiswa</span></a>
                        </li>
                    <li  data-module="jadwal" data-title="Jadwal" class="link">
                        <a href="javascript:;"><i class="fa fa-calendar"></i>&nbsp <span>Jadwal</span></a>
                    </li>
                    <!-- <li data-module="bimbingan" data-title="Bimbingan" class="link">
                        <a href="javascript:;"><i class="fa fa-calendar"></i>&nbsp <span>Bimbingan</span></a>
                    </li> -->
                    <!-- <li class="colapse drop">
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo">
                            <i class="fa fa-calendar"></i>
                            &nbsp <span>Jadwal</span> 
                            <span style="float:right" class="text-right">
                                <i class="fa fa-fw fa-caret-down"></i>
                            </span>
                        </a>
                        <ul id="demo" class="collapse">
                            <li data-module="jadwal" data-title="Jadwal" class="link">
                                <a href="#">&nbsp<span>List</span></a>
                            </li>
                            <li data-module="jadwal/setting" data-title="Jadwal" class="link">
                                <a href="#">&nbsp<span>Setting</span></a>
                            </li>
                        </ul>
                    </li> -->
                    <?php  
                    if ($this->session->userdata('u_level')!= 1) {
                        ?>
                        <li data-module="bimbingan" data-title="Bimbingan" class="link">
                            <a href="javascript:;"><i class="fa fa-rss"></i>&nbsp <span>Bimbingan</span></a>
                        </li>
                        <?php
                    }

                    if ($this->session->userdata('u_level')== 3) {
                        ?>
                        <li data-module="bimbingan/kmn_pengumuman" data-title="Bimbingan" class="link">
                            <a href="javascript:;"><i class="fa fa-bullhorn"></i>&nbsp <span>Pengumuman <small style='color: #7C7C7C'>(dosen)</small></span></a>
                        </li>
                        <?php
                    }
                    ?>

                    <!-- <li class="colapse drop">
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-calendar"></i>&nbsp <span>Bimbingan</span> <span style="float:right" class="text-right"><i class="fa fa-fw fa-caret-down"></i></span></a>
                        <ul id="demo1" class="collapse">
                            <li  data-module="bimbingan" data-title="Bimbingan" class="link">
                                <a href="#">&nbsp<span>Pesan</span></a>
                            </li>
                            <li>
                                <a href="#">&nbsp<span>Broadcast Message</span></a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-calendar"></i>&nbsp Jadwal <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">&nbspGenerate</a>
                            </li>
                            <li>
                                <a href="#">&nbspDropdown Item</a>
                            </li>
                        </ul>
                    </li> -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <div id="page-wrapper">

            <div class="container-fluid">

				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<!-- Page Heading -->
	                <br>
                    <?php  
                    $level = array(
                        '1' => 'Admin' , 
                        '2' => 'Dosen' , 
                        '3' => 'Mahasiswa' , 
                    );
                    if ($this->session->userdata('pass_tmp')) {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <i class="fa fa-warning"></i> Demi keamanan akun anda, harap untuk mengganti password yang diberikan admin, terimakasih !!
                        </div>
                        <br>
                        <?php
                    }
                    ?>
                    <div class="jumbotron group" style="color: #333333 !important">
                        <div class="container">
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <div class="row">
                                    <img src="<?php echo base_url() ?>gudang/polnep.png" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                </div>
                            </div>
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                <blockquote>
                                    <h2>
                                        <?php echo $this->session->userdata('u_nicename'); ?>
                                    </h2>
                                    <h4>
                                        <small><?php echo $level[$this->session->userdata('u_level')] ?></small>
                                    </h4>
                                </blockquote>
                                    <h4>Bimbingan Online</h4>
                                    <a target='_blank' href="https://github.com/agusdiyansyah/ta" class='btn btn-default btn-xs'><i class="fa fa-github"></i> Github</a>
                                    - <small>By : agus Diyansyah</small>
                            </div>
                        </div>
                    </div>

                    <div class="content"></div>   
	                <br>

				</div>
				


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- modal -->

        <!-- loading -->
        <div  class="modal fade text-center" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <img src="<?php echo base_url() ?>gudang/svg/gears.svg">
        </div>

    <!-- end of modal -->
</body>
<script>
    $('.profile').click(function() {
        var id = $(this).data('uid');
        $('.content').load('user/detil/'+id);
        $(".title").html('User');
    });
    $(".link").click(function() {
        var module = $(this).data('module'), title = $(this).data('title');
        
        $(".link").removeClass('active');
        $(this).addClass('active');

        $.ajax({
            url: module,
            cache: false,
            dataType: 'html',
            success: function(html) {
                

                $("#wrapper").css('padding-left', '225px');
                $(".side-nav").css('width', '225px');
                $(".side-nav span").css('display', 'inline-block');
                if (module == 'jadwal') {
                    $(".collapse").removeClass('in');
                    small();
                };
                $(".content").html(html);
                $(".title").html(title);
            }
        })
        .fail(function() {
            alert( "error" );
            console.log("error");
        });
    });
</script>
</html>