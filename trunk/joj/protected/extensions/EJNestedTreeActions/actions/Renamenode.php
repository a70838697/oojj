<?php
/**
 *  Renamenode:
 * This extension of CAction is part of a the EJNestedTreeActions set.
 * It is used mainly to rename a tree node.
 *
 *  Conventions:
 * The jstree must use GET to send NODE id and the 'new' text of the node
 * with names 'id' and 'newname'
 * See first lines of run().
 * It echoes true if the rename was done successfull else echoes false.
 * 
 * @version 0.3beta
 * @author Dimitrios Meggidis <tydeas.dr@gmail.com>
 * @copyright Evresis A.E. <www.evresis.gr>
 */
class Renamenode extends CAction {
    public function run(){
        $id=$_POST['id'];
        $node= CActiveRecord::model($this->getController()->classname)->findByPk($id);
        $newname=$_POST['newname'];
        $checkname = true;
        if($node->isRoot()) {
            if( $node->hasManyRoots ) {
                $siblings = CActiveRecord::model($this->getController()->classname)->roots()->findall();
            } else {
                $checkname = false;
            }
        } else {
            $parent=$node->getParent();
        	$siblings=$parent->children()->findAll();
        }
   
        
        $node->setAttribute($this->getController()->text,$newname);

        if( $checkname && $this->getController()->nameExist($siblings,$node)) {
            echo false;
            die;
        }
        $node->validate();
        if($node->saveNode()) {
            echo true;
        }
    }
}