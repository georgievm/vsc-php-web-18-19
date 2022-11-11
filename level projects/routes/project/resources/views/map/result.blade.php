@extends('layouts.app')

@section('content')
<div class="container">
	<div class="container">
        <div style="margin-top: 5px;" class="main-text map-result-heading">
            <span class="green_underlined">
                {{__('auth.Route')}}
            </span>
        </div>
        <div class="row">
			<div class="col-lg-4 col-md-6 mar-bott">
				<!-- <div class="col-lg-12"> -->
					<img class="map-result-img" src="{{ asset('images/map_result.jpg') }}" draggable="false">
				<!-- </div> -->
	    	</div>
	    	<div class="col-lg-4 col-md-6 mar-bott">
	    		<div class="map-result-panel bg-dark no-padding">
		        	<div class="time-label text-white d-inline-block">{{__('auth.Time')}}</div>
		        	<div class="time-value text-white text-center d-inline-block float-right">
		        		@if ($time < 60)
		        			{{ floor($time) }} min
		        		@elseif ($time % 60 == 0)
		        			{{ floor($time/60) }} h
		        		@else
		        			{{ floor($time/60) }}h {{ $time%60 }}min
		        		@endif
		        	</div>
		        </div>

		        <div style="margin-top: 20px;" class="map-result-panel bg-dark no-padding mar-bott">
		        	<div class="time-label text-white d-inline-block">{{__('auth.Delay')}}</div>
		        	<div class="time-value text-white text-center d-inline-block float-right">
		        		{{ floor($dif_delay) }} min
		        	</div>
		        </div>

		        <div class="bg-dark map-result-panel text-white">
	        		<h3 style="padding: 14px 0 36px 0;" class="text-center">{{__('auth.Cities')}}</h3>
	        		<ul class="map-result-cities-ul">
	        			@foreach($paths as $path)
	        				<li>
	        					<img src="{{ asset('images/point.png') }}" width="32px">
	        					{{ (App\City::find($path))->name }}
	        				</li>
	        			@endforeach
	        		</ul>
		        </div>
	    	</div>
	    	<div class="col-lg-4">
	    		<div class="row no-padding">
	    			<div class="col-lg-12 col-md-6">
	    				<form style="padding-bottom: 17px;" class="text-white bg-dark map-result-panel mar-bott">
			        		<h3 style="padding: 14px 0 15px 0;" class="text-center">{{__('auth.Select_fuel')}}</h3>
			        		<div class="radio-group">
		        				<input type="radio" class="radio" name="fuel" id="1" value="diesel">
		        				<label for="1" class="radio-label">{{__('auth.Diesel')}}</label>
			        		</div>
			        		<div class="radio-group">
		        				<input type="radio" class="radio" name="fuel" id="2" value="gasoline">
		        				<label for="2" class="radio-label">{{__('auth.Gasoline')}}</label>
			        		</div>
			        		<div class="radio-group">
		        				<input type="radio" class="radio" name="fuel" id="3" value="gas">
		        				<label for="3" class="radio-label">{{__('auth.Gas')}}</label>
			        		</div>
			        		<div class="radio-group">
		        				<input type="radio" class="radio" name="fuel" id="4" value="metan">
		        				<label for="4" class="radio-label">{{__('auth.Methane')}}</label>
			        		</div>
			        		<hr>
			        		<div class="radio-group">
		        				<input type="radio" class="radio" name="fuel" id="5" value="electricity">
		        				<label for="5" class="radio-label">{{__('auth.Electricity')}}</label>
			        		</div>
		        		</form>
	    			</div>
	    			<div class="col-lg-12 col-md-6">
	    				<div style="padding-bottom: 12px;" class="bg-dark map-result-panel text-white">
			        		<h3 style="padding: 14px 0 15px 0;" class="text-center">{{__('auth.Gas_Stations')}}</h3>

							<div class="gas-st-content">
								@for ($i = 0; $i < count($find_gas_stations); $i++)
									<div class="gas-st-group">
										<div class="gas-st-group-heading">
											<img class="img-mar-right" src="{{ asset('images/gas_st.png') }}">
											<span class="bold">
												{{ (App\GasStation::find($find_gas_stations[$i][0]))->name }}
												@if($find_gas_stations[$i][7])
												 / {{ ($find_gas_stations[$i][8]) }} km {{__('auth.distance_from')}} 
													<?php
													foreach ($cities as $city) {
														if ($find_gas_stations[$i][6] == $city->id) {
															echo $city->name;
														}
													}
													?>/
												@endif
												@if($find_gas_stations[$i][7] == null)/
													<?php
													foreach ($cities as $city) {
														if ($find_gas_stations[$i][6] == $city->id) {
															echo $city->name;
														}
													}
													?>/
												@endif
											</span>
										</div>
										@if ($find_gas_stations[$i][1])
										<div class="fuel diesel">
											<img class="img-mar-right" src="{{ asset('images/fuel.png') }}">
											{{__('auth.Diesel')}}: {{ $find_gas_stations[$i][1] }}€
										</div>
										@endif
										@if ($find_gas_stations[$i][2])
										<div class="fuel gasoline">
											<img class="img-mar-right" src="{{ asset('images/fuel.png') }}">
											{{__('auth.Gasoline')}}: {{ $find_gas_stations[$i][2] }}€
										</div>
										@endif
										@if ($find_gas_stations[$i][3])
										<div class="fuel gas">
											<img class="img-mar-right" src="{{ asset('images/fuel.png') }}">
											{{__('auth.Gas')}}: {{ $find_gas_stations[$i][3] }}€
										</div>
										@endif
										@if ($find_gas_stations[$i][4])
										<div class="fuel electricity">
											<img class="img-mar-right" src="{{ asset('images/electricity.png') }}">
											{{__('auth.Electricity')}}: {{ $find_gas_stations[$i][4] }}€
										</div>
										@endif
										@if ($find_gas_stations[$i][5])
										<div class="fuel metan">
											<img class="img-mar-right" src="{{ asset('images/fuel.png') }}">
											{{__('auth.Methane')}}: {{ $find_gas_stations[$i][5] }}€
										</div>
										@endif
									</div>
								@endfor
							</div>
			        	</div>
	    			</div>
	    		</div>
	    	</div>
	    </div>
    </div>
</div>
@endsection