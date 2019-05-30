<?php
//print_r('hello');exit;
session_start();
require_once("typingadmin/koneksi.php");
//echo '<pre>';print_r($_POST);die;
$username = isset($_POST['user_name'])?$_POST['user_name']:"";
$lesson_name = isset($_POST['lesson_name'])?$_POST['lesson_name']:"";
$lesson_id = isset($_POST['lesson_id'])?$_POST['lesson_id']:"";
$lesson_key = isset($_POST['lesson_key'])?$_POST['lesson_key']:"";
$json_array = array();

if(isset($username) && !empty($username)){
	
	//check user exits or not
	
	$chk_user = mysqli_query($con,"SELECT * FROM user_allow where username='".$username."' and status=1");
	$chk_user_row = mysqli_fetch_array($chk_user, MYSQLI_BOTH);
	
	//echo '<pre>';print_r($chk_user_row);die;
	
	if(empty($chk_user_row)){
		
		$json_array = array('error'=>1,'error_name'=>'Login Failed');
		echo json_encode($json_array);die;
		
	}else{
		
		$_SESSION['username'] = $username;	
		$_SESSION['lesson_name'] = $lesson_name;
		$_SESSION['lesson_id'] = $lesson_id;
		$_SESSION['lesson_key'] = $lesson_key;
		$_SESSION['lesson_type_text'] = '';
		$_SESSION['assessment_lesson_text'] = '';
		
		//check for only assessment
		$ex = explode(' ',$_SESSION['lesson_name']);
		if(isset($ex[0]) && (strtolower($ex[0]) == "assessment")){
			
			if(isset($_SESSION['lesson_id']) && $_SESSION['lesson_id']==1){
				$_SESSION['lesson_id'] = 21;
				$_SESSION['lesson_text_show_count'] = (($_SESSION['lesson_id']*2)-3);
			}elseif(isset($_SESSION['lesson_id']) && $_SESSION['lesson_id']==2){
				$_SESSION['lesson_id'] = 31;
				$_SESSION['lesson_text_show_count'] = (($_SESSION['lesson_id']*2)-3);
			}elseif(isset($_SESSION['lesson_id']) && $_SESSION['lesson_id']==3){
				$_SESSION['lesson_id'] = 41;
				$_SESSION['lesson_text_show_count'] = (($_SESSION['lesson_id']*2)-3);
			}
			
			$lid = ($ex[1]-1);
			$file1 = file_get_contents('assessments.txt', true);
			$arr1 = explode("\n", $file1);
			$gambar1 = explode("\n", $arr1[$lid]);
			$detailGambar1 = explode("|" , $gambar1[0]);
			
			$_SESSION['lesson_show_text'] = "Press the space bar to hear the word spoken again. Type the word and press Enter key.";
			$_SESSION['assessment_lesson_text'] = $detailGambar1[1];
			//$_SESSION['assessment_lesson_text'] = "|sad fed sit got run|slab chats fled traps|thin shot shut swim|wish crust math crutch fish" ;

			$_SESSION['lesson_type_text'] = 'assessment';
			
		}else{
			
			if(isset($_SESSION['lesson_id']) && $_SESSION['lesson_id']==1){
				$_SESSION['lesson_text_show_count'] = 0;
			}else if(isset($_SESSION['lesson_id']) && $_SESSION['lesson_id']>1){
				$_SESSION['lesson_text_show_count'] = (($_SESSION['lesson_id']*2)-2);
			}else{
				$_SESSION['lesson_text_show_count'] = 0;
			}
			
			$file = file_get_contents('lessons.txt', true);
			$arr = explode("\n", $file);
			
			$_SESSION['lesson_show_text'] = (isset($arr[$_SESSION['lesson_text_show_count']]) && !empty($arr[$_SESSION['lesson_text_show_count']]))?$arr[$_SESSION['lesson_text_show_count']]:"";	
		}
		
		$sessionid = session_id();
		//echo $sessionid;die;
		$loadRes = mysqli_query($con,"SELECT * FROM user_session where username='".$username."'");
		$row = mysqli_fetch_array($loadRes,MYSQLI_BOTH);
		$id = $row['userid'];
		if($id>0){
			
			$logsession = mysqli_query($con,"UPDATE user_session SET sessionid='".$sessionid."' where username='".$username."'");
		}else{
			
			$logsession = mysqli_query($con,"INSERT INTO user_session (username, sessionid) VALUES ('".$username."', '".$sessionid."')");
		}
		$simpanlogin = mysqli_query($con,"INSERT INTO user_login (username, logindate) VALUES ('".$username."',now())");
		
		if($simpanlogin) {
			
			$loadLastRecord = mysqli_query($con,"SELECT * FROM user_login ORDER BY id DESC");
			$row1 = mysqli_fetch_array($loadLastRecord, MYSQLI_BOTH);
			$id = $row1['id'];
			$_SESSION['idUserLogin'] = $id;
			
			$lesson_count = ($_SESSION['lesson_id']+($_SESSION['lesson_id']-1));
			$simpandata = mysqli_query($con,"INSERT INTO user_lastlesson (userid, username, lesson_soal, lesson_count, date) VALUES ('".$_SESSION['idUserLogin']."', '".$_SESSION['username']."', '".$_SESSION['lesson_name']."', '".$lesson_count."', now())");
			
			
			//for making sentence lesson text code
			$chkfirstletter = (substr($_SESSION['lesson_show_text'], 0, 1));
			if(is_numeric($chkfirstletter)){
				$explode_sentence = explode('|',$_SESSION['lesson_show_text']);
				unset($explode_sentence[0]);
				//echo '<pre>';print_r($explode_sentence);
				
				$html='';
				if(!empty($explode_sentence)){
					$html.='<div class="sentence"><h5>Select the words to make a sentence.</h5>';
					foreach($explode_sentence as $exp){
						$explode_words = explode(',',$exp);
						//echo '<pre>';print_r($explode_words);
						$html.='<select class="sentence_words">';
						$i=0;
						foreach($explode_words as $w){
							if($i==0){ $key = '';}else{ $key=$w;}
							$html.='<option value="'.$key.'">'.$w.'</option>';
						$i++;}
						$html.='</select>';
					}
					$html.='<button id="sentenceDone">Done</button></div>';
				}
				//echo $html;die;
				$_SESSION['lesson_show_text'] = $html;
				$_SESSION['lesson_type_text'] = 'sentence';
			}/*else{
				$_SESSION['lesson_show_text'] = $_SESSION['lesson_show_text'];
			}*/
			
			
			$json_array = array('error'=>0,'error_name'=>'','idUserLogin'=>$id,'lesson_show_text'=>$_SESSION['lesson_show_text'],'lesson_type_text'=>$_SESSION['lesson_type_text'], 'assessment_lesson_text'=>$_SESSION['assessment_lesson_text']);
			echo json_encode($json_array);die;
			
		} else {
			
			$json_array = array('error'=>1,'error_name'=>'','idUserLogin'=>'');
			echo json_encode($json_array);die;
			
		}
		
	}
	
}else{
	
	$json_array = array('error'=>1,'error_name'=>'Please Enter Name');
	echo json_encode($json_array);die;
		
}

?>