<?php

/**
 * <pre>
 * Codebit.org
 * IP.Board v3.3.0
 * @description
 * Last Updated: $Date: 09-ago-2012 -006  $
 * </pre>
 * @filename            CCBreadcrumbs.php
 * @author 		$Author: juliobarreraa@gmail.com $
 * @package		
 * @subpackage	        
 * @link		http://www.codebit.org
 * @since		09-ago-2012
 * @timestamp           17:42:27
 * @version		$Rev:  $
 *
 */

/**
 * Description of CCBreadcrumbs
 *
 * @author juliobarreraa@gmail.com
 */
Yii::import('zii.widgets.CBreadcrumbs');

class CCBreadcrumbs extends CBreadcrumbs {
        public $tagName='ul';
        public $htmlOptions=array('class'=>'breadcrumb');
        public $encodeLabel=true;
        public $homeLink;
        public $links=array();
        public $separator='<span class="divider">/</span>';
        
        public function run()
        {
                if(empty($this->links))
                        return;

                echo CHtml::openTag($this->tagName,$this->htmlOptions)."\n";
                $links=array();
                
                if($this->homeLink===null)
                        $links[]= '<li>' . CHtml::link(Yii::t('zii','Home'),Yii::app()->homeUrl) . '</li>';
                else if($this->homeLink!==false)
                        $links[]= '<li>' . $this->homeLink . '</li>';
                
		foreach($this->links as $label=>$url)
		{
			if(is_string($label) || is_array($url))
				$links[]= "<li class='" . @$url['isActive'] . "'>" . strtr($this->activeLinkTemplate,array(
					'{url}'=>CHtml::normalizeUrl( @$url[ 'url' ] ),
					'{label}'=>$this->encodeLabel ? CHtml::encode($label) : $label . '</li>',
				));
			else
				$links[]= "<li class='" .@$url['isActive'] . "'>" . str_replace('{label}',$this->encodeLabel ? CHtml::encode($url) : $url,$this->inactiveLinkTemplate) . '</li>';
		}
                
                echo implode($this->separator,$links);
                echo CHtml::closeTag($this->tagName);
        }
}

?>
