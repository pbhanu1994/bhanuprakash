<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<title>Bhanu Prakash's Blog</title>

	<link rel="stylesheet" href="../css/bootstrap.css">

	<link rel="stylesheet" href="../css/style.css">

	<link rel="stylesheet" href="../icons/foundation-icons/foundation-icons.css">

	<link rel="stylesheet" href="../css/font-awesome.css">



	<!-- Google Web Fonts Links -->

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:200' rel='stylesheet' type='text/css'> 

	<link href='http://fonts.googleapis.com/css?family=Oswald:300' rel='stylesheet' type='text/css'>

	<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>

	<link href='http://fonts.googleapis.com/css?family=Raleway:100' rel='stylesheet' type='text/css'>

	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300' rel='stylesheet' type='text/css'>

	<link href='http://fonts.googleapis.com/css?family=Titillium+Web:700' rel='stylesheet' type='text/css'>

	<link href='http://fonts.googleapis.com/css?family=Cabin:500' rel='stylesheet' type='text/css'>

	<link href='http://fonts.googleapis.com/css?family=Archivo+Narrow' rel='stylesheet' type='text/css'>

	<link href='http://fonts.googleapis.com/css?family=Roboto:100' rel='stylesheet' type='text/css'>

	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200' rel='stylesheet' type='text/css'>

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:600' rel='stylesheet' type='text/css'>

	<style type="text/css" media="screen">

		#blog_1{

			background-image: url("../images/developer.jpg");

			height: 100%;

			width: 100%;

			background-size: cover;

			background-repeat: no-repeat;

			display: block;

			background-attachment: scroll;

		}
		#blog_2{

			background-image: url("../images/Blog Posts/backgrounds/Bill-Gates-Background.jpg");

			height: 100%;

			width: 100%;

			background-size: cover;

			background-repeat: no-repeat;

			display: block;

			background-attachment: scroll;

		}
		#blog_3{

			background-image: url("../images/phpscript.jpg");

			height: 100%;

			width: 100%;

			background-size: cover;

			background-repeat: no-repeat;

			display: block;

			background-attachment: scroll;

		}

		p{

			font-family: 'Source Sans Pro', sans-serif;

		}

	</style>

</head>

<body>

	<nav class="navbar navbar-default navbar-custom navbar-fixed-top">

        <div class="container-fluid">

            <!-- Brand and toggle get grouped for better mobile display -->

            <div class="navbar-header page-scroll">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">

                    <span class="sr-only">Toggle navigation</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                </button>

                <a class="navbar-brand" href="/" style="margin-left:5px;">Bhanu Prakash</a>

            </div>



            <!-- Collect the nav links, forms, and other content for toggling -->

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav navbar-right" style="padding-right:15px;">

                    <li>

                        <a href="/"><i class="fi-home"></i>&nbsp;Home</a>

                    </li>

                </ul>

            </div>

            <!-- /.navbar-collapse -->

        </div>

        <!-- /.container -->

    </nav>

<!-- Navigation Bar ends here -->



<div class="container-fluid">

