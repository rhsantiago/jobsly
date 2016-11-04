<?php
        $isOpaque = 'navbar-color';
        $isDashboard = false;
        $page = 'none';
        $page = $_GET["page"];
        if($page=='main')
        {
            $isOpaque = 'navbar-isopaque';
            $isDashboard = true;
        }
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
			<nav class="navbar navbar-default navbar-fixed-top  <?=$isOpaque ?>" role="navigation">
				<div class="navbar-header">
					 
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button> <a class="navbar-brand logo logomain" href="#">jobsly</a>
                   
    <?php
    if($isDashboard){
        ?>
<button onclick="openNav()" class="btn btn-sm btn-primary btn-custom"><span class="glyphicon glyphicon-indent-left"></span> Menu</button>
    <?php
    }
    ?>
                    
				</div>
				 <?php
                    if($isDashboard){
                        ?>
                                <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav">
                                        <li class="active">
                                            <a href="#">Link</a>
                                        </li>
                                        <li>
                                            <a href="#">Link</a>
                                        </li>					
                                    </ul>
                                </div>
				 <?php
                    }
                    ?>
			</nav>
		</div>
	</div>
</div>