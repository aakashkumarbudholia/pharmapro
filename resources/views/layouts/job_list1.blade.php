<?php
$url = url()->current();
$lang = session('lang');
if(empty($lang))
{
App::setLocale('en');
} else {
App::setLocale($lang);
}

?>
<style type="text/css">
  table.offersItems tr:nth-child(9) {
    opacity: 1 !important;
}
 table.offersItems tr:nth-child(10) {
    opacity: 1 !important;
}
.table-striped tbody tr:nth-of-type(odd) {
    background-color: #469b0b14;
    width: 100%;
}
.table th, .table td {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
    width: 30%;
    height: 50%;
}
.tbody {
    display: table-row-group;
    vertical-align: middle;
    border-color: inherit;
}
.table {
    display: table;
    border-collapse: separate;
    box-sizing: border-box;
    text-indent: initial;
    border-spacing: 2px;
    border-color: gray;
}
.fontsize{
	    font-size: 21px;
    font-weight: bold;
}
.latest-offers-section.joblist-page .offersItems tr th,
.latest-offers-section.joblist-page .offersItems tr td {
  font-family: 'Roboto', sans-serif;
  border: none; 	
}

.latest-offers-section.joblist-page .offersItems tr td .fontsize a {
  font-size: 18px;
  color: #000;
  text-decoration: none;
}
.latest-offers-section.joblist-page .offersItems tr td .strCompany {
  padding: 5px 0;
  font-size: 15px;
}
.latest-offers-section.joblist-page .offersItems tr td .date {
  padding: 0;
  font-size: 15px;
}


</style>
<body>
  <header>
	<section class="latest-offers-section joblist-page py-5" id="latest-job">
			<div class="container">
				 <table class="table table-striped table-hover table-jobposting offersItems">

      			
				 	<tbody>
						<?php
							if(isset($get_data))
							{
								foreach($get_data as $key => $value)
								{
										$jobtitle = str_replace(' ', '-', $value->company);
					 					$jobtitle = str_replace('/', '-', $jobtitle);
					 					$jobtitle = strtr(utf8_decode($jobtitle), utf8_decode('ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïñòóôõöøùúûüýÿĀāĂăĄąĆćĈĉĊċČčĎďĐđĒēĔĕĖėĘęĚěĜĝĞğĠġĢģĤĥĦħĨĩĪīĬĭĮįİıĲĳĴĵĶķĹĺĻļĽľĿŀŁłŃńŅņŇňŉŌōŎŏŐőŒœŔŕŖŗŘřŚśŜŝŞşŠšŢţŤťŦŧŨũŪūŬŭŮůŰűŲųŴŵŶŷŸŹźŻżŽžſƒƠơƯưǍǎǏǐǑǒǓǔǕǖǗǘǙǚǛǜǺǻǼǽǾǿ'), 'AAAAAAAECEEEEIIIIDNOOOOOOUUUUYsaaaaaaaeceeeeiiiinoooooouuuuyyAaAaAaCcCcCcCcDdDdEeEeEeEeEeGgGgGgGgHhHhIiIiIiIiIiIJijJjKkLlLlLlLlllNnNnNnnOoOoOoOEoeRrRrRrSsSsSsSsTtTtTtUuUuUuUuUuUuWwYyYZzZzZzsfOoUuAaIiOoUuUuUuUuUuAaAEaeOo');

										$jobtitle = strtolower($jobtitle);
										$dt = "";
										$mydt = "";
										$today = date('Y-m-d');
										$dt = $value->prime_date;
										$mydt = $value->prime_date;
						?>
						
					
							
							<tr>
								<td class="cell-link undercontrol">
					      			
					      			

					      				<div class="fontsize">
					      					<a href="{{ 'https://pharmapro.fr/offre-emploi/'.$value->job_id.'/'.$jobtitle }}" target="_blank">
					      						{{ isset($value->job_title) ? $value->job_title : '' }} 
					      					</a>
					      				</div>
									
					    		
					    			<div class="row">
					    				<div class="col-xs-12 col-md-6">
					    					
					    						<div class="strCompany"  style="color:#505050;font-weight:normal !important;">		{{ isset($value->company) ? $value->company : '' }}
					    						</div>
					    					
					    				</div>
					    			</div>
					    		
					    			<?php
										if(isset($value->created_at) && !empty($value->created_at)){
						    				$date = date_create($value->created_at);
						   	 				$created_at_date = date_format($date,"d.m.Y");
										}else{
						    				$created_at_date = '';
										}
									?>
					      			<div class="date">{{ $created_at_date }}</div>
					    		</td>
							</tr>
						
						<?php


								}
							}
						?>
					</tbody>
				</iframe>
				 </table>
			</div>
	</section>
  </header>
</body>
