$(function(){  var word = "Competitor Analysis";  word = word.split("");  var wordLength = word.length;  var i = 0;  var id;  var text = "";    function updateText() {	  if ( i < wordLength ) {	  	text += word[i];		$('.name-target').text(text);		i++;	  	setTimeout(updateText, 100);	  }  }    setTimeout(updateText(i), 300);  var $filters = '';  var $filterParent = $('.test');  var $filtered = $('.filter');  //console.log($filtered);  function filterBuilder() {      var $target = $('.filter_nav');      var $terms = [];      $('.filter').each(function(){        var $temp;        $temp = $(this).attr('data-tags').replace(/\s/g, '').split(',');        $.merge($terms, $temp);      });      var uniqueNames = ['all'];      $.each($terms, function(i, el){          if($.inArray(el, uniqueNames) === -1 && el !=='') uniqueNames.push(el);      });      var $html = '<p>Use the options below to filter on <span class="site">Site/SMC</span> features</p><ul id="filter" class="filter_list">';      $(uniqueNames).each(function(){        $html += '<li><a href="#" data-tags="'+ this +'">'+ this +'</a></li>';      })      $html += '</ul>';      $target.empty().html($html);      $filters = $('#filter').find('a');    }  filterBuilder();  $($filters).on('click', function(e) {    e.preventDefault();    console.log('Clicked ' + this);    $filters.removeClass('site');    $(this).addClass('site');    $('.warning').remove();        e.preventDefault();    var $clicked = $(this).text();    var $filterTerm = $(this).attr('data-tags');    if ($filterTerm !== 'all') {      doFilter($filterTerm);    } else {      $filtered.show();    }  });  function doFilter(term) {    $filtered.fadeOut(200);    var $tags = [];    var $term = term;    $filtered.each(function(i){        $tags = $(this).attr('data-tags').replace(/\s/g, '').split(',');        if ($tags.includes($term)) {          $(this).fadeIn(400);          i++;        }            });    setTimeout(    function()     {      doEmpty();    }, 200);  }  function doEmpty() {    $filterParent.each(function(){        if ( $(this).find('.filter:visible').length == 0 ) {          $(this).append('<p class="warning">Filter selection returned no results!</p>');        }    });  }  function pageNav() {    var currentPage = window.location;    var urlFragment = "file:///Users/Andy/Documents/GitHub/AMC_Site_2020/development/html-css-js/comp_analysis/competitors/";    //var urlFragment = "https://marketing.slgnt.eu/optiext/optiextension.dll?ID=PbkPmEgNOPWl06_PWZGqzM%2Ba2Fd6Vw33Th5xvg13jtlvfjHzGgOfAwKqYnPlgPLNS3GMTe3%2B6WDIDfRonMK3apJcYLObY";    var newPage = $('select').find(":selected").val();    console.log(currentPage + ' ' + newPage);    if (newPage !== '') {      window.location = urlFragment + newPage + '/index.html';    }      }    $('select').change(function(){    pageNav();  });});