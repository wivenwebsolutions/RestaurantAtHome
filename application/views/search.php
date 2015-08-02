<div class="container-fluid">

	<div class="modal fade inviteRestoModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content text-center" style="min-height: 150px; width: 250px; padding: 20px 15px;margin: 100px auto;">
				<p style="text-align: center; font-weight: 700; margin-bottom: 20px;">Wil u restaurant "Restaurant Food &amp; Flavours" graag op RestaurantAtHome?</p>
				<a href="#" class="btn btn-default btnNoInvite">Nee</a>
				<a href="#" class="btn btn-primary">Ja</a>
			</div>
		</div>
	</div>

	<div class="modal fade loadingModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content" style="height: 150px; width: 250px; margin: 100px auto;">
				<span class="fa fa-spinner fa-spin fa-3x text-center" style="margin: 50px auto 15px; width: 100%;"></span>
				<p class="text-center">Laden ... even geduld aub</p>
			</div>
		</div>
	</div>


	<div class="row" id="content-container">
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

			<ul class="list-group clearfix" id="filterrow">
				<li class="list-group-item-filter clearfix">
					<div class="col-md-2 col-sm-2 col-xs-1">
						<label for="exampleInputName2">Prijs/persoon</label>
					</div>

					<div class="col-md-10 col-sm-10 col-xs-12">

						<div id="slider-range"></div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							€ <span id="min_price"></span>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
							€ <span id="max_price"></span>
						</div>
					</div>
				</li>

				<li class="list-group-item-filter clearfix more_filters_section">
					<div class="col-md-2 col-sm-2 col-xs-1">
						<label for="exampleInputName2">Afstand</label>
					</div>

					<div class="col-md-10 col-sm-10 col-xs-12">

						<div id="slider-range-distance"></div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							<span id="min_distance"></span> km
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
							<span id="max_distance"></span> km
						</div>
					</div>
				</li>

				<li class="list-group-item-filter clearfix more_filters_section">
					<div class="col-md-2 col-sm-2 col-xs-1">
						<label for="exampleInputName2">Acties</label>
					</div>

					<div class="col-md-10 col-sm-10 col-xs-12">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
							<div class="checkbox">
								<label>
									<input type="checkbox"> Actie 1
									<span class="badge">6</span>
								</label>
							</div>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
							<div class="checkbox">
								<label>
									<input type="checkbox"> Actie 2
									<span class="badge">6</span>
								</label>
							</div>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
							<div class="checkbox">
								<label>
									<input type="checkbox"> Actie 3
									<span class="badge">6</span>
								</label>
							</div>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
							<div class="checkbox">
								<label>
									<input type="checkbox"> Actie 4
									<span class="badge">6</span>
								</label>
							</div>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
							<div class="checkbox">
								<label>
									<input type="checkbox"> Actie 5
									<span class="badge">6</span>
								</label>
							</div>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
							<div class="checkbox">
								<label>
									<input type="checkbox"> Actie 6
									<span class="badge">6</span>
								</label>
							</div>
						</div>
					</div>
				</li>

				<li class="list-group-item-filter clearfix more_filters_section">
					<div class="col-md-2 col-sm-2 col-xs-1">
						<label for="exampleInputName2">Weergeven</label>
					</div>

					<div class="col-md-10 col-sm-10 col-xs-12">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
							<div class="checkbox">
								<label>
									<input type="checkbox"> Nu open
									<span class="badge">6</span>
								</label>
							</div>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
							<div class="checkbox">
								<label>
									<input type="checkbox"> Vegetarisch
									<span class="badge">6</span>
								</label>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="checkbox">
								<label>
									<input type="checkbox"> Aangesloten restaurants
									<span class="badge">6</span>
								</label>
							</div>
						</div>
					</div>
				</li>

				<li class="list-group-item-search clearfix">
					<input type="button" class="btn btn-primary filter_btns" value="Meer filters" id="btn_more_filters" />
					<input type="button" class="btn btn-primary filter_btns" value="Minder filters" id="btn_more_filters" style="display: none;" />
					<span class="pull-right" style="line-height: 34px;">429 resultaten</span>
				</li>
			</ul>

			<ul class="list-group" id="all_results">
				<?php for($i=0 ; $i < 3; $i++) { echo '<li class="list-group-item clearfix resto_result">
					<a href="'.base_url(). 'restaurantdetail">
						<div class="col-lg-9 col-md-9 col-sm-10 col-xs-8 clearfix">
							<h3 class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">Restaurant Food &amp; Flavours</h3>
							<p class="resto_address">Lokerenbaan 121, Zele</p>
							<p class="col-md-12 hidden-xs clearfix resto_subtext">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							<span class="label label-success resto_current_state">Open</span>
							<span class="label label-default resto_labels hidden-xs">Ribbetjes</span>
							<span class="label label-default resto_labels hidden-xs" >Belgisch</span>
							<span class="label label-info resto_labels">ACTIES</span>
						</div>

						<div class="col-lg-3 col-md-3 col-sm-2 col-xs-4 pull-right">
							<img src="//s3-media1.fl.yelpassets.com/bphoto/4FAeNpaaC4Pu1XMaIAIsjA/90s.jpg" class="pull-right">
						</div>
					</a>
				</li>'; } ?>
			</ul>

		</div>

		<div class="col-lg-4 col-md-4 hidden-sm hidden-xs" id="map_search_pane" style="position: fixed; right: 0;">
		</div>
	</div>
</div>
<!-- /.container -->

<!-- Shop Hours Modal -->
<div class="modal fade" id="shopHoursModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Openingsuren <em><strong>Fleur De Lin</strong></em></h4>
			</div>
			<div class="modal-body">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Dag</th>
							<th>Openingstijden</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">Maandag</th>
							<td>12u00 - 21u30</td>
						</tr>
						<tr>
							<th scope="row">Dinsdag</th>
							<td>Gesloten</td>
						</tr>
						<tr>
							<th scope="row">Woensdag</th>
							<td>Gesloten</td>
						</tr>
						<tr>
							<th scope="row">Donderdag</th>
							<td>12u00 - 21u30</td>
						</tr>
						<tr>
							<th scope="row">Vrijdag</th>
							<td>12u00 - 21u30</td>
						</tr>
						<tr>
							<th scope="row">Zaterdag</th>
							<td>12u00 - 22u00</td>
						</tr>
						<tr>
							<th scope="row">Zondag</th>
							<td>12u00 - 21u00</td>
						</tr>
						<tr>
							<th scope="row">Feestdagen</th>
							<td>Gesloten</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
