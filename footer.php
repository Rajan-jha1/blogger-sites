<!-- Footer -->
    <footer style="background: black;>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted">Copyright &copy; Your Website 2016</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/clean-blog.min.js"></script>
<script type="text/javascript">
    $(function() {
$(".cat").click(function(){
var element = $(this);
var cat_id = element.attr("id");
var info = 'id=' + cat_id;
//alert(info);
 $.ajax({
   type: "POST",
   url: "show_catwise_post.php",
    data: info,
   success: function(data){
    $("#post_cat").html(data);
    //alert(data);
    //console.log(data);
    }
});
  
 
return false;
});

$(".post").click(function(){
var element = $(this);
var post_id = element.attr("id");
var info = 'id1=' + post_id;
//alert(info);
 $.ajax({
   type: "POST",
   url: "show_catwise_post.php",
    data: info,
   success: function(data){
    $("#post_cat").html(data);
    //alert(data);
    //console.log(data);
    }
});
  
 
return false;
});

});
</script>
</body>
</html>