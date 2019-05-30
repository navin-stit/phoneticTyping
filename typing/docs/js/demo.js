jQuery(function($) {

	// QWERTY Text Input
	// The bottom of this file is where the autocomplete extension is added
	// ********************
	$('#lockable').keyboard({
		layout: 'custom',
		stayOpen: true,
		customLayout: {
			'normal': [
				'` 1 2 3 4 5 6 7 8 9 0 - = {bksp}',
				'{tab} q w e r t y u i o p [ ] \\',
				'a s d f g h j k l ; \' {enter}',
				'{shift} z x c v b n m , . / {shift}',
				' {space} {left} {right} {sp:.2} {del} {toggle}'
			],
			'shift': [
				'~ ! @ # $ % ^ & * ( ) _ + {bksp}',
				'{tab} Q W E R T Y U I O P { } |',
				'A S D F G H J K L : " {enter}',
				'{shift} Z X C V B N M < > ? {shift}',
				' {space} {left} {right} {sp:.2} {del} {toggle}'
			]
		}
	}).addTyping({
			showTyping: true,
			delay: 200
		});
var kb = $('#lockable').getkeyboard();
			kb.options.layout = 'custom';
			// redraw keyboard with new layout
			kb.redraw();
	//$('.version').html( '(v' + $('#text').getkeyboard().version + ')' );

	// Contenteditable
	// ********************
	$.keyboard.keyaction.undo = function (base) {
		base.execCommand('undo');
		return false;
	};
	$.keyboard.keyaction.redo = function (base) {
		base.execCommand('redo');
		return false;
	};



	// International Text Area
	// ********************
	

	// Custom: Meta Sets
	// ********************
	

/* example from readme, comment out the meta example above then uncomment this one to test it
	$('#meta').keyboard({
		layout: 'custom',
		display: {
			'meta1'  : '\u2666', // Diamond
			'meta2'  : '\u2665'  // Heart
		},
		customLayout: {
			'normal' : [
				'd e f a u l t',
				'{meta1} {meta2} {accept} {cancel}'
			],
			'meta1' : [
				'm y m e t a 1',
				'{meta1} {meta2} {accept} {cancel}'
			],
			'meta2' : [
				'M Y M E T A 2',
				'{meta1} {meta2} {accept} {cancel}'
			]
		}
	})
*/


	// Custom: Hidden Input
	// click on a link - add focus to hidden input
	// ********************
	$('.hiddenInput').click(function(){
		$('#hidden').data('keyboard').reveal();
		return false;
	});
	// Initialize keyboard script on hidden input
	// set "position.of" to the same link as above
	$('#hidden').keyboard({
		layout: 'qwerty',
		position     : {
			of : $('.hiddenInput'),
			my : 'center top',
			at : 'center top'
		}
	});

	// Custom: Lockable
	// ********************
	

	// Custom: iPad by gitaarik
	

	// Console showing callback messages
	// ********************
	$('.ui-keyboard-input').bind('visible hidden beforeClose accepted canceled restricted', function(e, keyboard, el, status){
		var c = $('#console'),
			focused = true,
			val = keyboard.isContentEditable ? el.textContent : el.value,
			t = '<li><span class="keyboard">' + $(el).parent().find('h2 .tooltip-tipsy').text() + '</span>';
			switch (e.type){
				case 'visible'  : t += ' keyboard is <span class="event">visible</span>'; focused = true; break;
				case 'hidden'   : t += ' keyboard is now <span class="event">hidden</span>'; break;
				case 'accepted' : t += ' content "<span class="content">' + val + '</span>" was <span class="event">accepted</span>' + ($(el).is('[type=password]') ? ', yeah... not so secure :(' : ''); break;
				case 'canceled' : t += ' content was <span class="event ignored">ignored</span>'; break;
				case 'restricted'  : t += ' The "' + String.fromCharCode(e.keyCode) + '" key is <span class="event ignored">restricted</span>!'; focused = true; break;
				case 'beforeClose' : t += ' keyboard is about to <span class="event">close</span>, contents were <span class="event ' + (status ? 'accepted">accepted' : 'ignored">ignored') + '</span>'; break;
			}
		t += '</li>';
		c.append(t);
		if (c.find('li').length > 3) { c.find('li').eq(0).remove(); }
		// demo stuff only
		keyboard.$el.closest('.block').toggleClass('focused', focused);
	});

	// Show code
	// ********************
	$('h2 span').click(function(){
		var orig = 'Click, then scroll down to see this code',
			active = 'Scroll down to see the code for this example',
			t = '<h3>' + $(this).parent().text() + ' Code</h3>' + $(this).closest('.block').find('.code').html();
		// add indicator & update tooltips
		$('h2 span')
			.attr({ title : orig, 'original-title': orig })
			.parent()
			.filter('.active')
			.removeClass('active');
		$(this)
			.attr({ title : active, 'original-title': active })
			// hide, then show the tooltip to force updating & realignment
			.tipsy('hide')
			.tipsy('show')
			.parent().addClass('active');
		$('#showcode').html(t).show();
	});

	// add tooltips
	// ********************
	$('.tooltip-tipsy').tipsy({ gravity: 's' });
	$('.navbar [title]').tipsy({ gravity: 'n' });

// ********************
// Extension demos
// ********************

	// Set up typing simulator extension on ALL keyboards
	$('.ui-keyboard-input').addTyping();

	// simulate typing into the keyboard
	// \t or {t} = tab, \b or {b} = backspace, \r or \n or {e} = enter
	// added {l} = caret left, {r} = caret right & {d} = delete
	$('#inter-type').click(function(){
		$('#inter').getkeyboard().reveal().typeIn("{t}Hal{l}{l}{d}e{r}{r}l'o{b}o {e}{t}World", 500);
		return false;
	});
	$('#meta-type').click(function(){
		var meta = $('#meta').getkeyboard();
		meta.reveal().typeIn('aBcD1112389\u0411\u2648\u2649', 700, function(){ meta.accept(); alert('all done!'); });
		return false;
	});

	// Autocomplete demo
	var availableTags = [
		"ActionScript",
		"AppleScript",
		"Asp",
		"BASIC",
		"C",
		"C++",
		"Clojure",
		"COBOL",
		"ColdFusion",
		"Erlang",
		"Fortran",
		"Groovy",
		"Haskell",
		"Java",
		"JavaScript",
		"Lisp",
		"Perl",
		"PHP",
		"Python",
		"Ruby",
		"Scala",
		"Scheme"
	];
	$('#text')
		.autocomplete({
			source: availableTags
		})
		.addAutocomplete();

	prettyPrint();

});
