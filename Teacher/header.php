<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
  <a class="navbar-brand" href="javascript:void(0)"><img class="rounded-circle float-left" src="img/<?php echo $t['img'];?>" style="width:45px;height:40px;"></a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navb">
    <ul class="navbar-nav mr-auto">
       <li class="nav-item dropdown">
      <a class="nav-link" href="#" id="navbardrop" data-toggle="dropdown">
      Welcome, <?php echo $t['f_name']." ".$t['l_name'];?>
        
      </a>
      
    </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      	<div  class="form-group has-search">
						<span class="fa fa-search form-control-feedback"></span>
						<input  name="q" type="search " class="form-control" placeholder="Search...." style="border-radius:20px;border-style:none">
					</div>
					<a class="navbar" href="logout.php" style="padding-left:20px;color:white;"><i class="fa fa-fw fa-lock"></i>Logout</a>
    </form>
  </div>
</nav>