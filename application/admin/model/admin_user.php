<?php
class Admin_UserModel extends Model{ public function checkUserStatus($zym_6) { return $this->where(array('user_id'=>$zym_6))->getfield('status'); } public function setLoginStatus($zym_6) { $_SESSION['admin']['userid']=$zym_6; $_SESSION['admin']['username']=M('user')->where(array('id'=>$zym_6))->getField('name'); $_SESSION['admin']['groupid']=$this->where(array('user_id'=>$zym_6))->getField('group_id'); $_SESSION['admin']['groupname']=dc::get('admin_group',$_SESSION['admin']['groupid'],'name'); $zym_5['login_ip']=get_ip(); $zym_5['login_time']=NOW_TIME; M('user')->where(array('id'=>$zym_6))->update($zym_5); $zym_5['login_num']=array('exp','`login_num`+1'); $this->where(array('user_id'=>$zym_6))->update($zym_5); } public function delLoginStatus() { $_SESSION['admin']=null; } public function getlist() { $zym_9=$this->select(); foreach($zym_9 as &$zym_8){ $zym_8['username']=dc::get('user',$zym_8['user_id'],'name'); $zym_8['groupname']=dc::get('admin_group',$zym_8['group_id'],'name'); $zym_8['create_username']=dc::get('user',$zym_8['create_user_id'],'name'); $zym_8['update_username']=dc::get('user',$zym_8['update_user_id'],'name'); $zym_8['url_edit']=U('admin.user.edit',array('id'=>$zym_8['id'])); $zym_8['create_time']=$zym_8['create_time']?date('Y-m-d H:i',$zym_8['create_time']):''; $zym_8['update_time']=$zym_8['update_time']?date('Y-m-d H:i',$zym_8['update_time']):''; $zym_8['login_time']=$zym_8['login_time']?date('Y-m-d H:i',$zym_8['login_time']):''; } return $zym_9; } public function add($zym_7) { return $this->insert($zym_7); } public function edit($zym_7) { return $this->update($zym_7); } public function del($zym_10) { $this->where($zym_10)->delete(); } }
?>