<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<title>Retina Dashboard</title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
	<link rel="stylesheet" href="css/style.css" media="all" />
	<!--[if IE]><link rel="stylesheet" href="css/ie.css" media="all" /><![endif]-->
</head>
<body>
<div class="testing">
<header class="main">
	<h1><strong>Retina</strong> Dashboard</h1>
	<input type="text" value="search" />
</header>
<section class="user">
	<div class="profile-img">
		<p><img src="images/uiface2.png" alt="" height="40" width="40" /> Welcome back John Doe</p>
	</div>
	<div class="buttons">
		<button class="ico-font">&#9206;</button>
	  
		<!--<span class="button">Live</span>
		 <span class="button">Help</span>-->
		 <span class="button blue"><a href="index.html">Logout</a></span>
	</div>
</section>
</div>
<nav>
	<ul>
		<li><a href="dashboard.html"><span class="icon">&#128711;</span> Dashboard</a></li>
		<li class="section">
			<a href="pages-table.html"><span class="icon">&#128196;</span> Pages</a>
			<ul class="submenu">
				<li><a href="page-new.html">Create page</a></li>
				<li><a href="page-timeline.html">View pages</a></li>
			</ul>	
		</li>
		<li>
			<a href="files.html"><span class="icon">&#127748;</span> Media <span class="pip">7</span></a>
			<ul class="submenu">
				<li><a href="files-upload.html">Upload file</a></li>
				<li><a href="files.html">View files</a></li>
			</ul>
		</li>
		<li>
			<a href="blog-timeline.html"><span class="icon">&#59160;</span> Blog <span class="pip">12</span></a>
			<ul class="submenu">
				<li><a href="blog-new.html">New post</a></li>
				<li><a href="blog-table.html">All posts</a></li>
				<li><a href="comments-timeline.html">View comments</a></li>
			</ul>
		</li>
		<li><a href="statistics.html"><span class="icon">&#128202;</span> Statistics</a></li>
		<li><a href="users.html"><span class="icon">&#128101;</span> Users <span class="pip">3</span></a></li>
		<li>
			<a href="ui-elements.html"><span class="icon">&#9881;</span> UI Elements</a>
			<ul class="submenu">
				<li><a href="icon-fonts.html">Icon fonts</a></li>
			</ul>
		</li>
	</ul>
</nav>

 
<section class="content">
	<section class="widget">
		 
		<div class="content">
			<table id="myTable" border="0" width="100">
				<thead>
					<tr>
						<th>Page title</th>
						<th >Date</th>
						<th>Child pages</th>
						<th>Comments</th>
						<th>Author</th>
					</tr>
				</thead>
					<tbody>
						<tr>
							<td><input type="checkbox" /> Home</td>
							<td>01/3/2013</td>
							<td>0</td>
							<td>0</td>
							<td>John Doe</td>
						</tr>
						<tr>
							<td><input type="checkbox" /> Services</td>
							<td>01/3/2013</td>
							<td>4</td>
							<td>0</td>
							<td>John Doe</td>
						</tr>
						<tr>
							<td><input type="checkbox" /> Portfolio</td>
							<td>02/3/2013</td>
							<td>12</td>
							<td>0</td>
							<td>John Doe</td>
						</tr>
						<tr>
							<td><input type="checkbox" /> About us</td>
							<td>02/3/2013</td>
							<td>2</td>
							<td>0</td>
							<td>John Doe</td>
						</tr>
						<tr>
							<td><input type="checkbox" /> Blog</td>
							<td>02/3/2013</td>
							<td>32</td>
							<td>0</td>
							<td>John Doe</td>
						</tr>
						<tr>
							<td><input type="checkbox" /> Contact us</td>
							<td>03/3/2013</td>
							<td>0</td>
							<td>0</td>
							<td>John Doe</td>
						</tr>
						<tr>
							<td><input type="checkbox" /> Our clients</td>
							<td>04/3/2013</td>
							<td>1</td>
							<td>0</td>
							<td>John Doe</td>
						</tr>
						<tr>
							<td><input type="checkbox" /> Partnerships</td>
							<td>04/3/2013</td>
							<td>0</td>
							<td>0</td>
							<td>John Doe</td>
						</tr>
						<tr>
							<td><input type="checkbox" />Jobs</td>
							<td>04/3/2013</td>
							<td>0</td>
							<td>0</td>
							<td>John Doe</td>
						</tr>
					</tbody>
				</table>
		</div>
	</section>
</section>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script src="js/jquery.wysiwyg.js"></script>
<script src="js/custom.js"></script>
<script src="js/cycle.js"></script>
<script src="js/jquery.checkbox.min.js"></script>
<script src="js/flot.js"></script>
<script src="js/flot.resize.js"></script>
<script src="js/flot-graphs.js"></script>
<script src="js/flot-time.js"></script>
<script src="js/cycle.js"></script>
<script src="js/jquery.tablesorter.min.js"></script>
</body>
</html>