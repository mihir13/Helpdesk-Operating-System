@extends('layouts.app')
@section('content')
    <html>
    <head>
        <title>{{config('app.name', 'HELPDESK')}}</title>
		<link href="{{ asset('css/problemFormStyle.css') }}" rel="stylesheet">
        <style>
		/*
            #callerDetails {/*css for caller details div, next to call form*/
                position: relative !important;
                left: 400px !important;
                top: -200px !important;
                width: 200px !important;
                height: 125px !important;
                border: 2px solid #bfbfbf !important;
            }
            .button_customisation{
                font-family: helvetica, Times; color: ivory !important;
                font-size: 12px !important;
                background-color: #bfbfbf !important;
                border-radius: 4px !important;
                width: 95px !important;
                padding: 6px !important;
                margin: 10px !important;
            }

            .page_text{
                font-family: helvetica, Times !important;
                color: #000000 !important;
                font-size: 18px !important;
                top:-100px !important;
            }

            .text_field_customisation{
                font-family: helvetica, Times !important;
                font-size: 18px !important;
                border: 2px solid #bfbfbf !important;
            }

            .divider{
                background-color: #ffffff !important;
                top: -100px !important;
                border: 2px solid #bfbfbf !important;
            }

            .generic_button_customisation{
                font-family: helvetica, Times; color: ivory !important;
                font-size: 12px !important;
                background-color: #bfbfbf !important;
                border-radius: 4px !important;
                width: 110px !important;
                padding: 6px !important;
                margin: 10px !important;
            }

            .no_referenceNo_button_customisation{
                font-family: helvetica, Times !important;
				color: ivory !important;
                font-size: 12px !important;
                background-color: #bfbfbf !important;
                border-radius: 4px !important;
                width: 140px !important;
                padding: 6px !important;
                margin: 10px !important;
            }

            .problemForm{ /* used to determine css of the form for adding data for problems*/
                position: relative !important;
                left : 20px !important;
                width: 400px !important;
                background-color: #ffffff !important;
                font-family: helvetica, Times !important;
                font-size: 16px !important;
                border: 2px solid #bfbfbf !important;
                margin-top: 5px !important;
                padding: 4px !important;
                line-height: 2.0 !important;
            }

            .problem_form_text_field_customisation{
                font-family: helvetica, Times !important;
                font-size: 14px !important;
                border: 2px solid #bfbfbf !important;
            }

            .problem_form_button_customisation{
                font-family: helvetica, Times; color: ivory !important;
                font-size: 11px !important;
                background-color: #bfbfbf !important;
                border-radius: 3px !important;
                width: 90px !important;
                padding: 4px !important;
                margin: 5px !important;
            }

            .problem_form_text_area_customisation{
                font-family: helvetica, Times !important;
                font-size: 14px !important;
                border: 2px solid #bfbfbf !important;
                vertical-align: top !important;
            }

            .problem_form_problem_header {
                font-family: helvetica, Times !important;
                font-size: 18px !important;
            }
            .problem_form_radio_button_customisation {/*add css for radio buttons here*/

            }

            .problemFormButton{
                font-family: helvetica, Times !important;
                font-size: 12px !important;
                border: 2px solid #bfbfbf !important;
            }
            .hardwareDiv { /* css for hardware details div, optionally next to each problem*/
                position: absolute !important;
                top: 30px !important;
                left: 450px !important;
                width: 200px !important;
                height: 100px !important;
                border: 1px solid black !important;
                background-color: #ffffff !important;
                padding: 4px !important;
                line-height: 1.6 !important;
                font-family: helvetica, Times !important;
                font-size: 16px !important;
                border: 2px solid #bfbfbf !important;
            }
            .approvedSoftwareDiv { /* for text saying software is approved*/
                color: green !important;
            }
            .notApprovedSoftwareDiv { /* for text saying software is not approved*/
                color: red !important;
            }
            #problemListDiv {
                position: fixed !important;
                width: 300px !important;
                height: 500px !important;
                border: 2px solid #bfbfbf !important;
                background-color: #ffffff !important;
                z-index: 10000 !important;
                left: 70% !important;
                top: 30% !important;
            }
            #prevProblems {
                position: absolute !important;
                width: 300px !important;
                height: 389px !important;
                left: -1px !important;
                top: 60px !important;
                border: 2px solid #bfbfbf !important;
                overflow-y: scroll !important;

            }
            .selectableProblem { /* for each problem in list of previous problems */
                font-family: helvetica, Times !important;
                position: relative !important;
                width: 282px !important;
                height: 150px !important;
                background-color: #aaa !important;
                border: 1px solid black !important;
                left: -1px !important;
            }

            .Previous_Problem_Button_Customisation{
                font-family: helvetica, Times !important;
				color: ivory !important;
                font-size: 12px !important;
                background-color: #bfbfbf !important;
                border-radius: 3px !important;
                width: 90px !important;
                padding: 4px !important;
                margin: 5px !important;
                align-content: center !important;
            }
            .remove_problem_button {
                position: absolute !important;
                left: 370px !important;
                top: 10px !important;
                background-color: #bfbfbf !important;
                font-family: helvetica, Times; color: ivory !important;
                border-radius: 3px !important;
            }
            .remove_expert_list_button {
                position: absolute !important;
                left: 235px !important;
                top: 10px !important;
                background-color: #bfbfbf !important;
                font-family: helvetica, Times; color: ivory !important;
                border-radius: 3px !important;
            }

            /*.Page_Text_Small{ /*Specifically for the text at the bottom of the form "Existing problem reference number:" */
                font-family: helvetica, Times !important;
                color: #000000 !important;
                font-size: 14px !important;
            }
			*/
            #BTNcancelSelect { /*button to close problem selection panel*/
                position: absolute !important;
                top: 460px !important;
                left: 100px !important;
            }

            .sendToExpert_button{
                font-family: helvetica, Times; color: ivory !important;
                font-size: 12px !important;
                background-color: #bfbfbf !important;
                border-radius: 4px !important;
                width: 150px !important;
                padding: 6px !important;
                margin: 10px !important;
            }
            .solved_button{
                font-family: helvetica, Times; color: ivory !important;
                font-size: 12px !important;
                background-color: #bfbfbf !important;
                border-radius: 4px !important;
                width: 150px !important;
                padding: 6px !important;
                margin: 10px !important;
            }

            .specialist_box{
                position: absolute !important;
                left: 450px !important;
                top: 150px !important;
                width: 270px !important;
                height: 200px !important;
                border: 2px solid #bfbfbf !important;
                background-color: #fff !important;
            }

            .expertList {
                overflow-y: auto !important;
                width: 270px !important;
                height: 163px !important;
            }
            .expertDiv {
                width: 250px !important;
                height: 30px !important;
                border: 1px solid gray !important;
            }
            .expertDivMouseover {
                background-color: #d5d5d5 !important;
            }
            .expertNameDiv {
                width: 200px !important;
                height: 30px !important;
                text-align: right !important;
                border: 1px solid gray !important;
                padding-right: 10px !important;
                user-select: none !important;
            }
            .expertNameDivText {
                left: 10px !important;
                position: relative !important;
            }

            .expertNumDiv {
                width: 38px !important;
                height: 30px !important;
                float: right !important;
                text-align: center !important;
                border: 1px solid gray !important;
                vertical-align: bottom !important;
                user-select: none !important;
            }
            .expertNumDivText {

            }
