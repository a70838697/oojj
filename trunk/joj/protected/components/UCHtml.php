<?php
class UCHtml
{
    /**
    * Makes the given URL relative to the /image directory
    */
    public static function image($url) {
        return CHtml::image( Yii::app()->baseUrl."/images/".$url);
    }
    /**
    * Makes the given URL relative to the /css directory
    */
    public static function cssFile($url) {
        return CHtml::cssFile(Yii::app()->baseUrl.'/css/'.$url);
    }
    /**
    * Makes the given URL relative to the /js directory
    */
    public static function jsFile($url) {
        return CHtml::jsFile(Yii::app()->baseUrl.'/js/'.$url);
    }
}