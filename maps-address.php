<!-- Места проведения занятий / Начало -->
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-12 col-sm-12 col-xs-12">
					<h2 class="text-center">Занятия проходят по следующим адресам:</h2>
				</div>
			</div>
			<div class="row" style="margin-top:20px;">
			    <!-- СК Фили / Начало -->
				<div class="col-xs-4">
					<p class="zal-address"><?php the_field('fili_address'); ?></p>
					<!-- Google map fili / Start -->
					<link href="<?php echo get_template_directory_uri();?>/acf/google_map/acf-map.css" rel="stylesheet" media="screen">
					<script src="http://code.jquery.com/jquery-latest.js"></script>
					<script src="<?php echo get_template_directory_uri();?>/acf/google_map/acf-map-g-script.js"></script>
					<script src="<?php echo get_template_directory_uri();?>/acf/google_map/acf-map-script.js"></script>
					<?php  
						$fililocation = get_field('fili_map');
						if( !empty($fililocation) ):
					?>
						<div class="acf-map thumbnail">
							<div class="marker" data-lat="<?php echo $fililocation['lat']; ?>" data-lng="<?php echo $fililocation['lng']; ?>"></div>
						</div>
					<?php endif; ?>
					<!-- Google map fili / End -->					
					<!--<ul class="row map-thumbs" style="padding: 0 4%;">
						<li class="col-xs-2 col-md-2 col-sm-2 col-xs-2  thumbnail">
							<?php 
								$image_left = get_field('fili_photo_1');									 
								if( !empty($image_left) ): ?>
								<img class="img-responsive" src="<?php echo $image_left['url']; ?>" alt="<?php echo $image_left['alt']; ?>" />
							<?php endif; ?>							
						</li>
						<li class="col-xs-2 col-md-2 col-sm-2 col-xs-2 col-xs-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 thumbnail">
							<?php 
								$image_left = get_field('fili_photo_2');
								if( !empty($image_left) ): ?>
								<img class="img-responsive" src="<?php echo $image_left['url']; ?>" alt="<?php echo $image_left['alt']; ?>" />
							<?php endif; ?>							
						</li>
						<li class="col-xs-2 col-md-2 col-sm-2 col-xs-2 col-xs-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 thumbnail">
							<?php 
								$image_left = get_field('fili_photo_3');
								if( !empty($image_left) ): ?>
								<img class="img-responsive" src="<?php echo $image_left['url']; ?>" alt="<?php echo $image_left['alt']; ?>" />
							<?php endif; ?>							
						</li>
						<li class="col-xs-2 col-md-2 col-sm-2 col-xs-2 col-xs-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 thumbnail">
							<?php 
								$image_left = get_field('fili_photo_4');
								if( !empty($image_left) ): ?>
								<img class="img-responsive" src="<?php echo $image_left['url']; ?>" alt="<?php echo $image_left['alt']; ?>" />
							<?php endif; ?>							
						</li>          
					</ul>
-->
				    <div class="row">
					    <div class="col-xs-3">
					       <img class="img-thumbnail" style="cursor:pointer;" src="<?php echo get_template_directory_uri();?>/images/zal-bagrationovskaya/bagrationovskaya-01.jpg" alt="" data-toggle="modal" data-target="#bagrationovskaya-01">
					    </div>
                        <div class="col-xs-3">	    
                            <div style="height:55px;overflow:hidden" class="img-thumbnail">
                                <div style="height:45px;overflow:hidden">
					               <img style="cursor:pointer;" src="<?php echo get_template_directory_uri();?>/images/zal-bagrationovskaya/bagrationovskaya-02.jpg" alt="" data-toggle="modal" data-target="#bagrationovskaya-02" width="70">
					            </div>
					        </div>	
                        </div>    
					</div>
<!--
					<p class="header-raspisanie">Расписание занятий: <span class="right">взрослые и дети</span></p>
					<div class="row gray">
						<div class="col-xs-6 col-md-6 col-sm-6 col-xs-6">
							<p>Начинающая группа и <br>продложающая группа</p>
						</div>
						<div class="col-xs-3 col-md-3 col-sm-3 col-xs-3">
							<p>понедельник, четверг</p>
						</div>
						<div class="col-xs-3 col-md-3 col-sm-3 col-xs-3">
							<p class="text-right">20:30</p>
						</div>						
					</div>					
					<div class="row no-gray">
						<div class="col-xs-6 col-md-6 col-sm-6 col-xs-6">
							<p>Начинающая группа и <br>продложающая группа</p>
						</div>
						<div class="col-xs-3 col-md-3 col-sm-3 col-xs-3">
							<p>вторник, пятница</p>
						</div>
						<div class="col-xs-3 col-md-3 col-sm-3 col-xs-3">
							<p class="text-right">20:30</p>
						</div>						
					</div>	
					<div class="row gray">
						<div class="col-xs-6 col-md-6 col-sm-6 col-xs-6">
							<p>Старшая группа</p>
						</div>
						<div class="col-xs-3 col-md-3 col-sm-3 col-xs-3">
							<p>среда, суббота</p>
						</div>
						<div class="col-xs-3 col-md-3 col-sm-3 col-xs-3">
							<p class="text-right">20:30</p>
							<p class="text-right">14:30</p>
						</div>						
					</div>	