*/
        </style>
    </head>
    <body bgcolor="#f2f2f2" onload='$("#callTime").val(getTime());$("#callDate").val(getDate());' bgcolor="#f2f2f2">
    <button class="button_customisation" style="font-family: helvetica, Times; color: ivory;font-size: 12px;background-color: #bfbfbf;border-radius: 4px;width: 95px;padding: 6px;margin: 10px;" type="button" onclick="submitCall();">End call</button></a>
	<button class="button_customisation" style="float:right;" type="button" onclick="cancelCall();">Cancel Call</button></a>
    <!-- everything goes in this div, to allow dynamic hide/show -->
    <div id="inputForms" style="position: absolute;">
        <h3 style="font-family:helvetica, Times; color: #000000; font-size: 18px;"> Call Form</h3>
        <form id="call_form">
            <div class="page_text" style="font-family: helvetica, Times;color: #000000;font-size: 18px;top:-100px;">
                Time: <input class="text_field_customisation" style="font-family: helvetica, Times;font-size: 18px;border: 2px solid #bfbfbf;" id="callTime" type="text"/><br><br>
            </div>
            <div class="page_text" style="font-family: helvetica, Times;color: #000000;font-size: 18px;top:-100px;">
                Date: <input class="text_field_customisation" style="font-family: helvetica, Times;font-size: 18px;border: 2px solid #bfbfbf;" id="callDate" type="date"/><br><br>
            </div>
            <div class="page_text" style="font-family: helvetica, Times;color: #000000;font-size: 18px;top:-100px;">
                Operator name: <input class="text_field_customisation" style="font-family: helvetica, Times;font-size: 18px;border: 2px solid #bfbfbf;" id="operatorName" type="text" value="{{ Helpdesk\Person::find(Auth::user()->username)->first_name }}"/><br><br>
            </div>
            <div class="page_text" style="font-family: helvetica, Times;color: #000000;font-size: 18px;top:-100px;">
                Caller ID: <input class="text_field_customisation" style="font-family: helvetica, Times;font-size: 18px;border: 2px solid #bfbfbf;" id="callerName" type="text"/>
                <button type="button" class="generic_button_customisation" style="font-family: helvetica, Times; color: ivory;font-size: 12px;background-color: #bfbfbf;border-radius: 4px;width: 110px;padding: 6px;margin: 10px;" onclick="getCaller(document.getElementById('callerName').value)">Get caller details</button>
            </div>
            <div class="divider" style="" id="callerDetails">
                <!--
                    the way the table works is the rows are defined, and D3 is used to add the cell containing the value
                    the title value is used to find the correct row
                -->
                <table style="font-family:helvetica, Times; color: #000000; font-size: 18px;">

                    <tr title="name">
                        <td>Name:&nbsp;</td>
                    </tr>

                    <tr title="ID">
                        <td>ID:&nbsp;</td>
                    </tr>
                    <tr title="job">
                        <td>Job Title:&nbsp;</td>
                    </tr>
                    <tr title="department">
                        <td>Department:&nbsp;</td>
                    </tr>
                    <tr title="telephone">
                        <td>Telephone:&nbsp;</td>
                    </tr>
                    <tr><td>&nbsp</td></tr>
                </table>
            </div>
        </form>
        <!--
        will be an infinite number of forms, one per problem added, each form will be programatically added with D3
        -->
        <h3 style="font-family:helvetica, Times; color: #000000; font-size: 18px;">Problem form(s)</h3>
        <div id="problemsDiv">
        </div>
        <div class="page_text" id="addProblemDiv" style="font-family: helvetica, Times;color: #000000;font-size: 18px; top:-100px;">
            <form>
                <button class="generic_button_customisation" style="font-family: helvetica, Times; color: ivory;font-size: 12px;background-color: #bfbfbf;border-radius: 4px;width: 110px;padding: 6px;margin: 10px;" type="button" onclick="newProblem()">New problem</button>
                <br><br>
                Existing problem reference number:&nbsp;<input class="text_field_customisation" style="font-family: helvetica, Times;font-size: 18px;border: 2px solid #bfbfbf;" id="existingIDinput" type="text"/>
                <button class="generic_button_customisation" style="font-family: helvetica, Times; color: ivory;font-size: 12px;background-color: #bfbfbf;border-radius: 4px;width: 110px;padding: 6px;margin: 10px;" type="button" onclick="oldProblem($('#existingIDinput').val())">Existing problem</button>
                <button class="no_referenceNo_button_customisation" style="font-family: helvetica, Times; color: ivory;font-size: 12px;background-color: #bfbfbf;border-radius: 4px;width: 140px;padding: 6px;margin: 10px;" type="button" onclick="openLog()">No reference number</button>
            </form>
        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">

    jQuery.ajaxSetup({async:false, headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    
	// ABANDON HOPE, ALL YE WHO ENTER HERE
	
	// intialisation of variables
	var problemNum = 0; // keeps track of the problem number user is on
	var currentProblems = getCurrentProblems();
	var problemTypeList = getProblemTypeList();
	var authSoftware = getAuthSoftware();
	var hardwareTable = getHardwareTable();
	var personnelTable = getPersonnelTable();
	
	
	
	
	// startup code for debugging: TODO: remove
	
	/* Test expert list
	newProblem();
	hardwareSelected($(".problem_form_radio_button_customisation").data("num"));
	showExpertList(1);
	*/
	function hideForm () {/*
		if(window.confirm("Are you sure you want to Submit the call page?")) {
			// go to page
			window.location.href = "{{route('ExitNewProblemForm')}}";
		}*/
	}
	function cancelCall() {
		if(window.confirm("Are you sure you want to cancel the call page?")) {
			// go to page
			window.location.href = "{{route('ExitNewProblemForm')}}";
		}
	}
    function openLog () {
        //function used to open list of previous calls to scroll through
        //console.log("User will select problem from list");
        // need to create a div
        // then put a div for each current problem in that div
        // then have each problem selectable
        // and have a select button at the bottom
      
        // remove old if applicable
        $("#problemListDiv").remove();
        $(document.body).prepend("<div id='problemListDiv'></div>");

        // add basic structure to div
        $("#problemListDiv").append('<h3 style="font-family:helvetica, Times; text-align:center; color:#000000; font-size: 18px;">Previous problems</h3><br>');
        // add all previous problems (unsorted for now)
        $("#problemListDiv").append("<div id='prevProblems'></div>");
        var problemDiv = $("#prevProblems");
        // add div for each problem
        for(var i=0;i<currentProblems.length;i++) {
            var problem = currentProblems[i];
            problemDiv.append("<div class='selectableProblem'></div>")
            var cont = $("> div:last", problemDiv);
            cont.data("info", problem); // bind relevent data to div to make filter/return easier
            cont.append("ID: " + problem.id + "<br>");
            if(problem.isSoftware) {
                cont.append("Software problem<br>");
                cont.append("Operating sytem: " + problem.OS + "<br>");
                cont.append("Software: " + problem.software + "<br>");
            } else {
                cont.append("Hardware problem<br>");
                cont.append("Serial number: " + problem.hardwareSerial + "<br>");
            }
            cont.append("Problem type: " + problem.type  + "<br>");
			if (problem.desc.length > 75) {
				cont.append("Description: " + problem.desc.substr(0, 75) + " ...");
				
			} else {
				cont.append("Description: " + problem.desc);
			}
            //cont.append("Description: " + problem.desc);
            // add mouse behaviours for the div
            // highlight on mouseover
            cont.bind("mouseover", function () { $(this).css("background-color", "white");});
            cont.bind("mouseout", function () { $(this).css("background-color", "#aaa");});
            // add click behaviour
            cont.bind("click", function () {oldProblem($(this).data("info").id);$("#problemListDiv").remove(); });
        }
        // add cancel button at bottom
        $("#problemListDiv").append("<button id='BTNcancelSelect' class='Previous_Problem_Button_Customisation'>Cancel</button>");
        $("#BTNcancelSelect").bind("click", function () { $("#problemListDiv").remove();})
	
		// add filter options
		$("#problemListDiv").append("<div id='problemFilterDiv'><h3>Filters</h3><input type='radio' name='radioFilter' value='hardware'>Hardware</input><br><input type='radio' name='radioFilter' value='software'>Software</input><br><br>Type: <input type='text' id='typeFilter'></input><br><br>Desc: <input type='text' id='descFilter'></input><br><br><div id='moreFilters'></div><button class='generic_button_customisation' id='filterSearchButton'>Search</button></div>");
		$("#problemFilterDiv").prepend("<button type='button' class='generic_button_customisation' id='filterRefreshButton'>Refresh</button>");
		$("#filterRefreshButton").bind("click", function () {
			// just run this whole function again
			openLog();
		});
		$("input[name='radioFilter']").click(function () {
			// generate the rest of the filters
			$("#moreFilters").html("");
			if($("input[name='radioFilter']:checked").val() == "hardware") {
				// add hardware ID
				
				$("#moreFilters").append("Hardware Id: <input type='text' id='hardwareFilter' style='width: 120px;'></input><br><br>");
			} else if($("input[name='radioFilter']:checked").val() == "software") {
				// add OS and software name
				
				$("#moreFilters").append("Software: <input type='text' id='softwareFilter'></input><br><br>OS: <input type='text' id='OSFilter'></input><br><br>");
			}
		});
		// add button event
		$("#filterSearchButton").bind("click", function () {
			// get all search strings
			var hardwareSoftware = $("input[name='radioFilter']:checked").val();
			var type = $("#typeFilter").val();
			var desc = $("#descFilter").val()
			// list of currentProblems is currentProblems
			var filteredProblems = [];
			for(var i=0;i<currentProblems.length;i++) {
				filteredProblems.push($.extend(true, {}, currentProblems[i]));
			}
			
			
			if(hardwareSoftware == "hardware") {
				// get hardware ID
				var HID = $("#hardwareFilter").val();
				// perform search based on hardware
				
				for(var i=0;i<filteredProblems.length;i++) {
					// test against all entered values
					
					if(type && filteredProblems[i].type.indexOf(type) == -1) {
						filteredProblems.splice(i, 1);
						i--;
					} else if(desc && filteredProblems[i].desc.indexOf(desc) == -1) {
						filteredProblems.splice(i, 1);
						i--;
					} else if(HID && filteredProblems[i].hardwareSerial && filteredProblems[i].hardwareSerial.toString().indexOf(HID) == -1) {
						filteredProblems.splice(i, 1);
						i--;
					} else if (filteredProblems[i].isSoftware) {
						filteredProblems.splice(i, 1);
						i--;
					}
				}
			} else if (hardwareSoftware == "software") {
				// get software name, OS
				var software = $("#softwareFilter").val();
				var OS = $("#OSFilter").val();
				// perform search based on hardware
				
				for(var i=0;i<filteredProblems.length;i++) {
					// test against all entered values
					
					if(type && filteredProblems[i].type.indexOf(type) == -1) {
						filteredProblems.splice(i, 1);
						i--;
					} else if(desc && filteredProblems[i].desc.indexOf(desc) == -1) {
						filteredProblems.splice(i, 1);
						i--;
					} else if (!filteredProblems[i].isSoftware) {
						filteredProblems.splice(i, 1);
						i--;
					}else if (software && filteredProblems[i].software.indexOf(software) == -1) {
						filteredProblems.splice(i, 1);
						i--;
					} else if (OS && filteredProblems[i].OS.indexOf(OS) == -1) {
						filteredProblems.splice(i, 1);
						i--;
					}
				}
				
			} else {
				// perform search based on not hardware or software
				for (var i=0;i<filteredProblems.length;i++) {
					if(type && filteredProblems[i].type.indexOf(type) == -1) {
						filteredProblems.splice(i, 1);
						i--;
					} else if(desc && filteredProblems[i].desc.indexOf(desc) == -1) {
						filteredProblems.splice(i, 1);
						i--;
					}
				}
			}
			
			// build list of problems to represent search query
			// build from scratch using normal code?
			problemDiv.html("");
			for(var i=0;i<filteredProblems.length;i++) {
            var problem = filteredProblems[i];
            problemDiv.append("<div class='selectableProblem'></div>")
            var cont = $("> div:last", problemDiv);
            cont.data("info", problem); // bind relevent data to div to make filter/return easier
            cont.append("ID: " + problem.id + "<br>");
            if(problem.isSoftware) {
                cont.append("Software problem<br>");
                cont.append("Operating sytem: " + problem.OS + "<br>");
                cont.append("Software: " + problem.software + "<br>");
            } else {
                cont.append("Hardware problem<br>");
                cont.append("Serial number: " + problem.hardwareSerial + "<br>");
            }
            cont.append("Problem type: " + problem.type  + "<br>");
			if (problem.desc.length > 75) {
				cont.append("Description: " + problem.desc.substr(0, 75) + " ...");
				
			} else {
				cont.append("Description: " + problem.desc);
			}
            // add mouse behaviours for the div
            // highlight on mouseover
            cont.bind("mouseover", function () { $(this).css("background-color", "white");});
            cont.bind("mouseout", function () { $(this).css("background-color", "#aaa");});
            // add click behaviour
            cont.bind("click", function () {oldProblem($(this).data("info").id);$("#problemListDiv").remove(); });
        }
		});
    }

  

    function newProblem() {
        //console.log("New Problem")
        problemNum++;
        //console.log(problemNum);
        // generate div for new form

        // jquery version
        // add new div for each problem, set class and ID
        $("#problemsDiv").append("<div></div>");
        var jnewForm = $("#problemsDiv > div:last-child");
		// bind data to mark as new problem rather than old problem
		jnewForm.data("new", true);
		//bind data to note problem numb
		jnewForm.data("problemNum", problemNum);
        jnewForm.attr("class", "problemForm");
		jnewForm.css({"position": "relative", "left" : "20px", "width": "400px", "background-color": "#ffffff", "font-family": "helvetica, Times", "font-size": "16px", "border": "2px solid #bfbfbf", "margin-top": "5px", "padding": "4px", "line-height": "2.0"}); 
        jnewForm.attr("id", function () { return "problem" + problemNum;});
		// bind data to mark if solved
		jnewForm.data("solved", "unsolved");
        // add date and time
        jnewForm.append("Date: ")
        jnewForm.append("<input class='problem_form_text_field_customisation'></input>");
        var dateInput = $("> input:last", jnewForm);
        dateInput.attr("size", 10)
        dateInput.val(getDate());
        jnewForm.append(" Time: ")
        jnewForm.append("<input class='problem_form_text_field_customisation'></input>");
        var timeInput = $("> input:last", jnewForm);
        timeInput.val(getTime());
        timeInput.attr("size", 10);
        //jquery add title
        jnewForm.append(function () { return "<h4 class='problem_form_problem_header'>Problem " + problemNum + "</h4>";});

        //select whether hardware or software

        jnewForm.append("<form></form>");
        var radioForm = $("form:last", jnewForm);
        radioForm.append("<input type='radio' name='hardware/software' value='Hardware' class='problem_form_radio_button_customisation'>Hardware</input>    ");
        $("input:last", radioForm)
            .data("num", problemNum)
            .bind("change", function () { hardwareSelected($(this).data("num"));});
        radioForm.append("<input type='radio' name='hardware/software' value='Software' class='problem_form_radio_button_customisation'>Software</input>");
        $("input:last", radioForm)
            .data("num", problemNum)
            .bind("change", function () {softwareSelected($(this).data("num")); });



        // add form elements
        // hardware serial number, OS and software name will be added through a separate function
        var jinputForm = $(document.createElement("div"));
        jnewForm.append(jinputForm);
        jinputForm.attr("id", function ()  { return "inputForm" + problemNum;});

        // close button in top right hand corner
        jnewForm.append("<button class='remove_problem_button' type='button'>X</button>");
        var closeButton = $("> button", jnewForm);
        closeButton.bind("click", function () {
            // close form
            $(this).parent().remove();
        });
        
        



    }
    function showExpertList (problemNum) {
		// at this point, either exeprt selected or not, if not, run normally, if so, reopen
		
        $("#expert_list").remove();
		
        var problemDiv = $("#problem" + problemNum);
		if(problemDiv.data("solved") == "unsolved") {
			// operate as normal
			problemDiv.append("<div id='expert_list'></div>");

			var expertDiv = $("#expert_list");
			expertDiv.addClass("specialist_box");
			expertDiv.css({"position": "absolute", "left": "450px", "top": "150px", "width": "270px", "height": "200px", "border": "2px solid #bfbfbf", "background-color": "#fff"});
			
			
			// close button in top right hand corner
			expertDiv.append("<button class='remove_expert_list_button' style='position: absolute; left: 235px; top: 10px; background-color: #bfbfbf; font-family: helvetica, Times; color: ivory; border-radius: 3px;width: 30px;height:30px;padding:0 0 0 0' type='button'>X</button>");
			
			var closeButton = $("> button", expertDiv);
			closeButton.bind("click", function () {
				// close form
				$(this).parent().remove();
			});
			expertDiv.append("<h3 style='margin-top: 10px;margin-bottom: 10px; margin-left: 10px; margin-right: 10px;padding-left: 10px;font-size: 1.17em;'>Qualified experts</h3>");
			expertDiv.append("<div class='expertList' style='overflow-y: auto; width: 270px; height: 163px;'></div>");
			expertDiv.css({"width": "250px", "height": "30px", "border": "1px solid gray"});
			var expertList = $(">div:last", expertDiv);
			// get problem type, and use it to get list of experts associated with that problem type
			
			
			var problemType = $("#inputForm" + problemNum + " > select").val();
			var experts = getExperts(problemType);
			
			// sort list of experts from least to most
			experts.sort(function (a,b) { return a.tasks - b.tasks;});
			for (var i=0;i<experts.length;i++) {
				//expertList.append(experts[i].name + " | " + experts[i].tasks + "<br>");
				
				// for each: create div, create 2 divs in div, one for name and one for number, align neatly. assign onclick to div for both
				expertList.append("<div class='expertDiv'></div>");
				var currentDiv = $(">div:last", expertList);
				currentDiv.append("<div class='expertNumDiv'></div><div class='expertNameDiv'></div>");
				$("> .expertNumDiv", currentDiv).append(experts[i].tasks);
				$("> .expertNameDiv", currentDiv).append(experts[i].name + " | ID:" + experts[i].id);
				// add mouseover and click events, to allow expert to be properly selected
				currentDiv.data("expertID", experts[i].id);
				currentDiv.bind({
					"mouseenter": function () {
						$(this).css("background-color", "#d5d5d5");
						
					},
					"mouseleave": function () {
						$(this).css("background-color", "white");
						
					},
					"click": function () {
						// expert selected
						var expertID = $(this).data("expertID");
						// close expert selectionbox, mark problem as sent to expert, grey out problem in form?
						// requires each problem to be tagged as unslved, solved, sent to expert
							// give each form data("solved", "solved,unsolved,expert")
						expertDiv.remove();
						problemDiv.data("solved", "expert");
						problemDiv.data("expertID", expertID);
						// set send to expert button to cancel expert
						var inputForm = $("#inputForm" + problemNum);
						var expertButton = $("> .sendToExpert_button", inputForm);
						
						// set text, grey out form
						problemDiv.css("opacity", 0.5);
						expertButton.html("Cancel sending to expert");
						// create h3 for expert ID
						problemDiv.append("<h3>Assigned expert ID: " + expertID);
						
					}
				});
			}
		} else if(problemDiv.data("solved") == "expert") {
			// change text, change data, change opacity
			var expertButton = $("> .sendToExpert_button", $("#inputForm" + problemNum));
			expertButton.html("Send problem to expert");
			problemDiv.data("solved", "unsolved");
			problemDiv.css("opacity", 1);
			// TODO: remove Assigned expert h3
			$("> h3:last", problemDiv).remove();
		}
    }
	function showOldExpertList (problemId) { // change to work with problem IDs
		// at this point, either exeprt selected or not, if not, run normally, if so, reopen
		
        $("#expert_list").remove();
        var problemDiv = $("#problemId" + problemId);
		if(problemDiv.data("solved") == "unsolved") {
			// operate as normal
			problemDiv.append("<div id='expert_list'></div>");

			var expertDiv = $("#expert_list");
			expertDiv.addClass("specialist_box");
			
			
			// close button in top right hand corner
			expertDiv.append("<button class='remove_expert_list_button' style='position: absolute; left: 235px; top: 10px; background-color: #bfbfbf; font-family: helvetica, Times; color: ivory border-radius: 3px;' type='button'>X</button>");
			
			var closeButton = $("> button", expertDiv);
			closeButton.bind("click", function () {
				// close form
				$(this).parent().remove();
			});
			expertDiv.append("<h3 style='margin-top: 10px;margin-bottom: 10px; margin-left: 10px; margin-right: 10px;padding-left: 10px;font-size: 1.17em;'>Qualified experts</h3>");
			expertDiv.append("<div class='expertList'></div>");
			var expertList = $(">div:last", expertDiv);
			// get problem type, and use it to get list of experts associated with that problem type
			
			
			var problemType = $("#inputFormId" + problemId + " > select").val();
			var experts = getExperts(problemType);
			
			// sort list of experts from least to most
			experts.sort(function (a,b) { return a.tasks - b.tasks;});
			for (var i=0;i<experts.length;i++) {
				//expertList.append(experts[i].name + " | " + experts[i].tasks + "<br>");
				
				// for each: create div, create 2 divs in div, one for name and one for number, align neatly. assign onclick to div for both
				expertList.append("<div class='expertDiv'></div>");
				var currentDiv = $(">div:last", expertList);
				currentDiv.append("<div class='expertNumDiv'></div><div class='expertNameDiv'></div>");
				$("> .expertNumDiv", currentDiv).append(experts[i].tasks);
				$("> .expertNameDiv", currentDiv).append(experts[i].name + " | ID:" + experts[i].id);
				// add mouseover and click events, to allow expert to be properly selected
				currentDiv.data("expertID", experts[i].id);
				currentDiv.bind({
					"mouseenter": function () {
						$(this).css("background-color", "#d5d5d5");
						
					},
					"mouseleave": function () {
						$(this).css("background-color", "white");
						
					},
					"click": function () {
						// expert selected
						var expertID = $(this).data("expertID");
						// close expert selectionbox, mark problem as sent to expert, grey out problem in form?
						// requires each problem to be tagged as unslved, solved, sent to expert
							// give each form data("solved", "solved,unsolved,expert")
						expertDiv.remove();
						problemDiv.data("solved", "expert");
						problemDiv.data("expertID", expertID);
						// set send to expert button to cancel expert
						var inputForm = $("#inputFormId" + problemId); // use of problemId could cause problems: TODO
						var expertButton = $("> button:first", inputForm);
						
						// set text, grey out form
						problemDiv.css("opacity", 0.5);
						expertButton.html("Cancel sending to expert");
						// append h3 saying expert ID
						problemDiv.append("<h3>Assigned expert ID: " + expertID);
						
					}
				});
			}
		} else if(problemDiv.data("solved") == "expert") {
			// change text, change data, change opacity
			var expertButton = $("> .sendToExpert_button", $("#inputForm" + problemNum));
			expertButton.html("Send problem to expert");
			problemDiv.data("solved", "unsolved");
			problemDiv.css("opacity", 1);
		}
	}
    function hardwareSelected(num) { // user has selected a problem as hardware
        // add hardware serial input and button
        // serial number input
		var problemNum = num;
        var jinputForm = $("#inputForm" + num);
		//console.log("problemNum" + num);
        jinputForm.html("")
        jinputForm.append("<br>Hardware serial number:&nbsp;");
        jinputForm.append("<input class='problem_form_text_field_customisation'>");
        $(jinputForm.children("input:last-child")).attr({
            "id": function () { return "serial_problem" + num;},
            "type": "text"
        });
        // button to get details from serial number
        jinputForm.append("<button class='problem_form_button_customisation'></button>");
        $(jinputForm.children("button:last-child"))
            .attr("id", function () { return "BTNserial_problem" + num;})
            .bind("click", function () {checkSerial($(this).data("num"),$("#serial_problem" + $(this).data("num")).val());})
            .html("check serial")
            .data("num", num);
		// problem: problemNum is incremented before this happens
        // add problem type from dropdown
        jinputForm.append("<br>Problem type: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
        var problemSelect = jinputForm.append("<select class='problem_form_text_field_customisation'></select>").children("select");
        for(var i=0;i<problemTypeList.length;i++) {
            var currentItem = problemSelect.append("<option></option>").children("option:last-child");
            currentItem.attr("value", problemTypeList[i]);
            currentItem.html(problemTypeList[i]);
        }
        // add description
        jinputForm.append("<br>Description: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
        jinputForm.append("<textarea class='problem_form_text_area_customisation'></textarea>")
        $(jinputForm.children("textarea")).attr({
            "id": function () { return "desc_problem" + num;},
            "rows": 1,
            "columns": 50
        });
        // add solution
        jinputForm.append("<br>Solution: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
        jinputForm.append("<textarea class='problem_form_text_area_customisation'></textarea>")
        $(jinputForm.children("textarea")).attr({
            "id": function () { return "desc_problem" + num;},
            "rows": 1,
            "columns": 50
        });
		// submit to expert button at bottom
        jinputForm.append("<button class='sendToExpert_button' type='button'>Send problem to expert</button>");
        var submitButton = $("> button:last", jinputForm);
        submitButton.bind("click", function () {
            // show a selectable list of experts
			
            showExpertList($(this).data("num"));

        });
        submitButton.data("num", num);
		
		// add button to mark as solved
		jinputForm.append("<button class='solved_button' type='button'>Problem solved</button>");
		var solvedButton = $("> button:last", jinputForm);
		solvedButton.data("num", num);
		solvedButton.bind("click", function () {
			// grey out form, change button text to something like cancel, set solved for form to "solved"
			var problemForm = $("#problem" + $(this).data("num"));
			if(problemForm.data("solved") == "unsolved") {
				// if was unsolved, mark as solved
				$(this).html("Problem not solved");
				problemForm.data("solved", "solved");
				problemForm.css("opacity", 0.5);
				// if expert selection box visible, remove
				
				$("#problem" + num + " > #expert_list").remove();
			} else if (problemForm.data("solved") == "solved") {
				// if was solved, mark as unsolved
				$(this).html("Problem solved");
				problemForm.data("solved", "unsolved");
				problemForm.css("opacity", 1);
				
			}
			//console.log(problemForm.data());
			// if sent to expert, leave alone
		});
    }

    function softwareSelected(num) {
        var jinputForm = $("#inputForm" + num);
        jinputForm.html("")
        // add OS and software input
        // add OS input
        jinputForm.append("<br>");
        jinputForm.append("Operating System:  ");
        jinputForm.append("<input class='problem_form_text_field_customisation'>");
        $(jinputForm.children("input:last-child")).attr({
            "id": function () { return "OS_problem:   " + num;},
            "type": "text"
        });
        // add software name input
        jinputForm.append("<br>Software Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
        // when software input is changed, test if value is in approved software list. Change supported? box if needed
        jinputForm.append("<input class='problem_form_text_field_customisation'>");
        $(jinputForm.children("input:last-child"))
            .attr({
                "id": function () { return "software_problem" + num;},
                "type": "text"
            })
            .bind("input", function () { checkSoftware($(this).val(), num);})
        ;
        // add div to show if software is approved
        jinputForm.append("<div></div>");
        var approvedDiv = $("div:last", jinputForm);
        approvedDiv.attr("id", function () { return "approvedDiv_problem" + num;})
        approvedDiv.html("Not approved software");
        approvedDiv.attr("class", "notApprovedSoftwareDiv");
		approvedDiv.css("color", "green");
        // add problem type from dropdown
        jinputForm.append("<br>Problem type:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
        var problemSelect = jinputForm.append("<select class='problem_form_text_field_customisation'></select>").children("select");
        for(var i=0;i<problemTypeList.length;i++) {
            var currentItem = problemSelect.append("<option></option>").children("option:last-child");
            currentItem.attr("value", problemTypeList[i]);
            currentItem.html(problemTypeList[i]);
        }
        // add description
        jinputForm.append("<br>Description:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
        jinputForm.append("<textarea class='problem_form_text_area_customisation'></textarea>")
        $(jinputForm.children("textarea")).attr({
            "id": function () { return "desc_problem" + num;},
            "rows": 1,
            "columns": 50
        });
        // add solution
        jinputForm.append("<br>Solution: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
        jinputForm.append("<textarea class='problem_form_text_area_customisation'></textarea>")
        $(jinputForm.children("textarea")).attr({
            "id": function () { return "desc_problem" + num;},
            "rows": 1,
            "columns": 50
        });
		// submit to expert button at bottom
        jinputForm.append("<button class='sendToExpert_button' type='button'>Send problem to expert</button>");
        var submitButton = $("> button", jinputForm);
        submitButton.bind("click", function () {
            // show a selectable list of experts
            showExpertList($(this).data("num"));

        });
        submitButton.data("num", num);
		
		// add button to mark as solved
		jinputForm.append("<button class='solved_button' type='button'>Problem solved</button>");
		var solvedButton = $("> button:last", jinputForm);
		solvedButton.data("num", num);
		solvedButton.bind("click", function () {
			// grey out form, change button text to something like cancel, set solved for form to "solved"
			var problemForm = $("#problem" + $(this).data("num"));
			if(problemForm.data("solved") == "unsolved") {
				// if was unsolved, mark as solved
				$(this).html("Problem not solved");
				problemForm.data("solved", "solved");
				problemForm.css("opacity", 0.5);
				// if expert selection box visible, remove
				
				$("#problem" + num + " > #expert_list").remove();
			} else if (problemForm.data("solved") == "solved") {
				// if was solved, mark as unsolved
				$(this).html("Problem solved");
				problemForm.data("solved", "unsolved");
				problemForm.css("opacity", 1);
			}
			// if sent to expert, leave alone
		});
    }

    function checkSoftware(name, problemNum) {
        // add div to show whether software is supported
        // change value and colour of appropriate div
        if(authSoftware.includes(name)) {
            $("#approvedDiv_problem" + problemNum).html("Approved software").attr("class", "approvedSoftwareDiv");
			$("#approvedDiv_problem" + problemNum).html("Approved software").css("color", "green");
        } else {
            $("#approvedDiv_problem" + problemNum).html("Not approved software").attr("class", "notApprovedSoftwareDiv");
			$("#approvedDiv_problem" + problemNum).html("Not approved software").css("color", "red");
        }
    }
    function checkSerial(problemNum,serial) {
        // test if serial is in hardware list
        var inList = false;
        var hardwareData = {};
        for(var i=0;i<hardwareTable.length;i++) {
            if(hardwareTable[i].serial == serial) {
                inList = true;
                hardwareData = hardwareTable[i];
            }
        }
        if(!inList) {
            //console.log("hardware not found");
            return;
        }
        //console.log("hardware found");
        var problemDivId = "#problem" + problemNum;
        // remove old div if exists
        $("> .hardwareDiv", problemDivId).remove();
        // create new div for hardware details
        $(problemDivId).append("<div><div>");
        var hardwareDiv = $(problemDivId).children("div:last");
        hardwareDiv.attr("class", "hardwareDiv");
		hardwareDiv.css({"position": "absolute", "top": "30px", "left": "450px", "width": "200px", "height": "100px", "border": "1px solid black", "background-color": "#ffffff", "padding": "4px", "line-height": "1.6", "font-family": "helvetica, Times", "font-size": "16px", "border": "2px solid #bfbfbf"});
        // add table
        hardwareDiv.append("<table></table>")
        var table = $("> table", hardwareDiv);
        // add rows of table
        table.append("<tr><td>Serial:</td></tr><tr><td>Type:</td></tr><tr><td>Make:</td></tr>");
        // remove any previous daat
        $("> tr", table).children("td:nth-child(2)").remove();
        // add data to table
        $("> tr:nth-child(1)", table).append("<td></td>").children("td:last-child").html(hardwareData.serial);
        $("> tr:nth-child(2)", table).append("<td></td>").children("td:last-child").html(hardwareData.type);
        $("> tr:nth-child(3)", table).append("<td></td>").children("td:last-child").html(hardwareData.make);

    }
    function oldProblem(problemId) {
		//console.log(problemId);

        // problem ID would then be tested against the database and info would be retrieved
        var checkProblemId = function () {
            for(var i=0;i<currentProblems.length;i++) {
                if(currentProblems[i].id == problemId) {
                    return i;
                }
            }
            return -1;
        }
        var probArrPos = checkProblemId();
        if(probArrPos < 0) {
            
            return;
        }
        // check if already exists
        if ($("#problemId" + problemId).length) {
            return;
        }
        // generate problem form
        $("#problemsDiv").append("<div></div>")
        var jnewForm = $("#problemsDiv > div:last-child")
		//bind data to mark as old problem rather than new
		jnewForm.data("new", false);
		// mark problem as unsolved
		jnewForm.data("solved", "unsolved");
		//bind problemID to form
		jnewForm.data("PID", problemId);
		
        jnewForm.attr("class", "problemForm");
        jnewForm.attr("id", function () { return "problemId" + problemId;})
        //jquery add title
        jnewForm.append(function () { return "<h4 class='problem_form_problem_header'>Problem ID: &nbsp;" + problemId + "</h4>";})
        var jinputForm = $(document.createElement("div"))
		jinputForm.attr("id", "inputFormId" + problemId);
        // check if problem is hardware or software
        var currentProblem = currentProblems[probArrPos];
		console.log(currentProblem);
		
        if(currentProblem.isSoftware) {
			// bind hardware/software to data
			jnewForm.data("softwareProblem", true);
            // generate software problem form
            oldSoftwareProblem();
        } else {
			// bind hardware/software to data
			jnewForm.data("softwareProblem", false);
            // generate hardware problem form
            oldHardwareProblem();
        }

        // close button in top right hand corner
        jnewForm.append("<button class='remove_problem_button' type='button'>X</button>");
        var closeButton = $("> button", jnewForm);
        closeButton.bind("click", function () {
            // close form
            $(this).parent().remove();
        });
        closeButton.data("num", problemNum);
		
		
		// submit to expert button at bottom
		// modify to use problemId as opposed to problemNum
        jinputForm.append("<button class='sendToExpert_button' type='button'>Send problem to expert</button>");
        var submitButton = $("> button:last", jinputForm);
		
        submitButton.bind("click", function () {
			// if data is "expert", cancel sending to expert, if "unsolved", send to expert
			if(jnewForm.data("solved") == "expert") {
				// remove expert ID, mark as unsolved
				jnewForm.data("solved", "unsolved");
				jnewForm.data("expertID", null);
				jnewForm.css("opacity", 1);
				var expertButton = $("> button:first", jinputForm);
				expertButton.html("Send problem to expert");
				$("> h3:last", jnewForm).remove();
				
				
			} else if(jnewForm.data("solved") == "unsolved") {
				// show a selectable list of experts
				showOldExpertList($(this).data("PID"));
			}
            

        });
        submitButton.data("PID", problemId);
		
		// add button to mark as solved
		//TODO: fix
		jinputForm.append("<button class='solved_button' type='button'>Problem solved</button>");
		var solvedButton = $("> button:last", jinputForm);
		solvedButton.data("PID", problemId);
		solvedButton.bind("click", function () {
			// grey out form, change button text to something like cancel, set solved for form to "solved"
			var problemForm = $("#problemId" + $(this).data("PID"));// get the problem form
			//console.log(problemForm.data("solved"));
			if(problemForm.data("solved") == "unsolved") {
				
				// if was unsolved, mark as solved
				$(this).html("Problem not solved");
				problemForm.data("solved", "solved");
				problemForm.css("opacity", 0.5);
				// if expert selection box visible, remove
				// edit to work with PID
				
				$("#problemId" + $(this).data("PID") + " > #expert_list").remove();
			} else if (problemForm.data("solved") == "solved") {
				
				// if was solved, mark as unsolved
				$(this).html("Problem solved");
				problemForm.data("solved", "unsolved");
				problemForm.css("opacity", 1);
				
			}
			// if sent to expert, leave alone
		});
		
		// if came from splash page, will need to test if resolved or unresolved, and behave accordingly
		// problem data is currentProblem
		if(currentProblem.solved != null) {
			// was passed through from something else
			if(currentProblem.solved == 1) {
				// has been solved
				// add solution and grey out box
				$("> textarea:last", jinputForm).val(currentProblem.sol);
				// grey out and mark as solved
				jnewForm.data("solved", "solved");
				jnewForm.css("opacity", 0.5);
				$("> button:last", jinputForm).html("Problem not solved");
				//console.log(jnewForm.data());
			} else if(currentProblem.solved == 0) {
				// hasn't been solved
				// show assigned expert and grey out as sent to expert
				jnewForm.append("<h3>Assigned expert ID: " + currentProblem.expert);
				jnewForm.data("solved", "expert");
				jnewForm.data("expertID", currentProblem.expert);
				
				jnewForm.css("opacity", 0.5);
				$("> .sendToExpert_button", jinputForm).html("Cancel sending to Expert");
			}
		}

        function oldSoftwareProblem() {
            jinputForm.append("<p>Software Problem</p>");
            jinputForm.append("Operating system:&nbsp;&nbsp; <input class='problem_form_text_field_customisation'></input>");
            $("input:last", jinputForm).attr("id", function () { return "OS_problemId" + problemId;})
                .val(currentProblem.OS);
            jinputForm.append("<br>Software name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class='problem_form_text_field_customisation'></input>");
            $("input:last", jinputForm).attr("id", function () { return "software_problemId" + problemId;})
                .val(currentProblem.software);
            jinputForm.append("<br>Problem type: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
            var problemSelect = jinputForm.append("<select class='problem_form_text_field_customisation'></select>").children("select");
            for(var i=0;i<problemTypeList.length;i++) {
                var currentItem = problemSelect.append("<option></option>").children("option:last-child");
                currentItem.attr("value", problemTypeList[i]);
                currentItem.html(problemTypeList[i]);
            }
            problemSelect.val(currentProblem.type);
            // immediately show serial number section, no button needed
            jinputForm.append("<br>Description: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;")
            jinputForm.append("<textarea class='problem_form_text_area_customisation'></textarea>")
            $(jinputForm.children("textarea")).attr({
                "id": function () { return "desc_problemId" + problemId;},
                "rows": 1,
                "columns": 50
            }).val(function () { return currentProblems[probArrPos].desc;});
            jnewForm.append(jinputForm);
            // add solution
            jinputForm.append("<br>Solution: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
            jinputForm.append("<textarea class='problem_form_text_area_customisation'></textarea>")
            $(jinputForm.children("textarea")).attr({
                "id": function () { return "desc_problem" + problemNum;},
                "rows": 1,
                "columns": 50
            });
        }
        function oldHardwareProblem() {
            jinputForm.append("<p>Hardware problem</p>");
            jinputForm.append("Hardware serial number:&nbsp;&nbsp;&nbsp;");
            jinputForm.append("<input class='problem_form_text_field_customisation'>");
            $(jinputForm.children("input:last-child")).attr({
                "id": function () { return "serial_problemId" + problemId;},
                "type": "text"
            }).val(function () { return currentProblem.hardwareSerial;});
            // add check hardware button
            jinputForm.append("<button class='problem_form_button_customisation'>check serial</button>");
            $("button:last", jinputForm)
                .attr("id", function () { return "BTNserial_problemId" + currentProblem.Id;})
                .bind("click", function () { checkSerialOld($(this).data("problemId"), $("#serial_problemId" + $(this).data("problemId")).val());})
                .data("problemId", problemId);
            jinputForm.append("<br>Problem type:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
            var problemSelect = jinputForm.append("<select class='problem_form_text_field_customisation'></select>").children("select");
            for(var i=0;i<problemTypeList.length;i++) {
                var currentItem = problemSelect.append("<option></option>").children("option:last-child");
                currentItem.attr("value", problemTypeList[i]);
                currentItem.html(problemTypeList[i]);
            }
            problemSelect.val(currentProblem.type);
            // immediately show serial number section, no button needed
            jinputForm.append("<br>Description: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;")
            jinputForm.append("<textarea class='problem_form_text_area_customisation'></textarea>")
            $(jinputForm.children("textarea")).attr({
                "id": function () { return "desc_problemId" + problemId;},
                "rows": 1,
                "columns": 50
            }).val(function () { return currentProblems[probArrPos].desc;})
            jnewForm.append(jinputForm);
            // add solution
            jinputForm.append("<br>Solution: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
            jinputForm.append("<textarea class='problem_form_text_area_customisation'></textarea>")
            $(jinputForm.children("textarea")).attr({
                "id": function () { return "desc_problem" + problemNum;},
                "rows": 1,
                "columns": 50
            });
        }

    }

    function getCaller(id) { // get caller details from name, just a prototype version, will be replaced with server side stuff
        var callerInfo = {};
        for(var i=0;i<personnelTable.length;i++) {
            if(personnelTable[i].ID.toUpperCase() == id.toUpperCase()) {
                callerInfo = personnelTable[i];
            }
        }
		$("#callerDetails").width(1000);


        var callerTable = $("#callerDetails").find("table").children("tbody");
        // ensure table only has one column
		
        callerTable.children("tr").children("td:nth-child(2)").remove();
        // add caller details to table

        callerTable.children("tr").filter(function () { return $(this).attr("title") == "name";}).append("<td>").children("td:last-child").html(callerInfo.name)
        callerTable.children("tr").filter(function () { return $(this).attr("title") == "ID";}).append("<td>").children("td:last-child").html(callerInfo.ID)
        callerTable.children("tr").filter(function () { return $(this).attr("title") == "job";}).append("<td>").children("td:last-child").html(callerInfo.job_title)
        callerTable.children("tr").filter(function () { return $(this).attr("title") == "department";}).append("<td>").children("td:last-child").html(callerInfo.department)
        callerTable.children("tr").filter(function () { return $(this).attr("title") == "telephone";}).append("<td>").children("td:last-child").html(callerInfo.telephone)
		
		$("#callerDetails").width(callerTable.width() + 10);

    }
    function checkSerialOld (problemId, serial) {
        // same as checkSerial, but needs different code due to different ID structures for old and new problems
        var inList = false;
        var hardwareData = {};
        for(var i=0;i<hardwareTable.length;i++) {
            if(hardwareTable[i].serial == serial) {
                inList = true;
                hardwareData = hardwareTable[i];
            }
        }
        if(!inList) {
            //console.log("hardware not found");
            return;
        }
        //console.log("hardware found");
        // add div with hardware info
        var problemDivId = "#problemId" + problemId;
        // remove old div
        $("> .hardwareDiv", problemDivId).remove();
        $(problemDivId).append("<div></div>");
        var hardwareDiv = $(problemDivId).children("div:last");
        hardwareDiv.attr("class", "hardwareDiv");
        hardwareDiv.append("<table></table>");
        var table = $("> table", hardwareDiv);
        // add table rows
        table.append("<tr><td>Serial:</td></tr><tr><td>Type:</td></tr><tr><td>Make:</td></tr>");
        //add data to table
        $("> tr:nth-child(1)", table).append("<td></td>").children("td:last-child").html(hardwareData.serial);
        $("> tr:nth-child(2)", table).append("<td></td>").children("td:last-child").html(hardwareData.type);
        $("> tr:nth-child(3)", table).append("<td></td>").children("td:last-child").html(hardwareData.make);
    }
    
  
    // code to generate time in format hh:mm:ss, and add to time input

    function getTime() {
        var date = new Date();
        var thisHour = date.getHours();
        if(thisHour < 10) { thisHour = "0" + thisHour;}
        var thisMinute = date.getMinutes();
        if(thisMinute < 10) { thisMinute = "0" + thisMinute;}
        var thisSecond = date.getSeconds();
        if(thisSecond < 10) { thisSecond = "0" + thisSecond;}
        return thisHour + ":" + thisMinute + ":" + thisSecond;
    }

    function getDate() {
        var date = new Date();
        var dd = date.getDate();
        if(dd < 10) {
            dd = "0" + dd;
        }
        var mm = date.getMonth();
        if(mm < 10) {
            mm = "0" + mm;
        }
        var yyyy = date.getFullYear();
        return yyyy + "-" + mm + "-" + dd;
    }

    
	
	
	
	// functions to get data from database
	// TODO: does data need to be loaded dynamically when needed, or all at once at start
	function getCurrentProblems() {
		// function will get data from backend database, currently uses hardcoded data
		var currentProblems = [];

		$.get("/api/currentProblems", function(data) { currentProblems = data; });

		return currentProblems;
	}
	
	function getProblemTypeList() {
		// function to get list of problem types from backend
		var problemTypeList = [];

		$.get("/api/problemTypes", function(data) { problemTypeList = data; })

		return problemTypeList;
	}
	
	function getAuthSoftware() {
		// get list of authorised software
		var authSoftware = [];

                $.get("/api/software", function(data) { authSoftware = data; })

		return authSoftware;
	}
	
	function getHardwareTable() {
		var hardwareTable = [];

	$.get("/api/hardware", function(data) { hardwareTable = data; })

		return hardwareTable;
	}
	
	function getPersonnelTable() {
		var personnelTable = [];

		$.get("/api/personnel", function(data) { personnelTable = data; })

		return personnelTable;
	}
	
	function getExperts(problemType) {
		// for a given problem type, backend will return all experts qualified to work on that problem
		// will be called when needed
		// format: expert, number of current problems being worked on
		var expertList = [];

		jQuery.ajaxSetup({async:false, headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

		var url = "/api/experts?type=" + problemType;

		$.get(url, function(data) { expertList = data; })

		return expertList;
		
	}
	function submitCall() {
		// this function will connect to laravel backend, and add all data from form to relevent database tables
		/* will need to submit an entire problem to backend: frontend var type -> backend var type
			type: string -> int
			Description: string -> longtext
			Solution: String -> longtext
			Solved: bool -> bool
			Created: Date -> timestamp
			Edited: Date -> timestamp? Unsure as to where this fits into form, will look into
			Completed: Date -> timestamp, will need some more programming
			Specialist: String -> varchar(255)
			Hardware / software : split into 2 arrays
			Hardware: hardware ID
			Software: OS and software name
			when function called, create 2 arrays: one for new problems and one for old problems
			
		*/
		// check that all forms are completed or sent to expert
		var problemForms = $(".problemForm");
		problemForms.each(function () {
			if($(this).data("solved") == "unsolved") {
				alert("At least one unsolved problem, please fix");
				return;
			}
		});
		// select all problem forms
		var newProblemDataHardware = []; // array for data of new hardware problems
		var newProblemDataSoftware = []; // for new software problems
		var oldProblemDataHardware = []; // arrray for data of old hardware problems
		var oldProblemDataSoftware = []; // array for old software problems
		
		// create new call entry for submission
		
		$(".problemForm").each(function () {
			
			var data = $(this).data();
			// get the inner data from the form
			var newData = {};
			// separate into new data and old data
			if(data.new) {
				// is new
				// get problem form, to retrieve data
				var inputDiv = $("> div", $(this));
				newData.type = $("> select", inputDiv).val(); // WORKS!
				newData.desc = $("> textarea:first", inputDiv).val(); // works
				newData.solved = data.solved; // will need converting to bool (will do at end)
				newData.created = $("> input:first", $(this)).val() + " " + $("> input:nth-child(2)", $(this)).val(); // WORKS
				// edited not needed
				if(data.solved == "solved") {
					newData.completed = getDate() + " " + getTime(); // current time
					newData.sol = $("> textarea:last", inputDiv).val(); // works
					newData.solved = true;
				} else if(data.solved == "expert") {
					// get expert ID
					newData.expert = data.expertID;
					newData.solved = false;
				}
				// if software, get software details and add to that array
				var radioVal = $("input[name='hardware/software']:checked", $(this)).val();
				if(radioVal == "Hardware") {
					// record hardware ID
					newData.hardwareSerial = $("> input:first", inputDiv).val();
					// add to array of hardware problems
					newProblemDataHardware.push(newData);
				} else if (radioVal == "Software") {
					// record OS and software name
					newData.OS = $("> input:first", inputDiv).val();
					newData.software = $("> input:last", inputDiv).val();
					// add to array of software problems
					newProblemDataSoftware.push(newData);
				}
				//console.log(newData);
				
			} else {
				//is old
				//console.log($(this).data());
				var inputDiv = $("> div:first", $(this));
				newData.ID = data.PID;
				newData.type = $("> select", inputDiv).val();
				newData.desc = $("> textarea:first", inputDiv).val();
				newData.solved = data.solved;
				//newData.created = ""; // creation date will not change NOPE
				newData.edited = getDate() + " " + getTime();
				if(data.solved == "solved") {
					newData.complete = getDate() + " " + getTime();
					newData.sol = $("> textarea:last", inputDiv).val();
					newData.solved = true;
				} else if(data.solved == "expert") {
					newData.expert = data.expertID;
					newData.solved = false;
				}
				
				// at end, check if software/hardware
				if($(this).data("softwareProblem")) {
					// record OS and software
					newData.OS = $("> input:first", inputDiv).val();
					newData.software = $("> input:last", inputDiv).val();
					// add to old software problems
					oldProblemDataSoftware.push(newData);
				} else {
					// record hardware ID
					newData.hardwareSerial = $("> input:first", inputDiv).val();
					// add to old hardware problems
					oldProblemDataHardware.push(newData);
				}
			}
			
			jQuery.ajaxSetup({async:false, headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
			
			console.log(newProblemDataHardware);
                var url = "/api/submitNewHard?array=" + JSON.stringify(newProblemDataHardware);
                console.log($.get(url, function(data) {}));
			
			console.log(oldProblemDataHardware);
                var url = "/api/submitOldHard?array=" + JSON.stringify(oldProblemDataHardware);
                console.log($.get(url, function(data) {}));
			
			console.log(newProblemDataSoftware);
                var url = "/api/submitNewSoft?array=" + JSON.stringify(newProblemDataSoftware);
                console.log($.get(url, function(data) {}));

			console.log(oldProblemDataSoftware);
			    var url = "/api/submitOldSoft?array=" + JSON.stringify(oldProblemDataSoftware);
                console.log($.get(url, function(data) {}));
		});
		
		
		
		
		// extract data
		
	}
	// autofill date/time
	// autofill date/time
	/*
	document.getElementById("callTime").value = getTime();
	document.getElementById("callDate").value = getDate();
	$("#callTime").val(getTime());
	$("#callDate").val(getDate());*/
	
</script>
    </body>
    </html>
@endsection
