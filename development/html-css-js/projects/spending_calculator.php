<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Andrew McCluckie</title>
<link rel="stylesheet" href="../css/main.css" />
<script type="text/javascript" src="../js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="../js/main.js"></script>

</head>
<body>
  <!-- Google Tag Manager Data Layer-->
<script> dataLayer = []; </script>

<!-- Google Tag Manager -->
<noscript>
  <iframe src="//www.googletagmanager.com/ns.html?id=GTM-K3M66M" height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<script>
  (function(w,d,s,l,i){
    w[l]=w[l]||[];
    w[l].push({'gtm.start':new Date().getTime(),
      event:'gtm.js'});
    var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),
      dl=l!='dataLayer'?'&l='+l:'';
    j.async=true;
    j.src='//www.googletagmanager.com/gtm.js?id='+i+dl;
    f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-K3M66M');
</script>
<!-- End Google Tag Manager -->
<div class="wrapper">
    <header>
        <hgroup class="header-logo">
            <h1 id="target">Andrew M<sup>c</sup>Cluckie</h1>
            <h2>Web design and UX/UI</h2>
        </hgroup>
        <hgroup class="header-contact">
            <ul>
                <li>Website: <a href="http://www.amc21.co.uk">amc21.co.uk</a></li>
                <li><span class="hide-phone">Telephone: 07581 434162</span><span class="show-phone">Telephone: <a href="tel:07581434162">07581 434162</a></span></li>
                <li>Email: <a href="mailto:andy@amc21.co.uk">andy@amc21.co.uk</a></li>
            </ul>
        </hgroup>
    </header>
    
    <article class="clearfix" id="main">
    
      

        <article class="article-section" id="work-history">
            
          <h2>Spending calculator <small>personal project</small></h2>
            <section class="job-entry">
            
                <img src="../img/projects/project-spending-calc/proj-spending-calc-mobile-anim.gif" width="400" height="1155" alt="Project carousel image">
        <p>This is a personal project I started with the aim of tracking my monthly spending since the last pay day. It needed to fulfill the following objectives:</p>
              
        <ul>
                  <li>Keep track of total spending per month and also  grand total of all time.</li>
          <li>Have most frequently used spending categories as well as a free text entry.</li>
          <li>The ability to drill-down into these individual categories to see total spending on them.</li>
          <li>Keep track of when I get paid every month (the 15th as a rule but this can change if it falls on a weekend).</li>
          <li>Be available for others to sign-up and use.</li>
                </ul>
        <p>To fulfil the above I went for the web app approach using Bootstrap for the first time to build the front end and using PHP/MySQL for the back. It uses custom written PHP functions to check the payment date. Colours of the total amount change from green/orange to red as the total monthly spending figure changes as a percentage of my wage.</p>
        <p>The app works very well functionally but from a user experience point of view its terrible. This is largely down to the fact that the information it records is just too terrifying to face, thus an important lesson was learned here!</p>
              <a href="http://amc21.co.uk/spending_calculator/" class="primary-button">View the calculator</a>
              
      <br>
            <br>
            <br>
            <h4>Wireframes:</h4>
            <img src="../img/projects/project-spending-calc/proj-spending-calc-wireframe.png" width="1367" height="872" alt="Project wireframe">
            <br>
            <h3>Key points</h3>
            <ul>
              <li>Built using Bootstrap 2</li>
                <li>Mobile-first, responsive design</li>
                <li>PHP and MySQL</li>
            </ul>
            
            
      </section>
            <!--END VITALITY-->

        </article>
        <!--END WORK HISTORY-->
        
    </article>
  
    <div class="footer">
      <p id="copyright_notice">&copy; <span id="copy_year"><script type="text/javascript">document.write(new Date().getFullYear());</script></span> Andrew M<sup>c</sup>Cluckie</p>
    </div>
</div>
</body>
</html>
