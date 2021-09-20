
        <style>
            .has-search .form-control {
                padding-left: 2.375rem;
            }
            .has-search .form-control-feedback {
                position: absolute;
                z-index: 2;
                display: block;
                width: 2.375rem;
                height: 2.375rem;
                line-height: 2.375rem;
                text-align: center;

                color: #aaa;
            }
            .has-search .form-control-feedback1 {
                position: absolute;
                z-index: 2;
                display: block;
                width: 3.375rem;
                height: 2.375rem;
                line-height: 2.375rem;
                text-align: center;
                font-size: 30px;
                color: red;
                margin-top: 30px;
            }
        </style>   
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary" >
  <a class="navbar-brand" href="javascript:void(0)"><img class="rounded-circle float-left" src="img/self_image.png" style="width:45px;"></a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navb">
    <ul class="navbar-nav mr-auto">
       <li class="nav-item dropdown">
      <a class="nav-link" href="#" id="navbardrop" data-toggle="dropdown">
       Welcome, Admin</a>
        <!--<i class="fa fa-align-justify"></i>
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Link 1</a>
        <a class="dropdown-item" href="#">Link 2</a>
        <a class="dropdown-item" href="#">Link 3</a>
      </div>-->
    </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      	<div  class="form-group has-search">
						<span class="fa fa-search form-control-feedback"></span>
						<input  name="q" type="search " class="form-control" placeholder="Search...." style="border-radius:20px;border-style:none">
					</div>
					<a href="logout.php" class="navbar" style="padding-left:20px;color:white;"><i class="fa fa-fw fa-lock"></i>Logout</a>
    </form>
  </div>
</nav>