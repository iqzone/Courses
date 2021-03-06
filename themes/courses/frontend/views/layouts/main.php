<?php /* @var $this Controller */ ?>
<!DOCTYPE HTML>
<html>
    <head>

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">

        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/focus.css" rel="stylesheet" />
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/focus-responsive.css" rel="stylesheet" />
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/pages/homepage.css" rel="stylesheet" />

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/courses.css" />

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>

    <body>
        
        <script type="text/javascript">
            var its = {
                vars: { baseURl: '<?php echo Yii::app()->baseUrl; ?>' }
            };
        </script>

        <div id="wrapper" class="clearfix">

            <div id="header">
                <div class="container">
                    <h1 id="title"><a href="<?php echo CHtml::normalizeUrl( array( '/site/index' ) ) ?>"><?php echo CHtml::encode($this->pageTitle) ?></a></h1>
                    <h1 id="suggest-course"><i></i><?php echo CHtml::link(Yii::t('global', 'put_course'), array('/courses/create')) ?></h1>
                </div><!-- container -->
            </div><!-- header -->

            <div id="nav" class="clearfix">
                <div class="container">
                    <?php
                    $this->widget('CMenuTheme', array(
                        'items' => array(
                            array('label' => Yii::t('global', 'homepage'), 'url' => array('/site/index')),
                            array('label' => Yii::t('global', 'courses'), 'url' => array('/courses')),
                            array('label' => Yii::t('global', 'workshops'), 'url' => array('/workshops')),
                            array('label' => Yii::t('global', 'faq'), 'url' => array('/help')),
                            array('label' => Yii::t('global', 'contact'), 'url' => array('/contact')),
                            array('label' => Yii::t('global', 'login'), 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                            array('label' => Yii::t('global', 'logout', array( '{user}' => Yii::app()->user->name )), 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                        ),
                        'htmlOptions'     =>  array( 'id' => 'main-nav' ),
                    ));
                    ?>
                </div><!-- /container -->
            </div> <!-- /nav -->
            <?php if (isset($this->breadcrumbs)): ?>
                <?php
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?><!-- /breadcrumbs -->
            <?php endif ?>

            <div id="content">
                <div class="container">
                    <?php echo $content; ?>
                </div> <!-- /container -->
            </div> <!-- /content -->


            <div class="content-footer">
                <div class="logo"><div class="image"><a href="<?php echo CHtml::normalizeUrl(array('/site/index')) ?>"></a></div></div>
            </div><!-- /content-footer -->
            <div id="footer">

                <div class="container">

                    <div class="row">

                        <div class="grid-6">
                            <h3 style="margin-bottom: 0.1em"><b class="show-comment-suggest"></b>¿Necesitas algo más?, contáctanos</h3>

                            <div style='padding-left:60px;'>
                                <p>Estamos para servirte, dejanos tus datos y en breve nos pondremos en contácto contigo.</p>
                                <form class="contact">
                                    <input type="text" placeholder="Nombre" />
                                    <input type="text" placeholder="Correo@dominio.com" />
                                    <textarea placeholder="Duda o comentario" class="no-resize"></textarea><br />
                                    <input type='submit' class="btn btn-inverse" style="margin-right: 59px;" value="Enviar" />
                                </form>
                            </div>

                        </div> <!-- /grid-6 -->

                        <div class="grid-4" style="float:right;">

                            <h3><span class="follow"></span> Siguenos en:</h3>

                            <div style='padding-left:50px;'>
                                <div class="grid-0"><a href="" class='icons-tumblr'></a></div>
                                <div class="grid-0"><a href="<?php echo CHtml::normalizeUrl(Yii::app()->params->networks['facebook']) ?>" alt="<?php echo Yii::t('global', 'facebook') ?>" class='icons-facebook'></a></div>
                                <div class="grid-0"><a href="<?php echo CHtml::normalizeUrl(Yii::app()->params->networks['twitter']) ?>" alt="<?php echo Yii::t('global', 'twitter') ?>" class='icons-twitter'></a></div>
                            </div>
                            <br class="clear" />
                            <div class="divider-news"></div>
                            <h3><span class="suscribe-icon"></span> <?php echo Yii::t('global', 'suscribe') ?></h3>

                            <div style='padding-left:50px;'>
                                <form class="suscribe">

                                    <input type="text" name="subscribe_email" placeholder="correo@dominio" style="width:205px;">
                                    <br />
                                    <input type="submit" class="btn btn-inverse" value="Suscribete" />
                                </form>
                            </div>


                        </div><!-- /grid-6 -->


                    </div> <!-- /row -->

                </div> <!-- /container -->

            </div> <!-- /footer -->



            <div id="copyright">

                <div class="container">

                    <div class="row">

                        <div id="rights" class="grid-6">
                            <?php echo sprintf(Yii::t('global', 'copyright'), date('Y')) ?>
                        </div> <!-- /grid-6 -->

                        <div id="totop" class="grid-6">
                            <?php echo sprintf(Yii::t('global', 'owner')) ?>
                        </div> <!-- /grid-6 -->
                        <div id="legal" class="grid-6">
                            <ul>
                                <li><?php echo CHtml::link(Yii::t('global', 'licence'), array('/licence')) ?></li>
                                <li><?php echo CHtml::link(Yii::t('global', 'tos'), array('/tos')) ?></li>
                                <li><?php echo CHtml::link(Yii::t('global', 'pop'), array('/pop')) ?></li>
                            </ul>
                        </div> <!-- /grid-6 -->

                    </div> <!-- /row -->

                </div> <!-- /container -->

            </div> <!-- /copyright -->

        </div><!-- page -->
        
        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script data-main="<?php echo Yii::app()->theme->baseUrl; ?>/js/main" src="<?php echo Yii::app()->baseUrl; ?>/js/require.js"></script>
    </body>
</html>
