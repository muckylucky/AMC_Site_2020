
<!DOCTYPE html>
<html>
<head>
  <title>JSON VIEW</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="jsonview.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <style>
    .ClickPath{
      color: geen;
    }
  </style>
</head>
<body>
  <!-- SOURCE CODE: https://www.cssscript.com/json-data-tree-view/ -->
  <div>
      <ul class="data_switch">
          <li><a href="http://amc21.co.uk/SELLIGENT/site_Treeview_data/html/index.html#old" class="data_link">Current Site data</a></li>
          <li><a href="http://amc21.co.uk/SELLIGENT/site_Treeview_data/html/index.html#new" class="data_link">Proposed Site data</a></li>
          <li><a href="http://amc21.co.uk/SELLIGENT/site_Treeview_data/html/index.html#sharing" class="data_link">Sharing Dependancies</a></li>

          
      </ul>
  </div>
  <ul class="ClickPath">

  </ul>
  <div class="root"></div>

  <script type="text/javascript" src="jsonview.js"></script>
  <script type="text/javascript">
    $(function(){
      //var data =$.get( "http://amc21.co.uk/SELLIGENT/site_Treeview_data/html/Data_Sources_new.json" );

      
      localStorage.setItem('TEST2', 123456789);

      $('body').append
        $('.data_switch').find('a').on('click', function(){
          var URL = $(this).attr('href').split('#')[1];
          $('.root').empty();
          $('.ClickPath').empty();
          fetchData(URL);
          
        })
        var ClickPath = [];
        $('div').on('click', function(event){
          console.log($(event.target).attr('class'));
          var classCheck = $(event.target).attr('class');
          if(classCheck !=('root') && classCheck !=('data_link')) {
            ClickPath.push($(event.target).text());
            updatePath(ClickPath);
            localStorage.setItem('TEST2', ClickPath);
          }
        });

        function fetchData(URL) {
          
          //console.log(URL);
          var data = URL;

          if (URL == 'new') {
            data = 'Data_Sources_new.json';
          } else if (URL == 'old') {
            data = 'Data_Sources.json';
          } else if (URL == 'sharing') {
            data = 'Sharing-Asset_Dependancies.json';
          } else {
            data = 'Data_Sources.json';
          }

          fetch(data)
          .then((res)=> {
            return res.text();
          })
          .then((data) => {
            jsonView.format(data, '.root');
            var obj = JSON.parse(data);
            $.each( { data }, function(i, n){
                console.log( "Name: " + i + ", Value: " + n );
                i++;
            });
            console.log();
          })
          .catch((err) => {
            console.log(err);
          })
        }
        fetchData();

        

        function updatePath(clicked) {
            $('.ClickPath').empty();
            $(clicked).each(function(i){
              if (this != '') {
                $('.ClickPath').append('<span>' + this + '</span>' + ' &gt;');
                i++;
              }
            });
        };
    });


  </script>
</body>
</html>



$.get( "http://amc21.co.uk/SELLIGENT/site_Treeview_data/html/Data_Sources_new.json" );
