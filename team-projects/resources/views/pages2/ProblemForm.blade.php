<!DOCTYPE HTML>
<html>
<head>
	<title>{{config('app.name', 'HELPDESK')}}</title>
    <style>
        #callerDetails {/*css for caller details div, next to call form*/
            position: relative;
            left: 400px;
            top: -200px;
            width: 200px;
            height: 125px;
            border: 2px solid #bfbfbf;
        }
        #top_banner {/*css for banner at top*/
            background-color:#990000;
            position: relative;
            margin: 0;
            width: 100%;
            height: 140px;
        }
        p.banner_text{
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

        .button_customisation{
            font-family: helvetica, Times; color: ivory;
            font-size: 12px;
            background-color: #bfbfbf;
            border-radius: 4px;
            width: 95px;
            padding: 6px;
            margin: 10px;
        }

        .page_text{
            font-family: helvetica, Times;
            color: #000000;
            font-size: 18px;
            top:-100px;
        }

        .text_field_customisation{
            font-family: helvetica, Times;
            font-size: 18px;
            border: 2px solid #bfbfbf;
        }

        .divider{
            background-color: #ffffff;
            top: -100px;
            border: 2px solid #bfbfbf;
        }

        .generic_button_customisation{
            font-family: helvetica, Times; color: ivory;
            font-size: 12px;
            background-color: #bfbfbf;
            border-radius: 4px;
            width: 110px;
            padding: 6px;
            margin: 10px;
        }

        .no_referenceNo_button_customisation{
            font-family: helvetica, Times; color: ivory;
            font-size: 12px;
            background-color: #bfbfbf;
            border-radius: 4px;
            width: 140px;
            padding: 6px;
            margin: 10px;
        }

        .problemForm{ /* used to determine css of the form for adding data for problems*/
            position: relative;
            left : 20px;
            width: 400px;
            background-color: #ffffff;
            font-family: helvetica, Times;
            font-size: 16px;
            border: 2px solid #bfbfbf;
            margin-top: 5px;
            padding: 4px;
            line-height: 2.0;
        }

        .problem_form_text_field_customisation{
            font-family: helvetica, Times;
            font-size: 14px;
            border: 2px solid #bfbfbf;
        }

        .problem_form_button_customisation{
            font-family: helvetica, Times; color: ivory;
            font-size: 11px;
            background-color: #bfbfbf;
            border-radius: 3px;
            width: 90px;
            padding: 4px;
            margin: 5px;
        }

        .problem_form_text_area_customisation{
            font-family: helvetica, Times;
            font-size: 14px;
            border: 2px solid #bfbfbf;
            vertical-align: top;
        }

        .problem_form_problem_header {
            font-family: helvetica, Times;
            font-size: 18px;
        }
        .problem_form_radio_button_customisation {/*add css for radio buttons here*/

        }

        .problemFormButton{
            font-family: helvetica, Times;
            font-size: 12px;
            border: 2px solid #bfbfbf;
        }
        .hardwareDiv { /* css for hardware details div, optionally next to each problem*/
            position: absolute;
            top: 30px;
            left: 450px;
            width: 200px;
            height: 100px;
            border: 1px solid black;
            background-color: #ffffff;
            padding: 4px;
            line-height: 1.6;
            font-family: helvetica, Times;
            font-size: 16px;
            border: 2px solid #bfbfbf;
        }
        .approvedSoftwareDiv { /* for text saying software is approved*/
            color: green;
        }
        .notApprovedSoftwareDiv { /* for text saying software is not approved*/
            color: red;
        }
        #problemListDiv {
            position: fixed;
            width: 300px;
            height: 500px;
            border: 2px solid #bfbfbf;
            background-color: #ffffff;
            z-index: 10000;
            left: 70%;
            top: 30%;
        }
        #prevProblems {
            position: absolute;
            width: 300px;
            height: 389px;
            left: -1px;
            top: 60px;
            border: 2px solid #bfbfbf;
            overflow-y: scroll;

        }
        .selectableProblem { /* for each problem in list of previous problems */
            font-family: helvetica, Times;
            position: relative;
            width: 282px;
            height: 150px;
            background-color: #aaa;
            border: 1px solid black;
            left: -1px;
        }

        .Previous_Problem_Button_Customisation{
            font-family: helvetica, Times; color: ivory;
            font-size: 12px;
            background-color: #bfbfbf;
            border-radius: 3px;
            width: 90px;
            padding: 4px;
            margin: 5px;
            align-content: center;
        }
        .remove_problem_button {
            position: absolute;
            left: 370px;
            top: 10px;
            background-color: #bfbfbf;
            font-family: helvetica, Times; color: ivory;
            border-radius: 3px;
        }
		.remove_expert_list_button {
            position: absolute;
            left: 235px;
            top: 10px;
            background-color: #bfbfbf;
            font-family: helvetica, Times; color: ivory;
            border-radius: 3px;
        }

        .Page_Text_Small{ /*Specifically for the text at the bottom of the form "Existing problem reference number:" */
            font-family: helvetica, Times;
            color: #000000;
            font-size: 14px;
        }

        #BTNcancelSelect { /*button to close problem selection panel*/
            position: absolute;
            top: 460px;
            left: 100px;
        }

        .sendToExpert_button{
            font-family: helvetica, Times; color: ivory;
            font-size: 12px;
            background-color: #bfbfbf;
            border-radius: 4px;
            width: 150px;
            padding: 6px;
            margin: 10px;
        }
		.solved_button{
            font-family: helvetica, Times; color: ivory;
            font-size: 12px;
            background-color: #bfbfbf;
            border-radius: 4px;
            width: 150px;
            padding: 6px;
            margin: 10px;
        }

        .specialist_box{
            position: absolute;
            left: 450px;
            top: 150px;
            width: 270px;
            height: 200px;
            border: 2px solid #bfbfbf;
            background-color: #fff;
        }
		
		.expertList {
			overflow-y: auto;
			width: 270px;
			height: 163px;
		}
		.expertDiv {
			width: 250px;
			height: 30px;
			border: 1px solid gray;
		}
		.expertDivMouseover {
			background-color: #d5d5d5;
		}
		.expertNameDiv {
			width: 200px;
			height: 30px;
			text-align: right;
			border: 1px solid gray;
			padding-right: 10px;
			user-select: none;
		}
		.expertNameDivText {
			left: 10px;
			position: relative;
		}
		
		.expertNumDiv {
			width: 38px;
			height: 30px;
			float: right;
			text-align: center;
			border: 1px solid gray;
			vertical-align: bottom;
			user-select: none;
		}
		.expertNumDivText {
			
		}
		
    </style>
