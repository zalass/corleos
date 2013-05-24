<?php
/**page d'accueil**/
  include(INCLUDE_PATH.'/header.php');

?>
        <div class="corps container">

            <!-- Example row of columns -->
            <div class="row">
                <div class="span3">
										<div class="clearfix menu-gauche">
										  <div class="page-header">
											  <h4>Cat&eacute;gories</h4>
											</div>
											<div class="accordion" id="accordion2">
												<div class="accordion-group">
													<div class="accordion-heading">
														<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
															<i class="icon-chevron-right"></i>
															Categorie 1
														</a>
													</div>
													<div id="collapseOne" class="accordion-body collapse in">
														<div class="accordion-inner">
															Cat&eacute;gorie 1
														</div>
													</div>
												</div>
												<div class="accordion-group">
													<div class="accordion-heading">
														<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
															<i class="icon-chevron-right"></i>
															Cat&eacute;gorie 2
														</a>
													</div>
													<div id="collapseTwo" class="accordion-body collapse">
														<div class="accordion-inner">
															<ul>
															  <li><a href="#">sub-categorie 1</a></li>
															  <li><a href="#">sub-categorie 2</a></li>
															  <li><a href="#">sub-categorie 3</a></li>
															  <li><a href="#">sub-categorie 4</a></li>
															  <li><a href="#">sub-categorie 5</a></li>
															  <li><a href="#">sub-categorie 6</a></li>
															</ul>
														</div>
													</div>
												</div>
												<div class="accordion-group">
													<div class="accordion-heading">
														<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
															<i class="icon-chevron-right"></i>
															Cat&eacute;gorie 3
														</a>
													</div>
													<div id="collapseThree" class="accordion-body collapse">
														<div class="accordion-inner">
															<a href="#">Cat&eacute;gorie 3</a>
														</div>
													</div>
												</div>
												<div class="accordion-group">
													<div class="accordion-heading">
														<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
															<i class="icon-chevron-right"></i>
															Cat&eacute;gorie 4
														</a>
													</div>
													<div id="collapseFour" class="accordion-body collapse">
														<div class="accordion-inner">
															<a href="#">Cat&eacute;gorie 4</a>
														</div>
													</div>
												</div>
												<div class="accordion-group">
													<div class="accordion-heading">
														<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFive">
															<i class="icon-chevron-right"></i>
															Cat&eacute;gorie 5
														</a>
													</div>
													<div id="collapseFive" class="accordion-body collapse">
														<div class="accordion-inner">
															<a href="#">Cat&eacute;gorie 5</a>
														</div>
													</div>
												</div>
												<div class="accordion-group">
													<div class="accordion-heading">
														<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseSix">
															<i class="icon-chevron-right"></i>
															Cat&eacute;gorie 6
														</a>
													</div>
													<div id="collapseSix" class="accordion-body collapse">
														<div class="accordion-inner">
															<a href="#">Cat&eacute;gorie 6</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="clearfix menu-gauche">
										  <div class="page-header">
											  <h4>Pharmacies</h4>
											</div>
											<ul>
											  <li><a href="#">Pharmacie 1<a/></li>
												<li><a href="#">Pharmacie 2</a></li>
												<li><a href="#">Pharmacie 3</a></li>
												<li><a href="#">Pharmacie 4</a></li>
												<li><a href="#">Pharmacie 5</a></li>
											</ul>
										</div>
                </div>
                <div class="span9">
									<div class="navbar">
											<div class="navbar-inner">
													<div class="container">
															<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
																	<span class="icon-bar"></span>
																	<span class="icon-bar"></span>
																	<span class="icon-bar"></span>
															</a>
															<div class="nav-collapse collapse">
																	
																	<ul class="nav">
																			<li>
																				<a href="#">Pharmacies</a>
																			</li>
																			<li class="divider-vertical"></li>
																			<li class="dropdown">
																					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Produits <b class="caret"></b></a>
																					<ul class="dropdown-menu">
																							<li><a href="#">Categorie 1</a></li>
																							<li class="divider"></li>
																							<li><a href="#">Categorie 2</a></li>
																							<li class="divider"></li>
																							<li><a href="#">Categorie 3</a></li>
																							<li class="divider"></li>
																							<li><a href="#">Categorie 4</a></li>
																							<li class="divider"></li>
																							<li><a href="#">Categorie 5</a></li>
																							<li class="divider"></li>
																							<li><a href="#">Categorie 6</a></li>
																					</ul>
																			</li>
																			<li class="divider-vertical"></li>
																			<li>
																				<a href="./?news">Conseils</a>
																			</li>

																	</ul>
															</div><!--/.nav-collapse -->
													</div>
											</div>
									</div>
									
									<div class="row-fluid">
									  
										<div id="slider" class="nivoSlider">
												<a href="#"><img src="vendors/img/image1.jpg" data-thumb="vendors/img/image1.jpg" alt="" title="description" /></a>
												<a href="#"><img src="vendors/img/image2.jpg" data-thumb="vendors/img/image2.jpg" alt="" title="This is an example of a caption" /></a>
												<a href="#"><img src="vendors/img/image3.jpg" data-thumb="vendors/img/image3.jpg" alt="" title="#htmlcaption" /></a>
										</div>
										<div id="htmlcaption" class="nivo-html-caption">
												<strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>. 
										</div>
											
										
									</div>
									
									<div class="row-fluid">
										<h3>Produits r&eacute;cents</h3>
										<div class="produits_recents">
											<div class="span4">
												<a href="#"><img src="vendors/img/img1.jpg"/></a>
												<div class="products">
													<div class="description">
														<h5>
															Produit 1 mini description
														</h5>
													</div>
												</div>
											</div>
											<div class="span4">
												<a href="#"><img src="vendors/img/img2.jpg"/></a>
												<div class="products">
													<div class="description">
														<h5>
															Produit 1 mini description
														</h5>
													</div>
												</div>
											</div>
											<div class="span4">
												<a href="#"><img src="vendors/img/img3.jpg"/></a>
												<div class="products">
													<div class="description">
														<h5>
															Produit 1 mini description
														</h5>
													</div>
												</div>
											</div>
									  </div>
										<a class="pull-right" href="#">Tous les produits </a>
										<h3>Pharmacies du moment</h3>
										<div class="pharma_moment">
											<div class="span4">
												<a href="#"><img src="vendors/img/img1.jpg"/></a>
												<div class="products">
													<div class="description">
														<h5>
															Produit 1 mini description
														</h5>
													</div>
												</div>
											</div>
											<div class="span4">
												<a href="#"><img src="vendors/img/img2.jpg"/></a>
												<div class="products">
													<div class="description">
														<h5>
															Produit 1 mini description
														</h5>
													</div>
												</div>
											</div>
											<div class="span4">
												<a href="#"><img src="vendors/img/img3.jpg"/></a>
												<div class="products">
													<div class="description">
														<h5>
															Produit 1 mini description
														</h5>
													</div>
												</div>
											</div>
									    </div>
										<a class="pull-right" href="#">Toutes les pharmacies </a>
										<h3>Conseils r&eacute;cents</h3>
									  <div class="produits_recents">
											<div class="span4">
												<a href="#"><img src="vendors/img/img1.jpg"/></a>
												<div class="products">
													<div class="description">
														<h5>
															Produit 1 mini description
														</h5>
													</div>
												</div>
											</div>
											<div class="span4">
												<a href="#"><img src="vendors/img/img2.jpg"/></a>
												<div class="products">
													<div class="description">
														<h5>
															Produit 1 mini description
														</h5>
													</div>
												</div>
											</div>
											<div class="span4">
												<a href="#"><img src="vendors/img/img3.jpg"/></a>
												<div class="products">
													<div class="description">
														<h5>
															Produit 1 mini description
														</h5>
													</div>
												</div>
											</div>
									  </div>
										<a class="pull-right" href="#">Tous les conseils </a>
									</div>
				</div>
			</div>
        </div>
<?php

	include(INCLUDE_PATH.'/footer.php');
	

echo'<h1>PAGE acceuil</h1><br/>';
foreach($data_produits as $unproduit)
{
	echo $unproduit->nom().'<br/>';
}
foreach($data_pharma as $pharma)
{
	echo $pharma->nom().'<br/>';
}
foreach($data_news as $news)
{
	echo $news->contenu();
}

?>