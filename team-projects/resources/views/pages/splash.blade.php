@extends('layouts.app')
@section('content')
<html>  
   <head>
	<title>{{config('app.name', 'HELPDESK')}}</title>
<style>
      #top_banner { /* Red banner at the top */
        background-color:#990000;
        position: relative;
        margin: 0;
        width: 100%;
        height: 140px;
      }

      .py-4{

	}	

      p.banner_text { /* White text on top of the banner */
        position: absolute;
        text-align: left;
        color:#ffffff;
        top: 70px;
        transform: translateY(-110%);
        font-size: 75px;
        font-style: italic;
        font-weight: bold;
        font-family: Franklin Gothic Medium Cond, Times;
        text-indent: 15px;
      }

      .problemsDiv { /* Individual problem boxes */
      	width: 100%;
        height: auto;
      	border: 1px solid black;
      	background-color: #bbb;
        text-align: center;
      }

      * {
        box-sizing: border-box;
      }

      .button_column{
        float: left;
        width: 20%;
        padding: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 350px;
      }
      .problem_column { /* Ongoing Calls and Resolved Calls layout */
        float: left;
        width: 40%;
        padding: 5px;
        display: relative;
        height: 350px;
        /*overflow-y: scroll;*/
      }

      #new_call { /* button */
        width: 50%;
        height: 10%;
      }
	  #solved_problems {
		  overflow-y: scroll;
		  height: 450px;
	  }
	  #unsolved_problems {
		  overflow-y: scroll;
		  height: 450px;
	  }
    </style>
  </head>

  <body>
    <div id="welcome_header">
      <h2 style="display: inline; padding-left: 4px;">Welcome {{ Helpdesk\Person::find(Auth::user()->username)->first_name . ' ' . Helpdesk\Person::find(Auth::user()->username)->last_name}}</h2>
    </div>

      <!-- Left-hand side Column -->

    <div class="button_column" style="float: left; width: 20%; padding: 5px; display: flex; align-items: center; justify-content: center; height: 350px;">
      <a href="{{route('ProblemForm')}}"><button style="font-family: helvetica, Times; color: ivory;font-size: 12px;background-color: #bfbfbf;border-radius: 4px;width: 95px;padding: 6px;margin: 10px;">New Call</button></a>
    </div>

      <!-- Middle Column -->

    <div  class="problem_column" style="float: left; width: 40%; padding: 5px; display: relative; height: 300px;">
	<h3 style="text-align: center">Ongoing Calls: {{ count(Helpdesk\Problem::where('solved', 0)->get()) }}</h3>
      <div id="unsolved_problems" style="width:100%" overflow-y: scroll; height: 600px;>
        
        
      </div>
    </div>

      <!-- Right-hand side column -->

    <div class="problem_column" style="float: left; width: 40%; padding: 5px; display: relative; height: 600px;">
	<h3 style="text-align: center">Recently Resolved Calls: {{ count(Helpdesk\Problem::where('solved', 1)->get()) }}</h3>
      <div id="solved_problems" style="width:100%" overflow-y: scroll; height: 600px;>
        
        
      </div>
    </div>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript">
	// at init, load in problem info
	function fillProblems(problems) {
		// filter into solved and unsolved problems, then add to div
		for(var i=0;i<problems.length;i++) {
			if(problems[i].solved) {
				// select div to add problems to
				var addTo = $("#solved_problems");
				var problem = problems[i];
				addTo.append("<div class='problemsDiv' style='width: 100%; height: auto; border: 1px solid black; background-color: #bbb; text-align: center;'></div>");
				var newDiv = $("> div:last", addTo);
				// add info to div
				newDiv.append("<p>Edited: " + problem.date + "</p>");
				newDiv.append("<p>ID: " + problem.ID + "</p>");
				newDiv.append("<p>Problem Type: " + problem.problemType + "</p>");
				// add edit button
				newDiv.append("<div class='problem_edit_button'></div>");
				$("> div:last", newDiv).append("<a href='https://team18.tk/pages/EditedProblemForm/" + problem.ID + "'>Edit this problem</a>");
				$("> div:last", newDiv).bind("click", function () {
					// TODO: add edit button
				});
			} else {
				// select div to add problems to
				var addTo = $("#unsolved_problems");
				var problem = problems[i];
				addTo.append("<div class='problemsDiv' style='width: 100%; height: auto; border: 1px solid black; background-color: #bbb; text-align: center;'></div>");
				var newDiv = $("> div:last", addTo);
				// add info to div
					newDiv.append("<p>Edited: " + problem.date + "</p>");
				newDiv.append("<p>ID: " + problem.ID + "</p>");
				newDiv.append("<p>Problem Type: " + problem.problemType + "</p>");
				newDiv.append("<a href='https://team18.tk/pages/EditedProblemForm/" + problem.ID + "'>Edit this problem</a>");
			}
		}
	}
	$.ajaxSetup({
   		 headers: {
        		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    		}
	});


	$.get("/api/splash", function(data) { fillProblems(data) });
	
  </script>
</html>
@endsection
