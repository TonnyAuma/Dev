<html>
<head><title></title>
<script type="text/javascript" src="jquery.js"></script>
</head>
<script>

$(document).ready(function(){
    $(".target").change(function(){
       alert( "Handler for .change() called." );
    });
});

</script>
<body>

  <select class="target">
    <option value="option1" selected="selected">Option 1</option>
    <option value="option2">Option 2</option>
  </select>

  <input type="submit" id="view" value="Add Employee" />
</body>
</html>
<?php

?>