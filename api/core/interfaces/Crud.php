<?php
interface Crud{
	public function create($request,$response);
	public function findAll();
	public function findOne($param);
	public function update($id,$request,$response);
	public function delete($id);
}
?>