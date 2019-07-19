// COLUMN BAASED VERSION
//set base values for assumptions
var DEFAULTS = {
	"nil_rate": '325,000',
	"charity": 0,
		growthRates: {
		"property": 3,
		"investments": 6,
		"pensions": 5,
		"other": 5
	},
	"years": 20
};

// var period = 20; replace with DEFAULT value
var init_total = 0;
var end_total = 0;
var init_IHT = 0;
var end_IHT = 0;

// this holds the values for the asset growth values over × years
var INVEST_HOLDER = {
  property : [],
  investments : [],
  pensions : [],
  other : []
};


var investments_init = {
  property: 0,
  investments: 0,
  pensions: 0,
  other: 0
};

//set error messages

var errors = {
	age_input: [
		"Please enter your age.",
		"Please note that PruProtect only provides Life Cover to those aged between 18 and 75 at the time of taking out cover.",
		"Please note that PruProtect only provides Life Cover to those aged between 18 and 75 at the time of taking out cover."
	],
	character_warning: "Numeric input only"
}

/////////////////////////////Add tab index to inputs////////////////////////////////
var inputs = $(':input');
inputs.each(function(i) {
	$(this).attr('tabIndex', i+1);	
});

///////////////////////////////// SET PRESET FORM VALUES

$('input[name="nil-rate"]').val(DEFAULTS.nil_rate);
$('input[name="time-horizon"]').val(DEFAULTS.years);
$('input[name="growth_property"]').val(DEFAULTS.growthRates.property);
$('input[name="growth_investments"]').val(DEFAULTS.growthRates.investments);
$('input[name="growth_pensions"]').val(DEFAULTS.growthRates.pensions);
$('input[name="growth_other"]').val(DEFAULTS.growthRates.other);

/////////////////////////////Calculate total on load if form values populated////////////////////////////////
calculate_total();

///////////////////////////////// UPDATE TOTALS ON THE FLY
$('input.asset').on('blur', function() {
	
	if ( $(this).val() === '' ) { // Check a value has been entered, if not set to zero
		$(this).val(0);	
	}
	$(this).val(addCommas( $(this).val() ) );
	update_investments();
	calculate_total();

});

///////////////////////////////// CHECK nil-rate VALUE

//nil-rate must be greater or equal to £325,000
$('#nil-rate').on('blur', function() {
	var NilRate = $(this).val();
	NilRate = validate_inputs(NilRate);
	if ( NilRate >= 325000 ) {
		$('.error').fadeOut();
		return true;	
	} else if (NilRate < 325000) {
		$(this).next('p.error').fadeIn(200);
	}
});

///////////////////////////////// UPDATE GROWTH RATES ON THE FLY
$('#growth-rates').find('input').live('change', function() {
	var current = $(this).parent().prev().text().toLowerCase().replace(/ /g, '');
	DEFAULTS.growthRates[current] = $(this).val();
	
});


function save_growths(target) {
	$('#growth-rates').find(inputs).each(function(i){
		DEFAULTS.growthRates[ $(this).attr('name') ] = $(this).val();
	});
	$(target).next().fadeIn(60).delay(400).fadeOut(200);	
	
}



// FUNCTIONS

$('form input').bind('keydown', function inputMask(event) {
	
	var $keycode = event.keyCode;
	//check for valid numeric input on both normal number range and numeric keypad including both delete keys, commas and periods and tab and command or alt 
	var allowed = [8,9,18,46,110,188,190,224];
	
	if ( ($keycode >= 48 && $keycode <= 57) || ($keycode >= 96 && $keycode <= 105) || $keycode === 8 || $keycode === 9 || $keycode === 13 || $keycode === 18 || $keycode === 46 || $keycode === 110 || $keycode === 188 || $keycode === 190 || $keycode === 224 ) {
		
		//clear warning class and allow normal behaviour
		$(this).removeClass('warning');
		
		return true;
		
	} else {
		
		// non-numeric input detected. Add warning class to input and warning message
		$(this).addClass('warning');
		
		// Check warning message isn't already appended to prevent multiple instances
		if ( $('span.warning').length === 0 ) {
			$(this).parent().prev('label').append('<span class="warning"> –! Please enter numeric input only</span>');
			$('span.warning').hide().fadeIn(50).delay(100).fadeOut(500, function(){
					$('span.warning').remove();
			});

		}
		// Block default behaviour to disallow input of non-numeric characters
		return false;	
	}
});