-->
				</div>
				<!-- СК Фили / Конец -->
				
				<!-- СК Конструктор / Начало -->
				<div class="col-xs-4">
					<p class="zal-address"><?php the_field('constructor_address'); ?></p>
					<!-- Google map constructor / Start -->					
					<?php  
						$constructorlocation = get_field('constructor_map');
						if( !empty($constructorlocation) ):
					?>
						<div class="acf-map thumbnail">
							<div class="marker" data-lat="<?php echo $constructorlocation['lat']; ?>" data-lng="<?php echo $constructorlocation['lng']; ?>"></div>
						</div>
					<?php endif; ?>
					<!-- Google map constructor / End -->
<!--
					<ul class="row map-thumbs" style="padding: 0 4%;">
						<li class="col-xs-2 col-md-2 col-sm-2 col-xs-2 thumbnail">
							<?php 
								$image_left = get_field('constructor_photo_1');									 
								if( !empty($image_left) ): ?>
								<img class="img-responsive" src="<?php echo $image_left['url']; ?>" alt="<?php echo $image_left['alt']; ?>" />
							<?php endif; ?>							
						</li>
						<li class="col-xs-2 col-md-2 col-sm-2 col-xs-2 col-xs-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 thumbnail">
							<?php 
								$image_left = get_field('constructor_photo_2');
								if( !empty($image_left) ): ?>
								<img class="img-responsive" src="<?php echo $image_left['url']; ?>" alt="<?php echo $image_left['alt']; ?>" />
							<?php endif; ?>							
						</li>
						<li class="col-xs-2 col-md-2 col-sm-2 col-xs-2 col-xs-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 thumbnail">
							<?php 
								$image_left = get_field('constructor_photo_3');
								if( !empty($image_left) ): ?>
								<img class="img-responsive" src="<?php echo $image_left['url']; ?>" alt="<?php echo $image_left['alt']; ?>" />
							<?php endif; ?>							
						</li>
						<li class="col-xs-2 col-md-2 col-sm-2 col-xs-2 col-xs-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 thumbnail">
							<?php 
								$image_left = get_field('constructor_photo_4');
								if( !empty($image_left) ): ?>
								<img class="img-responsive" src="<?php echo $image_left['url']; ?>" alt="<?php echo $image_left['alt']; ?>" />
							<?php endif; ?>							
						</li>          
					</ul>
-->
					<div class="row">
					    <div class="col-xs-3">
					       <img class="img-thumbnail" style="cursor:pointer;" src="<?php echo get_template_directory_uri();?>/images/zal-big-filevskaya/big-filevskaya-01.jpg" alt="" data-toggle="modal" data-target="#big-filevskaya-01">
					    </div>
					    <div class="col-xs-3">
					       <img class="img-thumbnail" style="cursor:pointer;" src="<?php echo get_template_directory_uri();?>/images/zal-big-filevskaya/big-filevskaya-02.jpg" alt="" data-toggle="modal" data-target="#big-filevskaya-02">
					    </div>
					    <div class="col-xs-3">
                            <div style="height:55px;overflow:hidden" class="img-thumbnail">
                                <div style="height:45px;overflow:hidden">
					               <img style="cursor:pointer;" src="<?php echo get_template_directory_uri();?>/images/zal-big-filevskaya/big-filevskaya-03.jpg" alt="" data-toggle="modal" data-target="#big-filevskaya-03" width="70">
					            </div>
					        </div>
					    </div>
                        <div class="col-xs-3">
                            <div style="height:55px;overflow:hidden" class="img-thumbnail">
                                <div style="height:45px;overflow:hidden">
					               <img style="cursor:pointer;" src="<?php echo get_template_directory_uri();?>/images/zal-big-filevskaya/big-filevskaya-04.jpg" alt="" data-toggle="modal" data-target="#big-filevskaya-04" width="70">
					            </div>
					        </div>
					    </div>
					</div>
					
<!--
					<p class="header-raspisanie">Расписание занятий: <span class="right">взрослые и дети</span></p>
					<div class="row gray">
						<div class="col-xs-6 col-md-6 col-sm-6 col-xs-6">
							<p>Начинающая группа и <br>продложающая группа</p>
						</div>
						<div class="col-xs-3 col-md-3 col-sm-3 col-xs-3">
							<p>понедельник, четверг</p>
						</div>
						<div class="col-xs-3 col-md-3 col-sm-3 col-xs-3">
							<p class="text-right">20:30</p>
						</div>						
					</div>					
					<div class="row no-gray">
						<div class="col-xs-6 col-md-6 col-sm-6 col-xs-6">
							<p>Начинающая группа и <br>продложающая группа</p>
						</div>
						<div class="col-xs-3 col-md-3 col-sm-3 col-xs-3">
							<p>вторник, пятница</p>
						</div>
						<div class="col-xs-3 col-md-3 col-sm-3 col-xs-3">
							<p class="text-right">20:30</p>
						</div>						
					</div>	
					<div class="row gray">
						<div class="col-xs-6 col-md-6 col-sm-6 col-xs-6">
							<p>Старшая группа</p>
						</div>
						<div class="col-xs-3 col-md-3 col-sm-3 col-xs-3">
							<p>среда, суббота</p>
						</div>
						<div class="col-xs-3 col-md-3 col-sm-3 col-xs-3">
							<p class="text-right">20:30</p>
							<p class="text-right">14:30</p>
						</div>						
					</div>	
