if (sessionStorage.getItem("is_reloaded") == "true"){ 
	//alert('Reloaded!');
	var getkeybordPageUrl = $("#keyboardUrl").val().trim();
	//window.location.href = getkeybordPageUrl;
}
sessionStorage.setItem("is_reloaded", true);

$(".yes-audio").trigger('load');
$(".yes-audio").trigger('play');

$('#lockable').keyboard({
layout: 'custom',
restrictInput : true,
stayOpen: true,
ignoreEsc: true,
closeByClickEvent: true,
preventPaste: true,
autoAccept: true,
beforeInsert: function(e, keyboard, el, textToAdd) {
	//console.log(e+'--'+keyboard+'--'+el+'--'+textToAdd+'--'+textToAdd.charCodeAt(0));
	return getKeyboardKey(e,textToAdd.charCodeAt(0),textToAdd);
},
customLayout: {
	'normal': [
		'` 1 2 3 4 5 6 7 8 9 0 - = {bksp}',
		'{tab} q w e r t y u i o p [ ] \\',
		'a s d f g h j k l ; \' {enter}',
		'{shift} z x c v b n m , . / {shift}',
		' {space} {left} {right} {sp:.2} {del}'
	],
	'shift': [
		//'~ ! @ # $ % ^ & * ( ) _ + {bksp}',
		'` 1 2 3 4 5 6 7 8 9 0 - = {bksp}',
		'{tab} Q W E R T Y U I O P { } |',
		'A S D F G H J K L : " {enter}',
		'{shift} Z X C V B N M < > ? {shift}',
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

//get lesson text
function getNewCodeArry(){	
	var datacontent = $(".datacontent").text();
	var datacontent = datacontent.trim();
	var ary = datacontent.split('');
	var keyCount = ary.length;

	var newKey = [];
	for(var i=0;i<keyCount;i++){
		var str = ary[i];
		//console.log(str);
		//convert char into keynum
		newKey.push(str.charCodeAt(0));
	}
	return newKey;
}
//set cookie
cookie.set( 'typingTextArry', getNewCodeArry(), '');


function getKeyboardKey(event,keyEvtCode=0,textToAdd=''){
	
	var keycodeEvnt = (event.keyCode ? event.keyCode : event.which);
	//get cookie
	var getTypingTextJson = cookie.get('typingTextArry');
	var getTypingTextArry = getTypingTextJson.split(",");
	
	$("button[type='button']").removeClass('ui-state-active');
	if(getTypingTextArry[1]!==''){
		var KeyCharCode = String.fromCharCode(getTypingTextArry[1]).trim();
		if(KeyCharCode === ''){ 
			var KeyCharCode = "space";
		}
		$("button[data-name='"+KeyCharCode+"']").addClass('ui-state-active');
	}
	
	if(getTypingTextArry[0]==keyEvtCode){		
		if(keycodeEvnt==keyEvtCode){
			getTypingTextArry.shift();
			cookie.set( 'typingTextArry', getTypingTextArry, '');
			return textToAdd;
		}else if(event.which==1){
			getTypingTextArry.shift();
			cookie.set( 'typingTextArry', getTypingTextArry, '');
			return textToAdd;
		}else if(event.which==2){
			event.preventDefault();
			return false;
		}else if(event.which==3){
			event.preventDefault();
			return false;
		}  
	}else{
		event.preventDefault();
		return false;
	}
}

window.addEventListener("keypress", myEventHandler, false);
function myEventHandler(event){
	var keycodeEvnt = (event.keyCode ? event.keyCode : event.which);
	//alert(event.keyCode+'--'+event.keyCode+'--'+event.which);
	
	//get cookie
	var getTypingTextJson = cookie.get('typingTextArry');
	var getTypingTextArry = getTypingTextJson.split(",");
	$("button[type='button']").removeClass('ui-state-active');
	if(getTypingTextArry[1]!==''){
		var KeyCharCode = String.fromCharCode(getTypingTextArry[1]).trim();
		if(KeyCharCode === ''){ 
			var KeyCharCode = "space";
		}
		$("button[data-name='"+KeyCharCode+"']").addClass('ui-state-active');
	}
	
	console.log(getTypingTextArry);
	//console.log(keycodeEvnt);

	console.log(getTypingTextArry[0]+'--'+keycodeEvnt);
	
	if(getTypingTextArry[0]==keycodeEvnt){
		
		var getkeybordPageUrl = $("#keyboardUrl").val().trim();
		var textTypingCount = $("#textTypingCount").val();
		var KeyCharCode = String.fromCharCode(keycodeEvnt);
		
		if(keycodeEvnt !== 32 && KeyCharCode!=''){
			//letters voice
			$("audio.yes-audio").html('<source src="'+getkeybordPageUrl+'voice/letters/'+KeyCharCode+'.mp3" type="audio/mpeg">');
			$(".yes-audio").trigger('load');
			$(".yes-audio").trigger('play');
		}
		
		getTypingTextArry.shift();
		cookie.set( 'typingTextArry', getTypingTextArry, '');
		console.log(getTypingTextArry);
		
		
		if(getTypingTextArry.length==0 || getTypingTextArry.length==''){

			$.ajax({
				url: getkeybordPageUrl+'save_lesson_record.php',
				type: 'post',
				dataType: "json",
				data: {'textTypingCount':textTypingCount},
				beforeSend:function(){
					if((textTypingCount%2)==0){
						$(".datacontent").text('Great Type Again!!!');
					}else if((textTypingCount%2)!=0){
						$(".datacontent").text('Next lesson!!');
					}
				},
				success: function(data) { //alert(data);
					//setTimeout(window.location.reload(), 3000);
					console.log(data['textTypingCount']+'--'+data['lesson_show_text']+'--'+data['lesson_name']);
					$('input.ui-keyboard-preview').val('');
					$("#textTypingCount").val(data['textTypingCount']);
					
					if(data['type_text'] === 'html'){
						$(".datacontent").html(data['lesson_show_text']);
					}else{
						$(".datacontent").text(data['lesson_show_text']);
					}
					
					$(".headingarea h1").text(data['lesson_name']);
					
					//delete cookie
					cookie.delete('typingTextArry');
					//set cookie
					cookie.set( 'typingTextArry', getNewCodeArry(), '');
					
					
					//get cookie
					var getTypingTextJson = cookie.get('typingTextArry');
					var getTypingTextArry = getTypingTextJson.split(",");
					$("button[type='button']").removeClass('ui-state-active');
					if(getTypingTextArry[0]!==''){
						var KeyCharCode = String.fromCharCode(getTypingTextArry[0]).trim();
						if(KeyCharCode === ''){ 
							var KeyCharCode = "space";
						}
						$("button[data-name='"+KeyCharCode+"']").addClass('ui-state-active');
					}
					
					
				},
				error: function(e) {
				}
			}); 
		}
		return true;
	}else{
		event.preventDefault();
	}
};


$(document).ready(function(){
	
	$('input#lockable, input.ui-keyboard-preview').unbind('keydown').bind('keydown', function(e) {
		var disallowedKeys = [37, 38, 39, 40, 8 ,46, 35, 36, 34, 33 ];  
		// arrow keys, backspace, delete, end, home, pagedown, pageup
		var key = e.which;
		if (disallowedKeys.indexOf(key) > -1) {
			console.log('yes0000');
			e.preventDefault();
			return false;
		}else{
			console.log('no0000');
		}
	});
	
	
	//get cookie
	var getTypingTextJson = cookie.get('typingTextArry');
	var getTypingTextArry = getTypingTextJson.split(",");
	$("button[type='button']").removeClass('ui-state-active');
	if(getTypingTextArry[0]!==''){
		var KeyCharCode = String.fromCharCode(getTypingTextArry[0]).trim();
		if(KeyCharCode === ''){ 
			var KeyCharCode = "space";
		}
		$("button[data-name='"+KeyCharCode+"']").addClass('ui-state-active');
	}
	

	$("#sentenceDone").click(function(){
		
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
					if((textTypingCount%2)==0){
						$(".datacontent").text('Great Type Again!!!');
					}else if((textTypingCount%2)!=0){
						$(".datacontent").text('Next lesson!!');
					}
				},
				success: function(data) { //alert(data);
					//setTimeout(window.location.reload(), 3000);
					console.log(data['textTypingCount']+'--'+data['lesson_show_text']+'--'+data['lesson_name']);
					$('input.ui-keyboard-preview').val('');
					$("#textTypingCount").val(data['textTypingCount']);
					$(".datacontent").text(data['lesson_show_text']);
					$(".headingarea h1").text(data['lesson_name']);
					
					//delete cookie
					cookie.delete('typingTextArry');
					//set cookie
					cookie.set( 'typingTextArry', getNewCodeArry(), '');
					
					//get cookie
					var getTypingTextJson = cookie.get('typingTextArry');
					var getTypingTextArry = getTypingTextJson.split(",");
					$("button[type='button']").removeClass('ui-state-active');
					if(getTypingTextArry[0]!==''){
						var KeyCharCode = String.fromCharCode(getTypingTextArry[0]).trim();
						if(KeyCharCode === ''){ 
							var KeyCharCode = "space";
						}
						$("button[data-name='"+KeyCharCode+"']").addClass('ui-state-active');
					}
					
					
				},
				error: function(e) {
				}
			});
			
			
		}else{
			return false;
		}
		
	});
});