</head>
<body bgcolor="#f2f2f2">
<div id="top_banner">
    <h1 style="text-align: center;"><p class="banner_text">Problem Form</p></h1>
</div>

<button class="button_customisation" type="button" onclick="hideForm();$(this).remove();">End call</button>
<!-- everything goes in this div, to allow dynamic hide/show -->
<div id="inputForms" style="position: absolute;">
    <h3 style="font-family:helvetica, Times; color: #000000; font-size: 18px;"> Call Form</h3>
    <form id="call_form">
        <div class="page_text">
            Time: <input class="text_field_customisation" id="callTime" type="text"/><br><br>
        </div>
        <div class="page_text">
            Date: <input class="text_field_customisation" id="callDate" type="date"/><br><br>
        </div>
        <div class="page_text" style="position: relative; top:5px">
            Operator name: <input class="text_field_customisation" id="operatorName" type="text"/><br><br>
        </div>
        <div class="page_text" style="position: relative; top:10px">
            Caller name: <input class="text_field_customisation" id="callerName" type="text"/>
            <button type="button" class="generic_button_customisation" onclick="getCaller(document.getElementById('callerName').value)">Get caller details</button>
        </div>
        <div class="divider" id="callerDetails" >
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
    <div class="page_text" id="addProblemDiv">
        <form>
            <button class="generic_button_customisation" type="button" onclick="newProblem()">New problem</button>
            <br><br>
            Existing problem reference number:&nbsp;<input class="text_field_customisation" id="existingIDinput" type="text"/>
            <button class="generic_button_customisation" type="button" onclick="oldProblem($('#existingIDinput').val())">Existing problem</button>
            <button class="no_referenceNo_button_customisation" type="button" onclick="openLog()">No reference number</button>
        </form>
    </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	// intialisation of variables
	var problemNum = 0; // keeps track of the problem number user is on
	var currentProblems = getCurrentProblems();
	var problemTypeList = getProblemTypeList();
	var authSoftware = getAuthSoftware();
	var hardwareTable = getHardwareTable();
	var personnelTable = getPersonnelTable();
	document.getElementById("callTime").value = getTime();
	document.getElementById("callDate").value = getDate();
	document.getElementById("callDate").value = getDate();
	
	// startup code for debugging: TODO: remove
	
	/* Test expert list
	newProblem();
	hardwareSelected($(".problem_form_radio_button_customisation").data("num"));
	showExpertList(1);
	*/
	
    function openLog () {
        //function used to open list of previous calls to scroll through
        console.log("User will select problem from list");
        // need to create a div
        // then put a div for each current problem in that div
        // then have each problem selectable
        // and have a select button at the bottom
        // and when that is pressed, the oldProblem function will be run for the selected problem ID
        // div will be large, fill like half the screen or something
        // I'll leave the actual design to Rob
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
            cont.append("Description: " + problem.desc);
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

    }

    function hideForm() {
        // will be used to exit form and return to splash page
        $("#inputForms").hide();
    }

    function newProblem() {
        console.log("New Problem")
        problemNum++;
        console.log(problemNum);
        // generate div for new form

        // jquery version
        // add new div for each problem, set class and ID
        $("#problemsDiv").append("<div></div>");
        var jnewForm = $("#problemsDiv > div:last-child");
        jnewForm.attr("class", "problemForm");
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
        radioForm.append("<input type='radio' name='hardware/software' value='Hardware' class='problem_form_radio_button_customisation'>Hardware</input>");
        $("input:last", radioForm)
            .data("num", problemNum)
            .bind("change", function () { hardwareSelected($(this).data("num"));});
        radioForm.append("<input type='radio' name='hardware/software' value='Software' class='problem_form_radio_button_customisation'>Software</input>");
        $("input:last", radioForm)
            .data("num", problemNum)
            .bind("change", function () {softwareSelected($(this).data("num")); });



        // add form elements
        // hardware serial number, OS and software name will be added through a separate function
        var jinputForm = $(document.createElement("div"))
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
		console.log(problemNum);
        $("#expert_list").remove();
        var problemDiv = $("#problem" + problemNum);
		if(problemDiv.data("solved") == "unsolved") {
			// operate as normal
			problemDiv.append("<div id='expert_list'></div>");

			var expertDiv = $("#expert_list");
			expertDiv.addClass("specialist_box");
			
			
			// close button in top right hand corner
			expertDiv.append("<button class='remove_expert_list_button' type='button'>X</button>");
			
			var closeButton = $("> button", expertDiv);
			closeButton.bind("click", function () {
				// close form
				$(this).parent().remove();
			});
			expertDiv.append("<h3 style='margin-block-start: 0;margin-block-end:0;padding-left: 10px;'>Qualified experts</h3>");
			expertDiv.append("<div class='expertList'></div>");
			var expertList = $(">div:last", expertDiv);
			// get problem type, and use it to get list of experts associated with that problem type
			
			
			var problemType = $("#inputForm" + problemNum + " > select").val();
			var experts = getExperts(problemType);
			console.log(experts);
			// sort list of experts from least to most
			experts.sort(function (a,b) { return a.tasks - b.tasks;});
			for (var i=0;i<experts.length;i++) {
				//expertList.append(experts[i].name + " | " + experts[i].tasks + "<br>");
				
				// for each: create div, create 2 divs in div, one for name and one for number, align neatly. assign onclick to div for both
				expertList.append("<div class='expertDiv'></div>");
				var currentDiv = $(">div:last", expertList);
				currentDiv.append("<div class='expertNumDiv'></div><div class='expertNameDiv'></div>");
				$("> .expertNumDiv", currentDiv).append(experts[i].tasks);
				$("> .expertNameDiv", currentDiv).append(experts[i].name);
				// add mouseover and click events, to allow expert to be properly selected
				currentDiv.data("expertID", experts[i].id);
				currentDiv.bind({
					"mouseenter mouseleave": function () {
						$(this).toggleClass("expertDivMouseover");
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
		console.log("problemNum" + num);
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
        } else {
            $("#approvedDiv_problem" + problemNum).html("Not approved software").attr("class", "notApprovedSoftwareDiv");
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
            console.log("hardware not found");
            return;
        }
        console.log("hardware found");
        var problemDivId = "#problem" + problemNum;
        // remove old div if exists
        $("> .hardwareDiv", problemDivId).remove();
        // create new div for hardware details
        $(problemDivId).append("<div><div>");
        var hardwareDiv = $(problemDivId).children("div:last");
        hardwareDiv.attr("class", "hardwareDiv");
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
            console.log("Problem not found")
            return;
        }
        // check if already exists
        if ($("#problemId" + problemId).length) {
            return;
        }
        // generate problem form
        $("#problemsDiv").append("<div></div>")
        var jnewForm = $("#problemsDiv > div:last-child")
        jnewForm.attr("class", "problemForm");
        jnewForm.attr("id", function () { return "problemId" + problemId;})
        //jquery add title
        jnewForm.append(function () { return "<h4 class='problem_form_problem_header'>Problem ID: &nbsp;" + problemId + "</h4>";})
        var jinputForm = $(document.createElement("div"))

        // check if problem is hardware or software
        var currentProblem = currentProblems[probArrPos];
        if(currentProblem.isSoftware) {
            // generate software problem form
            oldSoftwareProblem();
        } else {
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
            }).val(function () { return currentProblems[probArrPos].desc;})
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

    function getCaller(name) { // get caller details from name, just a prototype version, will be replaced with server side stuff
        var callerInfo = {};
        for(var i=0;i<personnelTable.length;i++) {
            if(personnelTable[i].name == name) {
                callerInfo = personnelTable[i];
            }
        }



        var callerTable = $("#callerDetails").find("table").children("tbody");
        // ensure table only has one column

        callerTable.children("tr").children("td:nth-child(2)").remove();
        // add caller details to table

        callerTable.children("tr").filter(function () { return $(this).attr("title") == "name";}).append("<td>").children("td:last-child").html(callerInfo.name)
        callerTable.children("tr").filter(function () { return $(this).attr("title") == "ID";}).append("<td>").children("td:last-child").html(callerInfo.ID)
        callerTable.children("tr").filter(function () { return $(this).attr("title") == "job";}).append("<td>").children("td:last-child").html(callerInfo.job_title)
        callerTable.children("tr").filter(function () { return $(this).attr("title") == "department";}).append("<td>").children("td:last-child").html(callerInfo.department)
        callerTable.children("tr").filter(function () { return $(this).attr("title") == "telephone";}).append("<td>").children("td:last-child").html(callerInfo.telephone)


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
            console.log("hardware not found");
            return;
        }
        console.log("hardware found");
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
		var currentProblems = [
        {
            id : 1,
            isSoftware: true,
            software: "MSPaint",
            OS : "Windows 10",
            type: "type1",
            desc : "sample description"
        },
        {
            id : 2,
            isSoftware: false,
            hardwareSerial : 1234,
            type: "type2",
            desc : "sample description2"
        },
        {
            id : 3,
            isSoftware: true,
            software: "MSWord",
            OS : "Windows 95",
            type: "type3",
            desc : "sample description3"
        },
        {
            id : 4,
            isSoftware: false,
            hardwareSerial : 1234,
            type: "type2",
            desc : "sample description2"
        },
        {
            id : 5,
            isSoftware: true,
            software: "Microsoft Bob",
            OS : "Windows 95",
            type: "type3",
            desc : "sample description3"
        }];
		return currentProblems;
	}
	
	function getProblemTypeList() {
		// function to get list of problem types from backend
		var problemTypeList = ["type1","type2","type3","etc"];
		return problemTypeList;
	}
	
	function getAuthSoftware() {
		// get list of authorised software
		var authSoftware = ["MSPaint", "Steam", "MSWord", "Windows Vista", "Microsoft Bob"];
		return authSoftware;
	}
	
	function getHardwareTable() {
		var hardwareTable = [
        {
            serial : 1234,
            type : "printer",
            make : "HP"
        },
        {
            serial : 4321,
            type : "Desktop Computer",
            make : "IBM"
        },
        {
            serial : 1,
            type : "Difference engine",
            make : "Babbage"
        }];
		return hardwareTable;
	}
	
	function getPersonnelTable() {
		var personnelTable = [
        {
            name : "name1",
            ID : 5234,
            job_title : "Manager",
            department : "dept1",
            telephone : "52345678"
        },
        {
            name : "name2",
            ID : 1235,
            job_title : "job2",
            department : "dept1",
            telephone : "12345676"
        },
        {
            name : "name3",
            ID : 1236,
            job_title : "job1",
            department : "dept2",
            telephone : "1231234"
        }];
		return personnelTable;
	}
	
	function getExperts(problemType) {
		// for a given problem type, backend will return all experts qualified to work on that problem
		// will be called when needed
		// format: expert, number of current problems being worked on
		var expertList = [
			{name : "expert1", tasks : 3, id : "a1"},
			{name : "expert2", tasks : 1, id : "b2"},
			{name : "expert3", tasks : 15, id : "c3"},
			{name : "expert4", tasks : 6, id : "d4"},
			{name : "expert5", tasks : 2, id : "e5"},
			{name : "expert6", tasks : 1, id : "f6"},
			{name : "expert7", tasks : 7, id : "g7"},
			{name : "expert8", tasks : 3, id : "h8"},
			{name : "expert9", tasks : 4, id : "i9"},
			{name : "expert10", tasks : 1337, id : "j10"}
		];
		return expertList;
		
	}
	function submitCall() {
		// this function will connect to laravel backend, and add all data from form to relevent database tables
	}
</script>
</body>
</html>