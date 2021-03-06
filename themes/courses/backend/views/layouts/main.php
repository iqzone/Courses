<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="es" />
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">    

        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/font-awesome.css" rel="stylesheet">
        
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/base-admin.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/base-admin-responsive.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/pages/dashboard.css" rel="stylesheet">   
        
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo Yii::app()->name ?> - <?php echo Yii::t( 'global', 'administrator') ?></title>
</head>

<body>
    
    <script type="text/javascript">
        var its = {
            vars: { baseURl: '<?php echo Yii::app()->baseUrl; ?>' }
        };
    </script>


<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
                        <?php echo CHtml::link(Yii::t( 'global', 'administrator' ), CHtml::normalizeUrl( array( '/admin/' ) ), array( 'class' => 'brand' ) ) ?>
			
			<div class="nav-collapse">
				<ul class="nav pull-right">
                                        <?php if( ! Yii::app()->user->isGuest ): ?>
					<li class="dropdown">
						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-cog"></i>
							<?php echo Yii::t( 'global', 'settings' ) ?>
							<b class="caret"></b>
						</a>
						
						<ul class="dropdown-menu">
							<li><a href="javascript:;"><?php echo Yii::t( 'global', 'account_settings' ) ?></a></li>
							<li class="divider"></li>
							<li><a href="javascript:;"><?php echo Yii::t( 'global', 'help' ) ?></a></li>
						</ul>
						
					</li>
                                        <?php endif ?>
			
					<li class="dropdown">
                                                <?php if( ! Yii::app()->user->isGuest ): ?>
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-user"></i>
							<?php echo Yii::app()->user->name ?>
							<b class="caret"></b>
						</a>
                                                <?php else: ?>
                                                <a href="<?php echo CHtml::normalizeUrl( array( 'default/login' ) ) ?>">
							<i class="icon-unlock"></i>
							<?php echo Yii::t( 'global', 'login' ) ?>
						</a>
                                                <?php endif ?>
						
						<ul class="dropdown-menu">
							<li><a href="javascript:;"><?php echo Yii::t( 'global', 'my_profile' ) ?></a></li>
							<li><a href="javascript:;"><?php echo Yii::t( 'global', 'my_groups' ) ?></a></li>
							<li class="divider"></li>
							<?php if( ! Yii::app()->user->isGuest ): ?><li><?php echo CHtml::link( Yii::t( 'global', 'logout', array( '{user}' => Yii::app()->user->name ) ), CHtml::normalizeUrl( array( '/site/logout' ) ) ) ?></li><?php endif ?>
						</ul>
						
					</li>
				</ul>
			
				<form class="navbar-search pull-right">
					<input type="text" class="search-query" placeholder="<?php echo Yii::t( 'global', 'search' ) ?>">
				</form>
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->
    



    
<div class="subnavbar">

	<div class="subnavbar-inner">
	
		<div class="container">

			<ul class="mainnav">

				<li class="<?php echo ( $this->getAction()->getController()->id == 'default' ? 'active' : '' ) ?>">
					<a href="<?php echo CHtml::normalizeUrl( array( '/admin/' ) ) ?>">
						<i class="icon-home"></i>
						<span><?php echo Yii::t( 'global', 'homepage' ) ?></span>
					</a>	    				
				</li>
                                
				<li class="<?php echo ( $this->getAction()->getController()->id == 'categories' ? 'active' : '' ) ?>">
                                        <a href="<?php echo CHtml::normalizeUrl( array( '/admin/categories/' ) ) ?>">
						<i class="icon-tags"></i>
						<span><?php echo Yii::t( 'global', 'categories' ) ?></span>
					</a>
				</li>
                                
				<li class="<?php echo ( $this->getAction()->getController()->id == 'courses' ? 'active' : '' ) ?>">
                                        <a href="<?php echo CHtml::normalizeUrl( array( '/admin/courses/' ) ) ?>">
						<i class="icon-book"></i>
						<span><?php echo Yii::t( 'global', 'courses' ) ?></span>
					</a>	    				
				</li>
                                
				<li class="<?php echo ( $this->getAction()->getController()->id == 'students' ? 'active' : '' ) ?>">
					<a href="<?php echo CHtml::normalizeUrl( array( '/admin/students/' ) ) ?>">
						<i class="icon-group"></i>
						<span><?php echo Yii::t( 'global', 'students' ) ?></span>
					</a>	    				
				</li>
                                
				<li class="<?php echo ( $this->getAction()->getController()->id == 'instructors' ? 'active' : '' ) ?>">
					<a href="<?php echo CHtml::normalizeUrl( array( '/admin/instructors/' ) ) ?>">
						<i class="icon-certificate"></i>
						<span><?php echo Yii::t( 'global', 'instructors' ) ?></span>
					</a>	    				
				</li>
				
				<li class="<?php echo ( $this->getAction()->getController()->id == 'payforms' ? 'active' : '' ) ?>">					
					<a href="<?php echo CHtml::normalizeUrl( array( '/admin/payforms/' ) ) ?>" class="dropdown-toggle">
						<i class="icon-credit-card"></i>
						<span><?php echo Yii::t( 'global', 'payform' ) ?></span>
					</a>	  				
				</li>
				
				<li class="<?php echo ( $this->getAction()->getController()->id == 'reports' ? 'active' : '' ) ?>">
					<a href="<?php echo CHtml::normalizeUrl( array( '/admin/reports/' ) ) ?>">
						<i class="icon-bar-chart"></i>
						<span><?php echo Yii::t( 'global', 'reports' ) ?></span>
					</a>    				
				</li>
				
				<li class="dropdown">					
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-share-alt"></i>
						<span><?php echo Yii::t( 'global', 'morepages' ) ?></span>
						<b class="caret"></b>
					</a>	
				
					<ul class="dropdown-menu">
                                                <li><a href="<?php echo CHtml::normalizeUrl( array( '/admin/places/' ) ) ?>"><?php echo Yii::t( 'global', 'places' ) ?></a></li>
                                                <li><a href="<?php echo CHtml::normalizeUrl( array( '/admin/members/' ) ) ?>"><?php echo Yii::t( 'global', 'members' ) ?></a></li>
					</ul>
				</li>
			
			</ul>

		</div> <!-- /container -->
	
	</div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->
    
    
