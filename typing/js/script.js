if (sessionStorage.getItem("is_reloaded") == "true"){ 
	//alert('Reloaded!');
	sessionStorage.setItem("is_reloaded", false);
	var getkeybordPageUrl = $("#keyboardUrl").val().trim();
	//window.location.href = getkeybordPageUrl;
}else{
	sessionStorage.setItem("is_reloaded", true);
}



//global variables
var wordArr = [];
var totalTypedLetter = 0;
var totalWrongTypedLetter = 0;

//var //showtime = document.getElementsByTagName('h1')[0],
    //start = document.getElementById('start'),
    //stop = document.getElementById('stop'),
    //clear = document.getElementById('clear'),
var seconds = 0, minutes = 0, hours = 0, t;

var lesson_type_text = $("input#lesson_type_text").val();
var lesson_id = $("input#lesson_id").val();

if(lesson_type_text != "assessment" && lesson_id<27){
	$(".yes-audio").trigger('load');
	$(".yes-audio").trigger('play');
}/* else{
	$(".yes-audio").trigger('load');
	$(".yes-audio").trigger('play');
} */

$('#lockable').keyboard({
layout: 'custom',
restrictInput : true,
stayOpen: true,
ignoreEsc: true,
closeByClickEvent: true,
preventPaste: true,
autoAccept: true,
stickyShift : false,
beforeInsert: function(e, keyboard, el, textToAdd) {
	//console.log(e+'--'+keyboard+'--'+el+'--'+textToAdd+'--'+textToAdd.charCodeAt(0));
	return myEventHandler(e,textToAdd.charCodeAt(0),textToAdd);
},
customLayout: {
	'normal': [
		'` 1 2 3 4 5 6 7 8 9 0 - = {bksp}',
		'{tab} q w e r t y u i o p [ ] \\',
		'a s d f g h j k l ; \' {enter}',
		'{shift} z x c v b n m , . / ',
		' {space} {left} {right} {sp:.2} {del}'
	],
	'shift': [
		//'~ ! @ # $ % ^ & * ( ) _ + {bksp}',
		'` 1 2 3 4 5 6 7 8 9 0 - = {bksp}',
		'{tab} Q W E R T Y U I O P { } |',
		'A S D F G H J K L : " {enter}',
		'{shift} Z X C V B N M < > ? ',
		' {space} {left} {right} {sp:.2} {del}'
	]
}
}).addTyping({
	showTyping: true,
	delay: 200,
});

var kb = $('#lockable').getkeyboard();
	kb.options.layout = 'custom';
	// redraw keyboard with new layout
	kb.redraw();

//cookie set get delete
var cookie = new function() {
    this.set = function ( name, value, days ) {
        var expires = "";
        if ( days ) {
            var date = new Date();
            date.setTime( date.getTime() + ( days * 24 * 60 * 60 * 1000 ) );
            expires = "; expires=" + date.toGMTString();
        }
        document.cookie = name + "=" + value + expires + "; path=/";
    };
 
    this.get = function ( name ) {
        var nameEQ = name + "=";
        var ca = document.cookie.split( ';' );
        for ( var i = 0; i < ca.length; i++ ) {
            var c = ca[ i ];
            while ( c.charAt(0) == ' ' ) c = c.substring( 1, c.length );
            if ( c.indexOf( nameEQ ) == 0 ) return c.substring( nameEQ.length, c.length );
        }
        return null;
    };
 
    this.delete = function ( name ) {
        this.set( name, "", -1 );
    };
}
 
// set a cookie
//cookie.set( 'myText', getNewCodeArry(), '');
// retrieve a cookie
//var myText = cookie.get('myText');
//alert(myText); 
// delete a cookie
//cookie.delete('myText');

	
// delete a cookie	
cookie.delete('typingTextArry');
cookie.delete('typingSentenceWords');
cookie.delete('typingAssWord');
cookie.delete('typingAssLetter');

//get lesson letters
function getNewCodeArry(){	
	var datacontent = $(".datacontent").text().trim();
	var ary = datacontent.split('');
	var keyCount = ary.length;

	var newKey = [];
	for(var i=0;i<keyCount;i++){
		var str = ary[i];
		//console.log(str);
		//convert char into keynum
		newKey.push(str.charCodeAt(0));
	}
	//add space code in newKey
	//newKey.push(32);
	return newKey;
}
//set cookie
cookie.set( 'typingTextArry', getNewCodeArry(), '');