//UPDATE INVESTMENT OBJECT WITH FORM VALUES  ----- 1
function update_investments() {
	var key;
	$('input.asset').each(function(i) {
		// set investments key to name of the input's label attribute
		key = $(this).attr('name').toLowerCase().replace(/ /g, ''); //use regex to strip ALL spaces
		// grab the input's value and validate it				
		var val = validate_inputs( $(this).val() ); /////////////// 2
		// update the investments object with that value
		investments_init[key] = val;
	});
}


// remove errors on input focus
$('input').on('focus', function(){
	$(this).parent().find('p.error').hide();
	$(this).removeClass('error');
	var $id = $(this).attr('id');
	if ( $id !== 'nil-rate' && $id !== 'submit-form' ) { // Don't auto-clear IHT field
 		$(this).val('');
	}
});

//VALIDATE INPUTS - sanitise input figure and check for errors ----------- 2
function validate_inputs($value) {
	//strip out all non-numeric input
	//set variable equal to figure or 0 if no input
	$value = parseFloat( $value.replace(/[^\d.]/g, "") || 0 );
	$('input').removeClass('error');
	return($value);
	

} //END VALIDATE INPUTS
		
		
//CALCULATE TOTAL
function calculate_total() {
	var total = sum_item(investments_init);
	init_total = parseFloat(total); // round to whole number 
	$('#asset-total, #result-total').text('£' + addCommas(init_total)); 
	calculate_IHT(total);
	return total;

} //END CALC TOTAL

/////////////////////////////////  Format numbers
function addCommas(nStr)
	/*
		BE CAREFUL! This returns a string format. If you try and return a string as 
		a NUMBER input's value then Chrome doesn't like it.
	*/
{
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
}

/////////////////////////////////  function to get total of an array or object

function sum_item(item) {
  // Function to sum the total of an array or object
  // Both array and object evaluate as object so make sure
  // we aren't trying to sum anything else
  var total = 0;
  if (item.length && typeof item === "object") {
	 // Item has length property => is an array
	   
	$.each(item, function() {
		 total += this; 
	});
	  
  } else if (!item.length && typeof item === "object") {
	 // Item doesn't have length => is an object
	 var name;
	 for (name in item) {
		 
		  total += parseFloat( item[name] ) || 0;
	 } // end FOR
	
  } // end IF
  return total;
	
} // end FUNCTION SUM_ITEM


///////////////////////////////// FUNCITON TO WORK-OUT IHT LIABILITY

function calculate_IHT(total) {
	var nil_rate = parseInt( validate_inputs( $('input[name="nil-rate"]').val() ) ) || 0; // get the nil-rate value, deduct from total
	var figure = total - nil_rate;
	//var rate = $('#charity-yes').is(':checked') ? 0.36 : 0.4; // set the IHT tax rate depending on charitable donation
	var rate;
	if ( $('#charity-yes').is(':checked') ) {
		rate = 0.36;
		figure = figure * 0.9; // Deduct 10% from figure due to charitable donation
	} else {
		rate = 0.4;	
	}
	
	figure = ( figure * rate ); // work-out IHT
	
	// Check IHT is not negative figure (i.e asset total is less than the nil-rate band figure of £325,000
	if (figure < 0 ) {
		figure = 0;	
	}
	return figure;
}


