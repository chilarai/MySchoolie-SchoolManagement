
<script src="<?php echo BASE_URL;?>js/images-grid.js"></script>
<link rel="stylesheet" href="<?php echo BASE_URL;?>css/images-grid.css">

        
<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Images</a></li>
    <li class="active">School Images</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">School Images</h1>
<!-- Attendance spelling wrong in the header --> 
<!-- end page-header -->
<!-- begin row -->
<div class="row">
    <!-- begin col-6 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">School Images</h4>
            </div>
			<div class="panel-body">
				<div class="jquery-script-ads" style="margin:30px auto;" align="center"><script type="text/javascript"><!--
				google_ad_client = "ca-pub-2783044520727903";
				/* jQuery_demo */
				google_ad_slot = "2780937993";
				google_ad_width = 728;
				google_ad_height = 90;
				//-->
				</script>
				<script type="text/javascript"
				src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
				</script></div>
				<p>More than five images</p>
				<div id="gallery1"></div>

				<p>5 images</p>
				<div id="gallery2"></div>

				<p>4 images</p>
				<div id="gallery3"></div>

				<p>3 images</p>
				<div id="gallery4"></div>

				<p>2 images</p>
				<div id="gallery5"></div>

				<p>1 image</p>
				<div id="gallery6"></div>

				<p>Images with different sizes (align)</p>
				<div id="gallery7"></div>

				<script>

						var images = [
							'https://unsplash.it/1300/800?image=875',
							'https://unsplash.it/1300/800?image=874',
							'https://unsplash.it/1300/800?image=872',
							'https://unsplash.it/1300/800?image=868',
							'https://unsplash.it/1300/800?image=839',
							'https://unsplash.it/1300/800?image=838'
						];

						$(function() {

							$('#gallery1').imagesGrid({
								images: images
							});
							$('#gallery2').imagesGrid({
								images: images.slice(0, 5)
							});
							$('#gallery3').imagesGrid({
								images: images.slice(0, 4)
							});
							$('#gallery4').imagesGrid({
								images: images.slice(0, 3)
							});
							$('#gallery5').imagesGrid({
								images: images.slice(0, 2)
							});
							$('#gallery6').imagesGrid({
								images: images.slice(0, 1)
							});
							$('#gallery7').imagesGrid({
								images: [
									'https://unsplash.it/660/440?image=875',
							'https://unsplash.it/660/990?image=874',
							'https://unsplash.it/660/440?image=872',
							'https://unsplash.it/750/500?image=868',
							'https://unsplash.it/660/990?image=839',
							'https://unsplash.it/660/455?image=838'
								],
								align: true,
								getViewAllText: function(imgsCount) { return 'View all' }
							});

						});

					</script>
				<script type="text/javascript">

				var _gaq = _gaq || [];
				_gaq.push(['_setAccount', 'UA-36251023-1']);
				_gaq.push(['_setDomainName', 'jqueryscript.net']);
				_gaq.push(['_trackPageview']);

				(function() {
					var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
					ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
					var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
				})();

				</script>
			</div>
		</div>
        <!-- end panel -->
	</div>
    <!-- end col-6 -->