function getSentenceWords(){
	var datacontent = $(".datacontent").text().trim();
	var ary = datacontent.split(' ');
	var keyCount = ary.length;

	var newSentencWordKey = [];
	for(var i=0;i<keyCount;i++){
		var str = ary[i];
		newSentencWordKey.push(str);
	}	
	return newSentencWordKey;
}


function getAssessmentWords(){
	var datacontent = $(".assessment_datacontent").text().trim();
	var ary = datacontent.split(' ');
	var keyCount = ary.length;

	var newWordKey = [];
	for(var i=0;i<keyCount;i++){
		var str = ary[i];
		newWordKey.push(str);
	}	
	return newWordKey;
}
//console.log(getAssessmentWords());
//set cookie
cookie.set( 'typingAssWord', getAssessmentWords(), '');

function getAssessmentLetters(){
	var letters = getAssessmentWords().join("").trim();
	var ary = letters.split('');
	var keyCount = ary.length;
	
	var newletterKey = [];
	for(var i=0;i<keyCount;i++){
		var str = ary[i];
		newletterKey.push(str.charCodeAt(0));
	}	
	return newletterKey;
}
//console.log(getAssessmentLetters());
//set cookie
cookie.set( 'typingAssLetter', getAssessmentLetters(), '');

function add() {
    seconds++;
    if (seconds >= 60) {
        seconds = 0;
        minutes++;
        if (minutes >= 60) {
            minutes = 0;
            hours++;
        }
    }
    
    //showtime.textContent = (hours ? (hours > 9 ? hours : "0" + hours) : "00") + ":" + (minutes ? (minutes > 9 ? minutes : "0" + minutes) : "00") + ":" + (seconds > 9 ? seconds : "0" + seconds);
	//console.log(seconds+'--'+minutes+'--'+hours);
    timer();
}
function timer() {
    t = setTimeout(add, 1000);
}
timer();

function alphaChr(str){
	var regex = new RegExp("^[a-zA-Z]+$");
	if (regex.test(str)) {
		return true;
	}else{
	   return false; 
	}
}

function handleLoad(sound){
	
	createjs.Sound.play(sound);
}

var capital = [];
function chkCapLetter(character,KeyCharCode,lesson_text_lng){
	
	if ((character!=='' && alphaChr(KeyCharCode)) && (character === character.toUpperCase())){
		capital.push(character);
		$("button[data-name='shift']").addClass('ui-state-active');
		$("button[data-name='"+character+"']").addClass('ui-state-active');
	}else{
		if(capital!=''){
			$("button[data-name='shift']").addClass('ui-state-active');
			capital = [];
		}
		
		if(KeyCharCode === ''){ 
			var KeyCharCode = "space";
		}
		$("button[data-name='"+KeyCharCode+"']").addClass('ui-state-active');
	}
	
	//letter underline
	var datacontentLength = $(".datacontent").text().trim().length;
	var datacontent = $(".datacontent").text();
	
	//console.log(datacontentLength+'-'+lesson_text_lng);
	
	if(datacontentLength === lesson_text_lng){
		var textlength = 0;
	}else{
		var textlength = (datacontentLength-lesson_text_lng);
	}
	
	//console.log(datacontentLength+'-'+textlength);
	
	highlight(textlength, datacontent);
}

function highlight(index, datacontent) {
	var _finalText = datacontent.substring(0, index) + "<span class='highlight'>" + datacontent.substring(index, (index + 1)) + "</span>" + datacontent.substring((index + 1));
	$('.datacontent').html(_finalText);
}

//window.addEventListener("keypress", myEventHandler, false);

