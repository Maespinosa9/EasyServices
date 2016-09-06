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

    <div id="example" class="container" style="opacity: 1; visibility: visible;">
        <section class="well">
            <h2 class="ra-well-title">Profile Setup</h2>
            <hr>
            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <div class="col-sm-2">
                        <label for="inputEmail3" class="control-label">Email</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="email" class="form-control k-textbox" id="inputEmail3" placeholder="Email">
                    </div>
                    <div class="col-sm-2">
                        <label for="inputEmail3" class="control-label">Email</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="email" class="form-control k-textbox" id="inputEmail3" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2">
                        <label for="inputPassword3" class="control-label">Password</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="password" class="form-control k-textbox" id="inputPassword3" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">Remember me</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Sign in</button>
                    </div>
                </div>
            </form>
            <div class="form-horizontal form-widgets col-sm-6">
                <div class="form-group">
                    <label class="control-label col-sm-4" for="name">Name</label>
                    <div class="col-sm-8 col-md-6">
                        <input id="name" value="Johnatan Dodsworth" class="k-textbox">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="birthday">Birthday</label>
                    <div class="col-sm-8 col-md-6">
                        <span class="k-widget k-datepicker k-header"><span class="k-picker-wrap k-state-default"><input type="text" value="10/09/1979" data-role="datepicker" style="width: 100%;" class="k-input" role="combobox" aria-expanded="false" aria-disabled="false"><span unselectable="on" class="k-select" role="button"><span unselectable="on" class="k-icon k-i-calendar">select</span></span></span></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="gender">Gender</label>
                    <div class="col-sm-8 col-md-6">
                        <span title="" class="k-widget k-dropdown k-header" unselectable="on" role="listbox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-owns="gender_listbox" aria-disabled="false" aria-busy="false" aria-activedescendant="7646e4f6-1e5b-49ea-af20-4ad3ea2d0895"><span unselectable="on" class="k-dropdown-wrap k-state-default"><span unselectable="on" class="k-input">Male</span><span unselectable="on" class="k-select"><span unselectable="on" class="k-icon k-i-arrow-s">select</span></span></span><select id="gender" data-role="dropdownlist" style="display: none;"><option value="Male">Male</option><option value="Female">Female</option></select></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="language">Language</label>
                    <div class="col-sm-8 col-md-6">
                        <span title="" class="k-widget k-dropdown k-header" unselectable="on" role="listbox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-owns="language_listbox" aria-disabled="false" aria-busy="false" aria-activedescendant="dd01e45b-22d6-452d-8951-8cecfcd3ef0e"><span unselectable="on" class="k-dropdown-wrap k-state-default"><span unselectable="on" class="k-input">English</span><span unselectable="on" class="k-select"><span unselectable="on" class="k-icon k-i-arrow-s">select</span></span></span><select id="language" data-role="dropdownlist" style="display: none;"><option value="English">English</option><option value="German">German</option></select></span>
                    </div>
                </div>
            </div>

            <div class="form-horizontal form-widgets col-sm-6">
                <div class="form-group">
                    <label class="control-label col-sm-4" for="occupation">Occupation</label>
                    <div class="col-sm-8 col-md-6">
                        <input id="occupation" placeholder="e.g. Developer" class="k-textbox">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="skills">Skills</label>
                    <div class="col-sm-8 col-md-6">
                        <div class="k-widget k-multiselect k-header" unselectable="on" title="" style=""><div class="k-multiselect-wrap k-floatwrap" unselectable="on"><ul role="listbox" unselectable="on" class="k-reset" id="skills_taglist"><li class="k-button" unselectable="on"><span unselectable="on">C#</span><span unselectable="on" class="k-select"><span unselectable="on" class="k-icon k-i-close">delete</span></span></li><li class="k-button" unselectable="on"><span unselectable="on">jQuery</span><span unselectable="on" class="k-select"><span unselectable="on" class="k-icon k-i-close">delete</span></span></li></ul><input class="k-input k-textbox" style="width: 25px" accesskey="" autocomplete="off" role="listbox" aria-expanded="false" tabindex="0" aria-owns="skills_taglist skills_listbox" aria-disabled="false" aria-activedescendant="f8a2f622-53ca-4f13-ae41-22214ad890b2" aria-busy="false"><span class="k-icon k-loading k-loading-hidden"></span></div><select id="skills" multiple="multiple" data-role="multiselect" style="display: none;" aria-disabled="false"><option value="C">C</option><option value="C++">C++</option><option value="C#" selected="">C#</option><option value="JavaScript">JavaScript</option><option value="jQuery" selected="">jQuery</option><option value="Git">Git</option><option value="Node.js">Node.js</option><option value="Ruby">Ruby</option><option value="Ruby on Rails">Ruby on Rails</option><option value="Kendo UI">Kendo UI</option></select><span style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px; font-stretch: normal; font-style: normal; font-weight: normal; letter-spacing: normal; text-transform: none; line-height: 18.34px; position: absolute; visibility: hidden; top: -3333px; left: -3333px;"></span></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="experience">Experience</label>
                    <div class="col-sm-8 col-md-6">
                        <span class="k-widget k-numerictextbox"><span class="k-numeric-wrap k-state-default"><input type="text" class="k-formatted-value k-input" tabindex="0" title="" style="display: inline-block;" aria-disabled="false" aria-readonly="false"><input id="experience" type="text" value="4" data-role="numerictextbox" role="spinbutton" class="k-input" aria-valuenow="4" style="display: none;" aria-disabled="false" aria-readonly="false"><span class="k-select"><span unselectable="on" class="k-link"><span unselectable="on" class="k-icon k-i-arrow-n" title="Increase value">Increase value</span></span><span unselectable="on" class="k-link"><span unselectable="on" class="k-icon k-i-arrow-s" title="Decrease value">Decrease value</span></span></span></span></span>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="form-horizontal form-widgets col-sm-12">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="bio">Short bio</label>
                    <div class="col-sm-10">
                        <table cellspacing="4" cellpadding="0" class="k-widget k-editor k-header k-editor-widget" role="presentation"><tbody><tr role="presentation"><td class="k-editor-toolbar-wrap" role="presentation"><ul class="k-editor-toolbar" role="toolbar" aria-controls="bio" data-role="editortoolbar"><li class="k-tool-group" role="presentation"><span class="k-editor-dropdown k-group-start k-group-end"><span title="Format" style="width: 110px;" class="k-widget k-dropdown k-header k-editor-widget" unselectable="on" role="listbox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-owns="" aria-disabled="false" aria-busy="false" aria-activedescendant="e3b69552-39df-4d5f-b601-45afaa4e0194"><span unselectable="on" class="k-dropdown-wrap k-state-default"><span unselectable="on" class="k-input">Format</span><span unselectable="on" class="k-select"><span unselectable="on" class="k-icon k-i-arrow-s">select</span></span></span><select title="Format" class="k-formatting k-decorated" data-role="selectbox" style="width: 110px; display: none;" unselectable="on"><option value="p">Paragraph</option><option value="blockquote">Quotation</option><option value="h1">Heading 1</option><option value="h2">Heading 2</option><option value="h3">Heading 3</option><option value="h4">Heading 4</option><option value="h5">Heading 5</option><option value="h6">Heading 6</option></select></span></span></li><li class="k-tool-group k-button-group" role="presentation"><a href="" role="button" class="k-tool k-group-start" unselectable="on" title="Bold" aria-pressed="false"><span unselectable="on" class="k-tool-icon k-bold"></span><span class="k-tool-text">Bold</span></a><a href="" role="button" class="k-tool" unselectable="on" title="Italic" aria-pressed="false"><span unselectable="on" class="k-tool-icon k-italic"></span><span class="k-tool-text">Italic</span></a><a href="" role="button" class="k-tool" unselectable="on" title="Underline" aria-pressed="false"><span unselectable="on" class="k-tool-icon k-underline"></span><span class="k-tool-text">Underline</span></a><a href="" role="button" class="k-tool k-group-end" unselectable="on" title="Strikethrough" aria-pressed="false"><span unselectable="on" class="k-tool-icon k-strikethrough"></span><span class="k-tool-text">Strikethrough</span></a></li><li class="k-tool-group k-button-group" role="presentation"><a href="" role="button" class="k-tool k-group-start" unselectable="on" title="Subscript" aria-pressed="false"><span unselectable="on" class="k-tool-icon k-subscript"></span><span class="k-tool-text">Subscript</span></a><a href="" role="button" class="k-tool k-group-end" unselectable="on" title="Superscript" aria-pressed="false"><span unselectable="on" class="k-tool-icon k-superscript"></span><span class="k-tool-text">Superscript</span></a></li><li class="k-tool-group k-button-group" role="presentation"><a href="" role="button" class="k-tool k-group-start" unselectable="on" title="Align text left" aria-pressed="false"><span unselectable="on" class="k-tool-icon k-justifyLeft"></span><span class="k-tool-text">Align text left</span></a><a href="" role="button" class="k-tool" unselectable="on" title="Center text" aria-pressed="false"><span unselectable="on" class="k-tool-icon k-justifyCenter"></span><span class="k-tool-text">Center text</span></a><a href="" role="button" class="k-tool" unselectable="on" title="Align text right" aria-pressed="false"><span unselectable="on" class="k-tool-icon k-justifyRight"></span><span class="k-tool-text">Align text right</span></a><a href="" role="button" class="k-tool k-group-end" unselectable="on" title="Justify" aria-pressed="false"><span unselectable="on" class="k-tool-icon k-justifyFull"></span><span class="k-tool-text">Justify</span></a></li><li class="k-tool-group k-button-group" role="presentation"><a href="" role="button" class="k-tool k-group-start" unselectable="on" title="Insert unordered list" aria-pressed="false"><span unselectable="on" class="k-tool-icon k-insertUnorderedList"></span><span class="k-tool-text">Insert unordered list</span></a><a href="" role="button" class="k-tool" unselectable="on" title="Insert ordered list" aria-pressed="false"><span unselectable="on" class="k-tool-icon k-insertOrderedList"></span><span class="k-tool-text">Insert ordered list</span></a><a href="" role="button" class="k-tool k-group-end" unselectable="on" title="Indent"><span unselectable="on" class="k-tool-icon k-indent"></span><span class="k-tool-text">Indent</span></a><a href="" role="button" class="k-tool k-group-end k-state-disabled" unselectable="on" title="Outdent"><span unselectable="on" class="k-tool-icon k-outdent"></span><span class="k-tool-text">Outdent</span></a></li></ul></td></tr><tr><td class="k-editable-area"><iframe title="Editable area. Press F10 for toolbar." frameborder="0" class="k-content" tabindex="0" src='javascript:""'></iframe><textarea id="bio" data-role="editor" autocomplete="off" class="k-content k-raw-content" style="display: none;"></textarea></td></tr></tbody></table>
                    </div>
                </div>
            </div>

            <div class="buttons-wrap">
                <button class="k-button k-state-default">Cancel</button>
                <button class="k-button k-state-default">Update</button>
            </div>
        </section>
    </div>	
