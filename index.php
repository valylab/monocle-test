<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Monocle developer test</title>

		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=2">
		<link rel="icon" href="https://monocle.com/workspace/assets/img/favicon.ico" type="image/x-icon">

		<link rel="stylesheet" href="dist/css/lib.min.css">
		<link rel="stylesheet" href="dist/css/style.css">

	    <script src="dist/js/lib.min.js"></script>
	</head>
	<body>
		<header class="site-header d-flex align-items-center">
			<div class="header-inner container d-flex align-items-center">
				<a href="https://www.monocle.com/"><img class="logo" src="images/logomark.png" alt="Monocle logomark"></a>
				<h1 class="header-title">Monocle Recipes</h1>
			</div>
		</header>
		<main class="container bg">
			<section class="row">
				<div class="col-md-8 col-12">
					<h2 class="section-title">Ingredients</h2>
					<ul class="no-bullet">
						<li>1 tbsp olive or rapeseed oil</li>
						<li>1 onion , finely chopped</li>
						<li>3 garlic cloves , sliced</li>
						<li>1 tsp smoked paprika</li>
						<li>½ tsp cumin</li>
						<li>1 tbsp dried thyme</li>
						<li>3 medium carrots , sliced (about 200g)</li>
						<li>2 medium sticks celery , finely sliced (about 120g)</li>
						<li>1 red pepper , chopped</li>
						<li>1 yellow pepper , chopped</li>
						<li>2 x 400g tins tomatoes or peeled cherry tomatoes</li>
						<li>250ml vegetable stock cube (we used 1 Knorr vegetable stock pot)</li>
						<li>2 courgettes , sliced thickly (about 300g)</li>
						<li>2 sprigs fresh thyme</li>
					</ul>
				</div>
				<div class="col-md-4 col-12 d-md-flex justify-content-end pl-md-0">
					<figure class="recipe-fig mb-md-0">
						<img src="images/veg-casserole.jpg" alt="Vegetarian casserole">
						<figcaption>Vegetarian casserole</figcaption>
					</figure>
				</div>
			</section>
			<section class="row">
				<div class="col-12">
					<h2 class="section-title">Method</h2>
					<ol class="alternate-font">
						<li>Heat the oil in a large, heavy-based pan.</li>
						<li>Add the onions and cook gently for 5 - 10 mins until softened.</li>
						<li>Add the garlic, spices, dried thyme, carrots, celery and peppers and cook for 5 minutes.</li>
						<li>Add the tomatoes, stock, courgettes and fresh thyme and cook for 20 - 25 minutes.</li>
						<li>Take out the thyme sprigs.</li>
						<li>Stir in the lentils and bring back to a simmer.</li>
						<li>Serve with wild and white basmati rice, mash or quinoa.</li>
					</ol>
				</div>
			</section>
			<form method="post" id="comment-form">
				<fieldset>
					<legend>Comments</legend>
					<div class="form-group row">
						<label for="name" class="col-md-2 col-form-label col-12">Name:*</label>
						<div class="col-md-3 col-12 pl-md-7">
							<input type="text" id="name" name="name">
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-md-2 col-form-label col-12">Email:*</label>
						<div class="col-md-3 col-12 pl-md-7">
							<input type="email" id="email" name="email">
						</div>
					</div>
					<div class="form-group row">
						<label for="comment" class="col-md-2 col-form-label col-12">Comment:*</label>
						<div class="col-md-6 col-12 pl-md-7 pr-md-2">
							<textarea id="comment" name="comment"></textarea>
						</div>
					</div>
					<div class="form-group row align-items-center">
						<div class="col-md-2 d-md-block d-none"></div>
						<div class="col-md-10 col-12 pl-md-7">
							<button type="submit" name="submit" id="submit" class="btn btn-gradient">Submit</button>
							<div class="form-success">Your comment has been posted!</div>
						</div>
					</div>
				</fieldset>
			</form>
			<div id="comment-listing"></div>
		</main>
		<script>
		    function listComments() {
		        $.ajax({
		            url:'comment_list.php',
		            success:function(res) {
		                $('#comment-listing').html(res);
		            }
		        });
		    }
		    $(function() {
		        listComments();
		        setInterval(function(){
		            listComments();
		        },10000);
		        $("#comment-form").validate({
					rules: {
						name: "required",
						email: {
							required: true,
							email: true
						},
						comment: "required",
					},
					messages: {
						name: "Please enter your name",
						email: "Please enter a valid email address",
						comment: "Please enter your comment"
					},
					submitHandler: function(form) {
				        $.ajax({
			                url:'save_comment.php',
			                type:'post',
			                data:$(form).serialize(),
			                success:function() {
			                    $('.form-success').fadeIn();
			                    setTimeout(function() {
			                    	$('.form-success').fadeOut();
			                    }, 1000);
			                    listComments();
			                    $('#name').val('');
					            $('#email').val('');
					            $('#comment').val('');
			                }
			            });
				    }
				});
		    });
		</script>
	</body>
</html>