function myEventHandler(event,keyEvtCode=0,textToAdd=''){
	
	totalTypedLetter+=1;
	//alert(totalTypedLetter);
	
	if(totalTypedLetter==1){
		timer();
	}
	
	var textarea = $('input.ui-keyboard-preview');
	val = textarea.val();
	textarea.focus().val("").val(val);
	
	var lesson_type_text = $("input#lesson_type_text").val();
	var lesson_id = $("input#lesson_id").val();
	//console.log(lesson_type_text);
	
	/*if(event.which==1){//check only for mouse click event
		var keycodeEvnt = keyEvtCode;
	}else{
		var keycodeEvnt = (event.keyCode ? event.keyCode : event.which);
		//alert(event.keyCode+'--'+event.keyCode+'--'+event.which);
	}*/
	
	var keycodeEvnt = keyEvtCode;
	//alert(keycodeEvnt);
	//only for assessment lesson
	if(lesson_type_text == "assessment"){
		return chkAssessment(event,keycodeEvnt,textToAdd);
	}
	
	//get cookie
	var getTypingTextJson = cookie.get('typingTextArry');
	var getTypingTextArry = getTypingTextJson.split(",");
	
	//console.log(getTypingTextArry);

	//console.log(getTypingTextArry[0]+'--'+keycodeEvnt);
	//alert(String.fromCharCode(getTypingTextArry[0]).toLowerCase()+'--'+textToAdd.toLowerCase());
	if(getTypingTextArry[0]==keycodeEvnt){
		
		if(keycodeEvnt === 32){
			word_voice = "space-bar";
			handleLoad(word_voice);
		}else{
			word_voice = "key";
			handleLoad(word_voice);
		}		
		
		//show highlited letter
		$("button[type='button']").removeClass('ui-state-active');
		//console.log(getTypingTextArry[1]);
		if(getTypingTextArry[1]!=='' && (lesson_type_text!='sentence')){
			var KeyCharCode = String.fromCharCode(getTypingTextArry[1]).toLowerCase().trim();
			//for capital letter
			var lesson_text_lng = (getTypingTextArry.length-1);
			var character = String.fromCharCode(getTypingTextArry[1]).trim();
			chkCapLetter(character, KeyCharCode, lesson_text_lng);
			
		}
		
		var getkeybordPageUrl = $("#keyboardUrl").val().trim();
		var textTypingCount = $("#textTypingCount").val();
		var KeyCharCode = String.fromCharCode(keycodeEvnt).toLowerCase().trim();
		
		if(keycodeEvnt !== 32 && keycodeEvnt !== 46 && keycodeEvnt !== 59 && KeyCharCode!=''){
			
			//letter sound
			if(lesson_id>0 && lesson_id<4){
				//alert(1);
				handleLoad(KeyCharCode);
				
			}else if(lesson_id>3 && lesson_id<27){
				//alert(2);
				if(textTypingCount>=0 && textTypingCount<2){
					//alert(3);
					handleLoad(KeyCharCode);
					
				}else if(textTypingCount>1 && textTypingCount<=3){
					//alert(4);
					wordArr.push(textToAdd);	
					var getSentenceWordsCookie = cookie.get('typingSentenceWords');
				
					if(getSentenceWordsCookie.length>0){
						var typingSentenceWordsArry = getSentenceWordsCookie.split(",");
						//console.log(getSentenceWordsCookie);
						//console.log(wordArr.join('')+'--'+typingSentenceWordsArry[0]);
						
						//sound word only for single word ex- A, E
						if(wordArr.length==1){
							var word_voice = typingSentenceWordsArry[0].toLowerCase().trim().split('.').join("");
							handleLoad(word_voice);
						}
						
						if((wordArr.join('').toLowerCase().trim())==(typingSentenceWordsArry[0].toLowerCase().trim())){
							typingSentenceWordsArry.shift();
							cookie.set( 'typingSentenceWords', typingSentenceWordsArry, '');
							wordArr = [];
						}
						//sound word only for word ex- She, He
						if(wordArr.length==1 && typingSentenceWordsArry[0].length>0){
							var word_voice = typingSentenceWordsArry[0].toLowerCase().trim().split('.').join("");
							handleLoad(word_voice);
						}
					}
					
				}
				
			}else if(lesson_id>26){//alert(5);
				wordArr.push(textToAdd);
				
				//get cookie typing Sentence Words
				var getSentenceWordsCookie = cookie.get('typingSentenceWords');
				
				if(getSentenceWordsCookie.length>0 && textTypingCount<2){
					var typingSentenceWordsArry = getSentenceWordsCookie.split(",");
					//console.log(getSentenceWordsCookie);
					//console.log(wordArr.join('')+'--'+typingSentenceWordsArry[0]);
					
					//sound word only for single word ex- A, E
					if(wordArr.length==1){
						var word_voice = typingSentenceWordsArry[0].toLowerCase().trim().split('.').join("");
						handleLoad(word_voice);
					}
					
					if((wordArr.join('').toLowerCase().trim())==(typingSentenceWordsArry[0].toLowerCase().trim())){
						typingSentenceWordsArry.shift();
						cookie.set( 'typingSentenceWords', typingSentenceWordsArry, '');
						wordArr = [];
					}
					
					//sound word only for word ex- She, He
					if(wordArr.length==1 && typingSentenceWordsArry[0].length>0){
						var word_voice = typingSentenceWordsArry[0].toLowerCase().trim().split('.').join("");
						handleLoad(word_voice);
					}
				}else{
					handleLoad(KeyCharCode);
				}
			}
		}
		
		//getTypingTextArry.shift();
		//cookie.set( 'typingTextArry', getTypingTextArry, '');
		//console.log(getTypingTextArry);
		
		
		//check only for mouse click event
		if(keycodeEvnt==keyEvtCode){
			getTypingTextArry.shift();
			cookie.set( 'typingTextArry', getTypingTextArry, '');
			if(getTypingTextArry.length>0){
				return textToAdd;
			}else{
				var lessonText = $("input#lessiontext").val();
				var appendlastletter = lessonText+textToAdd;
				$("input#lessiontext").val(appendlastletter);
			}
		}else if(event.which==1){
			getTypingTextArry.shift();
			cookie.set( 'typingTextArry', getTypingTextArry, '');
			if(getTypingTextArry.length>0){
				return textToAdd;
			}else{
				var lessonText = $("input#lessiontext").val();
				var appendlastletter = lessonText+textToAdd;
				$("input#lessiontext").val(appendlastletter);
			}
		}else if(event.which==2){
			event.preventDefault();
			return false;
		}else if(event.which==3){
			event.preventDefault();
			return false;
		}
		
		
		if(getTypingTextArry.length==0 || getTypingTextArry.length==''){
			//alert(totalTypedLetter+'--'+totalWrongTypedLetter+'--'+minutes+'--'+seconds);
			
			if(textTypingCount==0 || textTypingCount==2){
				$(".datacontent").text('Great Type Again!!!');
			}else if(textTypingCount==1 || textTypingCount==3){
				$(".datacontent").text('Next lesson!!');
			}
			
			setTimeout(function(){
			$.ajax({
				url: getkeybordPageUrl+'save_lesson_record.php',
				type: 'post',
				dataType: "json",
				data: {'textTypingCount':textTypingCount, 'totalTypedLetter':totalTypedLetter, 'totalWrongTypedLetter':totalWrongTypedLetter, 'minutes':minutes},
				/* beforeSend:function(){
					if((textTypingCount%2)==0){
						$(".datacontent").text('Great Type Again!!!');
					}else if(textTypingCount==0){
						$(".datacontent").text('Next lesson!!');
					}
				}, */
				success: function(data) { //alert(JSON.stringify(data));
					
					wordArr = [];
					
					if(textTypingCount==0){
						clearTimeout(t);
						seconds = 0; minutes = 0; hours = 0;
					}
					
					
					$('input.ui-keyboard-preview').val('');
					$("#textTypingCount").val(data['textTypingCount']);
					$("input#lesson_id").val(data['lesson_id']);
					
					
					if(data['lesson_type_text'] === 'assessment'){
						
						$("#lesson_type_text").val(data['lesson_type_text']);
						$(".datacontent").css('font-size','14px');
						$(".datacontent").html(data['lesson_show_text']);
						$(".assessment_datacontent").html(data['assessment_lesson_text']);
						$(".headingarea h1").text(data['lesson_name']);
						
						//delete cookie
						cookie.delete('typingTextArry');
						//set cookie
						cookie.set( 'typingAssLetter', getAssessmentLetters(), '');
						cookie.set( 'typingAssWord', getAssessmentWords(), '');
						
					}else{
						
						$("#lesson_type_text").val(data['lesson_type_text']);
						$(".headingarea h1").text(data['lesson_name']);
						$(".datacontent").css('font-size','18px');
						
						if(data['lesson_type_text'] === 'sentence'){
							$('input.ui-keyboard-preview').css('display','none');
							$(".datacontent").html('');
							$(".ui-keyboard-preview-wrapper").append(data['lesson_show_text']);
							$(".assessment_datacontent").html('');
							
						}else{
							$('input.ui-keyboard-preview').css('display','block');
							$(".ui-keyboard-preview-wrapper .sentence").remove();
							$(".datacontent").text(data['lesson_show_text']);
							$(".assessment_datacontent").html('');
						}
						
						//delete cookie
						cookie.delete('typingTextArry');
						//set cookie
						cookie.set( 'typingTextArry', getNewCodeArry(), '');
						
						//delete cookie typingSentenceWords
						cookie.delete('typingSentenceWords');
						
						//set cookie typingSentenceWords
						cookie.set( 'typingSentenceWords', getSentenceWords(), '');
						
						
						//get cookie
						var getTypingTextJson = cookie.get('typingTextArry');
						var getTypingTextArry = getTypingTextJson.split(",");
						//show highlited letter
						$("button[type='button']").removeClass('ui-state-active');
						
						if(getTypingTextArry[0]!=='' && (lesson_type_text!='sentence') && (lesson_type_text!='assessment')){
							var KeyCharCode = String.fromCharCode(getTypingTextArry[0]).toLowerCase().trim();
							//for capital letter
							var lesson_text_lng = getTypingTextArry.length;
							var character = String.fromCharCode(getTypingTextArry[0]).trim();
							chkCapLetter(character, KeyCharCode, lesson_text_lng);
							
							var textTypingCount = $("#textTypingCount").val();
							var lesson_id = $("input#lesson_id").val();
							if(textTypingCount==0 && lesson_id<27){
								handleLoad('Lesson_'+lesson_id);
							}							
						}
						
					}
					
				},
				error: function(e) {
				}
			});
			}, 1500);
			
		}
		//return true;
	}else{
		word_voice = "wrong";
		handleLoad(word_voice);
		totalWrongTypedLetter+=1;
		event.preventDefault();
	}
};