$('#IHT-calc').submit(function(e) {
	
	e.preventDefault();
	$('p.error').hide(); // Hide all errors to prevent multiple instances
	
	var age_input = $('#input_age');
	var age = parseInt( $(age_input).val() ); // grab the age value and validate

	// check that a value other than the default has been entered
	if (age === '00' || !age) { 
		$('#age_error').text(errors.age_input[0]).show();
		$(age_input).addClass('error').show();
		scroller("#section-1");
		return false;
	} else if (age < 18) {
		$('#age_error').text(errors.age_input[2]).show();
		$(age_input).addClass('error').show();
		scroller("#section-1");
		return false;
	} else if (age > 75) {
		$('#age_error').text(errors.age_input[1]).show();
		$(age_input).addClass('error').show();
		scroller("#section-1");
		return false;
	} 
	
	var time = parseInt( $('#time-horizon').val() );

	// check that a value other than 0 has been entered
	if (time === '00' || !time) {
		$('#time_error').show();
		$('#time-horizon').addClass('error').show();
		scroller('#time-horizon');
		return false;
	} else {
		years = time;
		$('#result-age').text(years + age);
	}
	
	// make sure T's and C's have been checked
	if ( $('#t_and_c').prop('checked') == false ) {
		$('#t_and_c').next('label').addClass('error').show();
		scroller('#t_and_c');
		return false;
	} else {
		$('#t_and_c').next('label').removeClass('error');	
	}
	
	//CALCULATE TOTAL AND INSERT VALUES INTO INVESTMENTS ARRAY
	update_investments(); ////////// 1
	calculate_total();
	
	//RUN MAIN CALCULATIONS
	//Replace with for each loop§
	run_calc(INVEST_HOLDER.property, investments_init.property, DEFAULTS.growthRates.property);
	run_calc(INVEST_HOLDER.investments, investments_init.investments, DEFAULTS.growthRates.investments);
	run_calc(INVEST_HOLDER.pensions, investments_init.pensions, DEFAULTS.growthRates.pensions);
	run_calc(INVEST_HOLDER.other, investments_init.other, DEFAULTS.growthRates.other);
	
	end_total = INVEST_HOLDER.property[years] + INVEST_HOLDER.investments[years] + INVEST_HOLDER.pensions[years] + INVEST_HOLDER.other[years];
	
	init_IHT = Math.round( calculate_IHT(init_total) );
	end_IHT = Math.round( calculate_IHT(end_total) );
	percentages(init_total, end_total);
	
	// Do the percentages
	$('#result-wealth-increase').text(percentages(init_total, end_total));
	$('#result-iht-bill').text(percentages(init_IHT, end_IHT));
	
	$('#init-IHT').text( '£' + addCommas(init_IHT) ); // update the IHT figure in results
	$('#result-wealth-total').text( '£' +  addCommas(Math.round(end_total) ) );
	$('#result-IHT-total').text( '£' +  addCommas(end_IHT) );
	$('.calc-results').slideDown(function(){
		scroller("#calc-results");	
	});
	do_graphs();
});

//MAIN CALC FUNCTION
var run_calc = function(investment, init , growthRate) {

  for (i=0; i<=years; i++) {
    if (i===0) {
        investment[i] = init;
    } else {
        investment[i] = ( investment[i-1] + ( investment[i-1] * (growthRate / 100) ) ) ;  
    }// END IF
  }// END FOR
};

// Figure out the % increases in the values
var percentages = function(a, b) {
	var percent = Math.round( b/a * 100 );
	if (isNaN(percent) ){
		percent = 0;	
	};
	if (percent == Number.POSITIVE_INFINITY) {
		return 'a very large amount';	
	}
	return percent + '%';
}

var do_graphs = function(){
	
		var growthData = [
          ['Time', 'Assets', 'IHT bill'],
          ['Now',  init_total,   init_IHT],
          [years + ' years',  end_total,   end_IHT]
        ]

      function drawVisualization() {
        // Create and populate the data table.
        var data = google.visualization.arrayToDataTable(growthData);
      	var formatter = new google.visualization.NumberFormat({pattern:'£###,###'} ); 
		formatter.format(data, 1);
		formatter.format(data, 2);
		
        // Create and draw the visualization.
        new google.visualization.ColumnChart(document.getElementById('holder')).
            draw(data,
                 {title:"IHT bill projection",
				 isStacked: "true",
				 colors: ['#6A737B', '#f8116a'],
                  width:710, height:400,
				  vAxis: {format:'£###,###'}
				  }
            );
      }

      drawVisualization();	
	 
}

// Use for smooth scrolling to targeted elements
var scroller = function(target) {
		var pos_y = $(target).offset().top;
		$('body, html').animate({scrollTop: pos_y}, 600);
}

/*
$('body').on('keypress', function(event) {
	// grab event target i.e html element the keypress is occurring
	var $target = event.target;
	console.log(event.charCode);
	// if target is input field then do nothing
	if ( $($target).is("input") ) {
		return true;	
	// if target is not input field then check for shortcuts
	} else {
		var map = {};
		//onkeydown=onkeyup=function(e){
    	map.puevent.keyCode];
		console.log(map);
		if ( map[113] && map[49] ) {
			console.log('section-1');	
		}
	}
});*/

// keyboard function - creates shortcuts to form sections when "q" plus 1,2,3,4 are pressed
var map={}//  Use object to record keys being pressed
onkeydown=onkeyup=function(e){
    e=e||event//to deal with IE
    map[e.keyCode]=e.type=='keydown'?true:false

	if ( map[81] && map[49] ) {
			scroller("#section-1");	
			map = {}; // reset map object
	} else if ( map[81] && map[50] ) {
			scroller("#section-2");	
			map = {}; // reset map object
	} else if ( map[81] && map[51] ) {
			scroller("#section-3");	
			map = {}; // reset map object
	} else if ( map[81] && map[52] ) {
			scroller("#section-4");	
			map = {}; // reset map object
	}
}
