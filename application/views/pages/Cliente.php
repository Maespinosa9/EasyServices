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
</div>	
