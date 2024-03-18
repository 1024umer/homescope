
@extends('user.layout.master')
@section('content')
<div class="community-title-area bg-1" style="background:url({{ asset('public/bg.jpeg') }}) no-repeat center; background-size:cover;">
        <div class="container">
            <div class="page-title-content">
                <h2>Secondary Properties</h2>
                <ul>
                    <li>
                        <a href="/">
                            Home
                        </a>
                    </li>

                    <li class="active">Secondary Properties</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="listing-area pt-70 pb-70" style="background:#3E3C3D">
			<div class="container">
				<div class="row">
				<div class="col-lg-4">
						<div class="widget-sidebar ml-15 mb-4">
							<div class="sidebar-widget filter-form rounded-6 shadow">
								<h3>Search</h3>
								<div>
									<div class="form-group">
										<div class="input-group">
											<select id="ddlAvailFor" class="form-select form-control"
												onchange="fnProplistonSearch();">
												<option value='Buy'>Buy</option>
												<option value='Rent'>Rent</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<select id="ddlptype" class="form-select form-control"
												onchange="fnProplistonSearch();">
												<option selected>Property Type</option>
												<option value='3'>Apartment</option>
												<option value='17'>Duplex Apartments</option>
												<option value='10'>Residential Plot</option>
												<option value='6'>Retail Space</option>
												<option value='27'>Showroom</option>
												<option value='12'>Studio</option>
												<option value='1'>Townhouse</option>
												<option value='2'>Villa</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<input class="form-control" list="propoption" id="txtpropoption"
											placeholder="Type to search...">
										<datalist id="propoption">
											<option value='Al Barari'>
											<option value='Al Barsha South'>
											<option value='Al- Furjan'>
											<option value='Al Satwa'>
											<option value='Arabian Ranches'>
											<option value='Arjan'>
											<option value='Business Bay'>
											<option value='City Walk'>
											<option value='Damac Hills'>
											<option value='Damac Lagoons'>
											<option value='Downtown Dubai'>
											<option value='Dubai Creek Harbour'>
											<option value='Dubai Harbour'>
											<option value='Dubai Hills Estate'>
											<option value='Dubai Investment Park'>
											<option value='Dubai Production City'>
											<option value='Dubai South'>
											<option value='Dubai Sports City'>
											<option value='Dubai Studio City'>
											<option value='Dubailand'>
											<option value='Emaar Beachfront'>
											<option value='JBR'>
											<option value='Jumeirah'>
											<option value='Jumeirah Lake Towers'>
											<option value='JVC'>
											<option value='Marina'>
											<option value='Meydan'>
											<option value='Mirdif'>
											<option value='Mohammed Bin Rashid City'>
											<option value='Mudon Community'>
											<option value='Palm Jumeirah'>
											<option value='Port De La Mer'>
											<option value='Sheikh Zayed Road'>
											<option value='Town Square Dubai'>
											<option value='Umm Suqeim'>
										</datalist>

									</div>
									<div class="d-grid">
										<button id="btnPropSearch" type="button" class="default-btn btn-"
											onclick="fnProplistonSearch();">
											Search
										</button>
									</div>
								</div>
							</div>
						</div>
						<div class="widget-sidebar ml-15 sticky-lg-top">
							<div class="sidebar-widget filter-form rounded-6 shadow">

								<h3>Get in touch</h3>
								<div>
									<div class="form-group">
										<input type="text" id="txtnameqc" class="form-control" placeholder="Name"
											onblur="fnnameqc();">
										<span id="spname" class="text-danger"></span>
									</div>
									<div class="form-group">
										<input type="text" id="txtemailqc" class="form-control" placeholder="Email Id"
											onblur="fnnameqc();">
										<span id="spemail" class="text-danger"></span>
									</div>
									<div class="form-group">
										<div class="input-group">
											<select id="ddlCountryCodeqc" class="form-select form-control"
												onchange="fncountryqc();">
												<option selected="selected" value="Code">Code</option>
												<option value="119">ARE +971</option>
												<option value="15">BHR +973</option>
												<option value="64">KWT +965</option>
												<option value="88">OMN +968</option>
												<option value="94">QAT +974</option>
												<option value="97">SAU +966</option>
												<option value="10">ABW +297</option>
												<option value="1">AFG +93</option>
												<option value="6">AGO +244</option>
												<option value="131">AIA +1-264</option>
												<option value="2">ALB +355</option>
												<option value="5">AND +376</option>
												<option value="8">ARG +54</option>
												<option value="9">ARM +374</option>
												<option value="4">ASM +1-684</option>
												<option value="7">ATA +672</option>
												<option value="11">AUS +61</option>
												<option value="12">AUT +43</option>
												<option value="13">AZE +994</option>
												<option value="27">BDI +257</option>
												<option value="19">BEL +32</option>
												<option value="21">BEN +229</option>
												<option value="137">BFA +226</option>
												<option value="16">BGD +880</option>
												<option value="26">BGR +359</option>
												<option value="14">BHS +1-242</option>
												<option value="133">BIH +387</option>
												<option value="207">BLM +590</option>
												<option value="18">BLR +375</option>
												<option value="20">BLZ +501</option>
												<option value="22">BMU +1-441</option>
												<option value="132">BOL +591</option>
												<option value="25">BRA +55</option>
												<option value="17">BRB +1-246</option>
												<option value="136">BRN +673</option>
												<option value="23">BTN +975</option>
												<option value="24">BWA +267</option>
												<option value="139">CAF +236</option>
												<option value="30">CAN +1</option>
												<option value="142">CCK +61</option>
												<option value="109">CHE +41</option>
												<option value="31">CHL +56</option>
												<option value="32">CHN +86</option>
												<option value="176">CIV +225</option>
												<option value="29">CMR +237</option>
												<option value="143">COD +243</option>
												<option value="35">COG +242</option>
												<option value="144">COK +682</option>
												<option value="33">COL +57</option>
												<option value="34">COM +269</option>
												<option value="145">CRI +506</option>
												<option value="36">CUB +53</option>
												<option value="147">CUW +599</option>
												<option value="141">CXR +61</option>
												<option value="138">CYM +1-345</option>
												<option value="148">CYP +357</option>
												<option value="149">CZE +420</option>
												<option value="44">DEU +49</option>
												<option value="150">DJI +253</option>
												<option value="151">DMA +1-767</option>
												<option value="37">DNK +45</option>
												<option value="3">DZA +213</option>
												<option value="153">ECU +593</option>
												<option value="154">EGY +20</option>
												<option value="157">ERI +291</option>
												<option value="158">EST +372</option>
												<option value="159">ETH +251</option>
												<option value="39">FIN +358</option>
												<option value="38">FJI +679</option>
												<option value="160">FLK +500</option>
												<option value="40">FRA +33</option>
												<option value="161">FRO +298</option>
												<option value="191">FSM +691</option>
												<option value="41">GAB +241</option>
												<option value="43">GEO +955</option>
												<option value="163">GEO +995</option>
												<option value="169">GGY +44-1481</option>
												<option value="45">GHA +233</option>
												<option value="164">GIB +350</option>
												<option value="170">GIN +224</option>
												<option value="42">GMB +220</option>
												<option value="171">GNB +245</option>
												<option value="156">GNQ +240</option>
												<option value="165">GRC +30</option>
												<option value="166">GRD +1-473</option>
												<option value="46">GRL +299</option>
												<option value="168">GTM +502</option>
												<option value="167">GUM +1-671</option>
												<option value="172">GUY +592</option>
												<option value="48">HKG +852</option>
												<option value="173">HND +504</option>
												<option value="146">HRV +385</option>
												<option value="47">HTI +509</option>
												<option value="174">HUN +36</option>
												<option value="51">IDN +62</option>
												<option value="175">IMN +44-1624</option>
												<option value="50">IND +91</option>
												<option value="134">IOT +246</option>
												<option value="54">IRL +353</option>
												<option value="52">IRN +98</option>
												<option value="53">IRQ +964</option>
												<option value="49">ISL +354</option>
												<option value="55">ISR +972</option>
												<option value="56">ITA +39</option>
												<option value="57">JAM +1-876</option>
												<option value="59">JEY +44</option>
												<option value="177">JEY +44-1534</option>
												<option value="60">JOR +962</option>
												<option value="58">JPN +81</option>
												<option value="61">KAZ +7</option>
												<option value="62">KEN +254</option>
												<option value="65">KGZ +996</option>
												<option value="28">KHM +855</option>
												<option value="178">KIR +686</option>
												<option value="217">KNA +1-869</option>
												<option value="63">KOR +82</option>
												<option value="180">LAO +856</option>
												<option value="182">LBN +961</option>
												<option value="66">LBR +231</option>
												<option value="67">LBY +218</option>
												<option value="218">LCA +1-758</option>
												<option value="184">LIE +423</option>
												<option value="105">LKA +94</option>
												<option value="183">LSO +266</option>
												<option value="68">LTU +370</option>
												<option value="69">LUX +352</option>
												<option value="181">LVA +371</option>
												<option value="70">MAC +853</option>
												<option value="79">MAR +212</option>
												<option value="77">MCO +377</option>
												<option value="192">MDA +373</option>
												<option value="186">MDG +261</option>
												<option value="73">MDV +960</option>
												<option value="76">MEX +52</option>
												<option value="187">MHL +692</option>
												<option value="185">MKD +389</option>
												<option value="74">MLI +223</option>
												<option value="75">MLT +356</option>
												<option value="80">MMR +95</option>
												<option value="193">MNE +382</option>
												<option value="78">MNG +976</option>
												<option value="199">MNP +1-670</option>
												<option value="195">MOZ +258</option>
												<option value="188">MRT +222</option>
												<option value="194">MSR +1-664</option>
												<option value="189">MUS +230</option>
												<option value="71">MWI +265</option>
												<option value="72">MYS +60</option>
												<option value="190">MYT +262</option>
												<option value="81">NAM +264</option>
												<option value="197">NCL +687</option>
												<option value="198">NER +227</option>
												<option value="86">NGA +234</option>
												<option value="85">NIC +505</option>
												<option value="87">NIU +683</option>
												<option value="83">NLD +31</option>
												<option value="130">Norway +47</option>
												<option value="82">NPL +977</option>
												<option value="196">NRU +674</option>
												<option value="84">NZL +64</option>
												<option value="89">PAK +92</option>
												<option value="90">PAN +507</option>
												<option value="91">PER +51</option>
												<option value="92">PHL +63</option>
												<option value="201">PLW +680</option>
												<option value="203">PNG +675</option>
												<option value="93">POL +48</option>
												<option value="200">PRK +850</option>
												<option value="205">PRT +351</option>
												<option value="204">PRY +595</option>
												<option value="202">PSE +970</option>
												<option value="162">PYF +689</option>
												<option value="95">ROU +40</option>
												<option value="96">RUS +7</option>
												<option value="206">RWA +250</option>
												<option value="106">SDN +249</option>
												<option value="211">SEN +221</option>
												<option value="100">SGP +65</option>
												<option value="216">SHN +290</option>
												<option value="101">SLB +677</option>
												<option value="99">SLE +232</option>
												<option value="155">SLV +503</option>
												<option value="209">SMR +378</option>
												<option value="102">SOM +252</option>
												<option value="219">SPM +508</option>
												<option value="129">SPN +34</option>
												<option value="98">SRB +381</option>
												<option value="104">SSD +211</option>
												<option value="210">STP +239</option>
												<option value="221">SUR +597</option>
												<option value="214">SVK +421</option>
												<option value="215">SVN +386</option>
												<option value="108">SWE +46</option>
												<option value="107">SWZ +268</option>
												<option value="213">SXM +1-721</option>
												<option value="212">SYC +248</option>
												<option value="110">SYR +963</option>
												<option value="226">TCA +1-649</option>
												<option value="140">TCD +235</option>
												<option value="114">TGO +228</option>
												<option value="235">TKM +993</option>
												<option value="113">THA +66</option>
												<option value="112">TJK +992</option>
												<option value="223">TKL +690</option>
												<option value="152">TLS +670</option>
												<option value="115">TON +676</option>
												<option value="224">TTO +1-868</option>
												<option value="225">TUR +216</option>
												<option value="116">TUR +90</option>
												<option value="227">TUV +688</option>
												<option value="111">TWN +886</option>
												<option value="222">TZA +255</option>
												<option value="117">UGA +256</option>
												<option value="120">UK +44</option>
												<option value="118">UKR +380</option>
												<option value="228">URY +598</option>
												<option value="121">USA +1</option>
												<option value="122">UZB +998</option>
												<option value="230">VAT +379</option>
												<option value="220">VCT +1-784</option>
												<option value="231">VEN +58</option>
												<option value="135">VGB +1-284</option>
												<option value="233">VIR +1-340</option>
												<option value="232">VNM +84</option>
												<option value="229">VUT +678</option>
												<option value="234">WLF +681</option>
												<option value="208">WSM +685</option>
												<option value="179">XKX +383</option>
												<option value="123">YEM +967</option>
												<option value="103">ZAF +27</option>
												<option value="124">ZMB +260</option>
												<option value="125">ZWE +263</option>
												<option value="127">Other</option>
											</select>
											<input type="number" id="txtphoneqc"
												class="form-control rounded-start-0 w-50" placeholder="Contact No"
												onblur="fnphoneqc();">
										</div>
										<span id="spphone" class="text-danger"></span>
									</div>

									<div class="form-group">
										<textarea id="txtmsgqc" class="form-control"
											placeholder="Enter your message"></textarea>
									</div>
									<div class="form-group">
										<span id="lblmsg" class="text-success"></span>
									</div>
									<div class="d-grid">
										<button type="button" id="submitdevqc" class="default-btn btn-"
											onclick="return saveprojdevqc();">
											Send Message
										</button>
									</div>
								</div>

							</div>
						</div>
					</div>

					<div class="col-lg-8" id="scrollid">
						<div class="list-wrap">
							<div class="mb-30 bg-light p-3 border rounded-6">
								<div class="row align-items-center justify-content-between">
									<div class="col-lg-7">
										<h5>Showing Property Results<small class="fs-6 fw-light"> (<span
													id="propcount">189</span>) </small></h5>
									</div>
									<div class="col-lg-3">
										<select id="propSortbyId" class="form-select form-control"
											onchange="fnProplistonSearch();">
											<option selected="selected" value="0">Sort By</option>
											<option value="1">Price High To Low</option>
											<option value="2">Price Low To High</option>
											<option value="3">Bedroom High To Low</option>
											<option value="4">Bedroom Low To High</option>
											<option value="5">Size High To Low</option>
											<option value="6">Size Low To High</option>
											<option value="7">Most Popular</option>
											<option value="8">Last Updated</option>
										</select>
									</div>
								</div>
							</div>
							<div class="position-relative">
								<div class="preloader inner-loader preloader-deactivate" id="loader-style">
									<div class="preloader-wrap">
										<span></span>
										<span></span>
										<span></span>
										<span></span>
									</div>
								</div>
								<div id="proplistid">
                                    @foreach ($projects as $row)
									<div class='card mb-4 pro_list'><a
											href='{{route('project.details',$row->slug)}}'
											class='no-anchor'>
											<div class='row g-0'>
												<div class='col-md-5'>
													<div class='pro_img'><img
															src='{{ asset('public/assets/images/projects') }}/{{ $row->banner }}'
															class='img-fluid rounded-start'
															alt='{{$row->name}}'><span>For
															Sale</span></div>
												</div>
												<div class='col-md-7'>
													<div class='card-body'>
														<div class=''>
															<div class='title prop'>
																<h5 class='card-title properties'>{{$row->name}}</h5>
																<div class='location'><i class='ri-map-pin-line'></i>{{$row->community}}</div>
															</div>
														</div>
														<div class='bg-light rounded-6 summry mt-1'>
															<div class='p-3'>
																<ul
																	class='d-flex align-items-lg-center flex-column flex-lg-row justify-content-lg-between'>
																	<li><i class='ri-hotel-bed-line'></i>
																		<div><span class='small'>Bedroom</span>
																			<p>{{$row->unit_type}}</p>
																		</div>
																	</li>
																	<li><i class='ri-home-8-line'></i>
																@if($row->property_type)		<div><span class='small'>Property Type</span>
																			<p>{{$row->property_type}}</p>
																		</div>@endif
																	</li>
																	<li><i class='ri-aspect-ratio-line'></i>
																	 @if($row->plot_size)	<div><span class='small'>Area</span>
																			<p>{{$row->plot_size}}</p>
																		</div>
																		@endif
																	</li>
																</ul>
															</div>
														</div>
														<p class='card-text'></p><span
															class='d-block price mt-1 mb-0'>AED {{$row->price}}</span>
													</div>
												</div>
											</div>
										</a></div>
									@endforeach
								</div>
							</div>
							<div class="col-lg-12 mt-4">
								<div class="pagination-area" id="divProppagingId">
									<a href="javascript:void(0);" onclick="fnProplistpreviousonpaging();"
										class="next page-numbers">
										<i class="ri-arrow-left-line"></i>
									</a>

									<a href="javascript:void(0)" class="page-numbers"
										onclick='fnProplistonpaging(this);' data-id="1">1</a>

									<a href="javascript:void(0)" class="page-numbers"
										onclick='fnProplistonpaging(this);' data-id="2">2</a>

									<a href="javascript:void(0)" class="page-numbers"
										onclick='fnProplistonpaging(this);' data-id="3">3</a>

									<a href="javascript:void(0)" class="page-numbers"
										onclick='fnProplistonpaging(this);' data-id="4">4</a>

									<a href="javascript:void(0)" class="page-numbers"
										onclick='fnProplistonpaging(this);' data-id="5">5</a>

									<a href="javascript:void(0);" onclick="fnProplistnextonpaging();"
										class="next page-numbers">
										<i class="ri-arrow-right-line"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection    