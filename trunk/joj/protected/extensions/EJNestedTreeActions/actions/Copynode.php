<?php
/**
 *  Copynode:
 * This extension of CAction is part of a the EJNestedTreeActions set.
 * It is used to copy a new node in tree.
 * This action uses copytree method which is set in the EBehavior.php
 *   Conventions:
 * The jstree must use GET to send ID of node to be copied with name 'id',
 * REF_ID's id with name 'ref_id'and TYPE with name 'type'.
 * You may notice that the ID is exploded in first line of metho run().
 * This happens because the proper callback 'oncopy' of the jstree returns
 * an 'id' like "3_copy" or "4_copy".."ID_copy".
 * 
 * @version 0.3beta
 * @author Dimitrios Meggidis <tydeas.dr@gmail.com>
 * @copyright Evresis A.E. <www.evresis.gr>
 */
class Copynode extends CAction {
    /**
     * This method calls the copytree() method from EBehavior.php
     * It does not return any value because do not a situtation where a copy is not
     * permitted.
     */
    public function run() {
        $id=explode("_",$_POST['id']);
        $ref=$_POST['ref_id'];
        $type=$_POST['type'];

        $this->getController()->copytree($id[0],$ref,$type);
    }
}