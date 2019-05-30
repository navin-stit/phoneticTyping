<?php
session_start();
require_once("typingadmin/koneksi.php");

$waktu = "00:00:00";
$score = 0;
$hariini = date("Y-m-d");

$caridatasama = mysqli_query($con,"SELECT * FROM user_record WHERE id='".$_SESSION['idUserLogin']."' AND keterangan='".$_SESSION['lesson_name']."' AND recorddate='".$hariini."'");
$jumlahData = mysqli_num_rows($caridatasama);

if($jumlahData==0) {
	
		$json_arry = array();
		//echo '<pre>';print_r($_POST);die;
		$textTypingCount = (isset($_POST['textTypingCount']) && $_POST['textTypingCount']>0)?$_POST['textTypingCount']:"0";
		$textTypingCount = $textTypingCount+1;

		if(($textTypingCount%4)==0){
			
			//get scored
			$totalTypedLetter = (isset($_POST['totalTypedLetter']) && $_POST['totalTypedLetter']>0)?$_POST['totalTypedLetter']:0;
			$totalWrongTypedLetter = (isset($_POST['totalWrongTypedLetter']) && $_POST['totalWrongTypedLetter']>0)?$_POST['totalWrongTypedLetter']:0;
			$minutes = (isset($_POST['minutes']) && $_POST['minutes']>0)?$_POST['minutes']:1;
			
			$grossWPM = ($totalTypedLetter/$minutes);
			$netSpeed = (($totalTypedLetter-$totalWrongTypedLetter)/$minutes);
			
			$score = (($netSpeed/$grossWPM)*100);
			
			$simpanRecord = mysqli_query($con,"INSERT INTO user_record (id, nama,	waktu, score, tanggal, recorddate,	keterangan) VALUES ('".$_SESSION['idUserLogin']."',	'".$_SESSION['username']."', '".$waktu."',	'".$score."', now(), now(),	'".$_SESSION['lesson_name']."')");
			

			$_SESSION['assessment_lesson_text'] = '';
			$file = file_get_contents('imageLoad.txt', true);
			$arr = explode("\n", $file);	
			
			$_SESSION['lesson_key'] = $_SESSION['lesson_key']+1;
		
			$gambar = explode("\n" , $arr[$_SESSION['lesson_key']]);
			$detailGambar = explode("=" , $gambar[0]);
			
			if(isset($detailGambar[1]) && !empty($detailGambar[1])){
				$getlesson = explode(' ' , $detailGambar[1]);
				if(isset($getlesson[0]) && (strtolower($getlesson[0]) == "lesson")){
					$lid = $getlesson[1];
					$_SESSION['lesson_name'] = $detailGambar[1];
					$_SESSION['lesson_id'] = $lid;
				}else if(isset($getlesson[0]) && (strtolower($getlesson[0]) == "assessment")){
					
					//in case of assessment
					$_SESSION['lesson_name'] = $detailGambar[1];
					$_SESSION['lesson_id'] = $getlesson[1];
					$lid = ($getlesson[1]-1);
					$file1 = file_get_contents('assessments.txt', true);
					$arr1 = explode("\n", $file1);
					$gambar1 = explode("\n", $arr1[$lid]);
					$detailGambar1 = explode("|" , $gambar1[0]);

					//echo '<pre>';print_r($detailGambar1);
					//echo $detailGambar1[1];
					
					$_SESSION['lesson_show_text'] = "Press the space bar to hear the word spoken again. Type the word and press Enter key.";
					$_SESSION['assessment_lesson_text'] = $detailGambar1[1];
					$_SESSION['lesson_type_text'] = 'assessment';
					
					$json_arry = array('textTypingCount'=>3, 'lesson_show_text'=>$_SESSION['lesson_show_text'], 'lesson_name'=>$_SESSION['lesson_name'],'lesson_type_text'=>$_SESSION['lesson_type_text'],'assessment_lesson_text'=>$_SESSION['assessment_lesson_text'],'lesson_id'=>$_SESSION['lesson_id']);
					$aass = json_encode($json_arry);
					echo $aass;die;
				}
			}
			
			$lesson_count = ($_SESSION['lesson_id']+($_SESSION['lesson_id']-1));
			$simpandata = mysql_query("INSERT INTO user_lastlesson (userid, username, lesson_soal, lesson_count, date) VALUES ('".$_SESSION['idUserLogin']."', '".$_SESSION['username']."', '".$_SESSION['lesson_name']."', '".$lesson_count."', now())");
			
		}

		if(($textTypingCount%2)==0){
			if(isset($_SESSION['lesson_id']) && $_SESSION['lesson_id']==1){
				$_SESSION['lesson_text_show_count'] = 1;
			}else if(isset($_SESSION['lesson_id']) && $_SESSION['lesson_id']>1){
				$_SESSION['lesson_text_show_count'] = ($_SESSION['lesson_text_show_count']+1);
			}
		}
		
		$file1 = file_get_contents('lessons.txt', true);
		$arr1 = explode("\n", $file1);
		
		//get make sentence text
		if(isset($_POST['make_lesson_show_text']) && !empty($_POST['make_lesson_show_text'])){
			$_SESSION['lesson_show_text']  =  $_POST['make_lesson_show_text'].'.';
		}else{

			if($_SESSION['lesson_id']>26 && $textTypingCount == 1){
				$_SESSION['lesson_show_text']  = $_SESSION['lesson_show_text'];
			}else{
				$_SESSION['lesson_show_text'] = (isset($arr1[$_SESSION['lesson_text_show_count']]) && !empty($arr1[$_SESSION['lesson_text_show_count']]))?$arr1[$_SESSION['lesson_text_show_count']]:"";
			}
		}
		
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
			
		}else{
			$_SESSION['lesson_show_text'] = $_SESSION['lesson_show_text'];
			$_SESSION['lesson_type_text'] = 'lesson';
		}
		
		//reset textTypingCount after each lesson finish
		if($textTypingCount == 4){
			$textTypingCount = 0;
		}else{
			$textTypingCount = $textTypingCount; 
		}
		
		$lesson_show_text = str_replace( array('[',']') , '', $_SESSION['lesson_show_text']);
		
		$json_arry = array('textTypingCount'=>$textTypingCount, 'lesson_show_text'=>$lesson_show_text, 'lesson_name'=>$_SESSION['lesson_name'],'lesson_type_text'=>$_SESSION['lesson_type_text'],'lesson_id'=>$_SESSION['lesson_id']);
		
		$aa = json_encode($json_arry);
		echo $aa;die;

} else {
	//echo "Simpan Batal" . mysql_error();
}
?>

