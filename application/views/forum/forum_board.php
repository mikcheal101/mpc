<meta name=viewport content="width=device-width, initial-scale=1">
<style>
    .hover-red:hover {
        color: red!important;
    }

    .hover-green:hover {
        color: green!important;
    }
    .p-b-300 { padding-bottom: 300px!important;}
</style>
<div class="container-fluid p-t-85 p-b-00 p-l-20 p-r-20 no-scroll full-height" style="border-bottom: none; " 
	ng-init="init();" ng-app="forumApp" ng-controller="forumCntrl">
    <div class="row full-height no-scroll">
        <div class="col-md-2 col-sm-3 hidden-xs">
            <div style="width: 100%; text-align: -webkit-center; " class="m-b-05 text-center p-t-00 p-b-00">
                <img alt="User profile Photo" 
                	class="img-responsive img-fluid img-rounded img-thumbnail" id="profile_image" 
                	ng-src="{{facebookDetails.picture.data.url}}" style="width:100%!important; " >
            </div>
            <?php if (isset ($this->session->user->passport)) { ?>
            <div class="m-b-20">
                <span class="btn btn-block"><i class="glyphicon glyphicon-thumbs-up"></i></span>
            </div>
            <?php  } ?>
            <div class="panel">
                <ul class="list-group">
                    <li class="list-group-item">
                        <span id="postsCount" ng-bind="leftCounters.posts">0</span> Posts
                    </li>
                    <li class="list-group-item">
                        <span id="followersCount" ng-bind="leftCounters.followers">0</span> Followers
                    </li>
                    <li class="list-group-item">
                        <span id="followingCount" ng-bind="leftCounters.following">0</span> Following
                    </li>

                </ul>
            </div>
        </div>
        <div class="col-md-7 col-xs-12 col-sm-9 full-height no-scroll" style="padding: 2px;">
            <div class="panel m-b-15">
                <textarea class="padding-10" id="chatMsg" ng-model="chat.message" style="width:100%; font-size: 13px!important; margin-bottom: -15px;"></textarea>
                <div class="padding-05">
                    <div class="carousel" style="display:flex;" id="placeholder">
                    	<img alt="" ngf-thumbnail="img" ng-repeat="img in chat.images track by $index" 
							class="m-t-10 padding-05 img-responsive img-fluid img-rounded" style="width: 50px; height: 50px;" id="" />
                    </div>
                </div>
                <div class="panel-footer text-right">
                	<div class="col-sm-11 col-xs-9 text-right p-r-00">
	                	<div class="dropdown" style="float:right;">
	  						<button class="btn btn-sm btn-default dropdown-toggle" type="button" data-toggle="dropdown">
	  							Upload Media
	  							<span class="caret"></span>
	  						</button>
	  						<ul class="dropdown-menu">
	  							<li> 
									<a class="" ngf-max-total-size="10MB" ngf-select="getImages ($files);" ng-model="chat.images" multiple ngf-multiple="true" accept="image/*" >
										<i class="glyphicon glyphicon-picture"></i> Images
									</a>
								</li>
                    			<li class="disabled"> <a class=""><i class="glyphicon glyphicon-film"></i> Video</a></li>
                    			<li class="disabled"> <a class=""><i class="glyphicon glyphicon-music"></i> Audio</a></li>
	  						</ul>
	  						<!-- ngf-max-duration="10s" ngf-max-total-size="10MB" ngf-select="getVideos ($files);" ng-model="chat.videos" ngf-multiple="false" accept="video/*" -->
	  						<!-- ngf-max-duration="10s" ngf-max-total-size="100MB" ngf-select="getVideos ($files);" ng-model="chat.videos" ngf-multiple="false" accept="video/*"-->
						</div>
                	</div>
                	<div class="col-sm-1 col-xs-3">
                   		<span class="btn btn-success btn-sm" id="sendBtn" ng-click="postMessage ();">send</span>
                	</div>
                	<div class="clearfix"></div>
                </div>
            </div>
            <div class="full-height auto-scroll" style="padding: 1px 1px 300px 1px;" id="chatDiv">
	            <span dir-paginate="m in messages | itemsPerPage:10 | orderBy:'+m.ts' ">
		            <div class="panel m-b-15">
						<div class="panel-heading">
							<div class="row">
								<div class="col-sm-12 padding-00">
								<table style="width: 100%; border-bottom: 1px solid #f3f3f3;">
										<tr>
											<td style="" class="col-sm-1 p-b-10 text-left p-l-00">
												<img ng-src="{{m.image_url}}" class="img-responsive img-rounded" style="width:30px!important; height: 30px!important;" />
											</td>
											<td style="" class="col-sm-6 p-b-10 text-left p-l-00">
												<span class="p-l-00 font-3 bold" ng-bind="m.fullname"></span>
											</td>
											<td style="" class="col-sm-4 text-right p-b-10 p-l-00 p-r-00">
												<span class="font-12">
													<span class="text-black" ng-bind="getDate (m.ts) | date : 'MMM dd, yyyy'"> </span>  -  
													<span class="text-ash" ng-bind="getDate (m.ts) | date : 'hh:mm a'">  </span>
												</span>
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
				
						<p class="p-l-2- p-r-20 panel-body p-t-00" ng-bind="m.text"></p>
				
							<div class="p-l-15 p-r-15" >
								<div style="display:-webkit-box; width: 100%; overflow-y: hidden;">
									<img ng-repeat="thumb in m.extras track by $index" ng-src="<?=base_url('images/forum');?>/{{thumb.url}}" ng-class="['img-rounded', 'img-responsive', 'img-fluid', 'p-r-10', 'm-b-05']" style="height: 150px; width: 150px;" />
									<img ng-repeat="thumb in m.extras track by $index" ng-src="<?=base_url('images/forum');?>/{{thumb.url}}" ng-class="['img-rounded', 'img-responsive', 'img-fluid', 'p-r-10', 'm-b-05']" style="height: 150px; width: 150px;" />
									<img ng-repeat="thumb in m.extras track by $index" ng-src="<?=base_url('images/forum');?>/{{thumb.url}}" ng-class="['img-rounded', 'img-responsive', 'img-fluid', 'p-r-10', 'm-b-05']" style="height: 150px; width: 150px;" />
								</div>
							</div>
				
						<div class="panel-footer background-white-complete text-right" style="color: #d3d3d3;">
							<span class="p-l-05 p-r-05"><i class="glyphicon glyphicon-trash hover-red"></i></span>
							<span class="p-l-05 p-r-05"><i class="glyphicon glyphicon-share hover-green"></i></span>
						</div>
					</div>

	            </span>
	            <dir-pagination-controls></dir-pagination-controls>
            </div>
        </div>
        <div class="col-md-3 hidden-sm hidden-xs">
            <h5 class="m-t-00 " style="color: #000;">Most Commented </h5>
            <ul class="list-group" id="mostCommented">
                <li class="list-group-item" ng-repeat="person in comments track by $index">
                    <img ng-src="{{person.image}}" ng-class="['img-responsive', 'img-rounded']" style="width: 20px; height: 20px;" />
                    <span class="" ng-bind="person.fullname"></span>
                    <span class="badge badge-danger" ng-bind="person.counted">0</span>
                </li>
            </ul>
        </div>
    </div>
</div>
