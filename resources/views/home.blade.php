@extends('layouts.atllayout')

@section('content')
<!-- Form inputs -->
<div class="card">
					

					<div class="card-body">
						
            <form method="POST" action="#" class="form-horizontal" >
          
							<fieldset class="mb-3">
								<legend class="text-uppercase font-size-sm font-weight-bold">Upload CV</legend> 

								<div class="form-group row">
                <div class="col-lg-12">
                 {{ __("You can upload CVs in Word") }} (<code>.doc</code>/ <code>.docx</code>)
                  {{ __("or") }} PDF (<code>.pdf</code>) {{ __("format") }}. {{ __("Uploaded CVs will be stored in a directory and will be used during ranking. You can review the stored CV list and can delete any CV from the list.") }} 
              </div>
              	</div>

							

							</fieldset>
              
            	<fieldset class="mb-3">
								<legend class="text-uppercase font-size-sm font-weight-bold">CV Ranking</legend> 

								<div class="form-group row">
                <div class="col-lg-12">
                 {{ __("You need to upload list of keywords with their weight in Excel") }}  (<code>.xls</code>/ <code>.xlsx</code>) {{ __("format") }}. {{ __("System will calcute points of each stored CVs and will prepare the ranking.") }} {{ __("Only CVs with positive points will be displayed in Rank List.") }}
                
              </div>
              	</div>

							

							</fieldset>
              
							<fieldset class="mb-3">
								<legend class="text-uppercase font-size-sm font-weight-bold">Quick Ranking</legend> 

								<div class="form-group row">
                <div class="col-lg-12">
				{{ __("You can upload multiple CVs in Word") }} (<code>.doc</code>/ <code>.docx</code>) {{ __("or") }} PDF (<code>.pdf</code>) {{ __("format and file containing  keywords with their weight in Excel (<code>.xls</code>/ <code>.xlsx</code>)  format. System will calcute points of each uploaded CVs and will prepare the ranking. Only CVs with positive points will be displayed in Rank List and you will abe to export the rank list.") }} 
                
              </div>
              	</div>

							

							</fieldset>
							
						</form>
					</div>
				</div>
				<!-- /form inputs -->




@endsection