function chkAssessment(event, keycodeEvnt, textToAdd=''){
	
	//console.log(event+'--'+keycodeEvnt+'--'+textToAdd+'<br>');
	
	var getkeybordPageUrl = $("#keyboardUrl").val().trim();
	var textTypingCount = $("#textTypingCount").val();
	
	//get cookie
	var getTypingAssWord = cookie.get('typingAssWord');
	var getTypingWordArry = getTypingAssWord.split(",");
	
	var getTypingAssLetter = cookie.get('typingAssLetter');
	var getTypingLetterArry = getTypingAssLetter.split(",");
	
	//console.log(getTypingLetterArry+'<br>');
	
	if(keycodeEvnt == 32 && getTypingWordArry[0].length>0){
		//words voice
		var aas_word_voice = getTypingWordArry[0].toLowerCase().trim().split('.').join("");
		handleLoad(aas_word_voice);
	}

	//console.log(getTypingLetterArry[0]+'--'+keycodeEvnt+'<br>');
	
	if(getTypingLetterArry[0]==keycodeEvnt){
		
		word_voice = "key";
		handleLoad(word_voice);
		
		wordArr.push(textToAdd);
		
		//remove letter one by one
		getTypingLetterArry.shift();
		cookie.set( 'typingAssLetter', getTypingLetterArry, '');
		
		//console.log(wordArr+'<br>');
		//console.log(cookie.get('typingAssLetter')+'<br>');
		
		//console.log(wordArr.join('')+'--'+getTypingWordArry[0]+'<br>');
		
		if((wordArr.join('').toLowerCase().trim())==(getTypingWordArry[0].toLowerCase().trim())){
			getTypingWordArry.shift();
			cookie.set( 'typingAssWord', getTypingWordArry, '');
			wordArr = [];
		}
		
		//highlited button key
		$("button[type='button']").removeClass('ui-state-active');
		if(textToAdd!==''){
			var KeyCharCode = textToAdd.toLowerCase().trim();
			if(KeyCharCode === ''){ 
				var KeyCharCode = "space";
			}
			$("button[data-name='"+KeyCharCode+"']").addClass('ui-state-active');
		}
		
		
		if(wordArr.length==0){
			
			setTimeout(function(){
				
				$('input.ui-keyboard-preview').val('');
				
				if(getTypingLetterArry.length==0 || getTypingLetterArry.length==''){
					
					var lesson_id = $("input#lesson_id").val();
					var lesson_type_text = $("input#lesson_type_text").val();
					
					console.log(lesson_type_text+'--'+lesson_id);
					
					if(lesson_type_text == 'assessment' && lesson_id==4){
						window.location.href = getkeybordPageUrl+'typing/lesson-result.php'
					}
					
					$.ajax({
						url: getkeybordPageUrl+'save_lesson_record.php',
						type: 'post',
						dataType: "json",
						data: {'textTypingCount':3, 'totalTypedLetter':totalTypedLetter, 'totalWrongTypedLetter':totalWrongTypedLetter, 'minutes':minutes},
						
						success: function(data) {//alert(JSON.stringify(data));
							
							$('input.ui-keyboard-preview').val('');
							$("#textTypingCount").val(data['textTypingCount']);
							$("input#lesson_id").val(data['lesson_id']);
							wordArr = [];
							
							if(textTypingCount==0){
								clearTimeout(t);
								seconds = 0; minutes = 0; hours = 0;
							}
							
							if(data['lesson_type_text'] === 'assessment'){
								
								$("#lesson_type_text").val(data['lesson_type_text']);
								$(".datacontent").html(data['lesson_show_text']);
								$(".assessment_datacontent").html(data['assessment_lesson_text']);
								$(".headingarea h1").text(data['lesson_name']);
								
								//delete cookie
								cookie.delete('typingTextArry');
								//set cookie
								cookie.set( 'typingAssLetter', getAssessmentLetters(), '');
								cookie.set( 'typingAssWord', getAssessmentWords(), '');
								
							}else{
								
								cookie.delete('typingAssWord');
								cookie.delete('typingAssLetter');
								
								$("#lesson_type_text").val(data['lesson_type_text']);
								$(".headingarea h1").text(data['lesson_name']);
								$(".datacontent").css('font-size','18px');
								
								if(data['lesson_type_text'] === 'sentence'){
									$('input.ui-keyboard-preview').css('display','none');
									$(".datacontent").html('');
									$(".ui-keyboard-preview-wrapper").append(data['lesson_show_text']);
									$(".assessment_datacontent").html('');
									
								}else{
									$('input.ui-keyboard-preview').css('display','block');
									$(".ui-keyboard-preview-wrapper .sentence").remove();
									$(".datacontent").text(data['lesson_show_text']);
									$(".assessment_datacontent").html('');
								}
								
								//delete cookie typingTextArry
								cookie.delete('typingTextArry');
								
								//set cookie typingTextArry
								cookie.set( 'typingTextArry', getNewCodeArry(), '');
								
								//delete cookie typingSentenceWords
								cookie.delete('typingSentenceWords');
								
								
								//get cookie
								var getTypingTextJson = cookie.get('typingTextArry');
								var getTypingTextArry = getTypingTextJson.split(",");
								//show highlited letter
								$("button[type='button']").removeClass('ui-state-active');
								if(getTypingTextArry[0]!=='' && ((lesson_type_text!='sentence') || (lesson_type_text!='assessment'))){
									var lesson_text_lng = getTypingTextArry.length;
									var KeyCharCode = String.fromCharCode(getTypingTextArry[0]).toLowerCase().trim();
									//for capital letter
									var character = String.fromCharCode(getTypingTextArry[0]).trim();
									chkCapLetter(character, KeyCharCode, lesson_text_lng);
									
									var textTypingCount = $("#textTypingCount").val();
									var lesson_id = $("input#lesson_id").val();
									if(textTypingCount==0 && lesson_id<27){
										handleLoad('Lesson_'+lesson_id);
									}	
									
								}
								
							}
							
						},
						error: function(e) {
						}
					}); 
				}
				
			},1000);
		}
		return textToAdd;
	}
	
	if(keycodeEvnt !== 32){
		word_voice = "wrong";
		handleLoad(word_voice);
		totalWrongTypedLetter+=1;
	}
	event.preventDefault();
	return false;
}