-->
				</div>
				<!-- СК Конструктор / Конец -->
				
				<!-- Live Studio / Начало -->
				<div class="col-xs-4">
					<p class="zal-address"><?php the_field('love_dance_address'); ?></p>
					<!-- Google map live studio / Start -->					
					<?php  
						$love_dance_location = get_field('love_dance_map');
						if( !empty($love_dance_location) ):
					?>
						<div class="acf-map thumbnail">
							<div class="marker" data-lat="<?php echo $love_dance_location['lat']; ?>" data-lng="<?php echo $love_dance_location['lng']; ?>"></div>
						</div>
					<?php endif; ?>
					<!-- Google map live studio / End -->
<!--
					<ul class="row map-thumbs" style="padding: 0 4%;">
						<li class="col-xs-2 col-md-2 col-sm-2 col-xs-2 thumbnail">
							<?php 
								$image_left = get_field('love_dance_photo_1');									 
								if( !empty($image_left) ): ?>
								<img class="img-responsive" src="<?php echo $image_left['url']; ?>" alt="<?php echo $image_left['alt']; ?>" />
							<?php endif; ?>							
						</li>
						<li class="col-xs-2 col-md-2 col-sm-2 col-xs-2 col-xs-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 thumbnail">
							<?php 
								$image_left = get_field('love_dance_photo_2');
								if( !empty($image_left) ): ?>
								<img class="img-responsive" src="<?php echo $image_left['url']; ?>" alt="<?php echo $image_left['alt']; ?>" />
							<?php endif; ?>							
						</li>
						<li class="col-xs-2 col-md-2 col-sm-2 col-xs-2 col-xs-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 thumbnail">
							<?php 
								$image_left = get_field('love_dance_photo_3');
								if( !empty($image_left) ): ?>
								<img class="img-responsive" src="<?php echo $image_left['url']; ?>" alt="<?php echo $image_left['alt']; ?>" />
							<?php endif; ?>							
						</li>
						<li class="col-xs-2 col-md-2 col-sm-2 col-xs-2 col-xs-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 thumbnail">
							<?php 
								$image_left = get_field('love_dance_photo_4');
								if( !empty($image_left) ): ?>
								<img class="img-responsive" src="<?php echo $image_left['url']; ?>" alt="<?php echo $image_left['alt']; ?>" />
							<?php endif; ?>							
						</li>          
					</ul>
-->
				    <div class="row">
					    <div class="col-xs-3 pull-right">
					       <img class="img-thumbnail" style="cursor:pointer;" src="<?php echo get_template_directory_uri();?>/images/zal-kievskaya/kievskaya-01.jpg" alt="" data-toggle="modal" data-target="#kievskaya-01">
					    </div>
					    <div class="col-xs-3 pull-right">
					       <img class="img-thumbnail" style="cursor:pointer;" src="<?php echo get_template_directory_uri();?>/images/zal-kievskaya/kievskaya-02.jpg" alt="" data-toggle="modal" data-target="#kievskaya-02">
					    </div>					    
					</div>
<!--
					<p class="header-raspisanie">Расписание занятий: <span class="right">дети</span></p>
					<div class="row gray">
						<div class="col-xs-6 col-md-6 col-sm-6 col-xs-6">
							<p>дети с 2,5 до 5 лет</p>
						</div>
						<div class="col-xs-3 col-md-3 col-sm-3 col-xs-3">
							<p>с понедельника по четверг</p>
						</div>
						<div class="col-xs-3 col-md-3 col-sm-3 col-xs-3">
							<p class="text-right">с 16:00 до 17:00</p>
						</div>						
					</div>					
					<div class="row no-gray">
						<div class="col-xs-6 col-md-6 col-sm-6 col-xs-6">
							<p>дети с 6 до 12 лет</p>
						</div>
						<div class="col-xs-3 col-md-3 col-sm-3 col-xs-3">
							<p>с понедельника по четверг</p>
						</div>
						<div class="col-xs-3 col-md-3 col-sm-3 col-xs-3">
							<p class="text-right">с 17:00 до 18:00</p>
						</div>						
					</div>
-->
				</div>
				<!-- Live Studio / Конец -->
			</div>
		</div>
		<!-- Места проведения занятий / Конец -->