<ul class="actions">
<?php 
if(UserModule::isAdmin()) {
?>
<li><?php echo CHtml::link(UserModule::t('Manage User'),array('/user/admin')); ?></li>
<?php 
} else {
?>
<li><?php echo CHtml::link(UserModule::t('List User'),array('/user')); ?></li>
<?php
}
?>
<li><?php echo CHtml::link(UserModule::t('Profile'),array('/user/profile')); ?></li>
<?php 
if(UUserIdentity::isCommonUser()) {
?>
<li><?php echo CHtml::link(UserModule::t('Become a JNUer'),array('/jnuer/update/'.Yii::app()->user->id)); ?></li>
<?php 
}
?>
<li><?php echo CHtml::link(UserModule::t('Edit'),array('edit')); ?></li>
<li><?php echo CHtml::link(UserModule::t('Change password'),array('changepassword')); ?></li>
<li><?php echo CHtml::link(UserModule::t('Logout'),array('/user/logout')); ?></li>
</ul>