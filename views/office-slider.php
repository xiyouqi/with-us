<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no"/>
<link href="/static/lib/iSlider/build/islider.css" rel="stylesheet">
<style>
	body {
	    margin: 0;
	    padding: 0;
	    overflow: hidden;
	}

	#iSlider ul {
	    margin: 0;
	    padding: 0;
	    list-style: none;
	    height: 100%;
	    overflow: hidden;
	}

	#iSlider li {
	    position: absolute;
	    margin: 0;
	    padding: 0;
	    height: 100%;
	    overflow: hidden;
	    display: -webkit-box;
	    -webkit-box-orient: vertical;
	    -webkit-box-pack: center;
	    -webkit-box-align: center;
	    list-style: none;
	}

	#iSlider {
	    position: absolute;
	    height: 100%;
	    width: 100%;
	    overflow: hidden;
	}

	.content {
		padding: 10%;
		height: 100%;
		width: 100%;
		-webkit-box-sizing: border-box;
	}

	.content h1{
		margin: 2em 0;
	}

	.content h2{
		margin: 2em 0;	
	}

	.content p{
		margin: 1em 0;	
	}

	.page1{
		background-color: #F5A8A8;
		color: #FFF;
	}
	.page2{
		background-color: #90FFB7;	
	}
	.page3{
		background-color: #90ABFF;	
		color: #FFF;
	}
	.page4{
		background-color: #FCFF90;	
	}
	.page5{
		background-color: #E390FF;
		color: #FFF;	
	}
	.islider-btn-outer {
	  position: absolute;
	  width: 1em;
	  height: 1em;
	  cursor: pointer;
	  top: 0px;
	  bottom: 0px;
	  margin: auto 0px;
	  display: block;
	  background-color: transparent;
	}
	.islider-dot {
	  width: 0.3em;
	  height: 0.3em;
	}
	.wu-side{
		padding:0;
		position:relative;
	}
	.wu-side .btn {
		color: #fff;
		font-size: 14px;
	  position: absolute;
	  bottom: 30px;
	  opacity: .85;
	  border-radius:0;
	  width:50%; 
	  left: 25%;
	  background-color: #26A9E1;
	  border: none;
	  display: block;
	  padding: 8px 0;
	  margin-bottom: 10px;
	  text-align:center;
	  text-decoration: none;
	}
</style>

</head>
<body>
	<div id="iSlider"></div>
	<script type="text/javascript" src="/static/lib/iSlider/build/islider.js"></script>
	<script>
		var list = [{
			'content' : '<div class="content wu-side"><a class="btn btn-primary btn-block" href="javascript:window.top.iframeOpen(\'visit\');">预约参观</a><img src="static/img/slides/bj-1-01.png" width="100%"></div>'
		},
		{
			'content' : '<div class="content wu-side"><img src="static/img/slides/bj-21-01.png" width="100%"></div>'
		},
		{
			'content' : '<div class="content wu-side"><img src="static/img/slides/bj-3-01.png" width="100%"></div>'
		},
		{
			'content' : '<div class="content wu-side"><img src="static/img/slides/bj-4-01-01.png" width="100%"></div>'
		},
		{
			'content' : '<div class="content wu-side"><img src="static/img/slides/bj-5-01.png" width="100%"></div>'
		},
		{
			'content' : '<div class="content wu-side"><img src="static/img/slides/bj-6-01.png" width="100%"></div>'
		}];

		var opts = {
		    data: list,
		    type: 'dom',
		    dom: document.getElementById("iSlider"),
		    duration: 1000,
		};

		var islider = new iSlider(opts);
		islider.addBtn();
		islider.addDot();
	</script>
</body>
</html>