<div class="main">
	
	<div class="main-inner">

	    <div class="container">
	      <?php echo $content; ?>
	    </div> <!-- /container -->
	    
	</div> <!-- /main-inner -->
    
</div> <!-- /main -->
    


<div class="extra">

	<div class="extra-inner">

		<div class="container">

			<div class="row">
				
    			<div class="span3">
    				
    				<h4><?php echo Yii::t( 'global', 'about' ) ?></h4>
    				
    				<ul>
                                        <li><i class='icon-group'></i>&nbsp;<a href="javascript:;"><?php echo Yii::t( 'global', 'about_us' ) ?></a></li>
    					<li><i class='icon-twitter'></i>&nbsp;<a href="<?php echo Yii::app()->params->networks[ 'twitter' ] ?>"><?php echo Yii::t( 'global', 'twitter' ) ?></a></li>
    					<li><i class='icon-facebook'></i>&nbsp;<a href="<?php echo Yii::app()->params->networks[ 'facebook' ] ?>"><?php echo Yii::t( 'global', 'facebook' ) ?></a></li>
    					<li><i class='icon-google-plus'></i>&nbsp;<a href="javascript:;"><?php echo Yii::t( 'global', 'google_plus' ) ?></a></li>
    				</ul>
    				
    			</div> <!-- /span3 -->
    			
    			<div class="span3">
    				
    				<h4><?php echo Yii::t( 'global', 'support' ) ?></h4>
    				
    				<ul>
    					<li><a href="javascript:;"><?php echo Yii::t( 'global', 'faq' ) ?></a></li>
    					<li><a href="javascript:;"><?php echo Yii::t( 'global', 'submit_ticket' ) ?></a></li>
    				</ul>
    				
    			</div> <!-- /span3 -->
    			
    			<div class="span3">
    				
    				<h4><?php echo Yii::t( 'global', 'legal' ) ?></h4>
    				
    				<ul>
    					<li><a href="javascript:;"><?php echo Yii::t( 'global', 'licence' ) ?></a></li>
    					<li><a href="javascript:;"><?php echo Yii::t( 'global', 'tos' ) ?></a></li>
    					<li><a href="javascript:;"><?php echo Yii::t( 'global', 'policy' ) ?></a></li>
    				</ul>
    				
    			</div> <!-- /span3 -->
    			
    		</div> <!-- /row -->

		</div> <!-- /container -->

	</div> <!-- /extra-inner -->

</div> <!-- /extra -->


    
    
<div class="footer">
	
	<div class="footer-inner">
		
		<div class="container">
			
			<div class="row">
				
    			<div class="span12">
    				<?php echo sprintf( Yii::t( 'global', 'copyright' ), date( 'Y' ) ) ?>.
    			</div> <!-- /span12 -->
    			
    		</div> <!-- /row -->
    		
		</div> <!-- /container -->
		
	</div> <!-- /footer-inner -->
	
</div> <!-- /footer -->

<script data-main="<?php echo Yii::app()->theme->baseUrl; ?>/js/main" src="<?php echo Yii::app()->baseUrl; ?>/js/require.js"></script>

</body>
</html>
