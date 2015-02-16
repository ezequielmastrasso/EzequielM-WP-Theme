<?php
/*
Template Name: tags
*/

?>

<?php get_header();?>
<style>
ul.children {
            padding-left: 30px;
            padding-top: 4px;
            padding-bottom: 8px;
                } 
</style>

<title>tags</title>
</head>
<body>
  <div style="width: 100%; height: 100%;height: -moz-calc(100% - 100px);
                        height: -webkit-calc(100% - 100px);
                        height: calc(100% - 100px);
			margin-top: 80px;
                        margin-bottom: 20px;
                        overflow-y: auto">
      <ul>
    <?php wp_list_categories('orderby=name&hierarchical=1&show_count=1&title_li='); ?> 
    </ul>
</li>                      
      
      
  </div>
</body>

</html>