function lessonWordSentence(){
	var lesson_type_text = $("input#lesson_type_text").val();
	var getkeybordPageUrl = $("#keyboardUrl").val().trim();
	var textTypingCount = $("#textTypingCount").val();
	
	var make_lesson_show_text = [];

	$("select.sentence_words option:selected").each(function(){
		var val_make_sentence = $(this).val();
		if(val_make_sentence.length===0){
			make_lesson_show_text = [];
			return false;
		}else{
			make_lesson_show_text.push(val_make_sentence);
		}
	});
	
	if(make_lesson_show_text.length>0){
		var make_lesson_show_text = make_lesson_show_text.join(" ");
		$.ajax({
			url: getkeybordPageUrl+'save_lesson_record.php',
			type: 'post',
			dataType: "json",
			data: {'textTypingCount':textTypingCount,'make_lesson_show_text':make_lesson_show_text},
			beforeSend:function(){
				$(".datacontent").text('Lesson Start');
			},
			success: function(data) { //alert(JSON.stringify(data));
				
				$('input.ui-keyboard-preview').val('');
				$("#textTypingCount").val(0);
				
				cookie.delete('typingAssWord');
				cookie.delete('typingAssLetter');
				
				$("#lesson_type_text").val(data['lesson_type_text']);
				$(".headingarea h1").text(data['lesson_name']);
				$(".datacontent").css('font-size','18px');
				
				$('input.ui-keyboard-preview').css('display','block');
				$(".ui-keyboard-preview-wrapper .sentence").remove();
				$(".datacontent").text(data['lesson_show_text']);
				$(".assessment_datacontent").html('');
				
				
				//delete cookie typingTextArry
				cookie.delete('typingTextArry');
				
				//set cookie typingTextArry
				cookie.set( 'typingTextArry', getNewCodeArry(), '');
				
				//delete cookie typingSentenceWords
				cookie.delete('typingSentenceWords');
				
				//set cookie typingSentenceWords
				cookie.set( 'typingSentenceWords', getSentenceWords(), '');
				
				//get cookie
				var getTypingTextJson = cookie.get('typingTextArry');
				var getTypingTextArry = getTypingTextJson.split(",");
				//show highlited letter
				$("button[type='button']").removeClass('ui-state-active');
				
				if(getTypingTextArry[0]!==''){
					var KeyCharCode = String.fromCharCode(getTypingTextArry[0]).toLowerCase().trim();
					//for capital letter
					var lesson_text_lng = getTypingTextArry.length;
					var character = String.fromCharCode(getTypingTextArry[0]).trim();
					chkCapLetter(character, KeyCharCode, lesson_text_lng);
					
					var textTypingCount = $("#textTypingCount").val();

					if(textTypingCount==0){
						var lesson_id = $("input#lesson_id").val();
						handleLoad('Lesson_'+lesson_id);
					}	
					
				}

			},
			error: function(e) {
			}
		});
		
		
	}else{
		return false;
	}
}
var isTyped = 0;
$(document).keypress(function(){	
	$(".hand").removeClass("dnone");
	isTyped++;
});
$(document).ready(function(){	
	if(isTyped > 0)
	{
		$(".ui-keyboard .ui-keyboard-keyset,.hand").mouseenter(function(){
	        $(".lefthand,.righthand").css({"top":"40px","transition":"all 2s","opacity":"0.1"});
	    });
	    $(".ui-keyboard .ui-keyboard-keyset,.hand").mouseleave(function(){
			$(".lefthand,.righthand").css({"top":"-78px","transition":"all 2s","opacity":"1"});
	    });	
	}
	
	
	//set cookie
	cookie.set( 'typingTextArry', getNewCodeArry(), '');
	
	//get cookie
	var getTypingTextJson = cookie.get('typingTextArry');
	var getTypingTextArry = getTypingTextJson.split(",");
	var lesson_type_text = $("input#lesson_type_text").val();
	
	//console.log(getTypingTextArry);
	//show highlited letter
	$("button[type='button']").removeClass('ui-state-active');
	if(getTypingTextArry[0]!=='' && (lesson_type_text!='sentence') && (lesson_type_text!='assessment')){
		var KeyCharCode = String.fromCharCode(getTypingTextArry[0]).toLowerCase().trim();
		//for capital letter
		var lesson_text_lng = getTypingTextArry.length;
		var character = String.fromCharCode(getTypingTextArry[0]).trim();
		chkCapLetter(character, KeyCharCode, lesson_text_lng);
	}	
});


$(document).on("click","#sentenceDone",function(){
	lessonWordSentence();
});

