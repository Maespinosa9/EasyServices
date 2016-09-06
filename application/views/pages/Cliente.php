<div id="EasyContainer" name="EasyContainer">
    <h3><strong>CLIENTES</strong></h3>
    <div id="toolbar" class="btn-group">
        <a class="btn"><img src="<?php echo base_url(); ?>\assets\image\add.jpg" class="img-rounded img-header"/></a>
        <a class="btn"><img src="<?php echo base_url(); ?>\assets\image\edit.jpg" class="img-rounded img-header"/></a>
        <a class="btn"><img src="<?php echo base_url(); ?>\assets\image\delete.jpg" class="img-rounded img-header"/></a>
    </div>
    <div id="prin">
        <div id="table"></div>
        <script>
            $(document).ready(function () {
                $("#table").kendoGrid({
                    dataSource: {
                        type: "JSON",
                        transport: {
                            read: "<?= base_url() ?>data.json"
                        },
                        pageSize: 20
                    },
                    height: 550,
                    groupable: true,
                    sortable: true,
                    pageable: {
                        refresh: true,
                        pageSizes: true,
                        buttonCount: 5
                    },
                    columns: [{
                            field: "id",
                            title: "id",
                            width: 240
                        }, {
                            field: "name",
                            title: "name"
                        }, {
                            field: "price",
                            title: "price"
                        }]
                });
            });
        </script>
    </div>
    <style type="text/css">
        .customer-photo {
            display: inline-block;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background-size: 32px 35px;
            background-position: center center;
            vertical-align: middle;
            line-height: 32px;
            box-shadow: inset 0 0 1px #999, inset 0 0 10px rgba(0,0,0,.2);
            margin-left: 5px;
        }

        .customer-name {
            display: inline-block;
            vertical-align: middle;
            line-height: 32px;
            padding-left: 3px;
        }
    </style>


    <form class="form-horizontal" role="form"><div class="form-group"><div class="col-sm-2"><label for="inputEmail3" class="control-label">Email</label></div><div class="col-sm-10"><input type="email" class="form-control" id="inputEmail3" placeholder="Email"></div></div><div class="form-group"><div class="col-sm-2"><label for="inputPassword3" class="control-label">Password</label></div><div class="col-sm-10"><input type="password" class="form-control" id="inputPassword3" placeholder="Password"></div></div><div class="form-group"><div class="col-sm-offset-2 col-sm-10"><div class="checkbox"><label><input type="checkbox"> Remember me </label></div></div></div><div class="form-group"><div class="col-sm-offset-2 col-sm-10"><button type="submit" class="btn btn-default">Sign in</button></div></div></form>

    <div id="example">
        <div class="demo-section k-content">
            <div id="tickets">
                <form id="ticketsForm">
                    <ul id="fieldlist">
                        <li>
                            <label for="fullname" class="required">Your Name</label>
                            <input type="text" id="fullname" name="fullname" class="k-textbox" placeholder="Full name" required validationMessage="Enter {0}" style="width: 220px;" />
                        </li>
                        <li>
                            <label for="search" class="required">Movie</label>
                            <input type="search" id="search" name="search" required validationMessage="Select movie" style="width: 220px;" /><span class="k-invalid-msg" data-for="search"></span>
                        </li>
                        <li>
                            <label for="time">Start time</label>
                            <select name="time" id="time" required data-required-msg="Select start time" style="width: 220px;" >
                                <option>14:00</option>
                                <option>15:30</option>
                                <option>17:00</option>
                                <option>20:15</option>
                            </select>
                            <span class="k-invalid-msg" data-for="time"></span>
                        </li>
                        <li>
                            <label for="amount">Amount</label>
                            <input id="amount" name="Amount" type="text" min="1" max="10" value="1" required data-max-msg="Enter value between 1 and 10" style="width: 220px;" />
                            <span class="k-invalid-msg" data-for="Amount"></span>
                        </li>
                        <li>
                            <label for="email" class="required">Email</label>
                            <input type="email" id="email" name="Email" class="k-textbox" placeholder="e.g. myname@example.net"  required data-email-msg="Email format is not valid"  style="width: 220px;"/>
                        </li>
                        <li>
                            <label for="tel" class="required">Phone</label>
                            <input type="tel" id="tel" name="tel" class="k-textbox" pattern="\d{10}" placeholder="Enter a ten digit number" required
                                   validationMessage="Enter at least ten digits" style="width: 220px;" />
                        </li>
                        <li  class="accept">
                            <label>Terms of Service</label>
                            <input type="checkbox" name="Accept" required validationMessage="Acceptance is required" /> <p>I accept the terms of service.</p>
                        </li>
                        <li class="confirm">
                            <button class="k-button k-primary" type="submit">Submit</button>
                        </li>
                        <li class="status">
                        </li>
                    </ul>
                </form>
            </div>
        </div>

        <style>
            #fieldlist {
                margin: 0;
                padding: 0;
            }

            #fieldlist li {
                list-style: none;
                padding-bottom: .7em;
                text-align: left;
            }

            #fieldlist label {
                display: block;
                padding-bottom: .3em;
                font-weight: bold;
                text-transform: uppercase;
                font-size: 12px;
                color: #444;
            }

            #fieldlist li.status {
                text-align: center;
            }

            #fieldlist li .k-widget:not(.k-tooltip),
            #fieldlist li .k-textbox {
                margin: 0 5px 5px 0;
            }

            .confirm {
                padding-top: 1em;
            }

            .valid {
                color: green;
            }

            .invalid {
                color: red;
            }

            #fieldlist li input[type="checkbox"] {
                margin: 0 5px 0 0;
            }

            span.k-widget.k-tooltip-validation {
                display: inline-block;
                width: 160px;
                text-align: left;
                border: 0;
                padding: 0;
                margin: 0;
                background: none;
                box-shadow: none;
                color: red;
            }

            .k-tooltip-validation .k-warning {
                display: none;
            }
        </style>

        <script>
            $(document).ready(function () {
                var data = [
                    "12 Angry Men",
                    "Il buono, il brutto, il cattivo.",
                    "Inception",
                    "One Flew Over the Cuckoo's Nest",
                    "Pulp Fiction",
                    "Schindler's List",
                    "The Dark Knight",
                    "The Godfather",
                    "The Godfather: Part II",
                    "The Shawshank Redemption"
                ];

                $("#search").kendoAutoComplete({
                    dataSource: data,
                    separator: ", "
                });

                $("#time").kendoDropDownList({
                    optionLabel: "--Start time--"
                });

                $("#amount").kendoNumericTextBox();

                var validator = $("#ticketsForm").kendoValidator().data("kendoValidator"),
                        status = $(".status");

                $("form").submit(function (event) {
                    event.preventDefault();
                    if (validator.validate()) {
                        status.text("Hooray! Your tickets has been booked!")
                                .removeClass("invalid")
                                .addClass("valid");
                    } else {
                        status.text("Oops! There is invalid data in the form.")
                                .removeClass("valid")
                                .addClass("invalid");
                    }
                });
            });
        </script>
    </div>
</div>	