<div id="blog_3">
<section>
		<div class="container">

			<center>

			<h1 style="font-family: 'Roboto', sans-serif;color:#fff;font-size:56px;margin-top:5%;">$p = 0; // is very useful!</h1>

			</center>

			<h4 style="font-family: 'Open Sans', sans-serif;color:#fff;">Posted by <strong><span style="color:yellow;">Bhanu Prakash</span></strong> <span class="pull-right" style="color:#fff;">10<sup>th</sup> May, 2015</span></h4>

			<hr style="color:#fff;">

			<h2 style="font-family: 'Cabin', sans-serif;color:#fff;">

				<article>
					<p>When developing a Website using php script, a basic Web Developer most often all he do is get the input data from the HTML forms and store and retrieve that data from the database and echo (print) it in the page.</p>
					<p>Let’s say I’m developing a simple E-Mail Module in php, so all my received mails will appear in my Inbox section right? So let’s say the basic design of inbox mails looks like this:</p>
					<center>
						<img src="/images/Blog Posts/inbox.jpg" alt="INBOX" />
					</center>
					<p>Now I have two emails here, one is from Alex and other is from Robin. Above image says that in the chat box there is a name of the user and the Subject of the message..The body of the message should appear in a Modal when I click on that chat box.</p>
					<p>Here the two emails are looped with two different <code>&lt;div&gt;</code> elements.</p>
					<p>Let’s say I’m using the Bootstrap Framework in my Website. And these two emails will have two modals connected to two different <code>&lt;div&gt;</code> elements. These two modals are also looped respectively.</p>
					<p>Now, these two <code>&lt;div&gt;</code> elements will have the attributes of <code>data-toggle="modal" data-target="#idtomodal"</code></p>
					
					<p>The Basic php code for the email looks like this:</p>
					<center>
						<img src="/images/php1.jpg" alt="php1" />
						<img src="/images/php2.jpg" alt="php2" />
					</center>

					<p>If I do not initialize the variable <code>$p = 0;</code> in line 12, and also in line 34..if I had given the <code>data-target="#inboxModal"</code> instead of <code>data-target="#inboxModal'.$row[''.$p.''].'"</code>..for each and every subject ..the body of the message will be the same i.e last looped data.</p>
					<p>Here in our example...let's say alex sent me the body of the message called "Hi Bhanu"..and Robin sent me the message "Hi, How are you?" here when I clicked on the alex the same message in the modal which he sent "Hi Bhanu" will appear..whereas in the other Robin modal also the same message which the alex had sent me "Hi Bhanu" will appear instead of "Hi, How are your?" ..because the "data-target" in the Robin modal is pointing to the last looped div element which is alex's modal.." </p>
					<p>So, when I initialize the <code>$p = 0;</code> in the line 12..when I'm fetching the results and storing in the variable <code>$row</code> in line 14 and loop it...each and every time the "data-target" in line 34 <code>data-target="#inboxModal'.$row[''.$p.''].'"</code> and id in the line 38 will get updated with the specific row number.</code></p>
					<p>Hence this is one of the best example to show how the variable comes in handy..and helps us whenever we gets needed.. </p>
				</article>

			</h2>

			

		</div>
</section>
	</div>
	<!-- End of blog 3 -->

<div id="blog_2">
<section>
		<div class="container">

			<center>

			<h1 style="font-family: 'Roboto', sans-serif;color:#fff;font-size:56px;margin-top:5%;">[Infographics] HOW BILL GATES STARTED - The Life of Microsoft's Founder</h1>

			</center>

			<h4 style="font-family: 'Open Sans', sans-serif;color:#fff;">Posted by <strong><span style="color:yellow;">Bhanu Prakash</span></strong> <span class="pull-right" style="color:#fff;">6<sup>th</sup> May, 2015</span></h4>

			<hr style="color:#fff;">

			<h2 style="font-family: 'Cabin', sans-serif;color:#fff;">

				<article>

				<center>
					<img src="/images/Blog Posts/bill-gates.jpg" alt="BILL GATES">
				</center>
					

				</article>

			</h2>

			

		</div>
</section>
	</div>
	<!-- End of blog 1 -->
	<div id="blog_1">
<section>
		<div class="container">

			<center>

			<h1 style="font-family: 'Roboto', sans-serif;color:#fff;font-size:56px;margin-top:5%;">The world needs more developers...</h1>

			</center>

			<h4 style="font-family: 'Open Sans', sans-serif;color:#fff;">Posted by <strong><span style="color:yellow;">Bhanu Prakash</span></strong> <span class="pull-right" style="color:#fff;">26<sup>th</sup> March, 2015</span></h4>

			<hr style="color:#fff;">

			<h2 style="font-family: 'Cabin', sans-serif;color:#fff;">

				<article>

					<p>The technology is rapidly increasing day by day.</p>

					<p>When I say that the world needs more developers or hackers this affects to many factors.</p>		

					<p>One of the factor which affects mostly is to the schools or colleges. Teachers need to teach the programming concepts to the students right from the school level. Because today students are the one who will change the world in later generation.</p>

					<p>Coding is something which allows people to think the solutions to the different problems. This is one of the discipline that anybody could learn.</p>

					<p>As Bill Gates said, coding is all about Simple Math like Additions, Subtractions, Multiplications, that’s all about it.</p>

					<p>Today everybody is using the mobile apps, Web apps or software to get their work done easily. But no one ever notice the pain behind it.</p>

					<p>I saw many people have the starting problems and questioning themselves that “What is the best programming language to learn?” Frankly speaking there is no best programming language ever built, every programming language has it’s own advantages and disadvantages. People just need to think the logic for the solution behind the problem. Some of the programming languages that people generally starts with the C, C++,Ruby,etc which covers the basic concepts and terminology of various programming languages.</p>

					<p>There are many websites like ‘stackoverflow’ where people ready to help you with your problem, which you can post your piece of code and get the logic or the solution behind it.</p>

					<p>Everyone need to spend some extra time for practicing the code (algorithms, etc.) after the college hours or Work hours. Even ‘Kevin Systrom’ learnt to code after his work hours and built a great application called ‘Instagram’.</p>

					<p>There are several websites like code.org, codecademy.com, programmr.com, etc.. Try to solve one simple problem a day and then the complicated problems.</p>

					<p class="alert alert-success" style="font-family: 'Cabin', sans-serif;">"Get out there and try something. Don’t be afraid that there’s lots of people to capture and you will never get criticized for trying something for the right reasons and making a mistake" – by unknown facebook employee.</p>

					<p>Obviously learning process can take some time, different persons have different thinking ability. Some people might get frustrated while coding, taking intervals is one of the main thing which every developer should do. Big Companies like facebook, Google knows about this very well, that is why those companies let their employees work in peace environment.</p>

					<p>Developing or hacking a software can be helpful not only to the personal needs but also to the different sectors like government sectors, Hospitals, etc. People able to reach their destiny in short time while looking at the navigator in a car,this is one of the simple example to tell that how much hard work did that developers had done in behind the scenes..</p>

					<p>This world needs more developers to serve the individual purposes, to serve the nations, and to serve the world.</p>

					<center><p style="font-family: 'Open Sans', sans-serif;">Happy Coding :)</p></center>

				</article>

			</h2>

			

		</div>
</section>
	</div>

</div>

<!-- Footer starts here -->

<div style="margin-bottom:0px;margin-top:1%;">

<footer class="footer">

	<center>

		<a href="http://www.facebook.com/pbhanu.1994" target="_blank"><img src="/icons/custom/facebook.png" style="width:35px;" alt="FACEBOOK"></a>

		<a href="http://www.twitter.com/pbhanu1994" style="padding-left:10px;" target="_blank"><img src="/icons/custom/twitter.png" style="width:35px;" alt="TWITTER"></a>

		<a href="https://plus.google.com/+BhanuPrakash1994" style="padding-left:10px;" target="_blank"><img src="/icons/custom/google.png" style="width:35px;" alt="GOOGLE PLUS"></a>

		<a href="http://in.linkedin.com/in/pbhanuprakash" style="padding-left:10px;" target="_blank"><img src="/icons/custom/linkedin.png" style="width:35px;" alt="FACEBOOK"></a>



	<h5 id="copy" style="font-family: 'Droid Sans', sans-serif;color:grey;">Copyright &copy; bhanuprakash.me 2015</h5>

	</center>

</footer>

</div>



<!-- Footer ends here -->



	<script src="/js/jquerycustom.js" type="text/javascript"></script>

	<script src="/js/scroll/jquery.hash-magic.min.js"></script>

	<script src="/js/easing.js" type="text/javascript"></script>

	<script src="/js/bootstrap.js" type="text/javascript"></script>

	<script src="/js/nps.js"></script>

</body>

</html>